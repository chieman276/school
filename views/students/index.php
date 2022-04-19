<?php include './layouts/header.php' ?>

<div class="container">
    <br><br><br>
    <h1 style="text-align:center">Danh sách học sinh</h1>
    <br>
    <?php if (isset($_SESSION['flash_message'])) : ?>
        <?php $message = $_SESSION['flash_message']; ?>
        <?php unset($_SESSION['flash_message']); ?>
        <div class="alert alert-success"><i class="fas fa-check"></i> <?= $message ?></div>
    <?php endif; ?>
    <?php echo (isset($alert)) ? $alert : ""; ?>
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="index.php?controller=principal&action=index" class="btn btn-warning" style="color: white;">Hiệu trưởng</a>
            <a href="index.php?controller=teacher&action=index" class="btn btn-success">Giáo viên</a>

            <a href="index.php?controller=student&action=add" class="btn btn-primary float-right">
                Thêm mới <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <form action="" method="GET">
        <input type="hidden" name="controller" value="student">
        <input type="hidden" name="action" value="index">
        <div class="row">
            <div class="col-lg-3">
                <select class="form-select form-control" name="position">
                    <option value="">Tất cả chức vụ</option>
                    <?php foreach ($positions as $position) : ?>
                        <option 
                        <?= ( isset( $_GET['position']) && $_GET['position'] == $position) ? "selected" : ""; ?>

                        value="<?= $position ?>"> <?= $position ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3">
                <select class="form-select form-control" name="teacherID">
                    <option value="">Tất cả giáo viên</option>
                    <?php foreach ($teachers as $teacher) : ?>
                        
                        <option 
                        <?= ( isset( $_GET['teacherID']) && $_GET['teacherID'] == $teacher->id) ? "selected" : ""; ?>
                        value="<?= $teacher->id ?>"><?= $teacher->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3">
                <select class="form-select form-control" name="gender">
                    <option value="">Tất cả giới tính</option>
                    <?php foreach ($genders as $gender) : ?>
                       <option
                        <?= (isset( $_GET['gender']) && $_GET['gender'] == $gender) ? "selected" : "";  ?>
                        value="<?= $gender ?>"> <?= $gender ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Nhập tên học sinh" name="search" aria-label="Search">

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
                <td><b>GVCN</b></td>
                <!-- <td><b>Sản Phẩm</b></td> -->
                <td colspan="3" style="text-align:center"><b>Chức năng</b></td>
            </tr>
        <tbody>
            <?php foreach ($items as $key => $student) : ?>
                <tr>
                    <td><?= ++$offset ?></td>
                    <td><?= $student->name ?></td>
                    <td><?= $student->gender ?></td>
                    <td><?= $student->birthday ?></td>
                    <td><?= $student->position  ?></td>
                    <td><?= $student->teacherName ?></td>
                    <td>
                        <a href="index.php?controller=student&action=show&id=<?= $student->id ?>" class="btn btn-primary"><i class="far fa-eye fa-lg text-light"></i></a>
                    </td>
                    <td> <a href="index.php?controller=student&action=edit&id=<?= $student->id ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                    </td>
                    <td><a href="index.php?controller=student&action=delete&id=<?= $student->id ?>" onclick="return confirm ('Bạn có chắc muốn xóa <?= $student->name ?> không')" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </thead>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-end">
            <li class="page-item"><a class="page-link" href="index.php?controller=student&action=index&page=<?= $pre ?>">Previous</a></li>
            <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                <li class="page-item"><a class="page-link" href="index.php?controller=student&action=index&page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="index.php?controller=student&action=index&page=<?= $next ?>">Next</a></li>
        </ul>
    </nav>






    <?php include './layouts/footer.php' ?>