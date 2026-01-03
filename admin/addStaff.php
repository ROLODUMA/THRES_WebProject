<?php
require_once __DIR__ . '/../includes/authCheck.php';
require_role('admin');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$password = $_POST['password'] ?? '';
		if ($name === '' || $email === '' || $password === '') {
				set_flash('error', 'Please fill all fields.');
		} else {
				$db = getDB();
				$stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
				$stmt->execute([$email]);
				if ($stmt->fetch()) {
						set_flash('error', 'Email already in use.');
				} else {
						$hash = password_hash($password, PASSWORD_DEFAULT);
						$stmt = $db->prepare('INSERT INTO users (name,email,password,role) VALUES (?,?,?,"staff")');
						$stmt->execute([$name, $email, $hash]);
						set_flash('success', 'Staff account created.');
						header('Location: dashboard.php');
						exit;
				}
		}
}

require_once __DIR__ . '/../includes/header.php';
?>
<h3>Add Staff</h3>
<div class="card">
	<div class="card-body">
		<form method="post">
			<div class="mb-3">
				<label class="form-label">Full name</label>
				<input name="name" class="form-control" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Email</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<button class="btn btn-primary">Create Staff</button>
		</form>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
