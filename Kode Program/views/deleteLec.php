<?php
//Memanggil controller lecturer untuk memproses aksi delete
include_once(__DIR__ . "/../controllers/LecturerController.php");

//Membuat instance controller
$controller = new LecturerController();

//Mengecek apakah parameter 'id' tersedia di URL
if (isset($_GET['id'])) {
    //Memanggil fungsi delete di controller, yang nantinya akan meneruskan proses ke model
    $controller->deleteLecturer($_GET['id']);
    exit;
}

//Jika id tidak ada, tetap kembali ke index
header("Location: index.php");
exit;
