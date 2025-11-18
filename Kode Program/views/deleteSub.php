<?php
//Memanggil controller subject untuk memproses aksi delete
include_once(__DIR__ . "/../controllers/SubjectController.php");

//Membuat instance controller
$controller = new SubjectController();

//Mengecek apakah parameter 'id_subject' tersedia di URL
if (isset($_GET['id_subject'])) {
    //Memanggil fungsi delete di controller, yang nantinya akan meneruskan proses ke model
    $controller->deleteSubject($_GET['id_subject']);
    exit;
}

//Jika id_subject tidak ada, tetap kembali ke index
header("Location: index.php");
exit;
