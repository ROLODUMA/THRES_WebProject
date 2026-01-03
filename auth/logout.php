<?php
require_once __DIR__ . '/../includes/authCheck.php';
// Destroy session and redirect to login
session_unset();
session_destroy();
setcookie(session_name(), '', time() - 3600);
header('Location: /THRES_SP/auth/login.php');
exit;
