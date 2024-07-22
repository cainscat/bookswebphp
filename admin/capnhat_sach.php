<?php

	if(isset($_POST['tacgia'])&&isset($_POST['mota'])&&isset($_POST['nhaxb'])&&isset($_POST['namxb'])&&isset($_POST['sotrang'])&&isset($_POST['kichthuoc'])&&isset($_POST['dongia']))
	{
		$masach =  $_POST['masach'];
		$matheloai = $_POST['matheloai'];
		$tacgia = $_POST['tacgia'];
		$mota = $_POST['mota'];
		$nhaxb = $_POST['nhaxb'];
		$namxb = $_POST['namxb'];
		$sotrang = $_POST['sotrang'];
		$kichthuoc = $_POST['kichthuoc'];
		$dongia = $_POST['dongia'];
		$img = $_FILES['img']['name'];
		// Kiểm tra ảnh của sách có được upload hay ko
		if($img)
		{
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
				$ten_anh_day_du = $masach.".".$phan_mo_rong;
				$duong_dan_dich = "img/img_book/".$matheloai."/".$ten_anh_day_du;
				move_uploaded_file($_FILES['img']['tmp_name'], $duong_dan_dich);
				echo "<script>alert('Cập nhật ảnh thành công!')</script>";
			}
		}
		// Kiểm tra thông tin cập nhật của sách có trùng hết hay không và fix lỗi F5 cập nhật lại
		$sql = "select * from book".$matheloai." where id='".$masach."' and author ='".$tacgia."' and tomtat='".$mota."' and nxb='".$nhaxb."' and namxb='".$namxb."' and sotrang='".$sotrang."' and kichthuoc='".$kichthuoc."' and price='".$dongia."'";
		$result = mysqli_query($con, $sql);
		$num = @mysqli_num_rows($result);
		if($num < 1)
		{
			// Lấy tên thể loại vừa thêm
			$sql = "select * from theloai where matheloai ='".$matheloai."'";
			$result = mysqli_query($con,$sql);
			$row1 = @mysqli_fetch_array($result);
			$tentheloai_vuacapnhat = $row1['theloai'];
			// Lấy tên sách vừa thêm
			$sql = "select * from book".$matheloai." where id ='".$masach."'";
			$result = mysqli_query($con,$sql);
			$row1 = @mysqli_fetch_array($result);
			$tensach_vuacapnhat = $row1['title'];
			// Lấy ngày vừa thêm
			$ngay_vuacapnhat = $date_current;
			// Cập nhật sách
			$sql = "update book".$matheloai." set author ='".$tacgia."',tomtat='".$mota."',nxb='".$nhaxb."',namxb='".$namxb."',sotrang='".$sotrang."',kichthuoc='".$kichthuoc."',price='".$dongia."' where id='".$masach."'";
			$result = mysqli_query($con, $sql);
			// Lấy status để hiển thị thông tin sách vừa được cập nhật
		$_SESSION['status'] = 1;

		}
		// Cho 2 option select lại sách và thể loại vừa thêm
		$_GET['matheloai'] = $matheloai;
		$_GET['masach'] = $masach;

	}
	if(isset($_GET['matheloai']))
	{
		// Hiển thị sách theo từng thể loại
		$matheloai1 = $_GET['matheloai'];
		$sql1 = "select * from book".$matheloai1;
		$result1 = mysqli_query($con,$sql1);
		if(isset($_GET['masach']))
		{
			// Hiển thị thông tin của từng sách
			$masach1 = $_GET['masach'];
			$sql2 = "select * from book".$matheloai1." where id='".$masach1."'";
			$result2 = mysqli_query($con,$sql2);
			$row2 = @mysqli_fetch_array($result2);
		}
		else
		{
			// Mặc định hiển thị sách có id 1
			$masach1 = 1;
			$sql2 = "select * from book".$matheloai1." where id=1";
			$result2 = mysqli_query($con,$sql2);
			$row2 = @mysqli_fetch_array($result2);
		}
	}
	else
	{
			// Mặc định là thể loại 1
		$matheloai1 = 1;
		$masach1 = 1;
		$sql1 = "select * from book1";
		$result1 = mysqli_query($con,$sql1);
		// Mặc định là sách 1 của thể loại 1
		$sql2 = "select * from book1 where id=1";
		$result2 = mysqli_query($con,$sql2);
		$row2 = @mysqli_fetch_array($result2);
	}
	// Hiển thị select các thể loại
	$sql = "select * from theloai";
	$result = mysqli_query($con,$sql);
?>
<form id="form1"action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:20px;" enctype="multipart/form-data">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="5">
		<?php
			if(isset($_SESSION['status']))
			{
				unset($_SESSION['status']);
				echo '<tr>';
					echo '<td colspan="3">';
						echo '<font style="font-size: 16px;font-family: consola;">';
								echo 'Tên sách vừa cập nhật: <font style="font-weight: bold;"><a href="menu.php?menu=sanpham-'.$matheloai.'-'.$masach.'">'.$tensach_vuacapnhat.'</a></font><br>';
								echo 'ID: <font style="font-weight: bold;"><a href="menu.php?menu=sanpham-'.$matheloai.'-'.$masach.'">'.$masach.'</a></font><br>';
								echo 'Thuộc thể loại: <font style="font-weight: bold;"><a href="menu.php?menu=theloai-'.$matheloai.'">'.$tentheloai_vuacapnhat.'</a></font><br>';
								echo 'Ngày cập nhật: <font style="font-weight: bold;">'.$ngay_vuacapnhat.'</font>';
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
			<td colspan="2">
				<select class="form-control" name="matheloai" id="matheloai" oninput="LayMaTheLoai()">
					<?php
						while($row = @mysqli_fetch_array($result))
						{
								if(isset($_GET['matheloai']))
							{
								if($_GET['matheloai'] == $row['matheloai'])
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
			<td colspan="2">
				<select class="form-control" name="masach" id="masach" oninput="LayMaSach()">
					<?php
						while($row1 = @mysqli_fetch_array($result1))
						{
							if(isset($_GET['masach']))
							{
								if($_GET['masach'] == $row1['id'])
								{
									echo '<option selected value='.$row1['id'].'>';
										echo $row1['title'];
									echo '</option>';
								}
								else
								{
									echo '<option value='.$row1['id'].'>';
										echo $row1['title'];
									echo '</option>';
								}
							}
							else
								{
									echo '<option value='.$row1['id'].'>';
										echo $row1['title'];
									echo '</option>';
								}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				Tác giả:
			</th>
			<td colspan="2">
				<input class="form-control" style="width: 300px;" type="text" name="tacgia" value="<?php echo $row2['author'];?>" />
			</td>
		</tr>
		<tr>
			<th>
				Mô tả:
			</th>
			<td colspan="2">
				<textarea class="form-control" name="mota" cols="50" rows="8"><?php echo $row2['tomtat']?></textarea>
			</td>
		</tr>
		<tr>
			<th>
				Nhà xuất bản:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="nhaxb" value="<?php echo $row2['nxb'];?>"/>
			</td>
			<td rowspan="6">
				<img src="img/img_book/<?php echo $matheloai1;?>/<?php echo $masach1;?>.jpg" width="320px" height="300px">
			</td>
		</tr>
		<tr>
			<th>
				Năm xuất bản:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="namxb" value="<?php echo $row2['namxb'];?>"/>
			</td>
		</tr>
		<tr>
			<th>
				Số trang:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="number" name="sotrang" min="1" value="<?php echo $row2['sotrang'];?>"/>
			</td>

		</tr>
		<tr>
			<th>
				Kích thước:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="text" name="kichthuoc" value="<?php echo $row2['kichthuoc'];?>"/>
			</td>
		</tr>
		<tr>
			<th>
				Đơn giá:
			</th>
			<td>
				<input class="form-control" style="width: 300px;" type="number" name="dongia" min="1" value="<?php echo $row2['price'];?>"/>
			</td>
		</tr>
		<tr>
			<th>
				Chọn ảnh:
			</th>
			<td>
				<input class="form-control" style="width: 400px;" type="file" name="img" >
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input class="btn btn-success btn-block" type="submit" value="Cập nhật"/>
			</td>
		</tr>

	</table>
	</form>
<script type="text/javascript">
	function LayMaTheLoai()
	{
		var matheloai = $("#matheloai").val();
		location.href = "?matheloai="+matheloai;
	}
	function LayMaSach()
	{
		var masach = $("#masach").val();
		var matheloai = $("#matheloai").val();
		location.href = "?matheloai="+matheloai+"&masach="+masach;
	}

</script>
