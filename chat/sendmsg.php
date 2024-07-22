<?php
session_start();
// Kết nối database, lấy dữ liệu chung
include('../config.php');
// Khai báo các biến gán với dữ liệu nhận được
$body_msg = $_POST['body_msg'];
// Xử lý chuỗi $body_msg
$user = $_SESSION['username'];
// Nếu $body_msg khác rỗng
if ($body_msg != '') 
{
    $sql =  "INSERT INTO `messages`(`body`, `user_from`, `date_sent`) VALUES ('".$body_msg."','".$user."','".$date_current."')";
    $query_send_msg = mysqli_query($con,$sql) or die ("Không nhắn tin được");
    header("Location:box-chat.php");
}
else
{
    header("Location:box-chat.php");
}
?>