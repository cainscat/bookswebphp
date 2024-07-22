<?php
    // header menu
    if(isset($_SESSION['menu']))
    {

         if($_SESSION['menu']== 'dangnhap')
        {
            require "tai-khoan/dang_nhap.php";
        }
        else if($_SESSION['menu']== 'dangky')
            require "tai-khoan/dang_ky.php";
        else if($_SESSION['menu']== 'trangchu')
            require "hien-thi/booknews.php";
        else if($_SESSION['menu']== 'thongtin')
            require "thong_tin.php";
        else if($_SESSION['menu']== 'taikhoan')
            require "tai-khoan/tai_khoan.php";
        else if($_SESSION['menu']== 'timkiem')
            require "timkiem.php";
        else
        {
            $mang = explode('-',$_SESSION['menu']);
            if($mang[0]=='theloai')
            {
                        $_SESSION['theloai'] = $mang[1]; // Gán session theloai = mã thể loại
                        require "hien-thi/the-loai.php";
            }
            else if($mang[0]=='sanpham')
            {
                $_SESSION['sanpham'] = $mang[1].'-'.$mang[2]; // Gán ss sanpham = 'maxtheloai-masach'
                require "hien-thi/chi-tiet.php";
            }
            else if($mang[0] == 'cart')
            {
                $_SESSION['cart'] = $mang[1].'-'.$mang[2];
                require "cart/gio-hang.php";
            }
        }

    }
    else
        require "hien-thi/booknews.php";


?>
