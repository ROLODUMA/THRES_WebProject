<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('admin');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Subjects</h3>
<p>Sample subjects list. Populate your `subjects` table and query here.</p>
<table class="table table-striped">
	<thead><tr><th>ID</th><th>Code</th><th>Title</th><th>Actions</th></tr></thead>
	<tbody>
		<tr><td>1</td><td>ENG101</td><td>English</td><td>-</td></tr>
		<tr><td>2</td><td>MATH101</td><td>Mathematics</td><td>-</td></tr>
	</tbody>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
