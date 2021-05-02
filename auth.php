<?php
    if (!isset($_SESSION['auth'])) {
        header("location:index.html");
    }else{
        $auth = $_SESSION['auth'];
    }
?>