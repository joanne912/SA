<!-- 已取消的預約 -->
<link rel="stylesheet" href="css/facility_records.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include("facility_records_header.php"); ?>

<style>
    a{
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
            <a href="facility_record.php"><img src="img/next.svg" alt=""></a>
        </div>       
    </div>
    




