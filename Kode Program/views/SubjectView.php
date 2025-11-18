<?php
class SubjectView{

    public function render($data) {
        include_once("../templates/header.html");
?>
<div class="container my-4">
    <h3 style="text-align: center;">Subject</h3>
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="createSub.php">Add New</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>SKS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['id_subject'] ?></td>
                <td><?= $row['name_subject'] ?></td>
                <td><?= $row['SKS'] ?></td>
                <td>
                    <a class="btn btn-success" href="editSub.php?id_subject=<?= $row['id_subject'] ?>">Edit</a>
                    <a class="btn btn-danger" href="deleteSub.php?id_subject=<?= $row['id_subject'] ?>">Delete</a>
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
