<?php

//Memanggil controller Lecturer untuk menangani logika data lecturer
require_once "../controllers/LecturerController.php";
//Memanggil controller Subject 
include_once("../controllers/SubjectController.php");

//Membuat instance controller Lecturer
$controller = new LecturerController();
//Memanggil fungsi index di controller Lecturer
//Fungsi ini biasanya mengambil data lecturer dan mem-passing ke view
$controller->index();

//Membuat instance controller Subject
$subject = new SubjectController();
//Memanggil fungsi index di controller Subject
//Fungsi ini biasanya mengambil data subject dan mem-passing ke view
$subject->index();

?>