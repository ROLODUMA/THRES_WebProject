<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('student');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Student Dashboard</h3>
<p>Welcome to your student dashboard. Quick links below:</p>
<div class="list-group">
	<a href="subjects.php" class="list-group-item">Subjects</a>
	<a href="schedules.php" class="list-group-item">Schedules</a>
	<a href="grades.php" class="list-group-item">Grades</a>
	<a href="profile.php" class="list-group-item">Profile</a>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
