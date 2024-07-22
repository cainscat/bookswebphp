<?php
 if(isset($_SESSION['user_id'])) 
        echo "<label>Welcome <font color='red'>".$_SESSION['username']."</font>!</label>";
    else
        echo "<label>Bạn chưa đăng nhập!</label>";
?>
