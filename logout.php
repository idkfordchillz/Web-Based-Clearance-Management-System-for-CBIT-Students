<?php
require 'includes/auth.php';
session_destroy();
header('Location: /cbit_clearance/login.php');
exit;