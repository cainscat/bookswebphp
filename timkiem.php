<style type="text/css">
.search-taikhoan{
  height: 35px;
  width: 350px;
  border-radius: 5px;
}
.button-taikhoan{
  height: 34px;
  width: 100px;
  border-radius: 5px;
  background-color: white;
}
.select-taikhoan{
  height: 35px;
  width: 150px;
  border-radius: 5px;
}
.sanpham-div{
  float:left;
  width: 33.33%;
  height: 290px;
  font-size: 15px;
}

.sanpham-left{
  float: left;
  width: 50%;
  height: 255px;
  padding: 3px;
  font-weight: bold;
}
.sanpham-id{

  padding: 5px;
}
.sanpham-right{
  padding: 5px;
  font-weight: bold;
  width: 50%;
  float: left;
  height: 255px;
  overflow: auto;
}
.sanpham-button{
  text-align: right;
}
.sanpham-page{
  padding: 1px;
}
</style>
<?php
  if(isset($_GET['search']))
  {
    if(isset($_GET['theloai'])) $matheloai = $_GET['theloai'];
    $timkiem = $_GET['search'];
    $sql = "select * from book".$matheloai." where id LIKE '%".$timkiem."%' or title LIKE '%".$timkiem."%'";
    $result = mysqli_query($con,$sql);
  }
  $sql_theloai = "select * from theloai";
  $result_theloai = mysqli_query($con,$sql_theloai);
 ?>
</style>
<div class="div-panel">
	TÌM KIẾM
</div>
<div style="padding-top:5px;;padding-bottom:5px;border-bottom:1px solid gray;">
    <div style="margin-left: 25%;">

      <select id="select" class="select-taikhoan">
        <?php
          while($row = mysqli_fetch_array($result_theloai))
          {
            if($_GET['theloai']==$row['matheloai'])
              echo "<option selected value='".$row['matheloai']."'>".$row['theloai']."</option>";
            else
              echo "<option value='".$row['matheloai']."'>".$row['theloai']."</option>";
          }
         ?>
      </select>
      <input type="text" id="search" placeholder="Nhập mã sách hoặc tên sách cần tìm" class="search-taikhoan" onchange="return timkiem_validator()"/>
      <input type="button" class="button-taikhoan" value="Tìm kiếm" onclick="return timkiem_validator()">

    </div>
</div>
<div style="height:871px;overflow:auto;">
   <?php
  while($row = @mysqli_fetch_array($result))
  {
    $id = $row['id'];
    $ten = $row['title'];
    $tacgia= $row['author'];
    $gia = $row['price'];

    echo '<div class="sanpham-div">
      <div class="sanpham-left">
        <div class="sanpham-id">';
          echo '<font color="#FF3366">Mã sách</font>: '.$id.'
        </div>';
        echo '<div class="sanpham-img">
          <img src="img/img_book/'.$matheloai.'/'.$id.'.jpg" width="163px" height="205px" />
        </div>
      </div>
      <div class="sanpham-right">
        <div class="sanpham-ten">';
          echo '<font color="#FF3366">Tên sách</font>: '.$ten.'
        </div>
        <div class="sanpham-tacgia">';
          echo '<font color="#FF3366">Tác giả</font>: '.$tacgia.'
        </div>
        <div class="sanpham-gia">';
          echo '<font color="#FF3366">Giá</font>: '.$gia.' VNĐ
        </div>
        <div ><a href="menu.php?menu=sanpham-'.$matheloai.'-'.$id.'">Xem chi tiết</a></div>
      </div>
      <div class="sanpham-button">';
        if(isset($_SESSION['username'])) echo '<a href="menu.php?menu=cart-'.$matheloai.'-'.$id.'"><img src="img/btn_buy.gif" width="100px" height="40px" style="padding:5px; "></a>';
      echo '</div>
    </div>';
  }

  ?>
</div>
<script type="text/javascript">
function timkiem_validator()
{
  var timkiem= $("#search").val();
  var theloai= $("#select").val();
  if(timkiem == '')
  {
    alert('Chưa nhập id hoặc tên sách cần tìm!');
    return false;
  }
  location.href="?theloai="+theloai+"&&search="+timkiem;
  return true;
}
</script>
