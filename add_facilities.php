<link rel="stylesheet" href="css/add_facilities.css">
<?php include("facility_header.php"); ?>

<div class="wrap">
    <form action="home.php">
        <span>公設名稱： <input type="text"></span>
        <hr>
        <span><img src="img/circle.svg" alt="">公設時段</span>
        <p>開放時段：<input type="text"></p>
        <p>開放時段：<input type="text"></p>
        <hr>
        <span><img src="img/circle.svg" alt="">使用說明</span>
        <p>人數上限：<input type="text" name="" id=""></p>
        <p>所需點數：<input type="text" name="" id=""></p>
        <p>備註等公設相關內容：</p><textarea rows="10" cols="40" name="" id=""></textarea>
        <div class="btn">
            <input type="submit" value="新增確認">
        </div>
    </form>
</div>