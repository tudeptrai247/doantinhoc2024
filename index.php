<?php
    session_start();
    ob_start();
    include "./model/connectdb.php";
    include "./model/sanpham.php";
    include "./model/danhmuc.php";
    include "./model/sizedb.php";
    include "./model/maudb.php";
    include "./model/user.php";
    //connectdb
    include "view/header.php";
    if(isset($_GET['act'])) // kiểm tra nếu ko có act truyền vào sẽ ko vào đc case bên trong
    {
    $act= $_GET['act'];
    switch($act){
        case 'sanpham':
            $kq=getall_sanpham();
            //sanpham
            $dsdm = getall_dm();
            //danh mục
            $idmau= getall_mau();
            //màu
            $idsize= getall_size();
            //Size
            include "view/sanpham.php";
            break;
        case 'boloc_sanpham':
            $dm=isset($_GET['dm']) ? $_GET['dm'] :'';
            $size=isset($_GET['size'])? $_GET['size'] :'';
            $mau=isset($_GET['mau'])? $_GET['mau'] :'';

            $kq = filter_sanpham($dm , $size , $mau);
            // danh sách bộ lọc
            $dsdm = getall_dm();
            $idmau= getall_mau();
            $idsize= getall_size();
            include "view/sanpham.php";
            break;
        case 'timkiem_sanpham':
            $tensp=isset($_GET['timkiem']) ? $_GET['timkiem'] :''; // kiểm tra , nếu ko có thì là khoảng trống
            $kq = find_sanpham($tensp);
            include "view/sanpham.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap']) && ($_POST['dangnhap']))
            {
                $user = $_POST['user'];
                $pass =$_POST['pass'];
                $kq =getuser_infor($user,$pass);
                $role =$kq[0]['role'];
                if( $role ==1)
                {
                    $_SESSION['role'] = $role;
                    header('location: admin/index.php');
                }else{
                    $_SESSION['role'] = $role;
                    $_SESSION['iduser']=$kq[0]['id'];
                    $_SESSION['user'] = $kq[0]['user'];
                    header('location: index.php');
                    break;
                }
            }
            else   
            {
                include "view/dangnhap.php";
                break;
            }
       
        case 'dangky':
            if(isset($_POST['dangky']) && ($_POST['dangky']))
            {
                $name =$_POST['name'];
                $user =$_POST['user'];
                $pass = $_POST['pass'];
                $email =$_POST['email'];
                $address =$_POST['address'];
                add_user($name,$user,$pass,$email,$address);
                header('location: index.php?act=dangnhap');
            }
            include "view/dangky.php";
            break;
        case 'logout':
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['user']);
            header('location: index.php');
            break;
        default:
            include "view/trangchu.php";
            break;
        }
        
    }
    else{
        include "view/trangchu.php";
    }
    include "view/footer.php";
?>