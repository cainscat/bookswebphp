<ul>
        <font style="font-weight: bold;font-size: 18px;padding-left: 5px;color: white;">
            <img src='img/menu.png' width='15px' height='20px' style="margin-bottom: 4px;" /> DANH MỤC</font>
        <?php require "config.php";
        $result = mysqli_query($con,"select * from theloai"); 
        while($row = mysqli_fetch_array($result))
        {
            echo "<li><a href='menu.php?menu=theloai-".$row['matheloai']."'><img src='img/check.png' width='17px' height='17px'/> ".$row['theloai']."</a><br></li>";
        }
        ?>
</ul>   
  