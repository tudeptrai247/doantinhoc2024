<?php
    session_start();
    ob_start();
    include "./model/connectdb.php";
    include "./model/sanpham.php";
    include "./model/danhmuc.php";
    include "./model/sizedb.php";
    include "./model/maudb.php";
    include "./model/user.php";
    include "./model//donhang.php";
    //connectdb
    include "view/header.php";
    if(isset($_GET['act'])) // kiểm tra nếu ko có act truyền vào sẽ ko vào đc case bên trong
    {
    $act= $_GET['act'];
    switch($act){
        case 'sanpham':
            
            //sanpham
            $dsdm = getall_dm();
            //danh mục
            $idmau= getall_mau();
            //màu
            $idsize= getall_size();
            //Size

            $limit =8;
            $current_page=isset($_GET['page'])?(int)$_GET['page'] :1; // lấy trang hiện tại
            $offset =($current_page -1) * $limit; // lấy vị trị bắt đầu của dữ liệu , vd trang 2 -1 =1 * 6 limit là sẽ lấy từ 6 trở đi
            $kq=getsanpham_phantrang($limit,$offset);

            $total_product =count(getall_sanpham()); // tổng sp
            $total_pages =ceil($total_product/$limit); //tổng trang

            include "view/sanpham.php";
            break;
        case 'boloc_sanpham':
            $dm=isset($_GET['dm']) ? $_GET['dm'] :'';
            $size=isset($_GET['size'])? $_GET['size'] :'';
            $mau=isset($_GET['mau'])? $_GET['mau'] :'';
            // của phần phân trang , ở đây chỉ là để tính cái số trang của phần mà có bộ lọc
            $limit =8;
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] :1;
            if ($current_page <1) $current_page=1;
            $offset =($current_page -1)*$limit;

            $total_product =count(filter_sanpham($dm,$size,$mau ,PHP_INT_MAX,0)); // php_int_max cho lấy tất cả sp mà ko bị giới hạn sản phẩm phân trang
            $total_pages =ceil($total_product/$limit);
            $kq = filter_sanpham($dm , $size , $mau,$limit,$offset);
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
                $kq =check_account($user,$pass);
                if($kq)
                {
                    
                    $_SESSION['role'] = $kq['role'];
                    $_SESSION['iduser']=$kq['id'];
                    $_SESSION['user'] = $kq['user'];
                   
                    if($kq['role'] ==1){
                    header('location: admin/index.php');
                    exit();
                }else{
                    header('location: index.php');
                    exit();
                }
                }else{
                    $error="Sai tài khoản hoặc mật khẩu";
                    include "view/dangnhap.php";
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
                add_user($name,$address,$email,$user,$pass);
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
        case 'profileuser':
            $id=$_SESSION['iduser'];
            $kq=getone_user($id);
            $_SESSION['user'] =  $kq[0]['user'];
            $_SESSION['pass'] =  $kq[0]['pass'];   
            $_SESSION['name'] =  $kq[0]['name'];
            $_SESSION['email'] =  $kq[0]['email'];   
            $_SESSION['address'] =  $kq[0]['address'];
            $kq=getone_user($id);   
            include 'view/profileuser.php';
            break;
        case 'capnhatuser':
            if(isset($_POST['capnhat']) && ($_POST['capnhat']))
            {
                $id=$_SESSION['iduser'];
                $user =$_POST['user'];
                $pass = $_POST['pass'];
                $name =$_POST['name'];
                $email =$_POST['email'];
                $address =$_POST['address'];
                capnhat_user($id,$user,$pass,$name,$email,$address); // lưu ý , phải sắp xếp đúng chỗ , đúng thứ tự nếu ko sẽ bị xáo trộn
                
                $_SESSION['user']=$kq[0]['user'];
                $_SESSION['pass'] =  $kq[0]['pass']; 
                $_SESSION['name'] =  $kq[0]['name'];         
                $_SESSION['email'] =  $kq[0]['email'];    
                $_SESSION['address'] =  $kq[0]['address'];   
                 
                header('location: index.php?act=profileuser');
            }
            include 'view/capnhatuser.php';
            break;
            case 'chitietsanpham':
            if(isset($_GET['id']) && $_GET['id'] !=0){
                    //load danh sách màu
                $dsmau= getall_mau();
                    //load danh sách size
                $dssize =getall_size();
                $id=$_GET['id'];
                $kq=chitietsanpham($id);
            }
            include 'view/chitietsanpham.php';
            break;
            case 'giohang':
            if(!isset($_SESSION['iduser'])){
                echo "<script> 
                alert('bạn cần phải đăng nhập thì mới thêm được giỏ hàng');
                window.location.href='index.php?act=dangnhap';
                </script>";
            }
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=array();
            }
            if(isset($_POST['buttongiohang'])){
                
                $id=$_POST['id'];
                $tensp=$_POST['tensp'];
                $mau=$_POST['idmau'];
                $size=$_POST['idsize'];
                $sl=$_POST['sl'];
                $gia=$_POST['gia'];
                $keysp =$id.'-'.$size.'-'.$mau; // tạo 1 khóa duy nhất cho sản phẩm có size và màu đó

                if(isset($_SESSION['cart'][$keysp])){
                    $_SESSION['cart'][$keysp]['sl']+=$sl;
                    $_SESSION['cart'][$keysp]['gia_tong']=$_SESSION['cart'][$keysp]['sl'] *$_SESSION['cart'][$keysp]['gia'];
                }else{
                    $_SESSION['cart'][$keysp]= array(
                        'id'=>$id,
                        'tensp'=>$tensp,
                        'mau'=>$mau,
                        'size'=>$size,
                        'sl'=>$sl,
                        'gia'=>$gia,
                        'gia_tong'=>$gia*$sl // giá tổng của 1 sản phẩm
                    );
                }
                // tính tổng tiền của cả giỏ hàng
                $total=0;
                foreach($_SESSION['cart'] as $item){
                    $total +=$item['gia_tong'];
                }
                $_SESSION['total'] =$total;
                
            }
            include 'view/giohang.php';
            break;
            case 'delcart':
                if(isset($_GET['keysp'])){
                $keysp =$_GET['keysp'];
            }
                if(isset($_SESSION['cart'][$keysp]))
                {
                    unset($_SESSION['cart'][$keysp]);
                    // tính lại tổng tiền
                    $total=0;
                    foreach($_SESSION['cart'] as $item){
                        $total +=$item['gia_tong'];
                    }
                    $_SESSION['total'] =$total;
                }
                include 'view/giohang.php';
                break;
            case 'updatecart':
                //load danh sách màu
                $dsmau= getall_mau();
                //load danh sách size
                $dssize =getall_size();
                if(isset($_GET['keysp'])){
                    $keysp=$_GET['keysp'];
                    if(isset($_SESSION['cart'][$keysp])){
                        $item=$_SESSION['cart'][$keysp];
                        include 'view/updategiohang.php';
                    }
                }
                if(isset($_POST['capnhat']))
                {   
                    
                    foreach($_POST['sl'] as $key=>$sl){
                        if($sl >0){
                            $_SESSION['cart'][$key]['sl'] =$sl;
                            $_SESSION['cart'][$key]['gia_tong'] = $_SESSION['cart'][$key]['gia'] * $sl ;
                            
                        }else{ // nếu <a hoặc =0 thì xóa cái item đó luôn
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                    // tính lại
                $total=0;
                foreach($_SESSION['cart'] as $item){
                    $total +=$item['gia_tong'];
                }
                $_SESSION['total'] =$total;
                    include 'view/giohang.php';
                    exit();
                }
                break;
                case 'thongtindonhang':
                        $id=$_SESSION['iduser'];
                        $kq=getone_user($id);
                        $_SESSION['name'] =  $kq[0]['name'];         
                        $_SESSION['email'] =  $kq[0]['email'];    
                        $_SESSION['address'] =  $kq[0]['address'];  
                        $total=0;
                        foreach($_SESSION['cart'] as $item){
                            $total +=$item['gia_tong'];}
                        $_SESSION['total'] =$total;
                        
                    include 'view/thongtindonhang.php';
                    break;
                case 'luudonhang':
                    if(isset($_POST['paymentmethod'])){
                        if(isset($_POST['paymentmethod'])){
                            $_SESSION['paymentmethod']=$_POST['paymentmethod'];
                        }
                        $iduser=$_SESSION['iduser'];
                        $address=$_POST['address'];
                        $total=$_SESSION['total'];
                        $email=$_POST['email'];
                        $paymentmethod=$_SESSION['paymentmethod'];
                        $ngaytao=date('Y-m-d H:i:s');
                        $iddonhang=luudonhang($iduser,$ngaytao,$total,$paymentmethod,$address,$email);
                        
                        //lưu chi tiết đơn hàng
                        if($iddonhang){
                            foreach($_SESSION['cart'] as $item){
                                $idsanpham=$item['id'];
                                $size=$item['size'];
                                $mau=$item['mau'];
                                $sl=$item['sl'];
                                chitietdonhang($iddonhang,$idsanpham,$size,$mau,$sl);
                            }
                        
                        
                        if($paymentmethod=='momo'){
                            header('Location: view/thanhtoanmomo.php?total='.$total);
                            unset($_SESSION['cart']);
                            exit;
                        }else{
                            echo '<script>
                                alert("Thanh toán tiền mặt thành công!");
                                window.location.href="index.php?act=hoadon";
                            </script>';
                            
                            unset($_SESSION['cart']);
                          
                            exit;
                        }
                    }
                    }
                    break;
                   
                case 'hoadon':
                
                    $iduser=(int) $_SESSION['iduser'];
                    
                    if($iduser){
                    $donhang=getonedonhang($iduser);
                    if($donhang){
                    $iddonhang =(int)$donhang['id'];
                    $chitietdonhang=getonechitietdonhang($iddonhang);
                    
                    }
                }
                    include'view/hoadon.php';
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