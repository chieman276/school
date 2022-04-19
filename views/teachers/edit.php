<?php include './layouts/header.php' ?>
<?php
// echo "<pre>";
// print_r($noteType);
// echo "</pre>";
?>
<h3 class="text-center">Chỉnh sửa thông tin giáo viên</h3>

<form action="" method="post" class="form-">
    <div class="container">

    <div class="form-group">
        <label>Tên </label>
        <input name="name" class="form-control" placeholder="Họ và tên" value="<?= $teacher->name ?>">
    </div>
    <div class="form-group">
        <label>Giới tính</label>
        <input type="radio"  name="gender" checked value="Nam">Nam
        <input type="radio" name="gender" value="Nữ">Nữ
    </div>

    <div class="form-group">
        <label>Ngày sinh</label>
        <input name="birthday" type="date" class="form-control" value="<?= $teacher->birthday ?>">
    </div>
    <div class="form-group">
        <label>Chức vụ</label>
        <select name="position" value="<?= $teacher->position ?>">
            <option value="GVCN: lớp 10">GVCN: lớp 10</option>
            <option value="GVCN: lớp 11">GVCN: lớp 11</option>
            <option value="GVCN: lớp 12">GVCN: lớp 12</option>
        </select>
    <div class="mb-3">
        <label class="form-label">Hiệu trưởng</label>
        <select class="form-select form-control" name="principalID">
            <option  value="<?= $teacher->principalID ?>">1 <label>- Nguyễn Thị Ánh Tuyết</label></option>
        </select>
    </div>


    <hr>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Trở về</i></button>

    </div>

</form>
<?php include './layouts/footer.php' ?>