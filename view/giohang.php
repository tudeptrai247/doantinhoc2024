<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 style=text-align:center; font-size:30px>Giỏ Hàng</h2>
<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart']) >0){

    echo '<table class="tieudebang">';
    echo '<tr>
    <th>Tên sản phẩm</th>
    <th>Size</th>
    <th>Màu sắc</th>
    <th>Số lượng</th>
    <th>Giá</th>
    <th>Hành động</th>
    </tr>';

$tong=0;

foreach($_SESSION['cart'] as $key=>$item){
    echo'<tr>';
    echo '<td>'.$item['tensp'].'</td>';
    echo '<td>'.$item['mau'].'</td>';
    echo '<td>'.$item['size'].'</td>';
    echo '<td>'.$item['sl'].'</td>';
    echo '<td>'.$item['gia'].'</td>';
   echo '<td><a href="index.php?act=updatecart&keysp='.$key.'">Sửa</a> | <a href="index.php?act=delcart&keysp='.$key.'">Xóa</a></td>';
    echo'</tr>';
    $tong +=$item['gia'];
}
 echo '<tr>
            <td>
                <h4>Tổng Cộng :'.$_SESSION['total'].'</h4>
            </td>
        </tr>';
        echo'</table>';
echo '<td><a href="index.php?act=thongtindonhang">Đặt Hàng</a>';

}else{
    echo '<p style="text-align: center; font-size: 18px; color: #666;">Giỏ hàng trống.</p>';
}
?>
 

</body>
</html>