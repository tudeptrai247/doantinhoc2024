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
        <th>ID Đơn Hàng</th>
        <th>ID Sản Phẩm</th>
        <th>Size</th>
        <th>Màu</th>
        <th>Số Lượng</th>
    </tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['iddonhang'].'</td>
                    <td>'.$item['idsanpham'].'</td>
                    <td>'.$item['size'].'</td>
                    <td>'.$item['mau'].'</td>
                    <td>'.$item['soluong'].'</td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</body>
</html>