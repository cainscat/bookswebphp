<link rel="stylesheet" href="css/cart.css">
<style type="text/css">
	.select-taikhoan{
		height: 35px;
		width: 100px;
		border-radius: 5px;
	}
	.search-taikhoan{
		height: 35px;
		width: 300px;
		border-radius: 5px;
	}
	.button-taikhoan{
		height: 34px;
		width: 100px;
		border-radius: 5px;
		background-color: white;
	}
	td{
		height: 50px;
	}
	tr:hover{
		background-color: pink;
		color: white;
		opacity: 0.9;
	}
</style>
<?php
	require "list_taikhoan_phantrang.php";
?>
<div style="border-top: 1px inset #DDDDDD;">
	<?php
		require "list_taikhoan_timkiem.php";
	?>
	<div style="float:left;margin-top: 3px;width: 83.2%;overflow:auto; height: 843px;">
		<?php
			require "list_taikhoan_tuychon.php"; // xử lí tùy chọn
		?>
		<table style="width: 100%;">
			<thead>
				<th width="35%" style="text-align: center;">Tùy chỉnh</th>
				<th width="5%" 	style="text-align: center;">ID</th>
				<th width="15%" style="text-align: center;">Tài khoản</th>
				<th width="15%" style="text-align: center;">Mật khẩu</th>
				<th width="10%" style="text-align: center;">Vài trò</th>
				<th width="15%" style="text-align: center;">Tình trạng</th>
			</thead>

			<?php
				while($row_account = @mysqli_fetch_array($result_account))
				{
					if($row_account['status'] == "1")
					{
						$row_account['status'] = "Không khóa";
					}
					else
					{
						$row_account['status'] = "Khóa";
					}
					$sql1 = "select * from account_role where id='".$row_account['role']."'";
					$result1 = mysqli_query($con,$sql1);
					$row1 = @mysqli_fetch_array($result1);
					$row_account['role'] = $row1['role'];
					echo '<tr>';
						echo '<td>';
							echo '<a href="?tuychon=delete&&id='.$row_account['user_id'].'" onclick="return xoa()">Delete</a>';
							echo ' <a href="?tuychon=status&&id='.$row_account['user_id'].'">Status</a>';
							echo ' <a href="?tuychon=role&&id='.$row_account['user_id'].'">Role</a>';
							echo ' <a href="?tuychon=details&&id='.$row_account['user_id'].'">Details</a>';
						echo '</td>';
						echo '<td>';
							echo $row_account['user_id'];
						echo '</td>';
						echo '<td>';
							echo $row_account['username'];
						echo '</td>';
						echo '<td>';
							echo $row_account['password'];
						echo '</td>';
						echo '<td>';
							echo $row_account['role'];
						echo '</td>';
						echo '<td>';
							echo $row_account['status'];
						echo '</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<script type="text/javascript">
	function xoa()
	{
		return confirm('Bạn có chắc chắc muốn xóa!');
	}
</script>
