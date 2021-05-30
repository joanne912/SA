<?php
    $searchtxt = "";
    $sql = "SELECT `HOUSEHOLD_ADDRESS`,`COMMUNITY_ID`,`HOUSEHOLD_ID` 
                FROM `household` WHERE `COMMUNITY_ID` = $community"; //預設搜尋的SQL字串
    if( isset( $_POST["searchtxt"] ) ) {
        $searchtxt = $_POST["searchtxt"];
        $sql += " AND `HOUSEHOLD_ADDRESS` LIKE ? ;";
    }
    else{
        $sql += ";";
    }
    $statement = $conn->prepare($sql);
    $statement->execute(array($searchtxt));
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

<form action="home.php?page=householdid" method=POST>
<p align=center>請輸入戶別:
    <input type=text name="searchtxt" value=<?php echo $searchtxt; ?>>
    <input type=submit value="搜尋戶籍戶別">
</p>
</form>
<table class="table table-hover">
    <tr class="warning">
        <td>戶別</td>
        <td>戶籍代碼</td>
        <td>查看</td>
    </tr>
    <?php
        while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <tr>
        <td><?=$row['HOUSEHOLD_ADDRESS']?></td>
        <td><?=$row['COMMUNITY_ID']?></td>
        <td><a href="home.php?page=householdid&method=look&household_id=<?=$row['HOUSEHOLD_ID']?>">[查看]</a></td>
    </tr>
    <?php
        }
    ?>
</table>
