<?php

	if(isset($_POST['matheloai'])&&isset($_POST['masach'])&&isset($_POST['soluong']))
	{
		// Lấy tên thể loại của sách vừa xóa
		$matheloai = $_POST['matheloai'];
		$masach = $_POST['masach'];
    $soluong = $_POST['soluong'];
    $sql_kho = "update kho set kho_soluong='".$soluong."' where kho_idtheloai='".$matheloai."' and kho_idsach='".$masach."'";
    $result_kho = mysqli_query($con,$sql_kho);
    $_GET['matheloai'] = $matheloai;
    $_GET['masach'] = $masach;
	}
	if(isset($_GET['matheloai']))
		{
			// Hiển thị sách theo từng thể loại
			$matheloai = $_GET['matheloai'];
			$sql1 = "select * from book".$matheloai;
			$result1 = mysqli_query($con,$sql1);
			$num = @mysqli_num_rows($result1);
      if(isset($_GET['masach']))
      {
          $sql_soluong = "select * from kho where kho_idtheloai='".$matheloai."' and kho_idsach='".$_GET['masach']."'";
          $result_soluong = mysqli_query($con,$sql_soluong);
          $row_soluong = mysqli_fetch_array($result_soluong);
      }
      else
      {
        $_GET['masach'] = 1;
        $sql_soluong = "select * from kho where kho_idtheloai='".$matheloai."' and kho_idsach='1'";
        $result_soluong = mysqli_query($con,$sql_soluong);
        $row_soluong = mysqli_fetch_array($result_soluong);
      }
		}
	else
		{
      $_GET['matheloai'] = 1;
			// Mặc định là thể loại 1
			$sql1 = "select * from book1";
			$result1 = mysqli_query($con,$sql1);
			$num = @mysqli_num_rows($result1);
      if(isset($_GET['masach']))
      {
          $sql_soluong = "select * from kho where kho_idtheloai='1' and kho_idsach='".$_GET['masach']."'";
          $result_soluong = mysqli_query($con,$sql_soluong);
          $row_soluong = mysqli_fetch_array($result_soluong);
      }
      else {
        $_GET['masach'] = 1;
        $sql_soluong = "select * from kho where kho_idtheloai='1' and kho_idsach='1'";
        $result_soluong = mysqli_query($con,$sql_soluong);
        $row_soluong = mysqli_fetch_array($result_soluong);
      }
		}
	// Hiển thị tất cả thể loại trong select
	$sql = "select * from theloai";
	$result = mysqli_query($con,$sql);
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="padding-top:50px;">
	<table style="border: 5px gray ridge;font-size: 20px;" align="center" cellpadding="15">
		<tr>
			<th>
				Tên thể loại:
			</th>
			<td>
				<select class="form-control" style="width: 300px" name="matheloai" id="matheloai" oninput="LayMa()">
					<?php
						while($row = @mysqli_fetch_array($result))
						{	if(isset($_GET['matheloai']))
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
			<td>
				<select class="form-control" style="width: 300px" name="masach" id="masach" oninput="LaySach()">
					<?php
						while($row1 = @mysqli_fetch_array($result1))
						{
              if($_GET['masach'] == $row1['id'])
              {
                echo '<option selected  value='.$row1['id'].'>';
                  echo $row1['title'];
                echo '</option>';
                }
              else {
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
        Số lượng:
      </th>
      <td>
        <input type='number' class='form-control' name="soluong" value='0' min='1' />
      </td>
    </tr>
		<tr>
			<td colspan="2">
				<input class="btn btn-success btn-block" type="submit" value="Cập nhật">
				<hr>
			</td>
		</tr>
		<tr>
			<td colspan="2">

				<font style="font-size: 16px;">Sản phẩm đang chọn hiện có: <b><?php echo $row_soluong['kho_soluong'];?> </b> sản phẩm<br>

			</td>
		</tr>
	</table>

</form>
<script type="text/javascript">
	function LayMa()
	{
		var matheloai = $("#matheloai").val();
		location.href = "?matheloai="+matheloai+"&&masach=1";
	}
  function LaySach()
	{
		var masach = $("#masach").val();
		location.href = "?matheloai=<?php echo $_GET['matheloai'];?>&&masach="+masach;
	}
</script>
