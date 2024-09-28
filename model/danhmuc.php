<?php
function deldm($id)
{
    $conn= connectdb();
    $sql = "DELETE FROM tbl_danhmuc WHERE id=".$id;
    $conn->exec($sql);
    
}
function getonedm($id)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
function updatedm($id,$tendm)
{
    $conn= connectdb();
    $sql = "UPDATE tbl_danhmuc SET tendm='".$tendm."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
}

function themdm($tendm)
{
    $conn= connectdb();
    $sql = "INSERT INTO tbl_danhmuc (tendm) VALUES ('".$tendm."')";
    $conn->exec($sql);

}
function getall_dm()
{   
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
?>