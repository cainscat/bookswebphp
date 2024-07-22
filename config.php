<?php

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "bansach";
        $con = mysqli_connect($host,$username,$password,$database) or die("Không thể kết nối tới database");
        mysqli_query($con,"SET NAMES 'utf8'");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date_current = date('Y-m-d H:i:s');
        $login_time_block = 600;
?>
