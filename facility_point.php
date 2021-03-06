<link rel="stylesheet" href="css/facility_point.css">
<body>
    <div class="container">
        <div class="outside">
            <div class="head" >
                <div class="name">
                    <p>點數紀錄</p>
                </div>
            </div>
            <hr class="h">
            <div class="head" >
                <div class="name2">
                    <!--資料庫抓該住戶的點數-->
                    <p>我的點數:<span class="pp"></span><span>點</span></p>
                </div>
            </div>
            <hr class="hr1">
            <br>
            <div class="point_nav">
                <div class="ul">
                    <li>點數狀態</li>
                    <li>預約公設</li>
                    <li>預約日期</li>
                    <li>點數增減</li>
                </div>
            </div>
            <!--住戶1.取消:退回點數 +50套用 class="add_point" 資料庫抓公設名稱 取消預約的日期 點數
                    2.預約:扣點 -30套用 class="minor_point"-->
            <?php
                $sql = "SELECT `facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,
                        `FACILITIES_BOOKING_DATE`,`POINT_USED`
                        FROM `facilities`,`facilities_booking`
                        WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
                        AND `HOUSEHOLD_ID` = $household AND `facilities`.`COMMUNITY_ID` = $community
                        AND `IS_CANCEL` = 0 ORDER BY `FACILITIES_BOOKING_DATE` DESC;";
                foreach( $conn->query($sql) as $row ){
                    ?>
                    <div class="information2">
                        <span class="grayspace"><span>
                        <div class="middletext">
                            <span>預約扣點</span>
                            <span><?=$row['FACILITIES_NAME']?></span>
                            <span><?=$row['FACILITIES_BOOKING_DATE']?></span>
                            <span class="minor_point">
                                <font class="minor_point">-
                                    <span class="point"><?=$row['POINT_USED']?></span>
                                    點
                                </font>
                            </span>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
<script src="js/facility_point.js"></script>
</html>