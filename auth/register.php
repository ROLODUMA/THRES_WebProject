<?php
require_once __DIR__ . '/../includes/authCheck.php';

if (is_logged_in()) {
		header('Location: /THRES_SP/index.php');
		exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$password = $_POST['password'] ?? '';
		$role = $_POST['role'] ?? 'student';

		if ($name === '' || $email === '' || $password === '') {
				set_flash('error', 'Please fill all required fields.');
		} else {
				$db = getDB();
				// Check existing
				$stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
				$stmt->execute([$email]);
				if ($stmt->fetch()) {
						set_flash('error', 'Email already registered.');
				} else {
						$hash = password_hash($password, PASSWORD_DEFAULT);
						$stmt = $db->prepare('INSERT INTO users (name,email,password,role) VALUES (?, ?, ?, ?)');
						$stmt->execute([$name, $email, $hash, $role]);
						set_flash('success', 'Registration successful. Please login.');
						header('Location: /THRES_SP/auth/login.php');
						exit;
				}
		}
}

require_once __DIR__ . '/../includes/header.php';
?>
<div class="row justify-content-center">
	<div class="col-md-7">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Register</h4>
				<form method="post">
					<div class="mb-3">
						<label class="form-label">Full name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Role</label>
						<select name="role" class="form-select">
							<option value="student" selected>Student</option>
							<option value="staff">Staff</option>
							<option value="admin">Admin</option>
						</select>
						<div class="form-text">Choose role. In production, admin creation should be restricted.</div>
					</div>
					<button class="btn btn-success">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
