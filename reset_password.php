<?php
    require('conn.php');
    if(isset($_POST['email'])&&isset($_POST['community'])&&isset($_POST['household'])){
        $sql = "SELECT `user`.`USER_ID`
                FROM `user`,`resident`,`resident_address`
                WHERE `user`.`USER_ID` = `resident_address`.`USER_ID`
                AND `user`.`USER_ID` = `resident`.`USER_ID`
                AND `COMMUNITY_ID` = :community
                AND `HOUSEHOLD_ID` = :household
                AND `USER_ACCOUNT` = :email";
        $statement = $conn->prepare($sql);
        $statement->execute(array(
            ':community' => $_POST['community'],
            ':household' => $_POST['household'],
            ':email' => $_POST['email']
        ));
        if($row = $statement->fetch(PDO::FETCH_ASSOC)){
            session_start();
            $_SESSION['id'] = $row['USER_ID'];
            echo "true";
        }else{
            echo "false";
        }
    }
    if(isset($_POST['submit'])){
        session_start();
        $sql = "UPDATE `user` SET `USER_PASSWORD` = ?
                WHERE `USER_ID` = " . $_SESSION['id'];
        $statement = $conn->prepare($sql);
        $statement->execute(array($_POST['new_password']));
        header('refresh:3;url:index.html');
        echo "<script>
                alert('已完成密碼重設');
                window.location.href='index.html';
            </script>";
    }
?>