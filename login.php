<?php
require 'config/db.php';
require 'includes/auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $school_id = trim($_POST['school_id'] ?? '');
    $password  = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM users WHERE school_id = ?');
    $stmt->execute([$school_id]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role']      = $user['role'];
        $_SESSION['office_id'] = $user['office_id'];

        header('Location: /cbit_clearance/' . $user['role'] . '/dashboard.php');
        exit;
    }
    $error = 'Invalid ID or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CBIT Clearance - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="card shadow-sm p-4" style="width:100%;max-width:400px">
      <h4 class="text-center mb-1">CBIT Clearance System</h4>
      <p class="text-center text-muted mb-4">Please log in</p>

      <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">School ID</label>
          <input type="text" name="school_id" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Log in</button>
      </form>
    </div>
  </div>
</body>
</html>