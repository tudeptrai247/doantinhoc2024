<div class="main">
<h2 class="tieude">Size Sản Phẩm</h2>
<form action="index.php?act=size_add" method="post">
    <tr> Size
    <input type="text" name="size" id="">
    </tr>
    <tr> Số Lượng Size 
    <input type="text" name="slspsize" id="">
    <input type="submit" name="themmoi" class="buttonthem" value="Thêm">
</form>

<table class="tieudebang">
    
    <tr>
        <th>STT</th>
        <th>Size</th>
        <th>Số Lượng Size</th>
        <th>Hành Động</th>
    </tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['size'].'</td>
                    <td>'.$item['slspsize'].'</td>
                    <td><a href="index.php?act=updatesize&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=delsize&id='.$item['id'].'">Xóa</a></td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</div>