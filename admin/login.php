<?php
    session_start();
    ob_start();
    include"../model/connectdb.php";
    include"../model/user.php";
    if((isset($_POST['dangnhap']))&&($_POST['dangnhap']))
    {
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $role=check_user($user,$pass);
        $_SESSION['role']=$role;
        if($role==1) 
            header('location: index.php');
        else{
           $txt_err="User name hoặc password không tồn tại"; 
        }//header('location: login.php');
    }
?>
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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="khungnhap">
    <!-- <h2>Login</h2> -->
    <br><br>
    <label>Tài Khoản</label>
    <input type="text" name="user" id="">
    <br>
    <label>Mật Khẩu</label>
    <input type="text" name="pass" id="">
    <br>
    <input type="submit" name="dangnhap" id="" class="buttonthem" value="Đăng Nhập">
    <?php
        if(isset($txt_err)&&($txt_err != ""))
        {
            echo "<font color='red'>".$txt_err."</font color>";
        }
    ?>
</form>
</div>
</body>
</html>