<link rel="stylesheet" href="css/cart.css">
<?php
  $user_id = $_SESSION['user_id'];
	$sql = "select * from lichsu_temp where history_status='0'";
	$result = mysqli_query($con,$sql);
?>
<div class="div-body-panel" style="height: 911px;">

	<div class="cart-body">
		<table cellpadding="5px">
			<thead>
        <th width="10%" style="text-align: center;"></th>
        <th width="10%" style="text-align: center;">Tình trạng</th>
        <th width="10%" style="text-align: center;">ID người mua</th>
				<th width="10%">Ngày mua</th>
				<th width="15%" style="text-align: center;">Hình ảnh</th>
				<th width="15%">Tên sản phẩm</th>
				<th width="10%" style="text-align: center;">Đơn giá</th>
				<th width="10%" style="text-align: center;">Số lượng</th>
				<th width="10%" style="text-align: center;">Thành tiền</th>
			</thead>
			<?php
				while($row = @mysqli_fetch_array($result))
				{
					$sql1 = "select * from book".$row['history_idtheloai']." where id='".$row['history_idbook']."'";
					$result1 = mysqli_query($con,$sql1);
					$row1 = @mysqli_fetch_array($result1);
					echo '<tr>';
          echo '<td>';
            echo '<font color="blue"><a href="admin/bill_delete.php?id='.$row['history_id'].'" onclick="return huy()">Hủy đơn</a><br><a href="admin/bill_confirm.php?id='.$row['history_id'].'">Xác nhận</a></font>';
          echo '</td>';
          echo '<td>';
            echo '<font color="blue">Chưa xác nhận</font>';
          echo '</td>';
          echo '<td>';
            echo '<font color="blue"><a href="menu.php?menu_taikhoan=list_taikhoan&&bill_user_id='.$row['history_iduser'].'">'.$row['history_iduser'].'</a></font>';
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
</script>
