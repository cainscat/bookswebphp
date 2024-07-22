<?php
	/////// PHÂN TRANG /////////////////
		$sql = "select count(*) as total from account";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$total_record = $row['total'];
		// Lấy số giới hạn hiển thị sản phẩm trong 1 trang
		$limit = 20;
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
		if(isset($_GET['timkiem_role']))
		{
			if($_GET['timkiem_role'] == "role_all")
				$sql_account = "select * from account LIMIT $start,$limit";
			else
				$sql_account = "select * from account where role='".$_GET['timkiem_role']."'LIMIT $start,$limit";
		}
		else if(isset($_GET['timkiem_status']))
		{
			if($_GET['timkiem_status'] == "status_all")
				$sql_account = "select * from account LIMIT $start,$limit";
			else
				$sql_account = "select * from account where status='".$_GET['timkiem_status']."'LIMIT $start,$limit";
		}
		else if(isset($_GET['timkiem']))
		{
			$timkiem = $_GET['timkiem'];
			$pattern = "/^[a-zA-Z0-9]*$/";
			if(!preg_match($pattern, $timkiem))
			{
				echo "<script>alert('Không được nhập ký tự đặc biệt!')</script>";
				$sql_account = "select * from account LIMIT $start,$limit";
			}
			else
			{
				$sql_account = "select * from account where user_id='".$timkiem."' or username LIKE '%".$timkiem."%' LIMIT $start,$limit";
			}
		}
		else
		{
			$sql_account = "select * from account LIMIT $start,$limit";
		}
		$result_account = mysqli_query($con,$sql_account);


?>
<div class="sanpham-page" style="height: 26px;font-size:15px;">
		<!-- Button di chuyển trang trước sau-->
		<div style="float:left;width: 25%;">
			<font color="blue">Trang</font>:
			<a href="index.php?page=1">Đầu</a> |
			<?php if($current_page > 1) echo '<a href="index.php?page='.($current_page-1).'">Trước</a> |';?>
			<?php if($current_page < $total_page) echo '<a href="index.php?page='.($current_page+1).'">Sau</a> |';?>
			<?php echo '<a href="index.php?page='.$total_page.'">Cuối</a> |';?>
		</div>
		<!-- Button di chuyển trang chỉ định-->
		<div style="float:left;width: 58%;text-align: right;">
			<label>
			Tổng số tài khoản: <b><?php echo $total_record?></b>
			Tổng số trang: <b><?php echo $total_page;?></b> |
			Trang hiện tại: <b><?php echo $current_page;?></b> |
			Đến trang:
			<input style="border-radius: 5px;height: 20px;width: 40px;" type="number" value="1" id="trang"/>
			<a id="go" onclick="go()">
				<img src="img/go.png" width="23px" height="20px">
			</a>
			</label>
		</div>
</div>
<script type="text/javascript">
	function go()
	{
		var trang = $("#trang").val();
		location.href="?page="+trang;
	}
</script>
