<?php
	if(isset($_GET['id']))
	{	
		require "../config.php";
		$cart_id = $_GET['id'];
		if($cart_id=='all')
		{
				$sql = "delete from cart where 1";
		}
		else
		{
			$sql = "delete from cart where cart_id='".$cart_id."'";
		}
		$result = mysqli_query($con,$sql);
	}
	echo "<script>location.href='../menu.php?menu=cart-0-0';</script>"; 
?>