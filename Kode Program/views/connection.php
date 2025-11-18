<?php

//Konfigurasi server database
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "db_kampus";

//Membuat koneksi ke database menggunakan MySQLi
$conn = new mysqli($servername, $username, $password, $db_name);
//Mengecek apakah koneksi gagal
if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
//Koneksi berhasil (tidak menampilkan apa-apa)
echo "";

?>
