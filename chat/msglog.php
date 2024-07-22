<?php
@session_start();
    include_once('../config.php');
                            // Lấy số tin nhắn có trong CSDL
                            if($_SESSION['role'] == 'admin')
                                $query_get_num = mysqli_query($con,"SELECT COUNT(*) AS TOTAL FROM messages");
                            else
                             $query_get_num = mysqli_query($con,"SELECT COUNT(*) AS TOTAL FROM messages where user_from='".$_SESSION['username']."' or user_from='admin'");

                            $row = @mysqli_fetch_array($query_get_num);
                            $num = $row['TOTAL'];
                            // Tồn tại session['num'] thì + vào Session limit , xong đó xóa session['num'] để tránh bị lặp
                            if(isset($_SESSION['num']))
                            {
                                $_SESSION['limit'] = $_SESSION['limit'] + $_SESSION['num'];
                                unset($_SESSION['num']);
                            }
                            // gán sesson limit vào $limit
                            // nêu số TIN NHẮN lớn hơn $limit thì $start bắt đầu từ số tin nhắn trừ cho limit.
                            // nếu nhỏ hơn thì cho $start = 0;
                            $limit = $_SESSION['limit'];
                            if($num >= $limit)
                                $start = $num-$limit;
                            else
                            {
                                 echo "<font style='font-size: 10px;margin-left:55px;'>Không còn tin nhắn!</font><br><br>";
                                $start = 0;

                            }
                            if($_SESSION['role'] == 1)
                                $query_get_msg = mysqli_query($con, "SELECT * FROM messages ORDER BY id_msg ASC LIMIT $start,$limit");
                            else
                                 $query_get_msg = mysqli_query($con, "SELECT * FROM messages where user_from='".$_SESSION['username']."' or user_from='admin' ORDER BY id_msg ASC LIMIT $start,$limit");
// Tạo nút tải thêm , gửi dữ liệu GET[num] về box-chat , sau đó gán vào session[num] rồi quanh lại msglog xử lí
echo '<a href="box-chat.php?num=20" style="margin-left:85px;"><font style="font-size:11px;">Tải thêm</font></a>';
// Dùng vòng lập while để lấy dữ liệu
while ($row = mysqli_fetch_assoc($query_get_msg)) {
    // Thời gian gửi tin nhắn
    $date_sent = $row['date_sent'];
    $day_sent = substr($date_sent, 8, 2); // Ngày gửi
    $month_sent = substr($date_sent, 5, 2); // Tháng gửi
    $year_sent = substr($date_sent, 0, 4); // Năm gửi
    $hour_sent = substr($date_sent, 11, 2); // Giờ gửi
    $min_sent = substr($date_sent, 14, 2); // Phút gửi
    // Nếu người gửi là $user thì hiển thị khung tin nhắn màu xanh

    if ($row['user_from'] == $_SESSION['username']) {
        echo '<div class="msg-user">
                        <div><p>' . $row['body'] . '</p></div>
                        <div class="info-msg-user">
                                <font color="#FF3366">Bạn</font> - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                        </div>
                </div>';
    }
    // Ngược lại người gửi không phải là $user thì hiển thị khung tin nhắn màu xám
    else {
        echo '  <div class="msg">
                        <p>' . $row['body'] . '</p>
                        <div class="info-msg">
                                <font color="#FF3366">' . $row['user_from'] . '</font> - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                        </div>
                </div>';

    }
}
?>
