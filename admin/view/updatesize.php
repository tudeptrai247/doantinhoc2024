<div class="main">
<h2 class="tieude">Cập Nhật Size </h2>
<form action="index.php?act=updatesize" method="post">
    <tr> Size
    <input type="text" name="size" id="" value="<?=$kqone[0]['size'] ?>">
    <input type="hidden" name="id" value="<?=$kqone[0]['id'] ?>">
    </tr>
    <tr> Số Lượng Size 
    <input type="text" name="slspsize" id="" value="<?=$kqone[0]['slspsize'] ?>">
    <input type="submit" name="capnhat" class="buttonthem" value="Cập Nhật">
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