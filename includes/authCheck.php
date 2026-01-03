<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

require_once __DIR__ . '/db.php';

// Flash helpers
function set_flash(string $key, string $message): void
{
	$_SESSION['flash'][$key] = $message;
}

function get_flash(string $key): ?string
{
	if (!empty($_SESSION['flash'][$key])) {
		$m = $_SESSION['flash'][$key];
		unset($_SESSION['flash'][$key]);
		return $m;
	}
	return null;
}

// Auth helpers
function is_logged_in(): bool
{
	return !empty($_SESSION['user_id']);
}

function current_user(): ?array
{
	if (!is_logged_in()) return null;
	if (!empty($_SESSION['current_user'])) return $_SESSION['current_user'];
	$db = getDB();
	$stmt = $db->prepare('SELECT id, name, email, role FROM users WHERE id = ?');
	$stmt->execute([$_SESSION['user_id']]);
	$user = $stmt->fetch();
	if ($user) {
		$_SESSION['current_user'] = $user;
	}
	return $user ?: null;
}

function require_login(): void
{
	if (!is_logged_in()) {
		set_flash('error', 'Please login to continue.');
		header('Location: /THRES_SP/auth/login.php');
		exit;
	}
}

function require_role(string $role): void
{
	require_login();
	$user = current_user();
	if (!$user || $user['role'] !== $role) {
		set_flash('error', 'You do not have permission to access that page.');
		header('Location: /THRES_SP/index.php');
		exit;
	}
}
