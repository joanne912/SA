<?php 
    include("facility_repair_header.php");
    $sql = "SELECT `FACILITIES_REPAIR_ID`,`facilities`.`FACILITIES_ID`, DATE(`FACILITIES_REPAIR_DATE`),
            `FACILITIES_NAME`, `FACILITIES_PLACE`, `FACILITIES_REPAIR_CONTENT`,
            `FACILITIES_REPAIR_STATE`, `FACILITIES_REPAIR_RETURN` 
            FROM `facilities_repair`,`facilities` 
            WHERE `facilities_repair`.`FACILITIES_ID` = `facilities`.`FACILITIES_ID`
            AND `facilities_repair`.`COMMUNITY_ID` = `facilities`.`COMMUNITY_ID`
            AND `facilities_repair`.`COMMUNITY_ID` = $community AND `USER_ID` = $id
            ORDER BY `FACILITIES_REPAIR_STATE` DESC , `FACILITIES_REPAIR_DATE` DESC;";
?>
<link rel="stylesheet" href="css/m_facilities.css">
<link rel="stylesheet" href="css/m_repair_fac.css">
<link rel="stylesheet" href="css/facility_repair_status.css">
<table>
    <thead>
        <th>報修日期</th>
        <th>公設名稱</th>
        <th>公設位置</th>
        <th>問題描述</th>
        <th>處理進度</th>
        <th>維修說明</th>
    </thead>
    <?php
    foreach( $conn->query($sql) as $row ){
        if( $row['FACILITIES_REPAIR_STATE'] == 'resolve' ){
            $state = '已處理';
        }else if( $row['FACILITIES_REPAIR_STATE'] == 'waiting' ){
            $state = '待處理';
        }else if( $row['FACILITIES_REPAIR_STATE'] == 'solving' ){
            $state = '處理中';
        }
    ?>
    <tr>
        <td>
            <?=$row['DATE(`FACILITIES_REPAIR_DATE`)']?>
        </td>
        <td>
            <?=$row['FACILITIES_NAME']?>
        </td>
        <td>
            <?=$row['FACILITIES_PLACE']?>
        </td>
        <td>
            <?=$row['FACILITIES_REPAIR_CONTENT']?>
        </td>
        <td>
            <p class='<?=$row['FACILITIES_REPAIR_STATE']?>'><?=$state?></p>
        </td>
        <td>
            <?=$row['FACILITIES_REPAIR_RETURN']?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>