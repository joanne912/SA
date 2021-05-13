<?php
    if(isset($_POST['login_btn'])){
        $U_MAIL = $_POST['mail'];
        $U_PASSWORD = $_POST['password'];
        if($U_MAIL && $U_PASSWORD){
            session_start();
            $_SESSION['auth'] = 3;
            $_SESSION['id'] = 1;
            $_SESSION['name'] = 'Amy';
            $_SESSION['mail'] = $U_MAIL;
            header("refresh:0;url=home.php");
        }else{
            header("refresh:0;url=index.html");
        }
    }
?>