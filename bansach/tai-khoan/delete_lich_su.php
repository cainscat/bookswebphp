<?php
	session_start();
	require "../config.php";
	$sql = "delete from lichsu_temp where history_iduser='".$_SESSION['user_id']."' and history_status=1";
	$result = mysqli_query($con, $sql);
	echo "<script>location.href='../menu.php?menu=taikhoan&&menu_taikhoan=history';</script>";
?>
