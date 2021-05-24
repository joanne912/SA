<?php
    $conn = include "conn.php";
    $method = "look";
    $household_id = $_GET["household_id"];
    $sql="select HOUSEHOLD_ADDRESS from household where HOUSEHOLD_ID = $household_id";
    $search=$conn->query($sql);
    $household_address = $search;
    $sql1="select * from user where USER_ID=(select `USER_ID` from resident_address where HOUSEHOLD_ADDRESS = $searchtxt)";
    $search1=$conn->query($sql1);
    if($record1=$search1->fetch())
        {
            $user_name = $record1[1];
        }
    $sql2="select * from resident where USER_ID=(select `USER_ID` from resident_address where HOUSEHOLD_ADDRESS = $searchtxt)";
    $search2=$conn->query($sql2);
    if($record2=$search2->fetch())
        {
            $user_name = $record2[3];
        }
?>
<form action="">
<table>
    <tr>
        <th>戶別</th><th><font size=3 color=red><?php echo $household_address?></font></th>
        <th>戶籍代碼</th><th><font size=3 color=red><?php echo $household_id?></font></th>
    </tr>
    <tr>
        <td colspan="2">姓名</td>
        <td colspan="2">電話</td>
    </tr>
    <?php
        while($record1=$search1->fetch())
        {
            echo "<tr><td colspan='2'>$record1[1]</td>";
        }
        while($record2=$search2->fetch())
        {
            echo "<td colspan='2'>$record2[3]</td></tr>";
        }
    ?>
</table>
</form>