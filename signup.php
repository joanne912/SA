<?php
    $conn = include "conn.php";
    $U_NAME = $U_ADDRESS = $U_GENDER = $U_MAIL = $U_BDATE =$U_PASSWORD = $U_PHONE = $HOUSEHOLD_ID = $COMMUNITY_ID = " ";
    if(isset($_POST['signup_btn'])){
        $U_NAME = $_POST['name'];
        $U_ADDRESS = $_POST['household'];
        $U_GENDER = $_POST['gender'];
        $U_MAIL = $_POST['e-mail'];
        $U_BDATE = $_POST['birthday'];
        $U_PASSWORD = $_POST['password'];
        $U_PHONE = $_POST['phone'];
        $HOUSEHOLD_ID = $_POST['household_id'];
        $COMMUNITY_ID = $_POST['community_id'];
        
//      確認mail是否已被註冊
        $sql1 = "SELECT `USER_ACCOUNT` FROM `USER` WHERE `USER_ACCOUNT`= ?;";
        $check_mail=$conn->prepare($sql1);
        $check_mail->execute(array($U_MAIL));
        $row1=$check_mail->fetch(PDO::FETCH_ASSOC);
        
        if(empty($row1['USER_ACCOUNT'])){
            
//          確認社區代碼是否正確
            $sql2 = "SELECT * FROM `community` WHERE `COMMUNITY_ID`= ?;";
            $check_community_id = $conn->prepare($sql2);
            $check_community_id->execute(array($COMMUNITY_ID));
            $row2=$check_community_id->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($row2)){
//              確認戶籍代碼是否正確
                $sql3 = "SELECT * FROM `household` WHERE `COMMUNITY_ID`= ? AND `HOUSEHOLD_ID` = ?;";
                $check_household_id = $conn->prepare($sql3);
                $check_household_id->execute(array($COMMUNITY_ID, $HOUSEHOLD_ID));
                $row3=$check_household_id->fetch(PDO::FETCH_ASSOC);
                
                if(!empty($row3)){

//                  確認戶籍代碼與地址是否相符
                    if(!empty($row3['HOUSEHOLD_ADDRESS']) && $row3['HOUSEHOLD_ADDRESS'] == $U_ADDRESS){

                        $sql5 = "SELECT MAX(`USER_ID`) FROM `user`;";
                        $take_uid=$conn->prepare($sql5);
                        $take_uid->execute(array($U_MAIL));
                        $row5=$take_uid->fetch(PDO::FETCH_ASSOC);
                        $U_ID = $row5['MAX(`USER_ID`)'] + 1;

//                      將資料加入user
                        $sql6 = "INSERT INTO `user`(`USER_ID`, `USER_NAME`, `USER_ACCOUNT`, `USER_PASSWORD`, `USER_AUTHORITY`) VALUES(?, ?, ?, ?, 5);";
                        $insert_user = $conn->prepare($sql6);
                        $insert_user->execute(array($U_ID, $U_NAME, $U_MAIL, $U_PASSWORD));

//                      將資料加入resident
                        $sql7 = "INSERT INTO `resident`(`USER_ID`, `RESIDENT_GENDER`, `RESIDENT_BDATE`, `RESIDENT_PHONE`) VALUES(?, ?, ?, ?);";
                        $insert_resident = $conn->prepare($sql7);
                        $insert_resident->execute(array($U_ID, $U_GENDER, $U_BDATE, $U_PHONE));

//                      將資料加入resident_address
                        $sql8 = "INSERT INTO `resident_address`(`USER_ID`, `COMMUNITY_ID`, `HOUSEHOLD_ID`) VALUES(?, ?, ?);";
                        $insert_resident = $conn->prepare($sql8);
                        $insert_resident->execute(array($U_ID, $COMMUNITY_ID, $HOUSEHOLD_ID));

                        echo "<script>alert('註冊成功')
                        window.location.href='home.php';
                        </script>"; 
                        return false; 

                    }else{
                        echo "<script>alert('註冊失敗, 戶籍代碼與住址不符')
                        window.location.href='index.html';
                        </script>"; 
                        return false;
                    }
                }else{
                    echo "<script>alert('註冊失敗, 戶籍代碼輸入錯誤')
                    window.location.href='index.html';
                    </script>"; 
                    return false;
                }

            }else{
                echo "<script>alert('註冊失敗, 社區代碼輸入錯誤')
                window.location.href='index.html';
                </script>"; 
                return false;
            }             
        
        }else{
            echo "<script>alert('註冊失敗, 此帳號已被註冊')
            window.location.href='index.html';
            </script>"; 
            return false;
        }
    }
?>