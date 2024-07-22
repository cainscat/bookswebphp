<?php
  require "config.php";
  $sql_danh_muc = "select * from theloai";
  $result_danh_muc = mysqli_query($con,$sql_danh_muc);
  while($row_danh_muc = mysqli_fetch_array($result_danh_muc))
  {
    $ma_danh_muc = $row_danh_muc['matheloai'];
    $sql_sach = "select * from book".$ma_danh_muc;
    $result_sach = mysqli_query($con,$sql_sach);
    while($row_sach= mysqli_fetch_array($result_sach))
    {
      $ma_sach = $row_sach['id'];
      $sql_kho = "INSERT INTO `kho`(`kho_idtheloai`, `kho_idsach`, `kho_soluong`) VALUES ('".$ma_danh_muc."','".$ma_sach."','100')";
      $result_kho = mysqli_query($con,$sql_kho);
    }
  }
?>
