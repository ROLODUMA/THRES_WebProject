<?php
require_once __DIR__ . '/authCheck.php';
$user = current_user();
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thres Student Portal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/THRES_SP/assets/css/style.css">
	<meta name="robots" content="noindex">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand" href="/THRES_SP/index.php">Thres Portal</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navmenu">
			<ul class="navbar-nav ms-auto">
				<?php if (!$user): ?>
					<li class="nav-item"><a class="nav-link" href="/THRES_SP/auth/login.php">Login</a></li>
					<li class="nav-item"><a class="nav-link" href="/THRES_SP/auth/register.php">Register</a></li>
				<?php else: ?>
					<?php if ($user['role'] === 'admin'): ?>
						<li class="nav-item"><a class="nav-link" href="/THRES_SP/admin/dashboard.php">Admin</a></li>
					<?php endif; ?>
					<?php if ($user['role'] === 'staff'): ?>
						<li class="nav-item"><a class="nav-link" href="/THRES_SP/staff/dashboard.php">Staff</a></li>
					<?php endif; ?>
					<?php if ($user['role'] === 'student'): ?>
						<li class="nav-item"><a class="nav-link" href="/THRES_SP/student/dashboard.php">Student</a></li>
					<?php endif; ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo htmlspecialchars($user['name']); ?></a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="/THRES_SP/auth/changePassword.php">Change Password</a></li>
							<li><a class="dropdown-item" href="/THRES_SP/auth/logout.php">Logout</a></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
<main class="container mt-4">
	<?php if ($msg = get_flash('error')): ?>
		<div class="alert alert-danger"><?php echo htmlspecialchars($msg); ?></div>
	<?php endif; ?>
	<?php if ($msg = get_flash('success')): ?>
		<div class="alert alert-success"><?php echo htmlspecialchars($msg); ?></div>
	<?php endif; ?>

