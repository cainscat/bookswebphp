<div class="an-menu1">
    <div class="div-panel" style="text-align: left;padding-left: 5px;padding-bottom: 3px;">
        <?php
            $string = "";
            if(isset($_SESSION['menu_taikhoan']))
            {
                 if($_SESSION['menu_taikhoan']=="changepass")
                {
                   $string = "Đổi mật khẩu";
                }
                else if ($_SESSION['menu_taikhoan']=="edit")
                {
                    $string = "Sửa thông tin";
                }
                else if ($_SESSION['menu_taikhoan']=="bill")
                {
                    $string = "Thông tin đơn hàng";
                }
                else if($_SESSION['menu_taikhoan'] == "history")
                {
                    $string = "Lịch sử mua hàng";
                }
                else if($_SESSION['menu_taikhoan'] == "themtheloai")
                {
                    $string = "Thể loại > Thêm thể loại";
                }
                else if($_SESSION['menu_taikhoan'] == "suatheloai")
                {
                    $string = "Thể loại > Sửa thể loại";
                }
                else if($_SESSION['menu_taikhoan'] == "xoatheloai")
                {
                    $string = "Thể loại > Xóa thể loại";
                }
                else if($_SESSION['menu_taikhoan'] == "themsach")
                {
                    $string = "Sách > Thêm sách";
                }
                else if($_SESSION['menu_taikhoan'] == "khohang_xem")
                {
                    $string = "Sách > Thông tin kho hàng";
                }
                else if($_SESSION['menu_taikhoan'] == "khohang_capnhat")
                {
                    $string = "Sách > Cập nhật số lượng sách vào kho";
                }
                else if($_SESSION['menu_taikhoan'] == "capnhatsach")
                {
                    $string = "Sách > Cập nhật sách";
                }
                else if($_SESSION['menu_taikhoan'] == "xoasach")
                {
                    $string = "Sách > Xóa sách";
                }
                else if($_SESSION['menu_taikhoan'] == "list_taikhoan")
                {
                    $string = "Tài khoản > Danh sách tài khoản";
                }
                 else if($_SESSION['menu_taikhoan'] == "them_taikhoan")
                {
                    $string = "Tài khoản > Thêm tài khoản";
                }
                else if($_SESSION['menu_taikhoan'] == "xoa_taikhoan")
                {
                    $string = "Tài khoản > Xóa tất cả tài khoản";
                }
                else if($_SESSION['menu_taikhoan'] == "bill_admin")
                {
                    $string = "Quản lý > Đơn hàng";
                }
                // else if($_SESSION['menu_taikhoan'] == "thongke")
                // {
                //     $string = "Quản lý > Thống kê";
                // }
            }
            else
                $string = "Sửa thông tin";
         echo 'Cài đặt > '.$string;
          ?>
    </div>
    <div class="div-body-panel" style="position: relative;">
        <div class="tai-khoan-menu">
            <ul>
               <font style="font-weight: bold;font-size: 18px;padding-left: 5px;color: white;">
                        <img src="img/menu.png" width="15px" height="20px" style="margin-bottom: 4px;" /> NGƯỜI DÙNG</font>
                <li><a href="menu.php?menu_taikhoan=edit"><img src="img/chose.png" height="15" width="15"/> Sửa thông tin cá nhân</a></li>
                <li><a href="menu.php?menu_taikhoan=changepass"><img src="img/chose.png" height="15" width="15"/> Đổi mật khẩu</a></li>
                <li><a href="menu.php?menu_taikhoan=bill"><img src="img/chose.png" height="15" width="15"/> Thông tin đơn hàng</a></li>
                <li><a href="menu.php?menu_taikhoan=history"><img src="img/chose.png" height="15" width="15"/> Lịch sử mua hàng</a></li>
                <?php
                    if($_SESSION['role']=='1')
                    {
                        echo '<hr>';
                         echo '<font style="font-weight: bold;font-size: 18px;padding-left: 5px;color: white;">
                        <img src="img/menu.png" width="15px" height="20px" style="margin-bottom: 4px;" /> QUYỀN QUẢN TRỊ</font>';
                        echo '<li id="menu_theloai"><img src="img/list.png" height="15" width="15"/><font style="color:white;"> Thể loại</font></li>';
                        echo '<li id="menu_sanpham"><img src="img/list.png" height="15" width="15"/><font style="color:white;"> Sách</font></li>';
                        echo '<li id="menu_taikhoan"><img src="img/list.png" height="15" width="15"/><font style="color:white;"> Tài khoản</font></li>';
                        echo '<li id="menu_khohang"><img src="img/list.png" height="15" width="15"/><font style="color:white;"> Kho hàng</font></li>';
                        echo '<li id="menu_donhang"><img src="img/list.png" height="15" width="15"/><font style="color:white;"><a href="menu.php?menu_taikhoan=bill_admin">Đơn hàng</a></font></li>';
                     #   echo '<li id="menu_thongke"><img src="img/list.png" height="15" width="15"/><font style="color:white;"><a href="menu.php?menu_taikhoan=thongke">Thống kê</a></font></li>';

                    }
                ?>
            </ul>
        </div>
        <div class="an-menu2">
            <div>
                <?php require "page/main-account.php"?>
            </div>
        </div>
        <div id="hien_theloai" style="background-color: #444444;width: 200px;position: absolute;left: 16.6%;top:30.4%;border:1px solid;">
            <ul style="list-style: none;">
                <li><a href="menu.php?menu_taikhoan=themtheloai"><img src="img/chose.png" height="15" width="15"/> Thêm thể loại</a></li>
                <li><a href="menu.php?menu_taikhoan=suatheloai"><img src="img/chose.png" height="15" width="15"/> Sửa thể loại</a></li>
                 <li><a href="menu.php?menu_taikhoan=xoatheloai"><img src="img/chose.png" height="15" width="15"/> Xóa Thể loại</a></li>
            </ul>
        </div>
        <div id="hien_sanpham" style="background-color: #444444;width: 200px;position: absolute;left: 16.6%;top:32.8%;border:1px solid;">
            <ul style="list-style: none;">
                <li><a href="menu.php?menu_taikhoan=themsach"><img src="img/chose.png" height="15" width="15"/> Thêm sản phẩm</a></li>
                <li><a href="menu.php?menu_taikhoan=capnhatsach"><img src="img/chose.png" height="15" width="15"/> Cập nhật sản phẩm</a></li>
                <li><a href="menu.php?menu_taikhoan=xoasach"><img src="img/chose.png" height="15" width="15"/> Xóa sản phẩm</a></li>
            </ul>
        </div>
        <div id="hien_taikhoan" style="background-color: #444444;width: 200px;position: absolute;left: 16.6%;top:37.2%;border:1px solid;">
            <ul style="list-style: none;">
                <li><a href="menu.php?menu_taikhoan=list_taikhoan"><img src="img/chose.png" height="15" width="15"/> Danh sách tài khoản</a></li>
                 <li><a href="menu.php?menu_taikhoan=them_taikhoan"><img src="img/chose.png" height="15" width="15"/> Thêm tài khoản</a></li>
                  <li><a href="menu.php?menu_taikhoan=xoa_taikhoan"><img src="img/chose.png" height="15" width="15"/><font color="red"> Xóa tất cả tài khoản</a></font></li>
            </ul>
        </div>
        <div id="hien_khohang" style="background-color: #444444;width: 200px;position: absolute;left: 16.6%;top:42.2%;border:1px solid;">
            <ul style="list-style: none;">
                <li><a href="menu.php?menu_taikhoan=khohang_xem"><img src="img/chose.png" height="15" width="15"/> Thông tin kho hàng</a></li>
                 <li><a href="menu.php?menu_taikhoan=khohang_capnhat"><img src="img/chose.png" height="15" width="15"/> Cập nhật số lượng sách vào kho</a></li>
            </ul>
        </div>
        <div id="hien_dulieu" style="background-color: #444444;width: 200px;position: absolute;left: 16.6%;top:55.6%;border:1px solid;">
            <ul style="list-style: none;">
                <li><a href="menu.php?menu_taikhoan=saoluu"><img src="img/chose.png" height="15" width="15"/> Sao lưu</a></li>
                 <li><a href="menu.php?menu_taikhoan=phuchoi" onclick="alert('Chức năng đang được phát triển! Vui lòng quay lại sau!'); return false;"><img src="img/chose.png" height="15" width="15"/> Phục hồi</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
        $("#hien_theloai").hide();
    $("#hien_sanpham").hide();
    $("#hien_taikhoan").hide();
    $("#hien_dulieu").hide();
    $("#hien_khohang").hide();

    $("#menu_dulieu").hover(function()
    {
        $("#hien_dulieu").fadeIn();
        $("#hien_theloai").fadeOut();
        $("#hien_sanpham").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_khohang").fadeOut();
    });
    $("#menu_donhang").hover(function()
    {
        $("#hien_dulieu").fadeOut();
        $("#hien_theloai").fadeOut();
        $("#hien_sanpham").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_khohang").fadeOut();
    });
    $("#menu_thongke").hover(function()
    {
        $("#hien_dulieu").fadeOut();
        $("#hien_theloai").fadeOut();
        $("#hien_sanpham").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_khohang").fadeOut();
    });
    $("#menu_theloai").hover(function()
    {
        $("#hien_theloai").fadeIn();
        $("#hien_sanpham").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_dulieu").fadeOut();
        $("#hien_khohang").fadeOut();
    });
     $("#menu_sanpham").hover(function(){
        $("#hien_sanpham").fadeIn();
        $("#hien_theloai").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_dulieu").fadeOut();
        $("#hien_khohang").fadeOut();
    });
      $("#menu_taikhoan").hover(function(){
        $("#hien_taikhoan").fadeIn();
        $("#hien_sanpham").fadeOut();
        $("#hien_theloai").fadeOut();
        $("#hien_dulieu").fadeOut();
        $("#hien_khohang").fadeOut();
    });
    $("#menu_khohang").hover(function(){
        $("#hien_khohang").fadeIn();
       $("#hien_taikhoan").fadeOut();
      $("#hien_sanpham").fadeOut();
      $("#hien_theloai").fadeOut();
      $("#hien_dulieu").fadeOut();
  });
      $(".an-menu2").hover(function(){
        $("#hien_sanpham").fadeOut();
        $("#hien_theloai").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_dulieu").fadeOut();
        $("#hien_khohang").fadeOut();
    });
       $(".an-menu1").hover(function(){
        $("#hien_sanpham").fadeOut();
        $("#hien_theloai").fadeOut();
        $("#hien_taikhoan").fadeOut();
        $("#hien_dulieu").fadeOut();
        $("#hien_khohang").fadeOut();
    });

</script>
