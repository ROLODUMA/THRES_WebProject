<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('student');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Your Grades</h3>
<p>Sample grade report. Replace with queries that fetch the logged-in student's grades.</p>
<table class="table">
	<thead><tr><th>Subject</th><th>Grade</th></tr></thead>
	<tbody>
		<tr><td>English</td><td>90</td></tr>
		<tr><td>Math</td><td>85</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
