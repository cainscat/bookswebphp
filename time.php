<?php

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $date_current = date('Y-m-d H:i:s');
    $_SESSION['gio'] = substr($date_current, 11, 2); // Giờ gửi
    $_SESSION['phut'] = substr($date_current, 14, 2); //  Phút gửi 1998-12-01 04:05:20
    $_SESSION['giay'] = substr($date_current, 17, 2);
    echo "Bây giờ là: ";
    echo '<span>'.$_SESSION['gio'].':</span>';
    echo '<span>'.$_SESSION['phut'].':</span>';
    echo '<span>'.$_SESSION['giay'].'</span>';
?>
