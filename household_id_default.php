<link rel="stylesheet" href="css/household_id_default.css">

<?php
    if(!isset($_GET['household_id'])){
        header("location:home.php?page=householdid");
    }
    $id = $_GET['household_id'];
    $sql = "SELECT `HOUSEHOLD_ADDRESS` FROM `household` 
            WHERE ( `HOUSEHOLD_ID` = ? AND `COMMUNITY_ID` = $community );";
    $statement = $conn->prepare($sql);
    $statement->execute(array($id));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="cont">
    <table>
        <thead>
            <th>戶別</th>
            <th><font size=3 color=red><?=$row['HOUSEHOLD_ADDRESS']?></font></th>
            <th>戶籍代碼</th>
            <th><font size=3 color=red><?=$_GET['household_id']?></font></th>
        </thead>
    </table>
    <table>
        <tr>
            <th colspan="2" class="set">姓名</th>
            <th colspan="2" class="set">電話</th>
        </tr>
        <?php
            $sql = "SELECT `USER_NAME`,`RESIDENT_PHONE` FROM `user`,`resident`,`resident_address`
            WHERE ( `user`.`USER_ID` = `resident`.`USER_ID`
            AND `user`.`USER_ID` = `resident_address`.`USER_ID` 
            AND `COMMUNITY_ID` = $community 
            AND `HOUSEHOLD_ID` = $id);";
            $result = $conn->query($sql);
            while($row = $result->fetch(PDO::FETCH_ASSOC) ){
        ?>
        <tr>
            <td colspan='2'><?=$row['USER_NAME']?></td>
            <td colspan='2'><?=$row['RESIDENT_PHONE']?></td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>