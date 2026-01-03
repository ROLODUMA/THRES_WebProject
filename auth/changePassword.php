<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_login();

$user = current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$current = $_POST['current'] ?? '';
		$new = $_POST['new'] ?? '';
		$confirm = $_POST['confirm'] ?? '';
		if ($new === '' || $new !== $confirm) {
				set_flash('error', 'New passwords do not match or are empty.');
		} else {
				$db = getDB();
				$stmt = $db->prepare('SELECT password FROM users WHERE id = ?');
				$stmt->execute([$user['id']]);
				$row = $stmt->fetch();
				if (!$row || !password_verify($current, $row['password'])) {
						set_flash('error', 'Current password is incorrect.');
				} else {
						$hash = password_hash($new, PASSWORD_DEFAULT);
						$stmt = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
						$stmt->execute([$hash, $user['id']]);
						set_flash('success', 'Password updated successfully.');
						header('Location: /THRES_SP/index.php');
						exit;
				}
		}
}

require_once __DIR__ . '/../includes/header.php';
?>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Change Password</h4>
				<form method="post">
					<div class="mb-3">
						<label class="form-label">Current Password</label>
						<input type="password" name="current" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">New Password</label>
						<input type="password" name="new" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Confirm New Password</label>
						<input type="password" name="confirm" class="form-control" required>
					</div>
					<button class="btn btn-primary">Change Password</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
