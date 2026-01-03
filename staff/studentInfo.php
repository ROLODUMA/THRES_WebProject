<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('staff');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Student Info (Staff)</h3>
<p>List of students accessible to staff. Replace with DB queries.</p>
<table class="table">
	<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>
	<tbody>
		<tr><td>1</td><td>Jane Doe</td><td>jane@example.com</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
