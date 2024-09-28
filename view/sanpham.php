<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h2 style=text-align:center; font-size:30px>Sản Phẩm</h2>
    <div class="filter-container">
    <form action="index.php?act=boloc_sanpham" method="GET" action="" enctype="multipart/form-data" class="khungboloc">
        <input type="hidden" name="act" value="boloc_sanpham">
        <h3>Bộ lọc sản phẩm</h3>
        <br>
        <label>Danh Mục</label>
        <select name="dm" ud="">
            <option value=0>Tất cả</option>
            <?php
                if(isset($dsdm))
                {
                    foreach($dsdm as $dm)
                    {
                        echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';
                    }
                }
            ?>
        </select>
        <label>Size</label>
        <select name="size" ud="">
            <option value=0>Tất cả</option>
            <?php
                if(isset($idsize))
                {
                    foreach($idsize as $size)
                    {
                        echo '<option value="'.$size['id'].'">'.$size['size'].'</option>';
                    }
                }
            ?>
        </select>
        <label>Màu</label>
        <select name="mau" ud="">
            <option value=0>Tất cả</option>
            <?php
                if(isset($idmau))
                {
                    foreach($idmau as $mau)
                    {
                        echo '<option value="'.$mau['id'].'">'.$mau['mau'].'</option>';
                    }
                }
            ?>
        </select>
        <button type="submit">Lọc</button>
    </form>
    <form action="index.php" method="GET" class="thanhtimkiem">
        <input type="hidden" name="act" value="timkiem_sanpham">    <!--phần tìm kiếm phải có hidden thì ms gửi đc act -->
        <input type="text" name="timkiem" placeholder="Tìm tên sản phẩm">
        <button type="submit">Tìm</button>
    </form>
    </div>

    <br> 
    <div class="container-product">     
        <?php
            if(isset($kq) && ($kq)>0)
            {
                foreach($kq as $item){
                $imagePath=str_replace('../','./',$item['img']);  // thay đổi đường dẫn
                    echo '
                    <div class="product">      
                    <td><img src="'.$imagePath.'" width="80px"></td>
                    <br>
                    <h4>'.$item['tensp'].'</h4>
                    <p>Price:'.$item['gia'].' đ</p>
                    </div>
                    ';
                }   
            }   
        ?>
    </div>
    <br>
</body>
</html>