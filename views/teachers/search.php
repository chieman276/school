<?php include './layouts/header.php' ?>

<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Danh sách học sinh</h1>
    <br>

    <table class="table table-boder" border="10">
        <thead>
            <tr>
                <td><b>#</b></td>
                <td><b>Họ tên</b></td>
                <td><b>Giới tính</b></td>
                <td><b>Ngày sinh</b></td>
                <td><b>Chức vụ</b></td>
                <td><b>GVCN</b></td>
                <!-- <td><b>Sản Phẩm</b></td> -->
                <td colspan="4" style="text-align:center"><b>Chức năng</b></td>

            </tr>
        <tbody>
            <?php foreach ($teachers as $teacher) : ?>
                <tr>
                    <td><?= $teacher->id ?></td>
                    <td><?= $teacher->name ?></td>
                    <td><?= $teacher->gender ?></td>
                    <td><?= $teacher->birthday ?></td>
                    <td><?= $teacher->position  ?></td>
                    <td><?= $teacher->principal_name  ?></td>

                    <td> <a href="index.php?controller=tech$teacher&action=show&id=<?= $teacher->id ?>" class="btn btn-primary"><i class="far fa-eye fa-lg text-light"></i></a></td>
                    <td> <a href="index.php?controller=tech$teacher&action=edit&id=<?= $teacher->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                    <td> <a href="index.php?controller=tech$teacher&action=delete&id=<?= $teacher->id ?>" onclick="return confirm ('Bạn có chắc muốn xóa <?= $teacher->name ?> không')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a></td>

                </tr>
            <?php endforeach; ?>

        </tbody>

        </thead>
        

    </table>
    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>


</div>



<?php include './layouts/footer.php' ?>