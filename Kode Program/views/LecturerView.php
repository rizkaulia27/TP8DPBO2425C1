<?php
class LecturerView{

    public function render($data) {
        include_once("../templates/header.html");
?>
<div class="container my-4">
    <h3 style="text-align: center;">Lecturer</h3>
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="createLec.php">Add New</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>NIDN</th>
                <th>PHONE</th>
                <th>JOIN DATE</th>
                <th>SUBJECT</th>
                <th>SKS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['nidn'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['join_date'] ?></td>
                <td><?= $row['name_subject'] ?></td>
                <td><?= $row['SKS'] ?></td>
                <td>
                    <a class="btn btn-success" href="editLec.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="deleteLec.php?id=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php
        include_once("../templates/footer.html");
    }
}
?>
