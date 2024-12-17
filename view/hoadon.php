<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 style=text-align:center; font-size:30px>Hóa Đơn</h2>   

    <p>Cảm ơn quý khách đã tin tưởng và ủng hộ dịch vụ của chúng tôi , đơn hàng của bạn sẽ được nhận sau 3-5 ngày!!</p>
<form class="khungnhap">

    <p>Mã Đơn Hàng :<?php echo $donhang['id']?></p>
    <p>Ngày Tạo :<?php echo $donhang['ngaytao']?></p>
    <p>Tổng Số Tiền :<?php echo $donhang['tongtien']?></p>
    <p>Phương Thức Thanh Toán :<?php echo $donhang['phuongthucthanhtoan']?></p>
    <p>Địa Chỉ :<?php echo $donhang['address']?></p>
    <p>Email <?php echo $donhang['email']?></p>
    <table class="tieudebang">
    <tr>
    <th>Tên sản phẩm</th>
    <th>Size</th>
    <th>Màu sắc</th>
    <th>Số lượng</th>
    
    </tr>
<?php


    foreach($chitietdonhang as $item){
        echo'<tr>';
        echo '<td>'.$item['tensp'].'</td>';
        echo '<td>'.$item['mau'].'</td>';
        echo '<td>'.$item['size'].'</td>';
        echo '<td>'.$item['soluong'].'</td>';
    }

    echo '</table>'
   
   
?>

</form>
?>
</body>
</html>