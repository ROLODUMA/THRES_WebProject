<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('admin');
require_once __DIR__ . '/../includes/header.php';
?>
<h2>Admin Dashboard</h2>
<div class="row">
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-body">
				<h5 class="card-title">Manage Staff</h5>
				<p class="card-text">Add or edit staff accounts.</p>
				<a href="addStaff.php" class="btn btn-sm btn-primary">Add Staff</a>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-body">
				<h5 class="card-title">Manage Students</h5>
				<p class="card-text">Add or view student details.</p>
				<a href="addStudent.php" class="btn btn-sm btn-primary">Add Student</a>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-3">
			<div class="card-body">
				<h5 class="card-title">Subjects & Schedules</h5>
				<a href="subjects.php" class="btn btn-sm btn-secondary">Subjects</a>
				<a href="schedules.php" class="btn btn-sm btn-secondary">Schedules</a>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
