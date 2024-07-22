<?php

	if(isset($_POST['matheloai'])&&isset($_POST['masach']))
	{
		// Lấy tên thể loại của sách vừa xóa
		$matheloai = $_POST['matheloai'];
		$sql = "select * from theloai where matheloai='".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$_SESSION['theloaicuasach_vuaxoa'] = $row['theloai'];
		// Lấy tên sách vừa xóa
		$masach = $_POST['masach'];
		$sql = "select * from book".$matheloai." where id='".$masach."'";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$_SESSION['sach_vuaxoa'] = $row['title'];
		// Thực hiện việc xóa sach
		$sql = "delete from book".$matheloai." where id='".$masach."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from lichsu where history_idbook= '".$masach."' and history_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from lichsu_temp where history_idbook= '".$masach."' and history_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from kho where kho_idsach= '".$masach."' and kho_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		// Xóa cập nhật
		$sql = "delete from booknews where news_idtheloai='".$matheloai."' and news_idbook='".$masach."'";
		$result = mysqli_query($con,$sql);

		$_GET['matheloai'] = $matheloai;
	}
	if(isset($_GET['matheloai']))
		{
			// Hiển thị sách theo từng thể loại
			$matheloai = $_GET['matheloai'];
			$sql1 = "select * from book".$matheloai;
			$result1 = mysqli_query($con,$sql1);
			$num = @mysqli_num_rows($result1);
		}
	else
		{
			// Mặc định là thể loại 1
			$sql1 = "select * from book1";
			$result1 = mysqli_query($con,$sql1);
			$num = @mysqli_num_rows($result1);
		}
	// Hiển thị tất cả thể loại trong select
	$sql = "select * from theloai";
	$result = mysqli_query($con,$sql);
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:50px;">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="15">
		<tr>
			<th>
				Tên thể loại:
			</th>
			<td>
				<select class="form-control" style="width: 300px" name="matheloai" id="matheloai" oninput="LayMa()">
					<?php
						while($row = @mysqli_fetch_array($result))
						{
							if(isset($_GET['matheloai']))
							{
								if($_GET['matheloai'] == $row['matheloai'])
								{
								echo '<option selected value='.$row['matheloai'].'>';
									echo $row['theloai'];
								echo '</option>';
								}
								else
								{
									echo '<option value='.$row['matheloai'].'>';
										echo $row['theloai'];
									echo '</option>';
								}
							}
							else
							{
								echo '<option value='.$row['matheloai'].'>';
									echo $row['theloai'];
								echo '</option>';
							}


						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				Tên sách:
			</th>
			<td>
				<select class="form-control" style="width: 300px" name="masach">
					<?php
						while($row1 = @mysqli_fetch_array($result1))
						{
									echo '<option value='.$row1['id'].'>';
										echo $row1['title'];
									echo '</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input class="btn btn-success btn-block" type="submit" value="Xóa" onclick="return confirm('Xác nhận xóa?')">
				<hr>
			</td>
		</tr>
		<tr>
			<td colspan="2">

				<font style="font-size: 16px;">Thể loại đang chọn hiện có: <b><?php echo $num;?> </b>sách<br>
				 <?php if(isset($_POST['matheloai'])) {
				 	echo "Sách vừa xóa: <b>".$_SESSION['sach_vuaxoa']." </b>thuộc thể loại <b>".$_SESSION['theloaicuasach_vuaxoa']."</b>";}?></font>

			</td>
		</tr>
	</table>

</form>
<script type="text/javascript">
	function LayMa()
	{
		var matheloai = $("#matheloai").val();
		location.href = "?matheloai="+matheloai;
	}
</script>
