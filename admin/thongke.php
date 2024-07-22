<link rel="stylesheet" type="text/css" href="css/thong_ke.css">
<?php
  require "thongke_code.php";
?>
<div class="thongke-body">
  <div class="thongke">
    <table width="100%" cellpadding="10px">
      <thead>
          <th colspan="2">Thống kê</th>
      <thead>
      <tbody>
        <tr>
          <th width="50%">- Số lượng Admin:</th>
          <td width="50%"><?php echo $num_admin;?></td>
        </tr>
        <tr>
          <th>- Số lượng Moder:</th>
          <td><?php echo $num_moder;?></td>
        </tr>
        <tr>
          <th>- Số lượng user:</th>
          <td><?php echo $num_user;?></td>
        </tr>
        <tr>
          <th>- Số thể loại sách hiện bán:</th>
          <td><?php echo $num_theloai;?></td>
        </tr>
        <tr>
          <th>- Tổng số lượng sách hiện bán:</th>
          <td><?php echo $num_sach;?></td>
        </tr>
        <tr>
          <th>- Thể loại được mua nhiều nhất:</th>
          <td><a href="menu.php?menu=theloai-<?php echo $matheloai_issell;?>"><?php echo $tentheloai_issel;?><a></td>
        </tr>
        <tr>
          <th>- Tổng danh thu kiếm được:</th>
          <td><?php echo $total_danhthu;?></td>
        </tr>
      <tbody>
    </table>
  </div>
  <div class="top-sach">
    <table width="100%" cellpadding="10px">
      <thead>
        <tr>
          <th colspan="3">Top Sách Bán Chạy Nhất</th>
        </tr>
      <thead>
      <tbody>
        <tr style="background-color: #FFCC66;text-align:center;">
          <th>Thể loại</th>
          <th>Tên sách</th>
          <th>Số lượng đã bán ra</th>
        </tr>
      <?php
      while ($row_topsach = mysqli_fetch_array($result_topsach))
      {
          $sql1 = "select * from theloai where matheloai='".$row_topsach['matheloai']."'";
          $result1 = mysqli_query($con,$sql1);
          $row1 = mysqli_fetch_array($result1);
          $sql2 = "select * from book".$row_topsach['matheloai']." where id='".$row_topsach['masach']."'";
          $result2 = mysqli_query($con,$sql2);
          $row2 = mysqli_fetch_array($result2);
          echo "<tr>";
            echo "<td>";
              echo "<a href='menu.php?menu=theloai-".$row_topsach['matheloai']."'>".$row1['theloai']."</a>";
            echo "</td>";
            echo "<td>";
              echo "<a href='menu.php?menu=sanpham-".$row_topsach['matheloai']."-".$row_topsach['masach']."'>".$row2['title']."</a>";
            echo "</td>";
            echo "<td>";
              echo $row_topsach['sum'];
            echo "</td>";
          echo "</tr>";
      }
      ?>
      <tbody>
    </table>
  </div>
  <div class="top-user">
    <table width="100%" cellpadding="10px">
      <thead>
        <tr>
          <th colspan="3">Top Sách Người Mua nhiều nhất</th>
        </tr>
      <thead>
      <tbody style="text-align:center;">
        <tr style="background-color: #FFCC66;text-align:center;">
          <th width="50%">Người dùng</th>
          <th width="50%">Số lượng sách đã mua</th>
        </tr>
      <?php
      while ($row_topuser = mysqli_fetch_array($result_topuser))
      {
          $sql1 = "select * from account where user_id='".$row_topuser['user_id']."'";
          $result1 = mysqli_query($con,$sql1);
          $row1 = mysqli_fetch_array($result1);
          echo "<tr>";
            echo "<td>";
              echo "<b>".$row1['username']."</b>";
            echo "</td>";
            echo "<td>";
              echo $row_topuser['sum'];
            echo "</td>";
          echo "</tr>";
      }
      ?>
      <tbody>
    </table>
  </div>
</div>
