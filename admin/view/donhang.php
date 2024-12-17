<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="tieudebang">
    
    <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Mã tài khoản</th>
        <th>Ngày Tạo</th>
        <th>Tổng Tiền</th>
        <th>Phương Thức Thanh Toán</th>
        <th>Địa Chỉ</th>
        <th>Email</th>
        <th>Trạng Thái</th>
        <th>Hành Động</th>
    </tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['id'].'</td>
                    <td>'.$item['iduser'].'</td>
                    <td>'.$item['ngaytao'].'</td>
                    <td>'.$item['tongtien'].'</td>
                    <td>'.$item['phuongthucthanhtoan'].'</td>
                    <td>'.$item['address'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['trangthai'].'</td>
                    <td><a href="index.php?act=updatedonhang&id='.$item['id'].'">Sửa</a></td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</body>
</html>