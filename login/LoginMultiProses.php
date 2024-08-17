<?php
session_start();
include 'koneksi.php';  // Sertakan file koneksi

$username = $_POST['username'];
$password = md5($_POST['password']);  // Gunakan enkripsi sesuai dengan penyimpanan password di database

// Query untuk memeriksa data user
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Set session berdasarkan role
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $row['role'];
    
    if ($row['role'] == 'admin') {
        header("Location: adminDashboard.php");
    } elseif ($row['role'] == 'user') {
        header("Location: userDashboard.php");
    } else {
        echo "Role tidak dikenali!";
    }
} else {
    echo "Login gagal! Username atau password salah.";
}
?>
