  <?php
    if(isset($_SESSION['menu_taikhoan']))
    {
        if($_SESSION['menu_taikhoan'] == "edit")
            require "tai-khoan/change_info.php";
        else if($_SESSION['menu_taikhoan'] == "changepass")
            require "tai-khoan/change_pass.php";
        else if($_SESSION['menu_taikhoan'] == "bill")
            require "tai-khoan/bill.php";
        else if($_SESSION['menu_taikhoan'] == "history")
            require "tai-khoan/lich_su.php";
        else if($_SESSION['menu_taikhoan'] == "themtheloai")
            require "admin/them_the_loai.php";
        else if($_SESSION['menu_taikhoan'] == "suatheloai")
            require "admin/sua_the_loai.php";
        else if($_SESSION['menu_taikhoan'] == "xoatheloai")
            require "admin/xoa_the_loai.php";
        else if($_SESSION['menu_taikhoan'] == "themsach")
            require "admin/them_sach.php";
        else if($_SESSION['menu_taikhoan'] == "capnhatsach")
            require "admin/capnhat_sach.php";
        else if($_SESSION['menu_taikhoan'] == "khohang_xem")
                require "admin/khohang_xem.php";
        else if($_SESSION['menu_taikhoan'] == "khohang_capnhat")
                require "admin/khohang_capnhat.php";
        else if($_SESSION['menu_taikhoan'] == "xoasach")
            require "admin/xoa_sach.php";
        else if($_SESSION['menu_taikhoan'] == "list_taikhoan")
            require "admin/list_taikhoan.php";
        else if($_SESSION['menu_taikhoan'] == "them_taikhoan")
            require "admin/them_taikhoan.php";
        else if($_SESSION['menu_taikhoan'] == "xoa_taikhoan")
            require "admin/xoa_taikhoan.php";
        else if($_SESSION['menu_taikhoan'] == "thongke")
                require "admin/thongke.php";
        else if($_SESSION['menu_taikhoan'] == "bill_admin")
                require "admin/bill_admin.php";
        else if($_SESSION['menu_taikhoan'] == "saoluu")
                require "admin/saoluu.php";
    }
    else
        {
            require "tai-khoan/change_info.php";
        }
?>
