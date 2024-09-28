<div class="main">
<h2 class="tieude">Cập Nhật Màu Sản Phẩm</h2>
<form action="index.php?act=updatemau" method="post">
    <tr> Màu
    <input type="text" name="mau" id="" value="<?=$kqone[0]['mau'] ?>">
    <input type="hidden" name="id" id="" value="<?=$kqone[0]['id'] ?>">
    </tr>
    <tr> Số Lượng Màu 
    <input type="text" name="slsp" id="" value="<?=$kqone[0]['slsp'] ?>">
    <input type="submit" name="capnhat" class="buttonthem" value="Cập Nhật">
</form>

<table class="tieudebang">
    
    <tr>
        <th>STT</th>
        <th>Màu</th>
        <th>Số Lượng Màu</th>
        <th>Hành Động</th>
    </tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['mau'].'</td>
                    <td>'.$item['slsp'].'</td>
                    <td><a href="index.php?act=updatemau&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=delmau&id='.$item['id'].'">Xóa</a></td>
                </tr>';
                $i++;
            }
        }

    ?>
   
</table>
</div>