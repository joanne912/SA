<?php
    $searchtxt = "";
    $sql = "SELECT `HOUSEHOLD_ADDRESS`,`COMMUNITY_ID`,`HOUSEHOLD_ID` 
                FROM `household` WHERE `COMMUNITY_ID` = $community"; //預設搜尋的SQL字串
    if( isset( $_POST["searchtxt"] ) ) {
        $searchtxt = $_POST["searchtxt"];
        $sql .= " AND `HOUSEHOLD_ADDRESS` LIKE ? ";
    }
    $statement = $conn->prepare($sql);
    $statement->execute(array("%".$searchtxt."%"));
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/household_id.css">
<form class="search" method="POST" action="home.php?page=householdid">
    <label for="searchtxt">請輸入戶別 :</label> 
    <input class="input1" type="text" name="searchtxt" id="searchtxt" value=<?php echo $searchtxt; ?>>
    <input class="input2" type="submit" value="搜尋戶籍戶別">
</form>
<table class="table table-hover">
    <tr class="warning">
        <th>戶別</th>
        <th>戶籍代碼</th>
        <th>查看</th>
    </tr>
    <?php
        while( $row = $statement->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <tr>
        <td><?=$row['HOUSEHOLD_ADDRESS']?></td>
        <td><?=$row['HOUSEHOLD_ID']?></td>
        <td><a href="home.php?page=householdid&method=look&household_id=<?=$row['HOUSEHOLD_ID']?>">[查看]</a></td>
    </tr>
    <?php
        }
    ?>
</table>
