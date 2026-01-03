<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('student');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Schedules</h3>
<p>Your schedule for the week.</p>
<table class="table">
	<thead><tr><th>Day</th><th>Time</th><th>Subject</th></tr></thead>
	<tbody>
		<tr><td>Mon</td><td>08:00 - 09:00</td><td>Math</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

