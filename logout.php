<?php
    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['mail']);
    header("refresh:0;url=index.html");
?>