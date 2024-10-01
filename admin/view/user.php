<div class="main">
<h2 class="tieude">Quản Lý Tài Khoản</h2>
<table class="tieudebang" >
    
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Địa Chỉ</th>
        <th>Email</th>
        <th>Tên Tài Khoản</th>
        <th>Mật Khẩu</th>
    </tr>
    <?php
        
        if(isset($kq))
        {
            $i=1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['name'].'</td>
                    <td>'.$item['address'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['user'].'</td>
                    <td>'.$item['pass'].'</td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</div>