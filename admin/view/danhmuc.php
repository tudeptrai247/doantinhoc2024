<div class="main">
<h2 class="tieude">Quản Lý Danh Mục</h2>
<form action="index.php?act=adddm" method="post">
    <tr> Tên Danh Mục
    <input type="text" name="tendm" id="">
    </tr>
    <input type="submit" name="themmoi" class="buttonthem" value="Thêm">
</form>

<table class="tieudebang">
    
    <tr>
        <th>STT</th>
        <th>Tên Danh Mục</th>
        <th>Ưu Tiên</th>
        <th>Hiện Thị</th>
        <th>Hành Động</th>
    </tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['tendm'].'</td>
                    <td>'.$item['uutien'].'</td>
                    <td>'.$item['hienthi'].'</td>
                    <td><a href="index.php?act=updatedmform&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=deldm&id='.$item['id'].'">Xóa</a></td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</div>