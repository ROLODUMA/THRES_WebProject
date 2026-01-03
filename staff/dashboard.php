<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('staff');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Staff Dashboard</h3>
<p>Quick actions for teachers.</p>
<div class="row">
	<div class="col-md-4">
		<a class="btn btn-outline-primary w-100" href="grades.php">Encode Grades</a>
	</div>
	<div class="col-md-4">
		<a class="btn btn-outline-secondary w-100" href="studentInfo.php">Student Info</a>
	</div>
	<div class="col-md-4">
		<a class="btn btn-outline-success w-100" href="regForm.php">Registration Form</a>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
