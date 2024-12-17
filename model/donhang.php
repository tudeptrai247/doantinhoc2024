<?php
function luudonhang($iduser,$ngaytao,$total,$paymentmethod,$address,$email){
    $conn= connectdb();
    $sql = "INSERT INTO tbl_donhang (iduser,ngaytao,tongtien,phuongthucthanhtoan,address,trangthai,email) VALUES ('$iduser','$ngaytao','$total','$paymentmethod','$address','pending','$email')";
    $conn->exec($sql);
    return $conn->lastInsertId(); // phải trả về 1 id thì mới lấy được id đơn hàng
}

function chitietdonhang($iddonhang,$idsanpham,$size,$mau,$sl){
    $conn= connectdb();
    $sql = "INSERT INTO tbl_chitietdonhang (iddonhang,idsanpham,size,mau,soluong) VALUES ('$iddonhang','$idsanpham','$size','$mau','$sl')";
    $conn->exec($sql);
}

//lấy 1 đơn hàng mới nhất
function getonedonhang($iduser)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang where iduser= :iduser order by ngaytao DESC limit 1");
    $stmt->bindParam(':iduser',$iduser,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    
    $kq=$stmt->fetch();                                    // trả về 1 bản ghi nên chỉ fetch
    return $kq;
}
function getonechitietdonhang($iddonhang)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT *
                                    FROM tbl_chitietdonhang 
                                    JOIN tbl_sanpham ON tbl_chitietdonhang.idsanpham = tbl_sanpham.id 
                                    WHERE tbl_chitietdonhang.iddonhang=:iddonhang");
    $stmt->bindParam(':iddonhang',$iddonhang,PDO::PARAM_INT);
    $stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_ASSOC);                                    
    return $kq;

}
function getalldonhang()
{
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
function getinfodonhang($id)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_donhang where id= :id");
    $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    
    $kq=$stmt->fetch();                                    // trả về 1 bản ghi nên chỉ fetch
    return $kq;
}
function updatedonhang($id,$trangthai)
{
    $conn= connectdb();
    $sql = "UPDATE tbl_donhang SET trangthai='".$trangthai."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
}
function getallchitietdonhang()
{
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_chitietdonhang");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
?>