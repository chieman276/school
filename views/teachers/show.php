<?php

include_once './layouts/header.php'
?>
<table class="container">
    <h1> Thông tin chi tiết giáo viên</h1>
    <tr>
        <td>
            <h2>
                <b>Họ Tên:</b><?= $teacher->name ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Giới tính: </b><?= $teacher->gender ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Ngày Sinh: </b><?= $teacher->birthday ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Chức Vụ: </b><?= $teacher->position ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Hiệu trưởng: </b><?= $teacher->principal_name ?>
            </h2>
        </td>
    </tr>
</table>
<div>
    <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở về</i></button>
</div>


<?php include_once './layouts/footer.php' ?>