<h2 style=text-align:center; font-size:30px>Cập Nhật Thông Tin Người Dùng</h2>
<br>
<form action="index.php?act=capnhatuser" method="post" class="khungnhap">
    <?php 
    if(isset($_SESSION['iduser']) && ($_SESSION['iduser']))
    {
    echo '
    <input type="hidden" name="id" value=" '.$_SESSION['iduser'].'">
   <h3>Tên Tài Khoản </h3> <input type="text" name="user" value=" '.$_SESSION['user'].'">
   <h3>Mật Khẩu </h3> <input type="text" name="pass" value=" '.$_SESSION['pass'].'">
   <h3>Tên Người Dùng </h3> <input type="text" name="name" value=" '.$_SESSION['name'].'">
   <h3>Email </h3> <input type="text" name="email" value=" '.$_SESSION['email'].'">
   <h3>Địa Chỉ </h3> <input type="text" name="address" value=" '.$_SESSION['address'].'"><br>
    <input type="submit" class="buttonthem" name="capnhat" value="Cập nhật">
    ';
    }
    ?>
</form>