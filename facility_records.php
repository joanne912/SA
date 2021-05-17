<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/facility_records.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>
<style>
    a{
        color: #808080 !important;
        text-decoration: none !important;
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
            <h4>編號游泳池</h4> 
            <p>預約日期：<span>4 / 23</span></p>
            <p>預約時段：<span>早上 </span><span>8:00 ~ 9:00</span></p>
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
                <a href="home.php?page=order&method=records"><button type="button" class="btn btn-info" >確認</button></a>
            </div>
            </div>
        </div>
        </div>
        <!---->
            <div class="upper2"> </div>
        <a href="facility_record.php"><img src="img/next.svg" alt=""></a>
    </div>
    </div>
</body>

</html>