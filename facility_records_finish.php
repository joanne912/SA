<?php
    $sql = "SELECT `FACILITIES_BOOKING_ID`,`facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_IMG1`,
            `FACILITIES_BOOKING_DATE`,`FACILITIES_EQUIPMENT_ID`,`FACILITIES_BOOKING_AMOUNT`,`IS_CANCEL`
            FROM `facilities_booking`,`facilities` 
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `facilities`.`COMMUNITY_ID` = `facilities_booking`.`COMMUNITY_ID`
            AND `facilities_booking`.`FACILITIES_BOOKING_DATE` < NOW()
            AND `facilities_booking`.`COMMUNITY_ID` = $community 
            AND `HOUSEHOLD_ID` = $household
            AND `IS_CANCEL` = 0;";
    foreach($conn->query($sql) as $row){
    ?>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
        <!-- 公設圖片，需連結資料庫 -->
        <div class="graphic">
            <img style="border-radius:8px;width:250px;height:160px" src="./img/fac/<?=$row['FACILITIES_IMG1']?>" alt="">
        </div>
        <!-- 每一住戶預約公設的編號 名稱 日期 時段 ，需連結資料庫 -->
        <div class="text">
            <h4 class="h4"><?=$row['FACILITIES_ID']?> <?=$row['FACILITIES_NAME']?></h4> 
            <h7 class="h7">預約日期：<span><?=$row['FACILITIES_BOOKING_DATE']?></span></h7><br>
            <h7 class="h7">預約時段：<span>8 : 00 <span>~</span> 9 : 00</span></h7>
        </div>
        <div class="icon_group2">
            <div class="upper2"> 
            </div>
            <a href="home.php?page=facility&method=record&facility=<?=$row['FACILITIES_ID']?>"><img src="img/next.svg" alt=""></a>
        </div>     
    </div>
    <?php
    }
?>




