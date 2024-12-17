<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -Admin</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<div class ="main">
    <br>
<form action="index.php?act=dangnhap" method="post" class="khungnhap">
    <h2>Login</h2>
    <br><br>
    <label>Tài Khoản</label>
    <input type="text" name="user" id="">
    <br>
    <label>Mật Khẩu</label>
    <input type="password" name="pass" id="">
    <br>
    <input type="submit" name="dangnhap" id="" class="buttonthem" value="Đăng Nhập">
    <br><br>
    <img src="./uploaded/iconfb.png" style=max-width:30pt;max-height:30px; name="iconfb" alt="iconfb">
    <input type="submit" name="dangnhapfb" id="" class="buttonthem" value="Đăng Nhập Bằng Facebook">
    <?php
if (isset($error) && $error){
    ?> <p style="color: red"><?php echo $error; ?> </p>
    <?php
}
?>
</form>

</div>
</body>
</html>