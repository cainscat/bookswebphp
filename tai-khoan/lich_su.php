<link rel="stylesheet" href="css/cart.css">
<?php
	$user_id = $_SESSION['user_id'];
	$sql = "select * from lichsu_temp where history_iduser = '".$user_id."' and history_status='1'";
	$result = mysqli_query($con,$sql);
?>
<div class="div-body-panel" style="height: 911px;">
	<div class="cart-header">
		<div class="cart-btn" style="width: 15%;margin-left:68%;">
			<a href="tai-khoan/delete_lich_su.php">
				<div class="img-clear-cart"></div>Xóa lịch sử
			</a>
		</div>
	</div>
	<div class="cart-body">
		<table cellpadding="5px">
			<thead>
				<th width="15%">Ngày mua</th>
				<th width="20%" style="text-align: center;">Hình ảnh</th>
				<th width="25%">Tên sản phẩm</th>
				<th width="15%" style="text-align: center;">Đơn giá</th>
				<th width="10%" style="text-align: center;">Số lượng</th>
				<th width="15%" style="text-align: center;">Thành tiền</th>
			</thead>
			<?php
				while($row = @mysqli_fetch_array($result))
				{
					$sql1 = "select * from book".$row['history_idtheloai']." where id='".$row['history_idbook']."'";
					$result1 = mysqli_query($con,$sql1);
					$row1 = @mysqli_fetch_array($result1);
					echo '<tr>';
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
