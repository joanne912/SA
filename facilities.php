<?php
    $sql = "SELECT `FACILITIES_ID`,`FACILITIES_NAME`, `FACILITIES_INTRODUCTION`,
            `FACILITIES_PLACE`, HOUR(`FACILITIES_OPEN_TIME`), HOUR(`FACILITIES_CLOSE_TIME`),
            `FACILITIES_IMG1` FROM `facilities` WHERE ( `COMMUNITY_ID` = $community );";
    
    foreach( $conn->query($sql) as $row ){
        ?>
        <!-- 每個獨立的公設資訊 -->
        <div class='info_wrap'>
            <!-- 公設圖片，需連結資料庫 -->
            <div class='graphic'>
                <img src='<?=$row["FACILITIES_IMG1"]?>' alt=''>
            </div>
            <!-- 每一公設的名稱及簡介，需連結資料庫 -->
            <div class='text'>
                <h2><?=$row['FACILITIES_NAME']?></h2>
                <p>開放時間：<?=$row['HOUR(`FACILITIES_OPEN_TIME`)']?>:00~<?=$row['HOUR(`FACILITIES_CLOSE_TIME`)']?>:00</p>
                <p><?=$row['FACILITIES_INTRODUCTION']?></p>
            </div>
            <!-- 管理員的修改刪除按鈕群組 -->
            <div class='icon_group'>
                <div class='upper'>
                    <?php
                        if($auth <= 4){
                            ?>
                            <a href='#'><img src='img/edit.svg' alt=''></a>
                            <a href='#'><img src='img/delete.svg' alt=''></a>
                            <?php
                        }
                    ?>
                </div>
                <a href='home.php?page=facility&method=look&facility=<?=$row["FACILITIES_ID"]?>'><img src='img/next.svg' alt=''></a>
            </div>
        </div>
        <?php
    }
?>