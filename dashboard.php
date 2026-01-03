<?php
require_once __DIR__ . '/includes/authCheck.php';
if (!is_logged_in()) {
	header('Location: /THRES_SP/index.php');
	exit;
}
$user = current_user();
if ($user['role'] === 'admin') header('Location: /THRES_SP/admin/dashboard.php');
elseif ($user['role'] === 'staff') header('Location: /THRES_SP/staff/dashboard.php');
else header('Location: /THRES_SP/student/dashboard.php');
exit;
