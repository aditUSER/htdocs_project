<?php
$host = '127.0.0.1:3308';  // Alamat server dan port yang sesuai
$user = 'root';            // Username MySQL
$pass = '';                // Password MySQL (kosong jika tidak ada password)
$db   = 'toko';            // Nama database yang digunakan

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
