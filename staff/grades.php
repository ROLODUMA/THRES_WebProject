<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('staff');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Encode Grades</h3>
<p>This page will allow staff to enter student grades for subjects. Replace sample form with real inputs.</p>
<form>
	<div class="mb-3">
		<label class="form-label">Student ID</label>
		<input class="form-control">
	</div>
	<div class="mb-3">
		<label class="form-label">Subject</label>
		<input class="form-control">
	</div>
	<div class="mb-3">
		<label class="form-label">Grade</label>
		<input class="form-control">
	</div>
	<button class="btn btn-primary">Save</button>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
