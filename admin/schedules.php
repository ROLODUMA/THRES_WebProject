<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('admin');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Schedules</h3>
<p>Sample schedules. Create a `schedules` table and show real data here.</p>
<table class="table">
	<thead><tr><th>Day</th><th>Time</th><th>Subject</th><th>Room</th></tr></thead>
	<tbody>
		<tr><td>Mon</td><td>08:00 - 09:00</td><td>Math</td><td>101</td></tr>
		<tr><td>Tue</td><td>09:00 - 10:00</td><td>English</td><td>102</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
