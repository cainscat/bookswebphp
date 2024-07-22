<style type="text/css">
    .chat-show{
        border-radius: 10px 10px 0px 0px;
        width: 250px;
        height: 300px;
        position: fixed;
        bottom: 22px;
        right: 10px;
        background-color: white;
        opacity: 0.9;
        z-index: 2;
    }
    .chat-hide{
        border-radius: 20px;
        width: 270px;
        height: 22px;
        position: fixed;
        bottom: 1px;
        right: 0px;
        background-color: #EEEEEE;
        opacity: 0.9;
        color: blue;
        z-index: 3;
        padding-left: 7px;
        font-weight: bold;
        font-family: consola;
    }
</style>
<div class="chat-show">
    <div class="div-panel" style="background-color: #0000FF;border-radius: 10px;">
    	<font style="font-weight: bolder;">
    		BOX-CHAT
    	</font>
    </div>
	<iframe src="chat/box-chat.php" width=100% height=270px  frameborder="0">
	</iframe>
</div>
<div class="chat-hide">
    <div style="float: left;"><img src="img/status.png" />
     	Liên hệ ADMIN:
 	</div>
    <div class="status-time">
        <?php require "time.php";?>
   	</div>
</div>
