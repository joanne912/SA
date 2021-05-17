<?php
    $time = '1';

    session_start();
    $_SESSION = array(); 
    session_destroy(); 

    echo "感謝使用!<br>".$time."秒後登出";
    header("refresh:$time;url=index.html");
?>