<?php
    $conn = include "conn.php";
    $U_NAME = $U_ADDRESS = $U_GENDER = $U_MAIL = $U_BDATE =$U_PASSWORD = $U_PHONE = $HOUSEHOLD_ID = " ";
    if(isset($_POST['signup_btn'])){
        $U_NAME = $_POST['name'];
        $U_ADDRESS = $_POST['household'];
        $U_GENDER = $_POST['gender'];
        $U_MAIL = $_POST['e-mail'];
        $U_BDATE = $_POST['birthday'];
        $U_PASSWORD = $_POST['password'];
        $U_PHONE = $_POST['phone'];
        $HOUSEHOLD_ID = $_POST['household_id'];
        $search = "SELECT * FROM household WHERE HOUSEHOLD_ID = $HOUSEHOLD_ID ";
        if(!empty($search)){
            $input = array(':name' => '$U_NAME', ':household' =>'$U_ADDRESS', 
            ':gender' => '$U_GENDER', ':mail' => '$U_MAIL', 
            ':bdate' => '$U_BDATE', ':password' => '$U_PASSWORD',           ':phone' => '$U_PHONE', ':household_id' => '$HOUSEHOLD_ID');
        
            $sql = "INSERT INTO `user`(USER_NAME, USER_ACCOUNT, USER_PASSWORD, USER_AUTHORITY) VALUES(:name, :mail, :password, 5);";
            $sth = $conn->prepared($sql);
            $sth->execute($input);
        }
    }
?>