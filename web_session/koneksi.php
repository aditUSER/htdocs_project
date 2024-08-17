<?php
// koneksi.php
$host = "localhost";  // Sesuaikan dengan host MySQL
$user = "root";       // Sesuaikan dengan username MySQL
$pass = "";           // Kosongkan jika tidak ada password MySQL
$db   = "db_login";    // Sesuaikan dengan nama database yang digunakan

// Buat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
