<?php
function insert_sanpham($iddm,$tensp,$gia,$img,$idmau,$idsize)
{
    $conn= connectdb();
    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, gia,img,idmau ,idsize) VALUES ('$iddm', '$tensp', '$gia','$img','$idmau','$idsize')";
    $conn->exec($sql);
    /* Cập Nhật slsize lại */
    $sql_update_size="UPDATE tbl_size set slspsize = slspsize - 1 where id= '$idsize'";
    $conn->exec($sql_update_size);
    /* Cập Nhật slmau lại */
    $sql_update_mau="UPDATE tbl_mau set slsp = slsp - 1 where id= '$idmau'";
    $conn->exec($sql_update_mau);
}
function delsp($id)
{
    // truy vấn lấy idsize và idmau vào biến $ketqua
    $conn= connectdb();
    $sql_select ="SELECT idsize ,idmau FROM tbl_sanpham where id = $id";
    $stmt =$conn ->prepare($sql_select);
    $stmt ->execute();
    $ketqua = $stmt->fetch(PDO::FETCH_ASSOC);

    if($ketqua){
    $idsize = $ketqua['idsize'];
    $idmau = $ketqua['idmau'];

    $sql = "DELETE FROM tbl_sanpham where id=".$id;
    $conn->exec($sql);
     /* Cập Nhật slsize lại */
     $sql_update_size="UPDATE tbl_size set slspsize = slspsize + 1 where id= '$idsize'";
     $conn->exec($sql_update_size);
     /* Cập Nhật slmau lại */
     $sql_update_mau="UPDATE tbl_mau set slsp = slsp + 1 where id= '$idmau'";
     $conn->exec($sql_update_mau);
    }
}
function getall_sanpham()
{   
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT  tbl_sanpham.id,tensp ,img,tendm,gia,mau,size FROM tbl_sanpham
    join tbl_mau on tbl_sanpham.idmau=tbl_mau.id
    join tbl_size on tbl_sanpham.idsize=tbl_size.id
    join tbl_danhmuc on tbl_sanpham.iddm=tbl_danhmuc.id
    ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
function getonesp($id)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_sanpham where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
function updatesp($id,$tensp,$img,$gia,$iddm,$idsize,$idmau)
{
    $conn= connectdb();
    $sql_select ="SELECT idsize ,idmau FROM tbl_sanpham where id = $id";
    $stmt =$conn ->prepare($sql_select);
    $stmt ->execute();
    $ketqua = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($ketqua){
    $old_size=$ketqua['idsize'];
    $old_mau=$ketqua['idmau'];
    
    if($img ==""){   // nếu update ko thay đổi hình thì chỉ cần update tên,giá,danh mục,iddm , chú ý 2 dấu bằng
        $sql = "UPDATE tbl_sanpham SET tensp='".$tensp."', gia='".$gia."', iddm='".$iddm."',idsize='".$idsize."',idmau='".$idmau."' WHERE id=".$id;
    }else{
        $sql = "UPDATE tbl_sanpham SET tensp='".$tensp."', gia='".$gia."', iddm='".$iddm."', img='".$img."', idsize='".$idsize."', idmau='".$idmau."' WHERE id=".$id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 

    if($old_size != $idsize)
    {
        $old_size_update ="UPDATE tbl_size set slspsize = slspsize +1 where id= '$old_size'";
        $conn ->exec($old_size_update);

        $new_size_update="UPDATE tbl_Size set slspsize = slspsize -1 where id='$idsize'";
        $conn->exec($new_size_update);
    }

    if($old_mau != $idmau)
    {
        $old_mau_update="UPDATE tbl_mau set slsp = slsp +1 where id='$old_mau'";
        $conn->exec($old_mau_update);

        $new_mau_update="UPDATE tbl_mau set slsp = slsp -1 where id='$idmau'";
        $conn ->exec($new_mau_update);
    }
    }
} 
//   trang user

function filter_sanpham($dm , $size , $mau)
{
    $conn = connectdb();
    $sql="select tbl_sanpham.id , tensp,img,gia,tendm,mau,size
    FROM tbl_sanpham
    join tbl_size On tbl_sanpham.idsize =tbl_size.id
    join tbl_mau on tbl_sanpham.idmau=tbl_mau.id
    join tbl_danhmuc on tbl_sanpham.iddm=tbl_danhmuc.id 
    where 1=1"; //where 1=1 để cho điều kiện thỏa luôn đúng trong bộ lọc
    
    if(!empty($dm) && $dm!= 0)
    {
        $sql .= " AND tbl_sanpham.iddm = '$dm'";
    }
    //lọc danh mục

    if(!empty($size) && $size != 0)
    {
        $sql .= " AND tbl_sanpham.idsize='$size'";
    }

    if(!empty($mau) && $mau != 0)
    {
        $sql .=" AND tbl_sanpham.idmau='$mau'";
    }
    $stmt =$conn ->prepare($sql);
    $stmt->execute();
    $result =$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq =$stmt ->fetchAll();

    return $kq;
}
?>