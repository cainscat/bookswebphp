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
	$matheloai = $_SESSION['theloai'];
	// Lấy tên thể loại
	$sql="select * from theloai where matheloai='".$matheloai."'";
	$result = mysqli_query($con,$sql);
	$row = @mysqli_fetch_array($result);
	$theloai = $row['theloai'];
	// Lấy toàn bộ thông tin của sách thuộc thể loại đang cần truy vấn
		// Lấy tổng số bản ghi
		$sql = "select count(*) as total from book".$matheloai;
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
		$sql = "select * from book".$matheloai." ORDER BY id DESC LIMIT $start,$limit";
		$result = mysqli_query($con,$sql);
?>
<div class="div-panel" style="text-align: left;padding-left: 5px;padding-bottom: 3px;">
	Danh mục > <?php echo $theloai;?>
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
			<label>
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
		while($row = @mysqli_fetch_array($result))
		{
			$id = $row['id'];
			$ten = $row['title'];
			$tacgia= $row['author'];
			$gia = $row['price'];

			echo '<div class="sanpham-div">
				<div class="sanpham-left">
					<div class="sanpham-id">';
						echo '<font color="#FF3366">Mã sách</font>: '.$id.'
					</div>';
					echo '<div class="sanpham-img">
						<img src="img/img_book/'.$matheloai.'/'.$id.'.jpg" width="163px" height="205px" />
					</div>
				</div>
				<div class="sanpham-right">
					<div class="sanpham-ten">';
						echo '<font color="#FF3366">Tên sách</font>: '.$ten.'
					</div>
					<div class="sanpham-tacgia">';
						echo '<font color="#FF3366">Tác giả</font>: '.$tacgia.'
					</div>
					<div class="sanpham-gia">';
						echo '<font color="#FF3366">Giá</font>: '.$gia.' VNĐ
					</div>
					<div ><a href="menu.php?menu=sanpham-'.$matheloai.'-'.$id.'">Xem chi tiết</a></div>
				</div>
				<div class="sanpham-button">';
					if(isset($_SESSION['username'])) echo '<a href="menu.php?menu=cart-'.$matheloai.'-'.$id.'"><img src="img/btn_buy.gif" width="100px" height="40px" style="padding:5px; "></a>';
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
