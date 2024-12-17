<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style=text-align:center; font-size:30px>Chi Tiết Sản Phẩm</h2>

    <form action="index.php?act=giohang" method="post">
    <input type="hidden" name="id" value="<?php echo $kq['id']; ?>">
    <div class="chitietsanpham">
        <div class="hinhanh_chitietsanpham">
            <?php $imagePath=str_replace('../','./',$kq['img']); ?>
            <img src="<?php echo $imagePath; ?>" >
        </div>

        <div class="thongtin_chitietsanpham">
        <input type="hidden" name="tensp" value="<?php echo $kq['tensp']; ?>">
            <h1><?php echo $kq['tensp']; ?></h1>

            <input type="hidden" name="gia" value="<?php echo $kq['gia']; ?>">
            <p>Giá :<?php echo $kq['gia']; ?> đ</p>

            <select name="idmau" ud="">
            <option value="0">Chọn Màu</option>
        <?php
            if(isset($dsmau))
        {
            foreach ($dsmau as $dm) {
                echo '<option value="'.$dm['mau'].'">'.$dm['mau'].'</option>';
            }
        }   
    ?>
    </select>

    <select name="idsize" ud="">
    <option value="0">Chọn Size</option>
    <?php
        if(isset($dssize))
        {
            foreach ($dssize as $dm) {
                echo '<option value="'.$dm['size'].'">'.$dm['size'].'</option>';
            }
        }   
    ?>
    </select>

    Số Lượng :<input type="number" name="sl">
    
    <p class="mota">Mô Tả :<?php echo $kq['mota']; ?></p>
    
    <button class="buttongiohang" name="buttongiohang">Thêm Vào Giỏ Hàng</button>
        </div>
    </div>
</form>

</body>
</html>