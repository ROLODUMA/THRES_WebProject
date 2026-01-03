<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('admin');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Student Info</h3>
<p>Sample student list. Replace with live queries to students table.</p>
<table class="table table-hover">
	<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead>
	<tbody>
		<tr><td>1</td><td>Jane Doe</td><td>jane@example.com</td><td>-</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
