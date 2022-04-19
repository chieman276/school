<?php include './layouts/header.php' ?>
<h3 class="text-center">Thêm mới Giáo Viên</h3>
<form action="" method="post" class="form-">
    <div class="container">
        <div class="form-group">
            <label>Tên</label>
            <input name="name" type="text" class="form-control" placeholder="Họ và tên">
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
            <input name="birthday" type="date" class="form-control">
            <small class="form-text text-danger">
                <?php echo (isset($errors['birthday'])) ? $errors['birthday'] : ""; ?>
            </small>

        </div>
        <div class="form-group">
            <label>Chức vụ</label>
            <select name="position">
                <option value=""></option>
                <option value="GVCN: lớp 10">GVCN: lớp 10</option>
                <option value="GVCN: lớp 11">GVCN: lớp 11</option>
                <option value="GVCN: lớp 12">GVCN: lớp 12</option>
            </select>
            <small class="form-text text-danger">
                <?php echo (isset($errors['position'])) ? $errors['position'] : ""; ?>
            </small>

            <!-- <input name="position" class="form-control" type="text" placeholder="chức vụ"> -->
        </div>
        <div class="mb-3">
            <label class="form-label">Hiệu trưởng</label>
            <select class="form-select form-control" name="principalID">
                <option value="1-Nguyễn Thị Ánh Tuyết">1 <label>- Nguyễn Thị Ánh Tuyết</label></option>
            </select>
            <small class="form-text text-danger">
                <?php echo (isset($errors['principalID'])) ? $errors['principalID'] : ""; ?>
            </small>

        </div>



        <button type="submit" class="btn btn-primary">Lưu</button>
        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>

</form>
</div>
<?php include './layouts/footer.php' ?>