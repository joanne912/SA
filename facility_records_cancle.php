<!-- 已取消的預約 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/facility_records.css" type="text/css" />

<?php include("facility_records_header.php"); ?>

<style>
    .item_text a{
        color: #808080 !important;
        text-decoration: none !important;
    } 
</style>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
         <!-- 公設圖片，需連結資料庫 -->
        <div class="graphic">
            <img style="border-radius:8px;width:250px;height:160px"src="https://fakeimg.pl/250x150/f7f7fa/d3d3d3" alt="">
        </div>
        <!-- 每一住戶預約公設的編號 名稱 日期 時段 ，需連結資料庫 -->
        <div class="text">
            <h4 class="h4">02 游泳池</h4> 
            <h7 class="h7">預約日期：<span>4 / 23</span></h7><br>
            <h7 class="h7">預約時段：<span>8 : 00 <span>~</span> 9 : 00</span></h7>
        </div> 
        <div class="icon_group2">
            <div></div>
            <div class="upper2"> 
            </div>
            <a href="home.php?page=facility&method=record"><img src="img/next.svg" alt=""></a>
        </div>       
    </div>
    




