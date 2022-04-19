<?php include './layouts/header.php' ?>

<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Danh sách giáo viên</h1>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <a href="index.php?controller=teacher&action=add" class="btn btn-primary"><i class="fas fa-calendar-plus"></i></a>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <!-- <nav class="navbar navbar-light bg-light">
                <form action="index.php?controller=teacher&action=search" method="POST" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav> -->
        </div>

        <form action="" method="GET">
            <input type="hidden" name="controller" value="teacher">
            <input type="hidden" name="action" value="index">
            <div class="row">
                <div class="col-lg-4">
                    <select class="form-select form-control" name="position">
                        <option value="">Tất cả chức vụ</option>
                        <?php foreach ($positions as $position) : ?>
                            <option <?= (isset($_GET['position']) && $_GET['position'] == $position) ? "selected" : ""; ?> value="<?= $position ?>"> <?= $position ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-lg-4">
                    <select class="form-select form-control" name="gender">
                        <option value="">Tất cả giới tính</option>
                        <?php foreach ($genders as $gender) : ?>
                            <option <?= (isset($_GET['gender']) && $_GET['gender'] == $gender) ? "selected" : "";  ?> value="<?= $gender ?>"> <?= $gender ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Nhập tên giáo viên" name="search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-boder" border="10">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Họ tên</b></td>
                    <td><b>Giới tính</b></td>
                    <td><b>Ngày sinh</b></td>
                    <td><b>Chức vụ</b></td>
                    <td><b>Hiệu trưởng</b></td>
                    <!-- <td><b>Sản Phẩm</b></td> -->
                    <td colspan="4" style="text-align:center"><b>Chức năng</b></td>

                </tr>
            <tbody>
                <?php foreach ($teachers as $key => $teacher) : ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $teacher->name ?></td>
                        <td><?= $teacher->gender ?></td>
                        <td><?= $teacher->birthday ?></td>
                        <td><?= $teacher->position  ?></td>
                        <td><?= $teacher->principal_name  ?></td>

                        <td> <a href="index.php?controller=teacher&action=show&id=<?= $teacher->id ?>" class="btn btn-primary"><i class="far fa-eye fa-lg text-light"></i></i></a></td>
                        <td> <a href="index.php?controller=teacher&action=edit&id=<?= $teacher->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td> <a href="index.php?controller=teacher&action=delete&id=<?= $teacher->id ?>" onclick="return confirm ('Bạn có chắc muốn xóa <?= $teacher->name ?> không')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a></td>

                    </tr>
                <?php endforeach; ?>

            </tbody>

            </thead>

        </table>

    </div>
    <a style="color: white;" href="index.php?controller=principal&action=index" class="btn btn-warning">Hiệu trưởng</a>
    <a style="float: right;" href="index.php?controller=student&action=index" class="btn btn-primary">Học sinh</a>





    <?php include './layouts/footer.php' ?>