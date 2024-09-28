<?php
    session_start();
    ob_start();
    include "./model/connectdb.php";
    include "./model/sanpham.php";
    include "./model/danhmuc.php";
    include "./model/sizedb.php";
    include "./model/maudb.php";
    //connectdb
    include "view/header.php";
    if(isset($_GET['act']))
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