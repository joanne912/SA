<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/m_display_booking.css" type="text/css" />
</head>

<body>
    <!-- 公設頁面的表頭 -->
    <?php include("m_facility_header.php");?>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
        <!-- 每一公設的編號 公設icon 名稱 可容納人數 今日預約人數，需連結資料庫-->
        <div class="text">
            <div>
                <span class="name">編號</span>
                <span class="name">游泳池 <img class="facility_img" src="img/swimmer.svg"> </span>
                <span>最大容納人數 ：人</span>
                <span>今日預約人數 : 人</span>
            </div>
        </div>
        <!-- 管理員的查看預約紀錄按鈕 -->
        <div class="icon_group">
            <div class="upper"></div>
            <a href="m_fac_booking.php"><img src="img/next.svg" alt=""></a>
        </div>
    </div>
</body>

</html>


<div class="information2">
    <span class="grayspace" style="border: 3px solid #808080"><span>
            <div class="middletext2">
                <input type="checkbox" name="" id="">
                編號<span>|游泳池</span>
                <img style="weight:20px;height:20px" src="img/swimmer.svg"><br>
                <div class="data" style="letter-spacing:1.2px">
                    <span>戶別: 12
                        |登記人: aaa
                        |預約時段: 8:00 ~ 9:00
                        |預約日期: 20210512 </span>
                </div>
            </div>
</div>