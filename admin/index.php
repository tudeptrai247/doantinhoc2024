<?php
    session_start();
    ob_start();
    if(isset($_SESSION['role']) && ($_SESSION['role'] == 1))
    {
    include "../model/connectdb.php";
    include "../model/danhmuc.php";
    include "../model/sanpham.php";
    include "../model/sizedb.php";
    include "../model/maudb.php";
    //connectdb();

    include "view/header.php";
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'danhmuc':
                // nhận yêu cầu và xử lý
                // hàm lấy dữ liệu
                $kq=getall_dm();
                include "view/danhmuc.php";
                break;
            case 'deldm':
                if(isset($_GET['id']))  // kiểm tra có tồn tại id này ko
                {
                    $id = $_GET['id'];  // lấy id đó vè rồi xóa id đó
                    deldm($id);
                }
                $kq=getall_dm();
                include "view/danhmuc.php";
                break;
            case 'updatedmform':
                // lấy 1 record đúng với id truyền vào
                if(isset($_GET['id']))  
                {
                    $id = $_GET['id']; 
                    $kqone=getonedm($id);
                    $kq=getall_dm();
                    include "view/updatedmform.php";
                }
                if(isset($_POST['id']))  
                {
                    $id = $_POST['id']; 
                    $tendm = $_POST['tendm']; 
                    updatedm($id,$tendm);
                    $kq=getall_dm();
                    include "view/danhmuc.php";
                } 
                break;
            case 'adddm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi']))  // tồn tại và được click
                {
                   $tendm=$_POST['tendm'];
                   themdm($tendm);
                }
                $kq=getall_dm();
                include "view/danhmuc.php";
                break;
                
            case 'sanpham':
                    //load danh sách màu
                $dsmau= getall_mau();
                    //load danh sách size
                $dssize =getall_size();
                    //load danh sach danh muc
                $dsdm = getall_dm();
                    //load danh sach san pham
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'sanpham_add':
                    if(isset($_POST['themmoi']) && ($_POST['themmoi']))
                    {
                        $iddm =$_POST['iddm'];
                        $tensp =$_POST['tensp'];
                        $gia =$_POST['gia'];
                        $idmau = $_POST['idmau'];
                        $idsize =$_POST['idsize'];
                        $target_dir = "../uploaded/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img = $target_file;    // lưu tên đường dẫn zô database
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                        }
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                
                        insert_sanpham($iddm,$tensp,$gia,$img,$idmau,$idsize);
                    }
                 //load danh sach danh muc
                $dsdm = getall_dm();
                 //load danh sách màu
                $dsmau= getall_mau();
                 //load danh sách size
                $dssize =getall_size();
                 //load danh sach san pham
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'updatespform':    // case này dùng để hiện thị thông tin sản phẩm lên form
                    //load danh sach danh muc
                $dsmau= getall_mau();
                    //load danh sách size
                $dssize =getall_size();
                    //load danh sach danh muc
                $dsdm = getall_dm();
                    
                    // sản phẩm chi tiết theo getid
                if(isset($_GET['id'])&&($_GET['id'] >0))
                {
                    $spct = getonesp($_GET['id']);
                    
                }
                    //load danh sach san pham
                $kq = getall_sanpham();
                include "view/updatespform.php";
                break;
                case 'sanpham_update':
                    //load danh sach danh muc
                $dsdm = getall_dm();
                    // cập nhật sản phẩm
                if(isset($_POST['capnhat'])&&($_POST['capnhat']))
                {
                    $iddm =$_POST['iddm'];
                    $idsize =$_POST['idsize'];
                    $idmau =$_POST['idmau'];
                    $tensp =$_POST['tensp'];
                    $gia =$_POST['gia'];
                    $id =$_POST['id'];
                    if($_FILES["img"]["name"]!="")
                    {
                        $target_dir = "../uploaded/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img = $target_file;    // lưu tên đường dẫn zô database
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                        }if($uploadOk == 1)
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            
                    }
                    else
                    {
                        $img ="";
                    }
                    updatesp($id,$tensp,$img,$gia,$iddm,$idsize,$idmau);
                }
                    //load danh sach san pham
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            case 'delsp':
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    delsp($id);
                }
                $kq = getall_sanpham();
                include "view/sanpham.php";
                break;
            
            case 'taikhoan':
                include "view/taikhoan.php";
                break;
            case 'size':
                $kq = getall_size();
                include "view/size.php";
                break;
            case 'delsize':
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    delsize($id);
                }
                $kq = getall_size();
                include "view/size.php";
                break;
            case 'size_add':
                if(isset($_POST['themmoi']) && ($_POST['themmoi']))
                {
                    $size = $_POST['size'];
                    $slspsize = $_POST['slspsize'];
                    insert_size($size,$slspsize);
                }
                $kq = getall_size();
                include "view/size.php";
                break;
            case 'updatesize':
                if(isset($_GET['id']))  
                {
                    $id = $_GET['id']; 
                    $kqone=getonesize($id);
                    $kq = getall_size();
                    include "view/updatesize.php";
                }
                if(isset($_POST['capnhat'])&&($_POST['capnhat']))  
                {
                    $id = $_POST['id']; 
                    $size = $_POST['size']; 
                    $slspsize = $_POST['slspsize'];
                    updatesize($id,$size,$slspsize);
                    $kq=getall_size();
                    include "view/size.php";
                } 
                break;
            case 'mau':
                $kq = getall_mau();
                include "view/mau.php";
                break;
            case 'delmau':
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    delmau($id);
                }
                $kq = getall_mau();
                include "view/mau.php";
                break;
            case 'mau_add':
                if(isset($_POST['themmoi']) && ($_POST['themmoi']))
                {
                    $mau = $_POST['mau'];
                    $slsp = $_POST['slsp'];
                    insert_mau($mau,$slsp);
                }
                $kq = getall_mau();
                include "view/mau.php";
                break;
            case 'updatemau':
                if(isset($_GET['id']))  
                {
                    $id = $_GET['id']; 
                    $kqone=getonemau($id);
                    $kq = getall_mau();
                    include "view/updatemau.php";
                }
                if(isset($_POST['capnhat'])&&($_POST['capnhat']))  
                {
                    $id = $_POST['id']; 
                    $mau = $_POST['mau']; 
                    $slsp = $_POST['slsp'];
                    updatemau($id,$mau,$slsp);
                    $kq=getall_mau();
                    include "view/mau.php";
                } 
                break;
            case 'logout':
               if(isset($_SESSION['role'])) unset($_SESSION['role']);
                header('location: login.php');
                break;
            default:
                include "view/home.php";
                break;
        }
    }
    else
    {
        include "view/home.php";
    }
    
    include "view/home.php";

    include "view/footer.php";
}
    else
        {
            header('location: login.php');
        }
?>