<?php
	if(isset($_GET['id']))
	{
		require "../config.php";
		$history_id = $_GET['id'];
		$sql = "delete from lichsu_temp where history_id='".$history_id."'";
		$result = mysqli_query($con,$sql);
	}
	echo "<script>location.href='../menu.php?menu=taikhoan&&menu_taikhoan=bill';</script>";
?>
