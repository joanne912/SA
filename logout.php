<?php
    $time = '1';

    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['id']);

    echo "感謝使用!<br>".$time."秒後登出";
    header("refresh:$time;url=index.html");
?>