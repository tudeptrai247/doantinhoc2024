<div class="main">
<h2 class="tieude">Cập Nhật Sản Phẩm</h2>

<form action="index.php?act=sanpham_update"method="post" class="khungnhap" enctype="multipart/form-data">
<input type="hidden" name="id" id="" value="<?=$spct[0]['id'] ?>">
    <br><br>
    <label>Tên Sản Phẩm</label>
    <input type="text" name="tensp" id="" value="<?=$spct[0]['tensp'] ?>">
    <br>
    <label>Giá</label>
    <input type="number" name="gia" id=""value="<?=$spct[0]['gia'] ?>">
    <br>
    <label>Hình Ảnh</label>
    <input type="file" name="img" id=""value="<?=$spct[0]['img'] ?>">
    <br>
    <select name="iddm" id="">
    <option value="0">Chọn Danh Mục</option>
    <?php
        if(isset($dsdm))
        {
            foreach ($dsdm as $dm) {
                echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
            }
        }   
    ?>
    </select>
    <br><br>
    <select name="idsize" ud="">
    <option value="0">Chọn Size</option>
    <?php
        if(isset($dssize))
        {
            foreach ($dssize as $dm) {
                echo '<option value="'.$dm['id'].'">'.$dm['size'].'</option>';
            }
        }   
    ?>
    </select>
    <select name="idmau" ud="">
    <option value="0">Chọn Màu</option>
    <?php
        if(isset($dsmau))
        {
            foreach ($dsmau as $dm) {
                echo '<option value="'.$dm['id'].'">'.$dm['mau'].'</option>';
            }
        }   
    ?>
    </select>
    <input type="submit" name="capnhat" id="" class="buttonthem" value="Cập Nhật">
</form>

<table class="tieudebang">
    
    <tr>
        <th>STT</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
        <th>Giá</th>
        <th>Size</th>
        <th>Màu</th>
        <th>Tên Danh Mục</th>
        <th>Hành Động</th>
    </tr>
    <tr>
    <?php
        
        if(isset($kq)&&(count($kq) >0))
        {
            $i =1;
            foreach ($kq as $item) {
         echo' <tr>
                    <td>'.$i.'</td>
                    <td>'.$item['tensp'].'</td>
                    <td><img src="'.$item['img'].'" width="80px"></td>
                    <td>'.$item['gia'].'</td>
                    <td>'.$item['size'].'</td>
                    <td>'.$item['mau'].'</td>
                    <td>'.$item['tendm'].'</td>
                    <td><a href="index.php?act=updatespform&id='.$item['id'].'">Sửa</a> | <a href="index.php?act=delsp&id='.$item['id'].'">Xóa</a></td>
                </tr>';
                $i++;
            }
        }
           
    ?>
    </tr>
</table>
</div>