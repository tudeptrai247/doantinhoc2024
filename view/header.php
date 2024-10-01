<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/style.css" />
</head>
<body>
    <header>
        <div><img src="./uploaded/logo.png" class="logo"></div>
    <nav class ="taskbar">
        <a href="index.php">Trang Chủ</a>
        <a href="index.php?act=sanpham">Sản Phẩm</a>
        <a href="index.php?act=sanpham">Sản Phẩm</a>
        <a href="index.php?act=sanpham">Sản Phẩm</a>
        <a href="index.php?act=sanpham">Sản Phẩm</a>
    </nav>
    <div>
    <?php
        if(isset($_SESSION['user']) && ($_SESSION['user'] != ""))
        {
            echo 'Xin Chào <a href="index.php?act=dangnhap">'.$_SESSION['user'].'</a>'; 
            echo '<a href="index.php?act=logout">    Thoát</a>';
            
            
        }
        else
        {   
    ?>
    <a href="index.php?act=dangnhap" style="font-size: 15px;">Đăng Nhập</a>
    <a href="index.php?act=dangky" style="font-size: 15px;">Đăng Ký</a>
    <?php } ?>
    
    </div>
    </header>
</body>
</html>