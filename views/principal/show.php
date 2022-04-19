<?php

include_once './layouts/header.php'
?>
<table class="container">
    <h1> Thông tin chi tiết Hiệu trưởng</h1>
    <tr>
        <td>
            <h2>
                <b>Họ Tên:</b><?php echo $principal->name ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Giới tính: </b><?php echo $principal->gender ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Ngày Sinh: </b><?php echo $principal->birthday ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2>
                <b>Chức Vụ: </b><?php echo $principal->position ?>
            </h2>
        </td>
    </tr>
</table>
<div>
    <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở về</i></button>
</div>


<?php include_once './layouts/footer.php' ?>





