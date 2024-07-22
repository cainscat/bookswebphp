<link rel="stylesheet" href="css/cart.css">
<?php
	// Lấy tên mã thể loại và mã sách, id người mua
	$user_id = $_SESSION['user_id'];
	$mang = explode('-', $_SESSION['cart']);
	$matheloai = $mang[0];
	$masach = $mang[1];
	// Lấy giá trị cho button BACK
	if($matheloai != 0)
		$_SESSION['back'] = $matheloai;
	else
		$_SESSION['back'] = 1;
	// Kiểm tra xem người dùng có đăng nhập hay chưa?
	if(!isset($_SESSION['username']))
	{
		$_SESSION['menu'] = "trangchu";
		echo "<script>alert('Bạn chưa đăng nhập!')</script>";
		echo "<script>location.href='index.php'</script>";
	}


	// Nếu 2 mã khác 0 thì thêm vào cơ sỡ dữ liệu
	if($matheloai!= 0 && $masach!=0 )
	{
		// Kiểm tra sách này đã có trong giỏ hàng hay chưa? chưa có thì thêm
		$sql = "select * from cart where cart_user='".$user_id."' and cart_theloai='".$matheloai."' and cart_idbook='".$masach."'";
		$result = mysqli_query($con,$sql);
		$num = @mysqli_num_rows($result);
		if($num < 1) //Chưa có thì thêm
		{
			// Lấy giá tiền của loại sách vừa thêm vào giỏ hàng
			$sql = "select price from book".$matheloai." where id='".$masach."'";
			$result = mysqli_query($con,$sql);
			$row = @mysqli_fetch_array($result);
			$price = $row['price'];
			// Thêm sản phẩm vào giỏ hàng
			$sql = "INSERT INTO `cart`(`cart_user`, `cart_theloai`, `cart_idbook`,`cart_thanhtien`) VALUES ('".$user_id."','".$matheloai."','".$masach."','".$price."')";
			$result = mysqli_query($con,$sql);
		}
	}
	// Lấy tổng tiền của tất cả sản phẩm để hiển thị
	$sql = "select cart_thanhtien from cart";
	$result = mysqli_query($con,$sql);
	$tongtien = 0;
	while($row = @mysqli_fetch_array($result))
	{
		$tongtien = $tongtien + $row['cart_thanhtien'];
	}
	// Lấy số sản phẩm hiện có trong cart của người  dùng đang sử dụng
	$sql = "select count(*) as total from cart where cart_user=".$user_id;
	$result = mysqli_query($con,$sql);
	$row = @mysqli_fetch_array($result);
	$num = $row['total'];
	// Lấy tất cả thông tin các sản phẩm trong giở hàng của người đang sử dụng để hiển thị
	$sql = "select * from cart where cart_user=".$user_id;
	$result = mysqli_query($con,$sql);
?>
<div class="div-panel">
	GIỎ HÀNG
</div>
<div class="div-body-panel" style="height: 911px;">
	<div class="cart-header">
		<!-- Button trở lại-->
		<div style="float: left;width: 15%;">
			<div class="cart-btn" style="width: 130px;">
				<?php echo '<a href="menu.php?menu=theloai-'.$_SESSION['back'].'">';?>
					<div class="img-back"></div>Trở lại
				</a>
			</div>
		</div>
		<div style="float: left;width: 45%;">
			<!-- Tổng giá tiền trong giỏ hàng-->
			<div class="cart-header-label" style="width: 55%;">
				<img src="img/price.png" width="25px" height="25px" style="padding-bottom: 1px;">Tổng giá tiền: <font style="font-weight: bold;"><?php echo $tongtien;?></font> VNĐ
			</div>
			<!-- Button thanh toán-->
			<div class="cart-btn" style="width:40%" onclick="return confirm('Bạn xác nhận mua!')">
				<a href="menu.php?menu=taikhoan&&menu_taikhoan=bill&&buy=true">
					<div class="img-cash-cart"></div>Thanh toán
				</a>
			</div>
		</div>
		<div style="float: left;width: 40%;">
			<!-- Số sản phẩm hiện có trong giỏ hàng-->
			<div class="cart-header-label" style="width: 50%;">
				Hiện có: <font style="font-weight: bold;"><?php echo $num;?></font> sản phẩm
			</div>
			<!-- Button xóa giỏ hàng-->
			<div class="cart-btn" style="width: 45%;">
				<a href="cart/delete-cart.php?id=all">
					<div class="img-clear-cart"></div>Xóa giỏ hàng
				</a>
			</div>
		</div>
	</div>

	<div class="cart-body" style="clear: both;">
		<table cellpadding="5px">
			<thead >
				<th width="15%">Xóa</th>
				<th width="20%" style="text-align: center;">Hình ảnh</th>
				<th width="25%">Tên sản phẩm</th>
				<th width="15%" style="text-align: center;">Đơn giá</th>
				<th width="10%" style="text-align: center;">Số lượng</th>
				<th width="15%" style="text-align: center;">Thành tiền</th>
			</thead>
			<?php
				while($row = @mysqli_fetch_array($result))
				{
					$cart_id = $row['cart_id'];
					$cart_theloai = $row['cart_theloai'];
					$cart_idbook = $row['cart_idbook'];
					// Lấy giá tiền,, title của từng loại sách
					$sql1 = "select * from book".$cart_theloai." where id='".$cart_idbook."'";
					$result1 = mysqli_query($con,$sql1);
					$row1 = @mysqli_fetch_array($result1);
					echo '<tr>';
				?>
					<td><a href="cart/delete-cart.php?id=<?php echo $cart_id;?>.php" onclick="return confirm('Bạn có muốn xóa')".$cmd.'><div class="img-clear-cart" style="margin-left:70px;"></div></a></td>
				<?php
						// Ảnh sách
						echo '<td><img src="img/img_book/'.$cart_theloai.'/'.$cart_idbook.'.jpg" width="80px" heigh="80px"/></td>';
						// Tiêu đề sách
						echo' <td><a href="menu.php?menu=sanpham-'.$cart_theloai.'-'.$cart_idbook.'">'.$row1['title'].'</a></td>';
						// Đơn giá sách
						echo' <td style="padding-bottom:0px;"><p>'.$row1['price'].'</p></td>';
						// Số lượng sách
						echo '<td style="padding-bottom:20px;">';
				?>
						<form id="fsl" action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
						<input type="number" <?php  echo 'name="soluong'.$cart_id.'"';?> style="width: 40px;" value="<?php echo $row['cart_soluong'];?>"
						min="1" max="50"/></td>
				<?php
						// Button cập nhật và thành từng của từng sách
						echo'<td style="padding-bottom:40px;">';
						echo '<input class="cart-btn-capnhat" style="width:100%;" type="submit" value="Cập nhật"/><br>';
								echo $row1['price']*$row['cart_soluong'];
						echo '</td></form>';
					echo '<tr>';
					// Nhấn cập nhật thì sẽ set lại giá tiền của sách muôn cập nhật
					if(isset($_GET['soluong'.$cart_id]))
						{

							$sl = $_GET['soluong'.$cart_id];
							$thanhtien = $sl*$row1['price'];
						 	$sql2 = "update cart set cart_soluong='".$sl."',cart_thanhtien='".$thanhtien."' where cart_id='".$cart_id."'";
						 	$result2 = mysqli_query($con,$sql2);
						 	echo "<script>location.href='menu.php?menu=cart-0-0';</script>";
						}
				}
			?>
		</table>
	</div>
</div>
