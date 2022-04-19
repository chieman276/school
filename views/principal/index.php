<?php include './layouts/header.php' ?>

<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Hiệu trưởng</h1>
    <br>
    <?php echo (isset($alert)) ? $alert : ""; ?>

    <div class="row">
        <div class="col-lg-4">
            <!-- <a href="index.php?controller=principal&action=add" class="btn btn-primary"><i class="fas fa-calendar-plus"></i></a> -->
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <a style="float:right" href="index.php?controller=teacher&action=index" class="btn btn-success">Danh sách giáo viên</a>

        </div>

        <br>
        <br>
        <br>
        <table class="table table-boder" border="10">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Họ tên</b></td>
                    <td><b>Giới tính</b></td>
                    <td><b>Ngày sinh</b></td>
                    <td><b>Chức vụ</b></td>
                    <!-- <td><b>Sản Phẩm</b></td> -->
                    <td colspan="4" style="text-align:center"><b>Chức năng</b></td>

                </tr>
            <tbody>
                <?php foreach ($principals as $key => $principal) : ?>
                    <tr>
                        <td><?= $principal->id ?></td>
                        <td><?= $principal->name ?></td>
                        <td><?= $principal->gender ?></td>
                        <td><?= $principal->birthday ?></td>
                        <td><?= $principal->position  ?></td>

                        <td> <a href="index.php?controller=principal&action=show&id=<?= $principal->id ?>" class="btn btn-primary"><i class="far fa-eye fa-lg text-light"></i></a></td>
                        <td> <a href="index.php?controller=principal&action=edit&id=<?= $principal->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <!-- <td> <a href="index.php?controller=principal&action=delete&id=<?= $principal->id ?>" onclick="return confirm ('Không thể xóa Hiệu Trưởng( <?= $principal->name ?>) ')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a></td> -->

                    </tr>
                <?php endforeach; ?>

            </tbody>

            </thead>

        </table>

    </div>
</div>

<?php include './layouts/footer.php' ?>