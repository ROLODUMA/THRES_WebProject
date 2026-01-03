<?php
require_once __DIR__ . '/../includes/authCheck.php';

if (is_logged_in()) {
		header('Location: /THRES_SP/index.php');
		exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = $_POST['email'] ?? '';
		$password = $_POST['password'] ?? '';
		$db = getDB();
		$stmt = $db->prepare('SELECT id, password, name, role FROM users WHERE email = ?');
		$stmt->execute([$email]);
		$user = $stmt->fetch();
		if ($user && password_verify($password, $user['password'])) {
				$_SESSION['user_id'] = $user['id'];
				// clear cached user
				unset($_SESSION['current_user']);
				set_flash('success', 'Welcome back, ' . $user['name'] . '!');
				// redirect based on role
				$role = $user['role'] ?? 'student';
				if ($role === 'admin') header('Location: /THRES_SP/admin/dashboard.php');
				elseif ($role === 'staff') header('Location: /THRES_SP/staff/dashboard.php');
				else header('Location: /THRES_SP/student/dashboard.php');
				exit;
		} else {
				set_flash('error', 'Invalid credentials');
		}
}

require_once __DIR__ . '/../includes/header.php';
?>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Login</h4>
				<form method="post">
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<button class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
