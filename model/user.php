<?php
// function deldm($id)
// {
//     $conn= connectdb();
//     $sql = "DELETE FROM tbl_danhmuc WHERE id=".$id;
//     $conn->exec($sql);
    
// }
// function getonedm($id)
// {
//     $conn= connectdb();
//     $stmt = $conn->prepare("SELECT * FROM tbl_danhmuc where id=".$id);
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
//     $kq=$stmt->fetchAll();                                    // gán cho biến $kq
//     return $kq;
// }
// function updatedm($id,$tendm)
// {
//     $conn= connectdb();
//     $sql = "UPDATE tbl_danhmuc SET tendm='".$tendm."' WHERE id=".$id;
//     $stmt = $conn->prepare($sql);
//     $stmt->execute(); 
// }

// function themdm($tendm)
// {
//     $conn= connectdb();
//     $sql = "INSERT INTO tbl_danhmuc (tendm) VALUES ('".$tendm."')";
//     $conn->exec($sql);

// }
function check_user($user,$pass)
{   
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll(); 
    if(count($kq)>0)                                   // gán cho biến $kq
        return $kq[0]['role'];
    else
        return 0;
}
function getuser_infor($user,$pass)
{   
    $conn= connectdb();     // hàm kết nối csdl
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND pass='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    // trả về dữ liệu là mảng
    $kq=$stmt->fetchAll(); 
    return $kq;  // return để lấy đc user , id , pass
}

function add_user($name,$email,$address,$user,$pass)
{
    $conn = connectdb();
    $sql = "INSERT INTO tbl_user ( name, address, email, user, pass) VALUES ('$name' , '$email','$address' ,'$user','$pass')";
    $conn ->exec($sql);
}

function getall_user()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user");
    $stmt -> execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>