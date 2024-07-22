<?php
// LẤY SELECT VÀI TRÒ

		$sql_role = "select * from account_role";
		$result_role = mysqli_query($con,$sql_role);

?>
<div style="font-size:15px;">
	<div style="margin-left: 2px;width:41.5%;float: left;margin-top: 2px;">
				Loại tài khoản:
				<select class="select-taikhoan" id="timkiem_role" oninput="timkiem_role()">
					<option value="role_all">Tất cả</option>
					<?php
						while($row_role = @mysqli_fetch_array($result_role))
						{
							if($_GET['timkiem_role']==$row_role['id'])
							{
								echo '<option selected value='.$row_role['id'].'>';
									echo $row_role['role'];
								echo '</option>';
							}
							else
							{
								echo '<option value='.$row_role['id'].'>';
									echo $row_role['role'];
								echo '</option>';
							}
						}
					?>
				</select>
				Tình trạng:
				<select class="select-taikhoan" id="timkiem_status" oninput="timkiem_status()">
					<option <?php if(isset($_GET['timkiem_status']))if($_GET['timkiem_status']=="status_all") echo "selected";?> value="status_all">Tất cả</option>
					<option <?php if(isset($_GET['timkiem_status']))if($_GET['timkiem_status']=="0") echo "selected";?> value="0">Khóa</option>
					<option <?php if(isset($_GET['timkiem_status']))if($_GET['timkiem_status']=="1") echo "selected";?> value="1">Không khóa</option>
				</select>

	</div>
	<div style="width:41.5%;float: left;margin-top: 2px;">
			<input type="text" id="timkiem" placeholder="Nhập id hoặc username tài khoản cần tìm" class="search-taikhoan" onchange="return timkiem_validator()"/>
			<input type="submit" class="button-taikhoan" value="Tìm kiếm" onclick="return timkiem_validator()">
	</div>
</div>
<script type="text/javascript">
<?php
 	if(isset($_SESSION['bill_user_id']))
	{
		$sql_bill_user = "select * from account where user_id ='".$_SESSION['bill_user_id']."'";
		$result_bill_user = mysqli_query($con,$sql_bill_user);
		$row_bill_user = @mysqli_fetch_array($result_bill_user);

	echo 'window.onload = function(){
				location.href = "?timkiem='.$row_bill_user['username'].'";
			};';
		unset($_SESSION['bill_user_id']);
	}
?>

	function timkiem_role()
	{
		var role = $("#timkiem_role").val();
		location.href="?timkiem_role="+role;
	}
	function timkiem_status()
	{
		var role = $("#timkiem_status").val();
		location.href="?timkiem_status="+role;
	}
	function timkiem_validator()
	{
		var timkiem= $("#timkiem").val();
		if(timkiem == '')
		{
			alert('Chưa nhập id hoặc username cần tìm!');
			return false;
		}
		location.href = "?timkiem="+timkiem;
		return true;
	}
</script>
