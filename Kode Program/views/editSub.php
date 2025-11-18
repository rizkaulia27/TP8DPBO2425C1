<?php
include_once(__DIR__ . "/../controllers/SubjectController.php"); 

// Inisialisasi controller
$controller = new SubjectController();

// Ambil ID dari URL
if (!isset($_GET['id_subject'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id_subject'];

// Jika form disubmit, panggil update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateSubject($id, $_POST);
    exit;
}

// Jika GET, ambil data subject untuk ditampilkan di form
$data = $controller->getSubjectById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Subject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Subject</a>
    </div>
</nav>

<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br>
        
        <div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center"> Update Subject </h1>
            </div>
            <br>

            <input type="hidden" name="id_subject" value="<?= $data['id_subject']; ?>">

            <!-- NAME -->
            <label>NAME:</label>
            <input type="text" name="name_subject" value="<?= $data['name_subject']; ?>" class="form-control" required><br>

            <!-- SKS -->
            <label>SKS:</label>
            <input type="text" name="SKS" value="<?= $data['SKS']; ?>" class="form-control" required><br>

            <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
            <a class="btn btn-info" href="index.php"> Cancel </a><br>
        </div>
    </form>
</div>

</body>
</html>