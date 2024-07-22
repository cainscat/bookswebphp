<?php
	if(isset($_POST['password']))
	{
		$select = $_POST['select'];
		$password = $_POST['password'];
		$pattern = "/^[a-zA-Z0-9]{5,20}$/";
		$num = 0;
		if(!preg_match($pattern, $password))
		{
			echo "<script>alert('Tài khoản và mật khẩu không có ký tự đặt biệt và độ dài từ 6 đến 20 ký tự')</script>";
		}
		else
		{
			$password = md5($_POST['password']);
			$sql = "select * from account where role='1' and password='".$password."'";
			$result = mysqli_query($con,$sql);
			$num = @mysqli_num_rows($result);
			if($num > 0)
			{
				if($select == "khongkhoa" || $select == "khoa")
				{
					if($select == "khongkhoa")
						$str = "where status='1'";
					else if($select == "khoa")
					$str = "where status='0'";
					$sql = "delete from account ".$str;
				}
				else
					$sql = "delete from account where role='".$select."'";
				$result = mysqli_query($con,$sql);
			}
			else
			{
				echo "<script>alert('Sai mật khẩu!')</script>";
			}
		}

	}
	$sql = "select * from account_role";
	$result = mysqli_query($con,$sql);
?>
<form id="form1"action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:20px;">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="5">
		<?php
		// Kiểm tra nếu bảng sách mới chưa có gì thì ko hiển thị
		if(isset($_POST['password']))
		{
			if($num > 0)
			{
				echo '<tr>';
					echo '<td colspan="2">';
						echo '<font style="font-size: 16px;font-family: consola;">';
								echo 'Xóa thành công!';
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
				<select class="form-control" name="select">
					<option value="khongkhoa">Không khóa</option>
					<option value="khoa">Khóa</option>
					<?php
						while($row = @mysqli_fetch_array($result))
						{
								echo '<option selected value='.$row['id'].'>';
									echo $row['role'];
								echo '</option>';
						}
					?>
				</select>
			</td>
		</tr>
			<th>
				Nhập lại mật khẩu Admin:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="password" name="password" id="password"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input class="btn btn-success btn-block" type="submit" value="Xóa" onclick="return kiemtra()"/>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function kiemtra()
	{
		var password = $("#password").val();
		if(password=='')
		{
			alert('Chưa nhập pass admin!');
			return false;
		}
		if(confirm('Bạn có chắc chắn xóa?') == false)
			return false;
		if(confirm('Suy nghĩ kĩ chưa?') == false)
			return false;
		return true;
	}
</script>
