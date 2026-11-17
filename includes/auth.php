<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function require_role(string $role): void {
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== $role) {
        header('Location: /cbit_clearance/login.php');
        exit;
    }
}