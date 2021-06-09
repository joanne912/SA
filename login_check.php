<?php
    $U_MAIL = $U_PASSWORD = "";
    $conn = include "conn.php";
    if(isset($_POST['login_btn'])){
        $U_MAIL = $_POST['mail'];
        $U_PASSWORD = $_POST['password'];
        
        $sql = 'SELECT `USER_ID`,`USER_AUTHORITY` FROM `user` WHERE ( `USER_ACCOUNT` = ? AND `USER_PASSWORD` = ? );';
        $statement = $conn->prepare($sql);
        $statement->execute(array($U_MAIL,$U_PASSWORD));
        
        if( $statement ){
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            @session_start();
            $_SESSION['id'] = $row['USER_ID'];
            $_SESSION['auth'] = $row['USER_AUTHORITY'];

            if($row['USER_AUTHORITY'] >= 4){
                $sql = 'SELECT `HOUSEHOLD_ID`,`COMMUNITY_ID` FROM `resident_address` WHERE ( `USER_ID` = ? );';
                $statement = $conn->prepare($sql);
                $statement->execute(array($row['USER_ID']));
                $row2 = $statement->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['estates'] = $row2;
                $_SESSION['household'] = $row2[0]['HOUSEHOLD_ID'];
                $_SESSION['community'] = $row2[0]['COMMUNITY_ID'];
            }else if($row['USER_AUTHORITY'] <= 3){
                $sql = 'SELECT `COMMUNITY_ID` FROM `manager` WHERE ( `USER_ID` = ? );';
                $statement = $conn->prepare($sql);
                $statement->execute(array($row['USER_ID']));
                $row2 = $statement->fetch(PDO::FETCH_ASSOC);
                $_SESSION['community'] = $row2['COMMUNITY_ID'];
            }
            header("refresh:0;url=home.php");
        }else{
            header("refresh:0;url=index.html");
        }
    }
    if(isset($_POST['community'])&&isset($_POST['household'])){
        
    }
?>