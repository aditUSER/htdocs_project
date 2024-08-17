<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: LoginForm.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <a href="sessionLogout.php">Logout</a>
</body>
</html>
