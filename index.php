 <?php
 session_start();
    require "config.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <LINK REL="SHORTCUT ICON"  HREF="favicon.ico">
        <title>Shop bán sách - Online</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link  type="text/css"href="css/style.css" rel="stylesheet">

    </head>
    <body >
    <div id="body-content">
        <div id="header">
            <?php require "page/header.php";?>
        </div>
        <div id="content">
            <div class="index-leftmenu">
                <?php require "page/left_menu.php";?>
            </div>
            <div class="index-rightmenu">
                <div class="index-top">
                    <div class="index-cart"><?php require "page/cart.php";?>
                    </div>
                    <div class="index-status"><?php require "page/status.php";?>
                    </div>
                </div>
                <div >
                    <?php require "page/main.php";?>
                </div>
            </div>
        </div>
        <div id="footer">
            <?php require "page/footer.php";?>
        </div>
        <div id="box-chat">
            <?php unset($_SESSION['num']);/* gán mặc định */$_SESSION['limit'] = 20;?>
            <!-- <?php require "chat/chat.php";?> -->
        </div>
    </div>
    <script src="js/show-hide-chat.js"></script>
    <script src="js/show-hide-menu-taikhoan.js"></script>
    <script src="js/loadtime.js"></script>
    <script> window.scrollBy(0,477);</script>
    </body>
</html>
