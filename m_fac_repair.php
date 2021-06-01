<?php 
    $sql = "SELECT `FACILITIES_REPAIR_ID`,`facilities`.`FACILITIES_ID`, DATE(`FACILITIES_REPAIR_DATE`),
            `FACILITIES_NAME`, `FACILITIES_REPAIR_CONTENT`, `FACILITIES_REPAIR_STATE` 
            FROM `facilities_repair`,`facilities` 
            WHERE `facilities_repair`.`FACILITIES_ID` = `facilities`.`FACILITIES_ID`
            AND `facilities_repair`.`COMMUNITY_ID` = $community
            ORDER BY `FACILITIES_REPAIR_STATE` DESC , `FACILITIES_REPAIR_DATE` DESC;";
?>
<link rel="stylesheet" href="css/m_facilities.css">
<link rel="stylesheet" href="css/m_repair_fac.css">
<table>
    <thead>
        <th>編號</th>
        <th>日期</th>
        <th>公設名稱</th>
        <th>問題描述</th>
        <th>處理進度</th>
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
            <?=$row['FACILITIES_NAME']?>-<?=$row['FACILITIES_REPAIR_ID']?>
        </td>
        <td>
            <?=$row['DATE(`FACILITIES_REPAIR_DATE`)']?>
        </td>
        <td>
            <?=$row['FACILITIES_NAME']?>
        </td>
        <td>
            <a href='home.php?page=facility&method=detail&repair=<?=$row['FACILITIES_REPAIR_ID']?>'><?=$row['FACILITIES_REPAIR_CONTENT']?></a>
        </td>
        <td>
            <p class='<?=$row['FACILITIES_REPAIR_STATE']?>'><?=$state?></p>
        </td>
    </tr>
    <?php
    }
    ?>
</table>