<?php include './layouts/header.php' ?>
<?php
// echo "<pre>";
// print_r($noteType);
// echo "</pre>";
?>
<h3 class="text-center">Chỉnh sửa thông tin hiệu trưởng</h3>

<form action="" method="post" class="form-">
    <div class="container">

        <div class="form-group">
            <label>Tên </label>
            <input name="name" class="form-control" value="<?= $principal->name ?>" placeholder="Họ và tên">
            <small class="form-text text-danger">
                <?php echo (isset($errors['name'])) ? $errors['name'] : ""; ?>
            </small>
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <input type="radio" name="gender" checked value="Nam">Nam
            <input type="radio" name="gender" value="Nữ">Nữ
            <small class="form-text text-danger">
                <?php echo (isset($errors['gender'])) ? $errors['gender'] : ""; ?>
            </small>
        </div>

        <div class="form-group">
            <label>Ngày sinh</label>
            <input name="birthday" type="date" class="form-control" value="<?= $principal->birthday ?>">
            <small class="form-text text-danger">
                <?php echo (isset($errors['birthday'])) ? $errors['birthday'] : ""; ?>
            </small>
        </div>
        <div class="form-group">
            <label>Chức vụ</label>
            <input name="position" class="form-control" type="text" value="<?= $principal->position ?>" placeholder="chức vụ">
            <small class="form-text text-danger">
                <?php echo (isset($errors['position'])) ? $errors['position'] : ""; ?>
            </small>
        </div>

        <hr>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>

    </div>

</form>
<?php include './layouts/footer.php' ?>