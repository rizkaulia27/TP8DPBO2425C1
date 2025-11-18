<?php
//Memanggil controller Subject
include_once("../controllers/SubjectController.php");
$subjectController = new SubjectController();

//Jika submit, controller yang proses
$subjectController->addSubject($_POST);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Create Subject</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap.min.css">
  <script src="../jquery.min.js"></script>
  <script src="../popper.min.js"></script>
  <script src="../bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Subjects</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">?</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">
        <!-- Judul Form Tambah Subject -->
        <div class="card-header bg-primary">
          <h1 class="text-white text-center"> Create Subject </h1>
        </div><br>

        <!-- Input Nama -->
        <label> SUBJECT NAME: </label>
        <input type="text" name="name_subject" class="form-control" required><br>

        <!-- Input SKS -->
        <label> SKS: </label>
        <input type="number" name="SKS" class="form-control" required><br>

        <!-- Tombol Submit dan Cancel -->
        <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>

      </div>
    </form>
  </div>

</body>

</html>
