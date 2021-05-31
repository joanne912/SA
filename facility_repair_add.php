<?php
    if (isset($_POST['submit'])){
        $sql = "SELECT MAX(`FACILITIES_REPAIR_ID`) FROM `facilities_repair` 
                WHERE `COMMUNITY_ID` = $community AND `FACILITIES_ID` = ?;";
        $statement = $conn->prepare($sql);
        $statement->execute(array($_POST['facility']));
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $repair = $row['MAX(`FACILITIES_REPAIR_ID`)'] + 1;

        $sql = "INSERT INTO `facilities_repair` (`FACILITIES_REPAIR_ID`,`COMMUNITY_ID`,`FACILITIES_ID`,`USER_ID`,
                `FACILITIES_REPAIR_DATE`,`FACILITIES_REPAIR_CONTENT`,`FACILITIES_REPAIR_STATE`,`FACILITIES_REPAIR_RETURN`)
                VALUES ($repair,$community,:facility,$id,:date,:content,'waiting',NULL);";
        $statement = $conn->prepare($sql);
        $statement->execute(array(
            ':facility' => $_POST['facility'],
            ':date' => date('Y-m-d H:i:s'),
            ':content' => $_POST['content'],
        ));
    }
    $sql = "SELECT `FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_PLACE`
            FROM `facilities` WHERE ( `COMMUNITY_ID` = $community );";
?>
<link rel="stylesheet" href="css/facility_repair_add.css">
<?php include("facility_repair_header.php"); ?>

<div class="con">
    <div class="sec">
        <p>公設報修</p>
    </div>
    <hr>
    <form action="home.php?page=facility&method=repair_add" method="POST">
        <p>公設位置與名稱：
            <select name="facility">
            <?php 
                foreach( $conn->query($sql) as $row ){ 
                ?>
                <option value="<?=$row['FACILITIES_ID']?>"><?=$row['FACILITIES_PLACE']?><?=$row['FACILITIES_NAME']?></option>
                <?php
                } 
            ?>
            </select>
        </p>
        <p>
            損壞情況：<br>
            <textarea name="content" cols="50" rows="20"></textarea>
        </p>
        <div class="btn">
            <input name="submit" type="submit" value="新增報修"></a>
        </div>
    </form>
</div>