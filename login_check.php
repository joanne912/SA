<?php
    $conn = include "conn.php";
    if(isset($_POST['login_btn'])){
        $U_MAIL = $_POST['mail'];
        $U_PASSWORD = $_POST['password'];
        
        $sql = 'SELECT `USER_ID`,`USER_AUTHORITY` FROM `user` WHERE ( `USER_ACCOUNT` = ? AND `USER_PASSWORD` = ? );';
        $statement = $conn->prepare($sql);
        $statement->execute(array($U_MAIL,$U_PASSWORD));
        
        if(count($statement) == 1){
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            session_start();
            $_SESSION['id'] = $row['USER_ID'];
            $_SESSION['auth'] = $row['USER_AUTHORITY'];
            header("refresh:0;url=home.php");
        }else{
            header("refresh:0;url=index.html");
        }
    }
?>