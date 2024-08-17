<?php
include "koneksi.php";

// Mendapatkan data username dan password dari form
$username = $_POST['username'];
$password = md5($_POST['password']); // Enkripsi password menggunakan md5

// Query untuk memeriksa apakah username dan password sesuai
$query = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
$result = mysqli_query($connect, $query);
$rowcount = mysqli_num_rows($result);

if ($rowcount > 0) {
    echo "Anda berhasil login ";
    echo "<a href='adminDasboard.html'>Admin</a>";
} else {
    echo "Anda gagal login ";
    echo "<a href='LoginForm.html'>Login Form</a>";
}

// Menutup koneksi ke database
mysqli_close($connect);
?>
