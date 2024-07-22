<style type="text/css">
	.sanpham-div{
		float:left;
		width: 33.33%;
		height: 295px;
		font-size: 15px;
	}

	.sanpham-left{
		float: left;
		width: 50%;
		height: 255px;
		padding: 3px;
		font-weight: bold;
	}
	.sanpham-id{

		padding: 5px;
	}
	.sanpham-right{
		padding: 5px;
		font-weight: bold;
		width: 50%;
		float: left;
		height: 255px;
		overflow: auto;
	}
	.sanpham-button{
		text-align: right;
	}
	.sanpham-page{
		padding: 1px;
	}
</style>
<?php
	// Lấy toàn bộ thông tin của sách thuộc thể loại đang cần truy vấn
		// Lấy tổng số bản ghi
		$sql = "select count(*) as total from booknews";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$total_record = $row['total'];
		// Lấy số giới hạn hiển thị sản phẩm trong 1 trang
		$limit = 9;
		// Lấy tổng số trang
		$total_page = ceil($total_record/$limit);

		// Lấy trang hiện tại
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		if($current_page < 1)
			$current_page = 1;
		if($current_page > $total_page)
			$current_page = $total_page;

		// Lấy số start
		$start = ($current_page-1)*$limit;
		$sql = "select * from booknews ORDER BY news_id DESC LIMIT $start,$limit";
		$result = mysqli_query($con,$sql);
?>
<div class="div-panel" style="padding-left: 5px;padding-bottom: 3px;">
	SÁCH MỚI VỪA CẬP NHẬT
</div>
<div class="div-body-panel" style="height: 909px;">
	<div class="sanpham-page" style="height: 26px;">
		<!-- Button di chuyển trang trước sau-->
		<div style="float:left;width: 45%;">
			<font color="blue">Trang</font>:
			<a href="index.php?page=1">Đầu</a> |
			<?php if($current_page > 1) echo '<a href="index.php?page='.($current_page-1).'">Trước</a> |';?>
			<?php if($current_page < $total_page) echo '<a href="index.php?page='.($current_page+1).'">Sau</a> |';?>
			<?php echo '<a href="index.php?page='.$total_page.'">Cuối</a> |';?>
		</div>
		<!-- Button di chuyển trang chỉ định-->
		<div style="float:left;width: 55%;text-align: right;">
			<label">
			Tổng số sản phẩm: <b><?php echo $total_record?></b>
			Tổng số trang: <b><?php echo $total_page;?></b> |
			Trang hiện tại: <b><?php echo $current_page;?></b> |
			Đến trang:
			<input style="border-radius: 5px;height: 20px;width: 40px;" type="number" value="1" id="trang"/>
			<a id="go" href="#">
				<img src="img/go.png" width="23px" height="20px">
			</a>
			</label>
		</div>

	</div>
	<div style="height: 885px;border-top: 1px inset #DDDDDD;">
		<?php
		$i = 0;
		while($row = @mysqli_fetch_array($result))
		{
			$i++;
			// Lấy tên thể loại của từng sách
			$id_theloai = $row['news_idtheloai'];
			$sql1 = "select * from theloai where matheloai ='".$id_theloai."'";
			$result1 = mysqli_query($con, $sql1);
			$row1 = @mysqli_fetch_array($result1);
			$theloai = $row1['theloai'];
			// Lấy tên sách của từng sách
			$id_sach = $row['news_idbook'];
			$sql1 = "select * from book".$id_theloai." where id='".$id_sach."'";
			$result1 = mysqli_query($con, $sql1);
			$row1 = @mysqli_fetch_array($result1);
			$tensach = $row1['title'];
			$tacgia = $row1['author'];
			$dongia = $row1['price'];
			// Cắt chuỗi lấy ngày tháng năm
			$ngay_them = substr($row['news_date'], 0, 10);

			echo '<div class="sanpham-div">
				<div class="sanpham-left">
					<div class="sanpham-id">';
						echo '<font color="#FF3366">STT</font>: '.$i.'
					</div>';
					echo '<div class="sanpham-img">
						<img src="img/img_book/'.$id_theloai.'/'.$id_sach.'.jpg" width="163px" height="205px" />
					</div>
				</div>
				<div class="sanpham-right">
					<div class="sanpham-theloai">';
						echo '<font color="#FF3366">Thể loại</font>: '.$theloai.'</div>
					<div class="sanpham-ten">';
						echo '<font color="#FF3366">Tên sách</font>: '.$tensach.'
					</div>
					<div class="sanpham-tacgia">';
						echo '<font color="#FF3366">Tác giả</font>: '.$tacgia.'
					</div>
					<div class="sanpham-gia">';
						echo '<font color="#FF3366">Giá</font>: '.$dongia.' VNĐ
					</div>
					<div class="sanpham-ngay">';
						echo '<font color="#FF3366">Ngày cập nhật</font>:<br> '.$ngay_them.'
					</div>
					<div ><a href="menu.php?menu=sanpham-'.$id_theloai.'-'.$id_sach.'">Xem chi tiết</a></div>
				</div>
				<div class="sanpham-button">';
					if(isset($_SESSION['username'])) echo '<a href="menu.php?menu=cart-'.$id_theloai.'-'.$id_sach.'"><img src="img/btn_buy.gif" width="100px" height="40px" style="padding:5px; "></a>';
				echo '</div>
			</div>';
		}
		?>
	</div>
</div>
<script type="text/javascript">
	$("#go").click(function(){
		var page = $('#trang').val();
		location.href = "index.php?page="+page;
	});
</script>
