<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('staff');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Registration Form</h3>
<p>Sample registration form template for student enrollment.</p>
<form>
	<div class="mb-3">
		<label class="form-label">Student Name</label>
		<input class="form-control">
	</div>
	<div class="mb-3">
		<label class="form-label">Email</label>
		<input type="email" class="form-control">
	</div>
	<div class="mb-3">
		<label class="form-label">Course</label>
		<input class="form-control">
	</div>
	<button class="btn btn-primary">Submit</button>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
