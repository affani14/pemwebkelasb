<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "basisdata";

// Create a connection
$conn = mysqli_connect($server, $user, $pass, $database);

// Check the connection
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
echo "Koneksi ke database berhasil!";
?>
