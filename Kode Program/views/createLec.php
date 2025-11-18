<?php
include_once(__DIR__ . "/../controllers/LecturerController.php");

$controller = new LecturerController();
$subjects = $controller->getAllSubjects();

// Jika form disubmit → proses ke controller
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->addLecturer($_POST);
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Lecturer</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>

<?php include "../templates/header.html"; ?>

<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center"> Create Lecturer</h1>
            </div>
            <br>

            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>

            <label> NIDN: </label>
            <input type="text" name="nidn" class="form-control" required> <br>

            <label> PHONE: </label>
            <input type="text" name="phone" class="form-control" required> <br>

            <label> JOIN DATE: </label>
            <input type="date" name="join_date" class="form-control" required> <br>

            <label>SUBJECT:</label>
            <select name="subject" class="form-control" required>
                <?php foreach ($subjects as $sub): ?>
                    <option value="<?= $sub['id_subject'] ?>">
                        <?= $sub['name_subject'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php">Cancel</a><br>
        </div>
    </form>
</div>

<?php include "../templates/footer.html"; ?>

</body>
</html>
