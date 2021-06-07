<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `facilities_booking` SET `IS_CANCEL` = 1
                WHERE `FACILITIES_BOOKING_ID` = ? AND `FACILITIES_ID` = ?
                AND `COMMUNITY_ID` = $community AND `HOUSEHOLD_ID` = $household;";
        $statement = $conn->prepare($sql);
        $statement->execute(array($_POST['booking'],$_POST['facility']));
    }
    $sql = "SELECT `FACILITIES_BOOKING_ID`,`facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_IMG1`,
            `FACILITIES_BOOKING_DATE`,`FACILITIES_EQUIPMENT_ID`,`FACILITIES_BOOKING_AMOUNT`,`IS_CANCEL`
            FROM `facilities_booking`,`facilities` 
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `facilities`.`COMMUNITY_ID` = `facilities_booking`.`COMMUNITY_ID`
            AND `facilities_booking`.`FACILITIES_BOOKING_DATE` >= NOW()
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
            <button type="button" class="btn1" data-booking="<?=$row['FACILITIES_BOOKING_ID']?>" data-facility="<?=$row['FACILITIES_ID']?>" data-toggle="modal" data-target="#exampleModal">
            取消預約
            </button>
            <div class="upper2"> 
                <a href="home.php?page=facility&method=record&facility=<?=$row['FACILITIES_ID']?>&booking=<?=$row['FACILITIES_BOOKING_ID']?>"><img src="img/next.svg" alt=""></a>
            </div>
        </div>
        <!-- Button trigger modal -->
    </div>
    <?php
    }
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">是否確認取消預約 ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cross"></button>
            </div>
            <div class="modal-body">
                親愛的住戶取消後若要預約請重新預約 謝謝您!!
            </div>
            <div class="modal-footer">
                <form action="home.php?page=facility&method=records" method="post">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="hide">取消</button>
                    <!--住戶點選確認取消後該公設的預約紀錄應顯示在已取消中-->
                    <input type="hidden" name="booking" >
                    <input type="hidden" name="facility" >
                    <button type="submit" name="submit" class="btn btn-info" id="go">確認</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/facility_records.js"></script>
