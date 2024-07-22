<?php
	if(isset($_POST['tensach']))
	{
		$matheloai = $_POST['matheloai'];
		$tensach = $_POST['tensach'];
		$tacgia = $_POST['tacgia'];
		$mota = $_POST['mota'];
		$nhaxb = $_POST['nhaxb'];
		$namxb = $_POST['namxb'];
		$sotrang = $_POST['sotrang'];
		$kichthuoc = $_POST['kichthuoc'];
		$dongia = $_POST['dongia'];
		$soluong = $_POST['soluong'];
		$img = $_FILES['img']['name'];
		// Cắt lấy phần đuôi ảnh , kiểm tra định dạng xem có hợp lệ ,
		$mang = explode(".", $img);
		$phan_mo_rong = $mang[1];
		if($phan_mo_rong != 'png' && $phan_mo_rong != 'jpg' && $phan_mo_rong != 'jpeg')
		{
			echo "<script>alert('Không đúng định dạng ảnh (png, jpg, jpeg)');</script>";
		}
		else
		{
			// Chuyển hết ảnh hợp lệ về đuôi jpg
			if($phan_mo_rong == 'png' || $phan_mo_rong == 'jpeg')
			{
				$phan_mo_rong = 'jpg';
			}
			// Kiểm tra sách được thêm đã tồn tại hay chứa
			$sql = "select * from book".$matheloai." where title ='".$tensach."'";
			$result = @mysqli_query($con, $sql);
			$num = $num = @mysqli_num_rows($result);
			if($num < 1)
			{
			// Thêm sách vào
				$sql = "INSERT INTO `book".$matheloai."`(`title`, `author`, `price`, `tomtat`, `nxb`, `sotrang`, `kichthuoc`, `namxb`) VALUES ('".$tensach."','".$tacgia."','".$dongia."','".$mota."','".$nhaxb."','".$sotrang."','".$kichthuoc."','".$namxb."')";
				$result = mysqli_query($con, $sql);
				// Lấy id của sách vừa được thêm, gán vào tên ảnh đại diện của sách, sau đó upload ảnh
				$sql = "select * from book".$matheloai." where id = (select MAX(id) from book".$matheloai.")";
				$result = mysqli_query($con, $sql);
				$row = @mysqli_fetch_array($result);
				$masach = $row['id'];
				$ten_anh = $row['id'];
				$ten_anh_day_du = $ten_anh.".".$phan_mo_rong;
				$duong_dan_dich = "img/img_book/".$matheloai."/".$ten_anh_day_du;
				@move_uploaded_file($_FILES['img']['tmp_name'], $duong_dan_dich);
				// Thêm hàng vào kho
				$sql_kho = "INSERT INTO `kho`(`kho_idtheloai`, `kho_idsach`, `kho_soluong`) VALUES ('".$matheloai."','".$masach."','".$soluong."')";
				$result_kho = mysqli_query($con,$sql_kho);
				// Thêm 1 record vào bảng sách mới
				$sql = "INSERT INTO `booknews`(`news_idtheloai`, `news_idbook`, `news_date`) VALUES ('".$matheloai."','".$row['id']."','".$date_current."')";
				$result = mysqli_query($con, $sql);
			}
		}
	}
	else
	{
		$matheloai = 1;
	}

	$sql = "select * from booknews where news_id = (select MAX(news_id) from booknews)";
	$result = mysqli_query($con,$sql);
	$row = @mysqli_fetch_array($result);
	$num = @mysqli_num_rows($result);
	if($num > 0)
	{
		// Lấy tên thể loại vừa thêm
		$idtheloai_vuathem = $row['news_idtheloai'];
		$sql = "select * from theloai where matheloai ='".$idtheloai_vuathem."'";
		$result = mysqli_query($con,$sql);
		$row1 = @mysqli_fetch_array($result);
		$tentheloai_vuathem = $row1['theloai'];
		// Lấy tên sách vừa thêm
		$idbook_vuathem = $row['news_idbook'];
		$sql = "select * from book".$idtheloai_vuathem." where id ='".$idbook_vuathem."'";
		$result = mysqli_query($con,$sql);
		$row1 = @mysqli_fetch_array($result);
		$tensach_vuathem = $row1['title'];
		// Lấy ngày vừa thêm
		$ngay_vuathem = $row['news_date'];
	}
	$sql = "select * from theloai";
	$result = mysqli_query($con,$sql);
?>
<form id="form1"action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:20px;" enctype="multipart/form-data">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="5">
		<?php
		// Kiểm tra nếu bảng sách mới chưa có gì thì ko hiển thị
			if($num > 0)
			{
				echo '<tr>';
					echo '<td colspan="2">';
						echo '<font style="font-size: 16px;font-family: consola;">';
								echo 'Tên sách vừa thêm: <font style="font-weight: bold;"><a href="menu.php?menu=sanpham-'.$idtheloai_vuathem.'-'.$idbook_vuathem.'">'.$tensach_vuathem.'</a></font><br>';
								echo 'ID: <font style="font-weight: bold;"><a href="menu.php?menu=sanpham-'.$idtheloai_vuathem.'-'.$idbook_vuathem.'">'.$idbook_vuathem.'</a></font><br>';
								echo 'Thuộc thể loại: <font style="font-weight: bold;"><a href="menu.php?menu=theloai-'.$idtheloai_vuathem.'">'.$tentheloai_vuathem.'</a></font><br>';
								echo 'Ngày thêm: <font style="font-weight: bold;">'.$ngay_vuathem.'</font>';
							echo '</font>';
						echo '<hr>';
					echo '</td>';
				echo '</tr>';
			}
		?>
		<tr>
			<th>
				Chọn thể loại:
			</th>
			<td>
				<select class="form-control" name="matheloai" id="matheloai">
					<?php
						while($row = @mysqli_fetch_array($result))
						{
							if($matheloai == $row['matheloai'])
							{
								echo '<option selected value='.$row['matheloai'].'>';
									echo $row['theloai'];
								echo '</option>';
							}
							else
							{
								echo '<option value='.$row['matheloai'].'>';
									echo $row['theloai'];
								echo '</option>';
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				Tên sách:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="tensach" id="tensach"/>
			</td>
		</tr>
		<tr>
			<th>
				Tác giả:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="tacgia"/>
			</td>
		</tr>
		<tr>
			<th>
				Mô tả:
			</th>
			<td>
				<textarea class="form-control" name="mota" cols="50" rows="8"></textarea>
			</td>
		</tr>
		<tr>
			<th>
				Nhà xuất bản:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="nhaxb"/>
			</td>
		</tr>
		<tr>
			<th>
				Năm xuất bản:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="namxb"/>
			</td>
		</tr>
		<tr>
			<th>
				Số trang:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="number" name="sotrang" min="1"/>
			</td>
		</tr>
		<tr>
			<th>
				Kích thước:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="kichthuoc"/>
			</td>
		</tr>
		<tr>
			<th>
				Số lượng:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="number" name="soluong" min="1" value="0"/>
			</td>
		</tr>
		<tr>
			<th>
				Đơn giá:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="number" name="dongia" min="1" value="0"/>
			</td>
		</tr>
		<tr>
			<th>
				Chọn ảnh:
			</th>
			<td>
				<input class="form-control" style="width: 400px;" type="file" name="img" id="img" >
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
		var img = $("#img").val();
		var tensach = $("#tensach").val();
		if(tensach == '')
		{
			alert('Chưa nhập tên sách');
			return false;
		}
		if(img == '')
		{
			alert('Chưa chọn ảnh upload');
			return false;
		}
		return true;
	}
</script>
