<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/m_facilities.css" type="text/css" />
</head>
<style>
    .item_text a:hover{
        color: #808080;
    }
</style>
<body>
    <!-- 公設頁面的表頭 -->
    <?php include("facility_header.php"); ?>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
        <!-- 公設圖片，需連結資料庫 -->
        <div class="graphic">
            <img src="https://fakeimg.pl/250x150/f7f7fa/d3d3d3" alt="">
        </div>
        <!-- 每一公設的名稱及簡介，需連結資料庫 -->
        <div class="text">
            <h2>編號游泳池</h2>
            <p>開放時間：早上9:00-12:00</p>
            <p>其他公設資訊其他公設資訊其他公設資訊其他公設資訊</p>
        </div>
        <!-- 管理員的查看公設按鈕 -->
        <div class="icon_group">
            <div class="upper">
            </div>
            <a href="home.php?page=order&method=look"><img src="img/next.svg" alt=""></a>
        </div>
    </div>
</body>

</html>