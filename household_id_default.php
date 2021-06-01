<link rel="stylesheet" href="css/household_id_default.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
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