<?php
require_once "../controllers/LecturerController.php";
include_once("../controllers/SubjectController.php");

$controller = new LecturerController();
$controller->index();

$subject = new SubjectController();
$subject->index();
