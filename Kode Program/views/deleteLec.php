<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE from `lecturer` where id=$id";
    $conn->query($sql);
}
header('location:index.php');
exit;
?>