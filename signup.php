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
        
//        確認mail是否已被註冊
        $sql1 = "SELECT `USER_MAIL` FROM `USER` WHERE `USER_MAIL`='$U_MAIL';";
        $check_mail=$conn->prepare($sql1);
        $row1=$check_mail->fetch(PDO::FETCH_NUM);
        if(empty($row1[0])){
            
//          確認戶籍代碼是否正確
            $sql2 = "SELECT * FROM `household` WHERE `HOUSEHOLD_ID`='$HOUSEHOLD_ID';";
            $check_id = $conn->prepare($sql2);
            $check_id->execute(array(':household_id' => $HOUSEHOLD_ID));

//          確認戶籍代碼與地址是否相符
            $sql3 = "SELECT `HOUSEHOLD_ADDRESS` FROM `HOUSEHOLD` WHERE `HOUSEHOLD_ID`='$HOUSEHOLD_ID';";
            $check_address=$conn->prepare($sql3);
            $row2=$check_address->fetch(PDO::FETCH_NUM);
            if(count($sch) == 1 && !empty($row2[0])){
//              將資料加入user
                $sql4 = "INSERT INTO `user`(`USER_NAME`, `USER_ACCOUNT`, `USER_PASSWORD`, `USER_AUTHORITY`) VALUES(?, ?, ?, 5);";
                $insert_user = $conn->prepare($sql4);
                $insert_user->execute(array($U_NAME, $U_MAIL, $U_PASSWORD));

//              將資料加入resident
                $sql5 = "INSERT INTO `resident`(`RESIDENT_GENDER`, `RESIDENT_BIRTHDAY`, `RESIDENT_PHONE`) VALUES(?, ?, ?);";
                $insert_resident = $conn->prepare($sql5);
                $insert_resident->execute(array($U_GENDER, $U_BDATE, $U_PHONE));
//              將資料加入resident_address
//                $sql6 = "INSERT INTO `resident_address`(`USER_ID`,) VALUES();";
//                $insert_resident_address = $conn->prepare($sql6);
//                $insert_resident_address->execute(array());
                echo "<script>alert('註冊成功')
                window.location.href='home.php';
                </script>"; 
                return false;
                
//                header("refresh:0;url=home.php");
            }else{
                echo "<script>alert('註冊失敗')
                window.location.href='index.html';
                </script>"; 
                return false;
                
//                header("refresh:0;url=index.html");
            }
        }
    }
?>