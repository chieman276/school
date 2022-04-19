<?php include './layouts/header.php' ?>

<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Danh sách học sinh</h1>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <a href="index.php?controller=student&action=add" class="btn btn-primary"><i class="fas fa-calendar-plus"></i></a>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <nav class="navbar navbar-light bg-light">
                <form action="index.php?controller=student&action=search" method="POST" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>

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
            <tr>

                <?php foreach ($students as $student) : ?>
                     <?php if ($item->soft_delete == null) : ?>
                        <td><?= $student->id ?></td>
                        <td><?= $student->name ?></td>
                        <td><?= $student->gender ?></td>
                        <td><?= $student->birthday ?></td>
                        <td><?= $student->position  ?></td>
                        <td><?= $student->teacherName  ?></td>

                        <td> <a href="index.php?controller=student&action=show&id=<?= $student->id ?>" class="btn btn-primary"><i class="far fa-eye fa-lg text-light"></i></a></td>
                        <td> <a href="index.php?controller=student&action=edit&id=<?= $student->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td> <a href="index.php?controller=student&action=delete&id=<?= $student->id ?>" onclick="return confirm ('Bạn có chắc muốn xóa <?= $student->name ?> không')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </tbody>

            </thead>

        </table>

    </div>
    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>


    <?php include './layouts/footer.php' ?>