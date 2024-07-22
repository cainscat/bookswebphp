<link rel="stylesheet" href="css/cart.css">
<?php
	$user_id = $_SESSION['user_id'];
	if(isset($_SESSION['buy']))
	{
		$sql = "select * from cart where cart_user = '".$user_id."'";
		$result = mysqli_query($con,$sql);
		$num = @mysqli_num_rows($result);
		if($num < 1)
		{
			echo '<script>alert("Không có sản phẩm nào trong giỏ hàng để thành toán!")</script>';
			echo '<script>location.href="menu.php?menu=cart-0-0"</script>';
		}
		while($row = @mysqli_fetch_array($result))
		{
			$matheloai = $row['cart_theloai'];
			$masach = $row['cart_idbook'];
			$soluong = $row['cart_soluong'];
			$thanhtien = $row['cart_thanhtien'];
			/// VỪA ĐƯỢC THÊM --------------------------
			$sql_kho = "select * from kho where kho_idtheloai='".$matheloai."' and kho_idsach='".$masach."'";
			$result_kho = mysqli_query($con,$sql_kho);
			$row_kho = mysqli_fetch_array($result_kho);
			if($row_kho['kho_soluong'] == 0)
			{
				$sql1 = "INSERT INTO `lichsu_temp`(`history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`,`history_status`) VALUES ('".$date_current."','".$user_id."','".$matheloai."','".$masach."','".$soluong."','".$thanhtien."','3')";
				$result1 = mysqli_query($con,$sql1) or die('Thêm không thành công!');
			}
			else if ($row_kho['kho_soluong'] < $soluong)
			{
				$sql1 = "INSERT INTO `lichsu_temp`(`history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`,`history_status`) VALUES ('".$date_current."','".$user_id."','".$matheloai."','".$masach."','".$soluong."','".$thanhtien."','4')";
				$result1 = mysqli_query($con,$sql1) or die('Thêm không thành công!');
			}
			else if($soluong == 0)
			{
				$sql1 = "INSERT INTO `lichsu_temp`(`history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`,`history_status`) VALUES ('".$date_current."','".$user_id."','".$matheloai."','".$masach."','".$soluong."','".$thanhtien."','5')";
				$result1 = mysqli_query($con,$sql1) or die('Thêm không thành công!');
			}
			else
			{
				// Thêm vào bảng lịch sử tạm thời của người dùng
				$sql1 = "INSERT INTO `lichsu_temp`(`history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`) VALUES ('".$date_current."','".$user_id."','".$matheloai."','".$masach."','".$soluong."','".$thanhtien."')";
				$result1 = mysqli_query($con,$sql1) or die('Thêm không thành công!');
			}
		}
		$sql = "delete from cart where cart_user = '".$user_id."'";
		$result = mysqli_query($con,$sql);
		unset($_SESSION['buy']);
		echo '<script>alert("Đơn hàng của bạn đã được lưu! Sản phẩm sẽ được gửi đến địa chỉ mà bạn đã đăng ký nếu đơn hàng được xác nhận!")</script>';
	}
	$sql = "select * from lichsu_temp where history_iduser='".$user_id."' and history_status!=1 ";
	$result = mysqli_query($con,$sql);
?>
<div class="div-body-panel" style="height: 911px;">

	<div class="cart-body">
		<table cellpadding="5px">
			<thead>
        <th width="10%" style="text-align: center;"></th>
        <th width="10%" style="text-align: center;">Tình trạng</th>
				<th width="10%">Ngày mua</th>
				<th width="15%" style="text-align: center;">Hình ảnh</th>
				<th width="20%">Tên sản phẩm</th>
				<th width="15%" style="text-align: center;">Đơn giá</th>
				<th width="10%" style="text-align: center;">Số lượng</th>
				<th width="10%" style="text-align: center;">Thành tiền</th>
			</thead>
			<?php
				while($row = @mysqli_fetch_array($result))
				{
					/// VỪA ĐƯỢC THÊM ------------------------------------
          if($row['history_status'] == 0 )
            $row['history_status'] = 'Chưa xác nhận';
          else if($row['history_status'] == 2)
            $row['history_status'] = 'Đã bị hủy';
						else if($row['history_status'] == 3)
							$row['history_status'] = 'Đã hết hàng';
							else if($row['history_status'] == 4)
								$row['history_status'] = 'Không đủ hàng để bán';
								else if($row['history_status'] == 5)
									$row['history_status'] = 'Bị hủy do mua với số lượng bằng 0';
					$sql1 = "select * from book".$row['history_idtheloai']." where id='".$row['history_idbook']."'";
					$result1 = mysqli_query($con,$sql1);
					$row1 = @mysqli_fetch_array($result1);
					echo '<tr>';
          echo '<td>';
					?>
            	<font color="blue"><?php if($row['history_status'] == 'Chưa xác nhận') echo '<a href="tai-khoan/delete_bill.php?id='.$row['history_id'].'" onclick="return huy()">Hủy đơn hàng</a>'; else echo '<a href="tai-khoan/delete_bill.php?id='.$row['history_id'].'" onclick="return xoa()">Xóa</a>';?></font>
					<?php
					echo '</td>';
          echo '<td>';
            echo '<font color="blue">'.$row['history_status'].'</font>';
          echo '</td>';
						echo '<td>';
							echo '<font color="blue">'.$row['history_date'].'</font>';
						echo '</td>';
						echo '<td>';
							echo '<img src="img/img_book/'.$row['history_idtheloai'].'/'.$row['history_idbook'].'.jpg" width="80px" heigh="80px"/>';
						echo '</td>';
						echo '<td>';
							echo '<a href="menu.php?menu=sanpham-'.$row['history_idtheloai'].'-'.$row['history_idbook'].'">'.$row1['title'].'</a>';
						echo '</td>';
						echo '<td>';
							echo $row1['price'];
						echo '</td>';
						echo '<td>';
							echo $row['history_num'];
						echo '</td>';
						echo '<td>';
							echo $row['history_totalprice'];
						echo '</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<script type="text/javascript">
  function huy()
  {
    var t = confirm("Bạn chắc chắn muốn hủy đơn hàng này?");
    return t;
  }
	function xoa()
	{
		var t = confirm("Bạn chắc chắn muốn xóa đơn hàng này?");
		return t;
	}
</script>
