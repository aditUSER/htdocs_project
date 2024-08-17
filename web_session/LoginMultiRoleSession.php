<?php
session_start();
include 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Escape input untuk mencegah SQL Injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query ke tabel 'users' untuk mencocokkan username dan password
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah data ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Set session berdasarkan data pengguna
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        // Redirect berdasarkan role pengguna
        if ($row['role'] == 'admin') {
            header("Location: adminDashboard.php");
        } else {
            header("Location: userDashboard.php");
        }
    } else {
        // Jika username atau password salah
        $_SESSION['error'] = "Username atau password salah";
        header("Location: LoginForm.php");
    }
} else {
    // Jika input tidak lengkap
    $_SESSION['error'] = "Silakan isi username dan password";
    header("Location: LoginForm.php");
}
?>
