<?php
  if(isset($_POST['matheloai'])&&isset($_POST['theloai_update']))
  {
    $matheloai = $_POST['matheloai'];
    $theloai_update = $_POST['theloai_update'];
    // Lấy tên thể loại vừa sửa
    $sql = "select * from theloai where matheloai='".$matheloai."'";
    $result = mysqli_query($con,$sql);
    $row = @mysqli_fetch_array($result);
    $_SESSION['theloai_vuaupdate'] = $row['theloai'];
    // Thực hiện việc sửa thể loại
    $sql = "update theloai set theloai='".$theloai_update."' where matheloai='".$matheloai."'";
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
				Chọn thể loại:
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
				<input class="btn btn-success" type="submit" value="Sửa" onclick="return kiemtra()"/>
			</td>
		</tr>
    <tr>
			<th>
				Đổi tên thành:
			</th>
			<td colspan="2">
				<input type="text" class="form-control" name="theloai_update" id="theloai_update"/>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>
				Số thể loại hiện có: <b><?php echo $num;?></b><br>
		 <?php if(isset($_POST['matheloai'])) echo "Thể loại: <b>".$_SESSION['theloai_vuaupdate']."</b> đổi tên thành: <b>".$theloai_update."</b>";?>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
  function kiemtra()
  {
    var value = document.getElementById('theloai_update').value;
    if(value == "")
    {
      alert('Bạn chưa nhập tên thể loại!');
      return false;
    }
    return true;

  }
</script>
