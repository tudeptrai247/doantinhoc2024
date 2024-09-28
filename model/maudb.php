<?php

function getall_mau()
{
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_mau");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}

function delmau($id)
{
    $conn= connectdb();
    $sql = "DELETE FROM tbl_mau where id=".$id;
    $conn->exec($sql);
}

function insert_mau($mau , $slsp)
{
    $conn= connectdb();
    $sql = "INSERT INTO tbl_mau (mau , slsp) VALUES ('$mau','$slsp')";
    $conn->exec($sql);
}

function getonemau($id)
{
    $conn= connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_mau where id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll();                                    // gán cho biến $kq
    return $kq;
}

function updatemau($id,$mau,$slsp)
{
    $conn= connectdb();
    $sql = "UPDATE tbl_mau SET mau='".$mau."', slsp='".$slsp."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute(); 
}
?>