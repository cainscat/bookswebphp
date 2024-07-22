<?php
	if(isset($_GET['id']))
	{
		require "../config.php";
		$history_id = $_GET['id'];
		$sql = "update lichsu_temp set history_status = '2' where history_id = '".$history_id."'";
		$result = mysqli_query($con,$sql);
	}
	echo "<script>location.href='../menu.php?menu=taikhoan&&menu_taikhoan=bill_admin';</script>";
?>
