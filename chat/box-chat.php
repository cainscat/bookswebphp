<link rel="stylesheet" type="text/css" href="../css/box-chat.css">
<script>window.scrollBy(0, $(document).height());</script>
 <?php
    session_start();
    if(isset($_GET['num']))
    {
        $_SESSION['num'] = $_GET['num'];
    
    }
    if(isset($_SESSION['username']))
    {

            echo '<div class="main-chat">';
                include('msglog.php');
            echo '</div>';
            echo '<div class="box-chat">
            <form action="sendmsg.php" method="POST" id="formSendMsg">
                    <input id="text-chat" type="text" placeholder="Nhập nội dung tin nhắn ..." name="body_msg" autofocus>
                    
            </form>
    </div>';
    }
    else
        echo "<font color='red' style='text-align:center;'><h1>Bạn chưa đăng nhập!</h1></font>";
           
         
 ?>
<script src="../js/jquery.js"></script>
<script src="../js/loadmsg.js"></script>
<script type="text/javascript">
    window.onload = function(){
        window.scrollBy(0, $(document).height());
   }

</script>
<script src="../js/sendmsg.js"></script>