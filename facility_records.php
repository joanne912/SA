<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/facility_records.css" type="text/css" />
</head>
<style>
    .item_text a:hover{
        color: #808080;
    }
</style>
<body>
      <!-- 顯示住戶已預約 已取消 已完成的預約紀錄 -->
    <div class="situation">
        <input type="button" value="已預約" style="color:#fc6471;letter-spacing:1.2px" class="cancle_btn">
        <input type="button" value="已取消" class="cancle_btn">
        <input type="button" value="已完成" class="cancle_btn">
    </div>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
         <!-- 公設圖片，需連結資料庫 -->
        <div class="graphic">
            <img src="https://fakeimg.pl/250x150/f7f7fa/d3d3d3" alt="">
        </div>
        <!-- 每一住戶預約公設的編號 名稱 日期 時段 有早上下午之分，需連結資料庫 -->
        <div class="text">
            <h2>編號游泳池</h2> 
            <p>預約日期：<span>4 / 23</span></p>
            <p>預約時段：<span>早上 </span><span>8:00 ~ 9:00</span></p>
        </div>
        <div class="icon_group2">
        <!-- 住戶點選垃圾桶icon 或是點選取消 系統詢問是否確認取消預約? 點選確認後取消 參考文件p.96 -->
        <a href="#"><img  class="trash_img"src="img/delete.svg" alt=""></a>
        <span class="delete_reserve"> 取消</span>
            <div class="upper2"> </div>
        <a href="facility_record.php"><img src="img/next.svg" alt=""></a>
    </div>
    </div>
</body>

</html>