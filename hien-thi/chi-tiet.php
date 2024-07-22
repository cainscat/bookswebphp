<?php
	$mang = explode('-', $_SESSION['sanpham']);
	$matheloai = $mang[0];
	$masach = $mang[1];
	$sql="select * from theloai where matheloai='".$matheloai."'";
	$result = mysqli_query($con,$sql);
	$row = @mysqli_fetch_array($result);
	$theloai = $row['theloai'];
	// Lấy số lượng trong kho
	$sql_kho = "select * from kho where kho_idtheloai='".$matheloai."' and kho_idsach='".$masach."'";
	$result_kho = mysqli_query($con,$sql_kho);
	$row_kho = mysqli_fetch_array($result_kho);
	// Lấy toàn bộ thông tin của sách đang xem
	$sql = "select * from book".$matheloai." where id='".$masach."'";;
	$result = mysqli_query($con,$sql);
	$row = @mysqli_fetch_array($result);
	$id = $row['id'];
	$ten = $row['title'];
	$tacgia= $row['author'];
	$nhaxb = $row['nxb'];
	$namxb = $row['namxb'];
	$kichthuoc = $row['kichthuoc'];
	$tomtat = $row['tomtat'];
?>
<style type="text/css">
	   .img-back
    {
        width: 25px;
        height: 25px;
        float:left;
        margin: 10px;
        background: url(img/back.png);
    }
    .img-back:hover
    {
            background: url(img/back-hover.png);
    }
</style>
<div class="div-panel" style="text-align: left;padding-left:5px; padding-bottom: 3px;">
	Danh mục > <?php echo $theloai;?> > <?php echo $ten;?>
</div>
<div class="div-body-panel" style="height: 911px;font-size: 20px;padding: 10px;">
	<div style="font-weight: bold;font-size: 25px;"><?php echo $ten;?></div>
	<div style="width: 28%;float:left;">
				<?php
					echo '<img src="img/img_book/'.$matheloai.'/'.$id.'.jpg" width="260px" height="300px"/>';
				?>
				<div class="sanpham-tacgia">
					<font color="#FF3366">Tác giả</font>: <?php if($tacgia == null)
															echo "Chưa cập nhật...!";
														else
															echo $tacgia;?>
				</div>
				<div class="sanpham-nhaxb" style="clear:both;">
					<font color="#FF3366">Nhà XB</font>: <?php if($nhaxb == null)
															echo "Chưa cập nhật...!";
														else
															echo $nhaxb;?>
				</div>
				<div class="sanpham-namxb">
					<font color="#FF3366">Năm XB</font>:  <?php if($namxb == null)
															echo "Chưa cập nhật...!";
														else
															echo $namxb;?>
				</div>
				<div class="sanpham-kichthuoc">
					<font color="#FF3366">Kích thước</font>: <?php if($kichthuoc == null)
															echo "Chưa cập nhật...!";
														else
															echo $kichthuoc;?>
				</div>
				<div class="sanpham-button"><?php
					if(isset($_SESSION['username']))
						echo '<div style="float:left;"><a href="menu.php?menu=cart-'.$matheloai.'-'.$masach.'"><img src="img/btn_buy.gif" width="100px" height="40px" style="padding:5px; "></a></div>';?>
					<?php echo '<a href="menu.php?menu=theloai-'.$matheloai.'">';?>
					<div class="img-back"></div>
					</a>
				</div>


</div>
<div style="width: 72%;float: left;height: 600px;overflow: auto;">
	<font color="#FF3366">Tóm tắt:</font><br>
	<?php
		if($tomtat == null)
			echo "Chưa cập nhật...!";
		else
			echo $tomtat;?>
</div>

</div>
