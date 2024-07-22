<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:20px;">
<?php
	if(isset($_POST['status']))
	{
		$sql = "update account set status='".$_POST['status']."' where user_id='".$_POST['id']."'";
		$result = mysqli_query($con,$sql);
		echo "<script>alert('Thay đổi thành công!');location.href='menu.php?menu=taikhoan&&menu_taikhoan=list_taikhoan';</script>";
	}
	if(isset($_POST['role']))
	{
		$sql = "update account set role='".$_POST['role']."' where user_id='".$_POST['id']."'";
		$result = mysqli_query($con,$sql);
		echo "<script>alert('Thay đổi thành công!');location.href='menu.php?menu=taikhoan&&menu_taikhoan=list_taikhoan';</script>";
	}
	if(isset($_GET['tuychon']))
	{
		if($_GET['tuychon'] == "delete")
		{
			$sql = "delete from account where user_id='".$_GET['id']."'";
			$result = mysqli_query($con,$sql);
			$sql = "delete from lichsu where history_iduser = '".$_GET['id']."'";
			$result = mysqli_query($con,$sql);
			$sql = "delete from lichsu_temp where history_iduser = '".$_GET['id']."'";
			$result = mysqli_query($con,$sql);
			echo "<script>location.href='menu.php?menu=taikhoan&&menu_taikhoan=list_taikhoan';</script>";

		}
		if($_GET['tuychon']=="status")
			{
				echo '
						<table style="font-size: 20px;" align="center" cellpadding="5" border="1" >
							<tr style="background-color:white;">
								<th>
									ID tài khoản:
								</th>
								<th width="30%">
									<input class="form-control col-11"  type="text" readonly name="id" value="'.$_GET['id'].'"/>
								</th>
								<th style="text-align:left;" rowspan="2">
									<input class="btn btn-success btn-block" type="submit" value="Xác nhận" style="height:80px;background-color:#770000;"/>
								</th>
								</tr>
								<tr>
									<th>
										Status:
									</th>
									<th>
										<select class="form-control col-11" name="status">
												<option value="0">Khóa</option>
												<option value="1">Không khóa</option>
										</select>
									</th>
								</tr>
								</table>
							</form>';
				}
				if($_GET['tuychon']=="role")
				{
				echo '
						<table style="font-size: 20px;" align="center" cellpadding="5" border="1" >
							<tr style="background-color:white;">
								<th>
									ID tài khoản:
								</th>
								<th width="30%">
									<input class="form-control col-11"  type="text" readonly name="id" value="'.$_GET['id'].'"/>
								</th>
								<th style="text-align:left;" rowspan="2">
									<input class="btn btn-success btn-block" type="submit" value="Xác nhận" style="height:80px;background-color:#770000;"/>
								</th>
								</tr>
								<tr>
									<th>
										Role:
									</th>
									<th>
										<select class="form-control col-11" name="role">';
										$sql_role = "select * from account_role";
										$result_role = mysqli_query($con,$sql_role);
										while($row_role = @mysqli_fetch_array($result_role))
										{
											echo '<option value='.$row_role['id'].'>';
												echo $row_role['role'];
											echo '</option>';
										}
										echo '</select>
									</th>
								</tr>
								</table>
							</form>';
				}
				if($_GET['tuychon']=="details")
				{
					$sql = "select * from account where user_id='".$_GET['id']."'";
					$result = mysqli_query($con,$sql);
					$row = @mysqli_fetch_array($result);
					if($row['sex'] == '1')
						$row['sex'] = 'Nam';
					else
						$row['sex'] = 'Nữ';
					echo '<div style="border:3px solid;width:35%;margin:auto;padding:6px;margin-bottom:3px;border-radius:25px;background-color:white;">';
					echo 'ID: <b>'.$_GET['id'].'</b> | Tên tài khoản: <b>'.$row['username'].'</b><br>';
					echo 'Họ và tên: <b>'.$row['fullname'].'</b><br>';
					echo 'Giới tính: <b>'.$row['sex'].'</b><br>';
					echo 'Ngày sinh: <b>'.$row['birthday'].'</b><br>';
					echo 'Số điện thoại: <b>'.$row['phone'].'</b><br>';
					echo 'Địa chỉ: <b>'.$row['address'].'</b>';
					echo '</div>';
					echo '</form>';
				}

	}

?>
