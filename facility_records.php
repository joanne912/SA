<!-- 已預約-->
<link rel="stylesheet" href="css/facility_records.css" type="text/css" />

<?php include("facility_records_header.php"); ?>


     
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap">
         <!-- 公設圖片，需連結資料庫 -->
        <div class="graphic">
            <img src="https://fakeimg.pl/250x150/f7f7fa/d3d3d3" alt="">
        </div>
        <!-- 每一住戶預約公設的編號 名稱 日期 時段 ，需連結資料庫 -->
        <div class="text">
            <h4 class="h4">01 游泳池</h4> 
            <h7 class="h7">預約日期：<span>4 / 23</span></h7><br>
            <h7 class="h7">預約時段：<span>8 : 00 <span>~</span> 9 : 00</span></h7>
        </div>
        <div class="icon_group2">
        <button type="button" class="btn1" data-toggle="modal" data-target="#exampleModal">
        取消預約
        </button>
        <div class="upper2"> 
            <a href="home.php?page=facility&method=record"><img src="img/next.svg" alt=""></a>
        </div>
        <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">是否確認取消預約 ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cross"></button>
                    </div>
                    <div class="modal-body">
                        親愛的住戶取消後若要預約請重新預約 謝謝您!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="hide">取消</button>
                        <!--住戶點選確認取消後該公設的預約紀錄應顯示在已取消中-->
                       <button type="button" class="btn btn-info" id="go">確認</button>
                    </div>
                </div>
            </div>
        </div>
            <!---->
               
    </div>
    
    <!-- <script>
        $(document).ready(function () {
            $('#hide').click(function (event){
                $('.modal-dialog').slideToggle();
            });
        })
    </script> -->
    <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#hide').click(function (event){
                $('#exampleModal').modal('hide');
            });
        })
        $('#exampleModal').on('shown.bs.modal', function () {
                $('#cross').click(function (event){
                    $('#exampleModal').modal('hide');
                });
        })
        $('#exampleModal').on('shown.bs.modal', function () {
                $('#go').click(function (event){
                    $('#exampleModal').modal('hide');
                });
        })
    </script>



</html>