<?php
    @session_start();
    if (!isset($_SESSION['auth'])) {
        header("location:index.html");
    }else{
        $auth = $_SESSION['auth'];
        $id = $_SESSION['id'];
        $community = $_SESSION['community'];
        if( $auth >= 4 ){
            $household = $_SESSION['household'];
        }
    }
?>