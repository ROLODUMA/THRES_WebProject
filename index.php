<?php
require_once __DIR__ . '/includes/authCheck.php';
require_once __DIR__ . '/includes/header.php';
?>
<div class="row">
	<div class="col-md-8">
		<h1>Welcome to Thres Student Portal</h1>
		<p>This is a starter portal structure. Use the links to navigate to the correct area based on role.</p>
		<div class="list-group">
			<a href="/THRES_SP/auth/login.php" class="list-group-item">Login</a>
			<a href="/THRES_SP/auth/register.php" class="list-group-item">Register</a>
			<a href="/THRES_SP/admin/dashboard.php" class="list-group-item">Admin Dashboard (sample)</a>
			<a href="/THRES_SP/staff/dashboard.php" class="list-group-item">Staff Dashboard (sample)</a>
			<a href="/THRES_SP/student/dashboard.php" class="list-group-item">Student Dashboard (sample)</a>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Notes</h5>
				<p class="card-text">Database defaults are in `includes/db.php`. Create the `users` table before registering.</p>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
