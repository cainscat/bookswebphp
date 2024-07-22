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
	/////// PHÂN TRANG /////////////////
    if(isset($_GET['theloai']))
    {
      $sql = "select count(*) as total from kho where kho_idtheloai='".$_GET['theloai']."'";
    }
    else
    {
      $_GET['theloai'] = 1;
      $sql = "select count(*) as total from kho where kho_idtheloai='".$_GET['theloai']."'";
    }
		$result = mysqli_query($con,$sql);
		$row = @mysqli_fetch_array($result);
		$total_record = $row['total'];
		// Lấy số giới hạn hiển thị sản phẩm trong 1 trang
		$limit = 10;
		// Lấy tổng số trang
		$total_page = ceil($total_record/$limit);
		// Lấy trang hiện tại
		$current_page = isset($_GET['page'])?$_GET['page']:1;
		if($current_page < 1)
			$current_page = 1;
		if($current_page > $total_page)
			$current_page = $total_page;
		// Lấy số start
		$start = ($current_page-1)*$limit;
		if(isset($_GET['theloai']))
		{
				$sql_kho = "select * from kho where kho_idtheloai='".$_GET['theloai']."' ORDER BY kho_soluong ASC LIMIT $start,$limit";
		}
		else
		{
			$sql_kho = "select * from kho where kho_idtheloai='1' ORDER BY kho_soluong ASC LIMIT $start,$limit";
		}
		$result_kho = mysqli_query($con,$sql_kho);
?>
<div class="sanpham-page" style="height: 26px;font-size:15px;">
		<!-- Button di chuyển trang trước sau-->
		<div style="float:left;width: 25%;">
			<font color="blue">Trang</font>:
			<a href="index.php?page=1&&theloai=<?php if(isset($_GET['theloai'])) echo $_GET['theloai']; else echo 1;?>">Đầu</a> |
			<?php if($current_page > 1) echo '<a href="index.php?page='.($current_page-1).'&&theloai='.$_GET['theloai'].'">Trước</a> |';?>
			<?php if($current_page < $total_page) echo '<a href="index.php?page='.($current_page+1).'&&theloai='.$_GET['theloai'].'">Sau</a> |';?>
			<?php echo '<a href="index.php?page='.$total_page.'&&theloai='.$_GET['theloai'].'">Cuối</a> |';?>
		</div>
		<!-- Button di chuyển trang chỉ định-->
		<div style="float:left;width: 58%;text-align: right;">
			<label>
			Tổng số sản phẩm: <b><?php echo $total_record?></b>
			Tổng số trang: <b><?php echo $total_page;?></b> |
			Trang hiện tại: <b><?php echo $current_page;?></b> |
			Đến trang:
			<input style="border-radius: 5px;height: 20px;width: 40px;" type="number" value="1" id="trang"/>
			<a id="go" onclick="go()">
				<img src="img/go.png" width="23px" height="20px">
			</a>
			</label>
		</div>
</div>
<div style="border-top: 1px inset #DDDDDD;">
  <?php
  // LẤY SELECT VÀI TRÒ
  		$sql_theloai = "select * from theloai";
  		$result_theloai = mysqli_query($con,$sql_theloai);
  ?>
  <div style="font-size:15px;">
  	<div style="margin-left: 2px;width:41.5%;float: left;margin-top: 2px;">
  				Thể loại sách:
  				<select class="select-taikhoan" id="theloai" oninput="theloai()">
  					<?php
  						while($row_theloai = @mysqli_fetch_array($result_theloai))
  						{
                if($_GET['theloai']== $row_theloai['matheloai'])
                {
                  echo '<option selected value='.$row_theloai['matheloai'].'>';
                    echo $row_theloai['theloai'];
                  echo '</option>';
                }
                else
                {
                  echo '<option value='.$row_theloai['matheloai'].'>';
                    echo $row_theloai['theloai'];
                  echo '</option>';
                }
  						}
  					?>
  				</select>
  	</div>
  </div>
	<div style="float:left;margin-top: 3px;width: 83.2%;overflow:auto;height:843px;">
		<table style="width: 100%;">
			<thead>
				<th width="10%" style="text-align: center;">STT</th>
				<th width="10%" 	style="text-align: center;">Mã sách</th>
				<th width="30%" style="text-align: center;">Hình ảnh</th>
				<th width="40%" style="text-align: center;">Tên sách</th>
				<th width="10%" style="text-align: center;">Số lượng</th>
			</thead>

			<?php
      $i = 0;
				while($row_kho = @mysqli_fetch_array($result_kho))
				{
          $i++;
          $sql_tensach = "select * from book".$row_kho['kho_idtheloai']." where id='".$row_kho['kho_idsach']."'";
          $result_tensach = mysqli_query($con,$sql_tensach);
          $row_tensach = mysqli_fetch_array($result_tensach);

					echo '<tr>';
						echo '<td>';
					       echo $i;
						echo '</td>';
						echo '<td>';
							echo $row_kho['kho_idsach'];
						echo '</td>';
						echo '<td>';
							echo '<img src="img/img_book/'.$row_kho['kho_idtheloai'].'/'.$row_kho['kho_idsach'].'.jpg" width="80px" heigh="80px"/>';
						echo '</td>';
						echo '<td>';
							echo '<a href="menu.php?menu=sanpham-'.$row_kho['kho_idtheloai'].'-'.$row_kho['kho_idsach'].'">'.$row_tensach['title'].'</a>';
						echo '</td>';
						echo '<td>';
							echo $row_kho['kho_soluong'];
						echo '</td>';
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
<script type="text/javascript">
function go()
{
	var trang = $("#trang").val();
	location.href="?page="+trang+"&&theloai=<?php echo $_GET['theloai'];?>";
}
	function theloai()
	{
		var theloai = $("#theloai").val();
		location.href="?theloai="+theloai;
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
