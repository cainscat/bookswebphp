<?php
	if(isset($_POST['theloai']))
	{
		$theloai = $_POST['theloai'];
		// Kiểm tra thể loại có tồn tại chưa
		$sql = "select * from theloai where theloai='".$theloai."'";
		$result = mysqli_query($con,$sql);
		$num = @mysqli_num_rows($result);
		if($num < 1)
		{
			$sql = "INSERT INTO `theloai`(`theloai`) VALUES ('".$theloai."')";
			$result = mysqli_query($con,$sql);
			// Lấy mã thể loại vừa thêm để tạo thư mục ảnh của thể loại này
			$sql = "select * from theloai where matheloai = (select MAX(matheloai) from theloai)";
			$result = mysqli_query($con,$sql);
			$row = @mysqli_fetch_array($result);
			$matheloai_vuathem = $row['matheloai'];
			$duong_dan = "img/img_book/".$row['matheloai'];
			// Chưa có thư mục thì tạo rá
			if(!is_dir($duong_dan))
			{
				@mkdir($duong_dan);
			}
			// Câu lệnh tạo bảng của thể loại mới
			$sql = "CREATE TABLE book".$matheloai_vuathem." (id int PRIMARY KEY AUTO_INCREMENT,title varchar(255),author varchar(100), price int,tomtat mediumtext,nxb varchar(255),sotrang int,kichthuoc varchar(255),namxb varchar(255))";
			$result = mysqli_query($con,$sql);
		}
	}
	// Lấy tên của thể loại vừa thêm
		$sql = "select * from theloai where matheloai = (select MAX(matheloai) from theloai)";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$theloai_vuathem = $row['theloai'];
		// Lấy số lượng thể loại hiện có
		$sql = "select * from theloai";
		$result = mysqli_query($con,$sql);
		$num = @mysqli_num_rows($result); 
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:50px;">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="15">
		<tr>
			<th>
				Tên thể loại:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="theloai" id="theloai"/>
			</td>
			<td>
				<input class="btn btn-success" type="submit" value="Thêm" onclick="return kiemtra()" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>
				Số thể loại hiện có: <b><?php echo $num;?></b><br>
				Thể loại vừa thêm: <b><?php echo $theloai_vuathem;?></b>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function kiemtra()
	{
		var theloai = $("#theloai").val();
		if(theloai == '')
		{
			alert('Chưa nhập tên thể loại');
			return false;
		}
		return true;
	}
</script>
