<?php

include_once './layouts/header.php'
?>
<table class="container">
    <h1> Thông tin chi tiết học sinh</h1>
    <div>
    <tr>
        
        <td>
            <h2>
                <b>Họ Tên:</b><?= $student->name ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Giới tính: </b><?= $student->gender ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Ngày Sinh: </b><?= $student->birthday ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Chức Vụ: </b><?= $student->position ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>GVCN: </b><?= $student->teacherName ?>
            </h2>
        </td>
    </tr>
</table>
</div>
<div>
    <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở về</i></button>
</div>



<?php include_once './layouts/footer.php' ?>