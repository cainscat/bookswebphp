<?php
  // Số lượng Admin,User, Moder
  $sql = "select * from account";
  $result = mysqli_query($con,$sql);
  $num_admin = 0;
  $num_user = 0;
  $num_moder = 0;
  while($row = @mysqli_fetch_array($result))
  {
    if($row['role'] == '1')
      $num_admin++;
    else if($row['role'] == '2')
        $num_moder++;
    else if($row['role'] == '3')
        $num_user++;
  }
  // Số thể loại sách hiện bán:
  $num_sach = 0;
  $sql = "select * from theloai";
  $result = mysqli_query($con,$sql);
  $num_theloai = @mysqli_num_rows($result);
  // Tổng số lượng sách hiện bán
  while($row = @mysqli_fetch_array($result))
  {
    $sql_sach = "select * from book".$row['matheloai'];
    $result_sach = mysqli_query($con,$sql_sach);
    $num_sach_temp = @mysqli_num_rows($result_sach);
    $num_sach = $num_sach + $num_sach_temp;
  }
  //Thể loại được mua nhiều nhất
  $sql = "SELECT history_idtheloai as ID, SUM(history_num) as tong FROM `lichsu`GROUP BY history_idtheloai
ORDER BY SUM(history_num) DESC";
  $result = mysqli_query($con,$sql);
  $row = @mysqli_fetch_array($result);
  $matheloai_issell = $row['ID'];
  // Lấy tên thể loại
  $sql = "select * from theloai where matheloai='".$matheloai_issell."'";
  $result = mysqli_query($con,$sql);
  $row = @mysqli_fetch_array($result);
  $tentheloai_issel = $row['theloai'];
  // Tổng số danh thu kiếm được
  $sql = "SELECT SUM(history_totalprice) as total FROM `lichsu`";
  $result = mysqli_query($con,$sql);
  $row = @mysqli_fetch_array($result);
  $total_danhthu= $row['total'];
  // lẤY TOP 10 SÁCH BÁN CHẠY
  $sql_topsach = "SELECT history_idtheloai as matheloai,history_idbook as masach,SUM(history_num) as sum FROM `lichsu` GROUP BY history_idbook,history_idtheloai ORDER BY SUM(history_num)  DESC LIMIT 10";
  $result_topsach = mysqli_query($con,$sql_topsach);
  // Lấy Top 10 người mua nhiều nhất
  $sql_topuser = "SELECT history_iduser as user_id,SUM(history_num) as sum FROM `lichsu` GROUP BY history_iduser ORDER BY SUM(history_num)  DESC LIMIT 10";
  $result_topuser = mysqli_query($con,$sql_topuser);
?>
