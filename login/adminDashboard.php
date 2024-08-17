<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: loginForm.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Selamat datang di Admin Dashboard</h1>
    <a href="sessionLogout.php">Logout</a>
</body>
</html>
