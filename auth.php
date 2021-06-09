<?php
    session_start();
    if (!isset($_SESSION['auth'])) {
        header("location:index.html");
    }else{
        if(isset($_POST['changeCommunity'])){
            $_SESSION['household'] = $_SESSION['estates'][$_POST['changeCommunity']]['HOUSEHOLD_ID'];
            $_SESSION['community'] = $_SESSION['estates'][$_POST['changeCommunity']]['COMMUNITY_ID'];
        }
        $auth = $_SESSION['auth'];
        $id = $_SESSION['id'];
        $community = $_SESSION['community'];
        if( $auth >= 4 ){
            $estates = isset($_SESSION['estates']) ? $_SESSION['estates'] : null;
            $household = $_SESSION['household'];
        }
    }
?>