<style type="text/css">
    .header1:hover .btn-back{
        display: inherit;
    }
    .header1:hover .btn-next{
        display: inherit;
    }
    .btn-back{
        position: absolute; top:300px;left:5px;display: none;
    }
    .btn-next{
        position: absolute; top:300px;right: 5px;display: none;
    }
</style>
  <div style="margin-top: 36px;">
     
        <div class="header1">
            <div>
                <img name="banner" class="header-banner" src="img/banner/1.jpg"/>
            </div>
            <a id="btn-back" href="#" class="btn-back" ><img src="img/img-back.png"/></a>
            <a id="btn-next" href="#" class="btn-next" ><img src="img/img-next.png"/></a>
        </div>

        <div class="header-menu" style="position: fixed;top:0px;z-index: 1;">
            <div><a href="menu.php?menu=trangchu" alt="tragads"><img src="img/home1.png" height=15px width=15px /> Trang chủ</a></div>
            <div><a href="menu.php?menu=thongtin"><img src="img/info.png" height=15px width=15px /> Thông tin</a></div>
            <div><a href="menu.php?menu=timkiem"><img src="img/search-14-24.png" height=15px width=15px /> Tìm kiếm</a></div>
            <div><?php if(isset($_SESSION['user_id'])) echo "<a href='menu.php?menu=taikhoan'><img src='img/setting.ico' height=15px width=15px /> Tài khoản</a>"; 
            else echo "<a href='menu.php?menu=dangnhap'><img src='img/login.jpg' height=15px width=15px /> Đăng nhập</a>";?></div>
            <div><?php if(isset($_SESSION['user_id'])) echo "<a href='menu.php?menu=dangxuat'><img src='img/logout.jpg' height=15px width=15px /> Đăng xuất</a>"; 
            else echo "<a href='menu.php?menu=dangky'><img src='img/reg.png' height=15px width=15px /> Đăng ký</a>";?></div>
        </div>

    </div>
<script type="text/javascript">
     window.onload = function(){

        setTimeout("ChuyenAnh()",5000);
    }
    var current_image = 0;
    var total_image = 5;
    function ChuyenAnh()
    {
        current_image++;
        document.images['banner'].src="img/banner/"+current_image+".jpg";
        if(current_image == total_image)
            current_image = 0;
        setTimeout("ChuyenAnh()",5000);
    }
     $('#btn-back').click(function(){
            setTimeout("AnhTruoc()",400);
    });
       $('#btn-next').click(function(){
          setTimeout("AnhSau()",400);
    });
     function AnhTruoc()
     {
          current_image--;
            if(current_image < 1)
            {
                current_image = 5;
                document.images['banner'].src="img/banner/"+current_image+".jpg";
                current_image = 4;
            }
            else
            {
                document.images['banner'].src="img/banner/"+current_image+".jpg";
            }
     }
     function AnhSau(){
          current_image++;
            if(current_image > 5)
            {
                current_image = 1;

            }
            document.images['banner'].src="img/banner/"+current_image+".jpg";
     }
</script>
