<?php
    $conn = include "conn.php";
    
    if(isset($_POST['signup_btn'])){
        $U_NAME = $_POST['name'];
        $U_ADDRESS = $_POST['household'];
        $U_GENDER = $_POST['gender'];
        $U_MAIL = $_POST['e-mail'];
        $U_BDATE = $_POST['birthday'];
        $U_PASSWORD = $_POST['password'];
        $U_PHONE = $_POST['phone'];
        $HOUSEHOLD_ID = $_POST['household_id'];
        mysql_fetch_array
        $search = "SELECT * FROM household WHERE HOUSEHOLD_ID = $HOUSEHOLD_ID ";
        if(mysql_fetch_array($search) == 1){
            $input = array(':name' => '$U_NAME', ':household' => '$U_ADDRESS', 
                      ':gender' => '$U_GENDER', ':mail' => '$U_MAIL', 
                      ':bdate' => '$U_BDATE', ':password' => '$U_PASSWORD', 
                      ':phone' => '$U_PHONE', ':household_id' => '$HOUSEHOLD_ID');
        
            $sql = "INSERT INTO `user`(USER_NAME, USER_ACCOUNT, USER_PASSWORD, USER_AUTHORITY) VALUES(:name, :mail, :password, 5);
            INSERT INTO `resident`(RESIDENT_GENDER, RESIDENT_BDATE, RESIDENT_PHONE) VALUES(:gender, :bdate, :phone);
            INSERT INTO `resident_address` VALUES(:household_id);"
            $sth = $conn->prepared($sql);
            $sth->execute($input);
        }
        
    }
?>