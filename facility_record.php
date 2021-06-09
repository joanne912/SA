<?php
    $facility = $_GET['facility'];
    $booking = $_GET['booking'];
    $sql = "SELECT `FACILITIES_BOOKING_ID`,`facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_IMG1`,
            `FACILITIES_POINT`,`FACILITIES_BOOKING_DATE`,`FACILITIES_EQUIPMENT_ID`,`FACILITIES_EQUIPMENT_AMOUNT`,
            `FACILITIES_BOOKING_AMOUNT`,`IS_CANCEL`
            FROM `facilities_booking`,`facilities`
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `facilities`.`FACILITIES_ID` = :facility
            AND `facilities`.`COMMUNITY_ID` = `facilities_booking`.`COMMUNITY_ID`
            AND `facilities`.`COMMUNITY_ID` = $community
            AND `HOUSEHOLD_ID` = $household
            AND `FACILITIES_BOOKING_ID` = :booking;";
    $statement = $conn->prepare($sql);
    $statement->execute(array(
        ':booking' => $booking,
        'facility' => $facility
    ));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $sql = "SELECT MIN(`FACILITIES_START`),MAX(`FACILITIES_START`) FROM `facilities_booking_time`
            WHERE `COMMUNITY_ID` = $community AND `FACILITIES_ID` = ".$row['FACILITIES_ID']."
            AND `HOUSEHOLD_ID` = $household AND `FACILITIES_BOOKING_ID` = ".$row['FACILITIES_BOOKING_ID'];
    $time = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    if(isset($row['FACILITIES_EQUIPMENT_ID'])){
        $equipment = $row['FACILITIES_EQUIPMENT_ID'];
        $sql = "SELECT `FACILITIES_EQUIPMENT_NAME`,`FACILITIES_EQUIPMENT_UNIT` FROM `facilities_equipment` 
        WHERE `FACILITIES_EQUIPMENT_ID` = $equipment
        AND `FACILITIES_ID` = ?
        AND `COMMUNITY_ID` = $community ";
        $statement = $conn->prepare($sql);
        $statement->execute(array($facility));
        $row2 = $statement->fetch(PDO::FETCH_ASSOC);
    }
    $equipment = isset($row['FACILITIES_EQUIPMENT_ID'])?$row2['FACILITIES_EQUIPMENT_NAME']:'無借器材';
    $equipment .= isset($row['FACILITIES_EQUIPMENT_ID'])?$row['FACILITIES_EQUIPMENT_AMOUNT']:'';
    $equipment .= isset($row['FACILITIES_EQUIPMENT_ID'])?$row2['FACILITIES_EQUIPMENT_UNIT']:'';
?>
<link rel="stylesheet" href="css/facility_record.css">
<div class="container">
    <div class="outside">
    <div class="head">
        <div class="left">
            <a href="home.php?page=facility&method=records"><img src="img/left-arrow.svg"></a>
        </div>
        <div class="name">
            <p>查看住戶預約紀錄</p>
        </div>
    </div>
    <hr>
    <!--從資料庫匯出(顯示住戶預約資訊)該住戶預約該公設的名稱 日期 時段 人數 電話 email 原本點數 剩餘點數 若有借用設備顯示借用的設備名稱 -->
    <p class="dot"><img src="img/circle.svg">&nbsp公設名稱 : <?=$row['FACILITIES_NAME']?></img></p>
    <div class="information">
        <p class="content">預約時段 :  <span><?=$time['MIN(`FACILITIES_START`)']?> : 00 <span>~</span> <?=$time['MAX(`FACILITIES_START`)']?> : 00</span></p>
        <p class="content">預約日期 :  <?=$row['FACILITIES_BOOKING_DATE']?></p>
        <p class="content">預約人數 : <span><?=$row['FACILITIES_BOOKING_AMOUNT']?><span><span>人<span></p>
        <p class="content">本次點數 : <span class="yourpoint"><?=$row['FACILITIES_POINT']?></span> 點</p>
        <p class="content">借用的設備 : <span class="borrowtool"><?=$equipment?></span></p>
    </div>
    <hr> 
    </div>
</div>