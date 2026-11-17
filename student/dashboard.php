<?php
require '../includes/auth.php';
require_role('student');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark bg-primary px-3">
    <span class="navbar-brand">CBIT Clearance | Student</span>
    <a href="/cbit_clearance/logout.php" class="btn btn-light btn-sm">Logout</a>
  </nav>
  <div class="container mt-4">
    <h4>Welcome, <?= htmlspecialchars($_SESSION['full_name']) ?>!</h4>
    <p class="text-muted">Your clearance status will appear here.</p>
  </div>
</body>
</html>