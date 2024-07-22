<?php
	if(isset($_POST['username'])&&isset($_POST['password']))
	{
		$role = $_POST['role'];
		$username = $_POST['username'];
		$password =$_POST['password'];
		$pattern = "/^[a-zA-Z0-9]{5,20}$/";
		$num = 1;
		if(!preg_match($pattern, $username)||!preg_match($pattern, $password))
		{
			echo "<script>alert('Tài khoản và mật khẩu không có ký tự đặt biệt và độ dài từ 6 đến 20 ký tự')</script>";
		}
		else
		{
			$password = md5($_POST['password']);
			$sql="select * from account where username='".$username."'";
			$result = mysqli_query($con,$sql);
			$num = @mysqli_num_rows($result);
			if($num > 0)
			{
				echo "<script>alert('Tài khoản đã tồn tại!')</script>";
			}
			else
			{
				$sql = "INSERT INTO `account`(`role`, `username`, `password`) VALUES ('".$role."','".$username."','".$password."')";
				$result = mysqli_query($con,$sql);
			}
		}
	}
	$sql_role = "select * from account_role";
	$result_role = mysqli_query($con,$sql_role);
?>
<form id="form1"action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:20px;">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="5">
		<?php
		// Kiểm tra nếu bảng sách mới chưa có gì thì ko hiển thị
		if(isset($_POST['username'])&&isset($_POST['password']))
		{
			if($num < 1)
			{
				echo '<tr>';
					echo '<td colspan="2">';
						echo '<font style="font-size: 16px;font-family: consola;">';
								echo 'Tên tài khoản vừa thêm: <font style="font-weight: bold;">'.$username.'</font>';
						echo '<hr>';
					echo '</td>';
				echo '</tr>';
			}
		}
		?>
		<tr>
			<th>
				Loại tài khoản:
			</th>
			<td>
				<select class="form-control" name="role" id="role">
					<?php
						while($row_role = @mysqli_fetch_array($result_role))
						{
								echo '<option selected value='.$row_role['id'].'>';
									echo $row_role['role'];
								echo '</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				Tên tài khoản:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="username" id="username"/>
			</td>
		</tr>
		<tr>
			<th>
				Mật khẩu:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="password" id="password"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input class="btn btn-success btn-block" type="submit" value="Thêm" onclick="return kiemtra()"/>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function kiemtra()
	{
		var username = $("#username").val();
		var password = $("#password").val();
		if(username == '' || password=='')
		{
			alert('Chưa nhập đủ thông tin!');
			return false;
		}
		return true;
	}
</script>
