<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('staff');
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Subjects (Staff)</h3>
<p>List of subjects the staff handles.</p>
<ul>
	<li>ENG101 - English</li>
	<li>MATH101 - Mathematics</li>
</ul>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

