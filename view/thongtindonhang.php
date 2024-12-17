<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 style=text-align:center; font-size:30px>Thông Tin Đơn Hàng</h2>
<form class="khungnhap" method="POST" action="index.php?act=luudonhang" target="_blank"  enctype="application/x-www-form-urlencoded">
        <?php
            if(isset($_SESSION['iduser']) && ($_SESSION['iduser']))
            {
                echo'
                <div class="userinfo">
                <input type="hidden" name="id" value="'.$_SESSION['iduser'].'">
                <h3>Tên Người Nhận </h3> <input type="text" name="user" value="'.$_SESSION['user'].'">
                <h3>Email </h3> <input type="text" name="email" value="'.$_SESSION['email'].'">
                <h3>Địa Chỉ </h3> <input type="text" name="address" value="'.$_SESSION['address'].'">
                
                </div>';
            }
            echo '<table class="tieudebang">';
            echo '<tr>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Màu sắc</th>
            <th>Số lượng</th>
            
            </tr>';
        
            foreach($_SESSION['cart'] as $key=>$item){
                echo'<tr>';
                echo '<td>'.$item['tensp'].'</td>';
                echo '<td>'.$item['size'].'</td>';
                echo '<td>'.$item['mau'].'</td>';    
                echo '<td>'.$item['sl'].'</td>';
                echo'</tr>';
                
                echo'<input type="hidden" name="tensp" value="'.$item['tensp'].'">;';
                echo'<input type="hidden" name="mau" value="'.$item['mau'].'">;';
                echo'<input type="hidden" name="size" value="'.$item['size'].'">;';
                echo'<input type="hidden" name="sl" value="'.$item['sl'].'">;';
            }
            echo '</table>';
            echo '<br>';
            echo "Tổng Số Tiền :$total đ"
        ?>
        <input type="hidden" name="total" value="$total">
        <!-- sản phẩm lưu lên database -->
        <br><br>    
        <a>Lựa chọn phương thức thanh toán</a>
        <br><br> 
        <input type="hidden" name='total' value="<?php $_SESSION['total']; ?>"> 
            <input type="submit" name="paymentmethod" value="momo">
            <input type="submit" name="paymentmethod" value="cash">
    </form>
    
    
</body>
</html>