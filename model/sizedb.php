<?php
function getall_size()
{
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_size");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}

function delsize($id)
{
    $conn= connectdb();
    $sql = "DELETE FROM tbl_size where id=".$id;
    $conn->exec($sql); 
}

function insert_size($size ,$slspsize)
{
    $conn= connectdb();
    $sql = "INSERT INTO tbl_size (size , slspsize) VALUES ('$size','$slspsize')";
    $conn->exec($sql);
}

function updatesize($id,$size,$slspsize)
{
    $conn= connectdb();
    $sql = "UPDATE tbl_size SET size='".$size."', slspsize='".$slspsize."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
}
function getonesize($id)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_size where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}
?>