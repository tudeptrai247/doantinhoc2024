<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align: center;">Thông Tin Người Dùng</h2>
    <form class="khungnhap">
        <?php
            if(isset($_SESSION['iduser']) && ($_SESSION['iduser']))
            {
                echo'
                <div class="userinfo">
                <h3>Tài Khoản  :'.$_SESSION['user'].' </h3><br>
                <h3>Mật Khẩu :'.$_SESSION['pass'].' </h3><br>
                <h3>Tên Người Dùng :'.$_SESSION['name'].' </h3><br>
                <h3>Email :'.$_SESSION['email'].' </h3><br>
                <h3>Địa Chỉ :'.$_SESSION['address'].'</h3><br>
                <td><a href="index.php?act=capnhatuser">Thay đổi thông tin</a>
                </div>';

            }
        ?>
    </form>
</body>
</html>