<?php
    $conn = include "conn.php";
    $USER_ID = $HOUSEHOLD_ID = $HOUSEHOLD_ADDRESS = $COMMUNITY_ID = " ";
    if(isset($_POST['act']) && trim($_POST['act'])=='submit'){
        @session_start();
        $USER_ID = $_SESSION['id'];
        $HOUSEHOLD_ADDRESS = $_POST['household'];
        $HOUSEHOLD_ID = $_POST['household_id'];
        $COMMUNITY_ID = $_POST['community_id'];
        
        $sql1 = "SELECT * FROM `community` WHERE `COMMUNITY_ID`= ?;";
        $check_community_id = $conn->prepare($sql1);
        $check_community_id->execute(array($COMMUNITY_ID));
        $row1=$check_community_id->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($row1)){
            $sql2 = "SELECT * FROM `household` WHERE `COMMUNITY_ID`= ? AND `HOUSEHOLD_ID` = ?;";
            $check_household_id = $conn->prepare($sql2);
            $check_household_id->execute(array($COMMUNITY_ID, $HOUSEHOLD_ID));
            $row2=$check_household_id->fetch(PDO::FETCH_ASSOC);
            
            if(!empty($row2)){
                if(!empty($row2['HOUSEHOLD_ADDRESS']) && $row2['HOUSEHOLD_ADDRESS'] == $HOUSEHOLD_ADDRESS){
                    $sql3 = "INSERT INTO `resident_address`(`USER_ID`, `COMMUNITY_ID`, `HOUSEHOLD_ID`) VALUES(?, ?, ?);";
                    $insert_resident = $conn->prepare($sql3);
                    $insert_resident->execute(array($USER_ID, $COMMUNITY_ID, $HOUSEHOLD_ID));

                    echo "<script>alert('已開通新社區')
                    window.location.href='home.php';
                    </script>"; 
                    return false; 
                    
                }else{
                    echo "<script>alert('戶籍代碼與住址不符')
                    window.location.href='home.php';
                    </script>"; 
                    return false;
                }
                    
                
            }else{
                echo "<script>alert('戶籍代碼輸入錯誤')
                window.location.href='home.php';
                </script>"; 
                return false;
            }
        }else{
            echo "<script>alert('社區代碼輸入錯誤')
            window.location.href='home.php';
            </script>"; 
            return false;
        }
    }
    
    
?>