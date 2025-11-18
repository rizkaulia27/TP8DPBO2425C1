<?php
include "connection.php";
if (isset($_GET['id_subject'])) {
    $id = $_GET['id_subject'];
    $sql = "DELETE from `subject` where id_subject=$id";
    $conn->query($sql);
}
header('location:index.php');
exit;
?>