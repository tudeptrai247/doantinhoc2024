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
                $isEditing = isset($_GET['id']) && $_GET['id'] ==$item['id'];
         echo' <tr>';
                   echo '<td>'.$i.'</td>';
                    echo '<td>'.$item['iduser'].'</td>';
                    echo '<td>'.$item['ngaytao'].'</td>';
                    echo '<td>'.$item['tongtien'].'</td>';
                    echo '<td>'.$item['phuongthucthanhtoan'].'</td>';
                    echo '<td>'.$item['address'].'</td>';
                    echo '<td>'.$item['email'].'</td>';
                    $trangthaioption=["pending","shipped","cancel"];
                    if($isEditing){
                        echo'<form action="index.php?act=updatedonhang" method="POST">';

                        echo '<td><select name="trangthai">';
                        foreach($trangthaioption as $trangthai){
                            $selected =($item['trangthai'] == $trangthai)?'selected':'';
                           echo'<option value="'.$trangthai.'"'.$selected.'>'.$trangthai.'</option>';
                        }
                        echo '</select></td>';
                        echo '<input type="hidden" name="id" value="'.$item['id'].'">';
                        echo'<td><button type="submit" name="capnhat" value="capnhat">Cap Nhat</button></td>';

                        echo'</form>';
                    }else{  
                       echo'<td>'.$item['trangthai'].'</td>';
                    echo'<td><a href="index.php?act=updatedonhang&id='.$item['id'].'">Sửa</a></td>';
                }
                echo'</tr>';
                $i++;
            }
        }

    ?>
   
</table>
</body>
</html>