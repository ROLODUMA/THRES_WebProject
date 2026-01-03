<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('student');
$user = current_user();
require_once __DIR__ . '/../includes/header.php';
?>
<h3>Profile</h3>
<p>Name: <?php echo htmlspecialchars($user['name']); ?></p>
<p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

