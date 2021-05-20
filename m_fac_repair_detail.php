<?php
    if(!isset($_GET['repair'])){
        header("location:home.php?page=facility&method=repair");
    }
    $sql = "SELECT `FACILITIES_NAME`, `FACILITIES_REPAIR_CONTENT`,
            `FACILITIES_REPAIR_STATE`, `FACILITIES_REPAIR_RETURN`
            FROM `facilities_repair`,`facilities` 
            WHERE ( `FACILITIES_REPAIR_ID` = ?
            AND `facilities_repair`.`FACILITIES_ID` = `facilities`.`FACILITIES_ID`
            AND `facilities_repair`.`COMMUNITY_ID` = $community);";
    $statement = $conn->prepare($sql);
    $statement->execute(array($_GET['repair']));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if( $row['FACILITIES_REPAIR_STATE'] == 'waiting' ){
        $check = '待處理';
    }else if( $row['FACILITIES_REPAIR_STATE'] == 'solving' ){
        $check = '處理中';
    }else if( $row['FACILITIES_REPAIR_STATE'] == 'resolve' ){
        $check = '已處理';
    }
?>
<link rel="stylesheet" href="css/m_repair_fac_reply.css">
<div class="wrap">
    <form action="home.php" >
        <p><img src="img/circle.svg" alt=""> 公設名稱：<?=$row['FACILITIES_NAME']?></p>
        <hr>
        <p><img src="img/circle.svg" alt=""> 問題描述：</p>
        <textarea name="" id="" cols="30" rows="10"><?=$row['FACILITIES_REPAIR_CONTENT']?></textarea>
        <p><img src="img/circle.svg" alt=""> 進度回報：</p>
        <div class="radio_wrap">
            <input type="radio" name="status" value="waiting" <?=($row['FACILITIES_REPAIR_STATE'] == 'waiting') ? "checked" : "" ?>>
            <span class="radio_text">待處理</span>
            <input type="radio" name="status" value="solving" <?=($row['FACILITIES_REPAIR_STATE'] == 'solving') ? "checked" : "" ?>>
            <span class="radio_text">處理中</span>
            <input type="radio" name="status" value="resolve" <?=($row['FACILITIES_REPAIR_STATE'] == 'resolve') ? "checked" : "" ?>>
            <span class="radio_text">已處理</span>
        </div>
        <hr>
        <p><img src="img/circle.svg" alt=""> 處理結果：<?=$row['FACILITIES_REPAIR_RETURN']?></p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <div class="btn">
            <input type="submit" value="確認送出">
        </div>
    </form>
</div>