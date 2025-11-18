<?php
include_once(__DIR__ . "/../controllers/LecturerController.php");
include_once(__DIR__ . "/../controllers/SubjectController.php"); // kalau ada

//Inisialisasi controller
$controller = new LecturerController();

//Ambil ID dari URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

//Jika form disubmit, panggil update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateLecturer($id, $_POST);
    exit;
}

//Jika GET, ambil data lecturer untuk ditampilkan di form
$data = $controller->getLecturerById($id);
$subjects = $controller->getAllSubjects();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Lecturer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Lecturers</a>
    </div>
</nav>

<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br>
        
        <div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center"> Update Lecturer </h1>
            </div>
            <br>

            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <!-- NAME -->
            <label>NAME:</label>
            <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" required><br>

            <!-- NIDN -->
            <label>NIDN:</label>
            <input type="text" name="nidn" value="<?= $data['nidn']; ?>" class="form-control" required><br>

            <!-- PHONE -->
            <label>PHONE:</label>
            <input type="text" name="phone" value="<?= $data['phone']; ?>" class="form-control" required><br>

            <!-- JOIN DATE -->
            <label>JOIN DATE:</label>
            <input type="date" name="join_date" value="<?= $data['join_date']; ?>" class="form-control" required><br>

            <!-- SUBJECT -->
            <label>SUBJECT:</label>
            <select name="subject" class="form-control" required>
                <?php foreach($subjects as $sub): ?>
                    <option 
                        value="<?= $sub['id_subject'] ?>" 
                        <?= $data['subject'] == $sub['id_subject'] ? 'selected' : '' ?>>
                        <?= $sub['name_subject'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            
            <!-- Tombol Submit dan Cancel -->
            <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
            <a class="btn btn-info" href="index.php"> Cancel </a><br>
        </div>
    </form>
</div>

</body>
</html>