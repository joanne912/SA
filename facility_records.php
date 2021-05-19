<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
   <link rel="stylesheet" href="css/facility_records.css" type="text/css" />
    
</head>
<style>
a{
        color: #808080 !important;
        text-decoration: none !important;
    }
    /* a{
        color: #808080 !important;
        text-decoration: none !important;
    } */
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
            <h4>編號游泳池</h4> 
            <h7>預約日期：<span>4 / 23</span></h7><br>
            <h7>預約時段：<span>早上 </span><span>8:00 ~ 9:00</span></h7>
        </div>
        <div class="icon_group2">
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><img  class="trash_img"src="img/delete.svg" alt=""></a> 
        <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="delete_reserve"> 取消</span>
        <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">是否確認取消預約 ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                親愛的住戶取消後若要預約請重新預約 謝謝您!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">取消</button>
                <!--住戶點選確認取消後該公設的預約紀錄應顯示在已取消中-->
                <a href="home.php?page=facility&method=records"><button type="button" class="btn btn-info" >確認</button></a>
            </div>
            </div>
        </div>
        </div>
        <!---->
            <div class="upper2"> </div>
        <a href="facility_record.php"><img src="img/next.svg" alt=""></a>
    </div>
    </div>
    <!-- <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <img src="..." class="rounded mr-2" alt="...">
                <strong class="mr-auto">你已成功取消預約游泳池 !</strong>
                <small>1 分鐘</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                預約時段、日期、人數
            </div>
        </div>
    </div> -->
</body>

</html>