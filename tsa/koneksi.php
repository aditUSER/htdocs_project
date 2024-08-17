<?php
$servername = "localhost";
$database = "db_login";
$username = "root";
$password = "";
// Create connection
$connect = new mysqli ($servername, $username, $password, $database);
// Check connection
// if ($connect->connect error) {
// die ("Connection failed: 11 $connect->connect_error);
// }
// echo "Connected successfully"