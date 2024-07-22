<?php
if(isset($_POST['matheloai']))
	{
		$matheloai = $_POST['matheloai'];
		// Lấy tên thể loại vừa xóa
		$sql = "select * from theloai where matheloai='".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$_SESSION['theloai_vuaxoa'] = $row['theloai'];
		// Thực hiện việc xóa thể loại
		$sql = "delete from theloai where matheloai='".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from lichsu where history_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from lichsu_temp where history_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		$sql = "delete from kho where kho_idtheloai = '".$matheloai."'";
		$result = mysqli_query($con,$sql);
		// Xóa bảng chứa sách của thể loai
		$sql = "DROP TABLE book".$matheloai;
		$result = mysqli_query($con,$sql);
	}
	// Hiển thị các thể loại hiện có ra select
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
				<select class="form-control" style="width: 300px" name="matheloai">
					<?php
						while($row = @mysqli_fetch_array($result))
						{
							echo '<option value='.$row['matheloai'].'>';
								echo $row['theloai'];
							echo '</option>';
						}
					?>
				</select>
			</td>
			<td>
				<input class="btn btn-success" type="submit" value="Xóa" onclick="return confirm('Xác nhận xóa?')" />
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>
				Số thể loại hiện có: <b><?php echo $num;?></b><br>
				 <?php if(isset($_POST['matheloai'])) echo "Thể loại vừa xóa: <b>".$_SESSION['theloai_vuaxoa']."</b>";?>
			</td>
		</tr>
	</table>

</form>
