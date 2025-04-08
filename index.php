<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome to our site</h1>
    <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p>
</body>
</html>