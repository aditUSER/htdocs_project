<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header("Location: LoginForm.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, User!</h1>
    <a href="sessionLogout.php">Logout</a>
</body>
</html>
