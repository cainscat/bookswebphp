<?php

	if(isset($_GET['id']))
	{
		require "../config.php";
		$history_id = $_GET['id'];
		$sql = "update lichsu_temp set history_status='1' where history_id='".$history_id."'";
		$result = mysqli_query($con,$sql);
    $sql = "select * from lichsu_temp where history_id='".$history_id."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $ngay = $row['history_date'];
    $user_id = $row['history_iduser'];
    $matheloai = $row['history_idtheloai'];
    $masach = $row['history_idbook'];
    $soluong = $row['history_num'];
    $thanhtien = $row['history_totalprice'];
		// VỪA ĐƯỢC THÊM --------------------------
		$sql_kho = "select * from kho where kho_idtheloai='".$matheloai."' and kho_idsach='".$masach."'";
		$result_kho = mysqli_query($con,$sql_kho);
		$row_kho = mysqli_fetch_array($result_kho);
		$kho_soluongnew = $row_kho['kho_soluong'] - $soluong;
		$sql_kho = "update kho set kho_soluong='".$kho_soluongnew."' where kho_idtheloai='".$matheloai."' and kho_idsach='".$masach."'";
		$result_kho = mysqli_query($con,$sql_kho);
    $sql = "INSERT INTO `lichsu`(`history_date`, `history_iduser`, `history_idtheloai`, `history_idbook`, `history_num`, `history_totalprice`) VALUES ('".$ngay."','".$user_id."','".$matheloai."','".$masach."','".$soluong."','".$thanhtien."')";
    $result = mysqli_query($con,$sql) or die('Thêm không thành công!');
	}
	echo "<script>location.href='../menu.php?menu=taikhoan&&menu_taikhoan=bill_admin';</script>";
?>
