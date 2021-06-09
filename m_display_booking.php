
<link rel="stylesheet" href="css/m_display_booking.css" type="text/css" />
<link rel="stylesheet" href="css/m_facility.css" type="text/css" />
<?php
    $sql = "SELECT `FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_LIMIT`,`FACILITIES_IMG1`
            FROM `facilities` WHERE ( `COMMUNITY_ID` = $community );";

    foreach( $conn->query($sql) as $row1 ){
        $facility = $row1['FACILITIES_ID'];
        $sql = "SELECT COUNT(`FACILITIES_ID`) FROM `facilities_booking` 
                WHERE ( `COMMUNITY_ID` = $community AND `FACILITIES_ID` = $facility AND `FACILITIES_BOOKING_DATE` = CURDATE() );";
        foreach( $conn->query($sql) as $row2){
            ?>
            <!-- 每個獨立的公設資訊 -->
            <div class="info_wrap">
                <!-- 公設圖片，連結資料庫 -->
                <div class="graphic">
                    <img  style="border-radius:8px;width:250px;height:160px"src='./img/fac/<?=$row1["FACILITIES_IMG1"]?>' alt=''>
                </div>
                <!-- 每一公設的 公設icon 名稱 可容納人數 今日預約人數，需連結資料庫-->
                <div class="textcontent" >
                        <h2 class="name"><?=$row1['FACILITIES_NAME']?></h2>
                        <p> 最大容納人數 : <?=$row1['FACILITIES_LIMIT']?> 人
                        <p> 今日預約人數 : <?=$row2['COUNT(`FACILITIES_ID`)']?> 人</p>
                </div>
                <!-- 管理員的查看住戶預約紀錄按鈕 -->
                <div class="icon_group">
                    <div class="upper"></div>
                    <a href="home.php?page=facility&method=booking&facility=<?=$facility?>"><img src="img/next.svg" alt=""></a>
                </div>
            </div>
            <?php
        }
    }
?>


