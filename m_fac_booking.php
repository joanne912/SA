
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<style>
    .item_text a{
        color: #808080 !important;
        text-decoration: none !important;
    } 
   
</style>
<link rel="stylesheet" href="css/m_booking_list.css" type="text/css" />
<div class="container" style="height:auto;margin-top:5%;">
    <div class="outside">
        <div class="head">
            <div class="left">
                <a href="home.php?page=facility&method=display_booking"><img src="img/left-arrow.svg"></a>
            </div>
            <div class="name">
                <p>查看住戶預約紀錄</p>
            </div>
        </div>
        <hr>
        <!--預設全選時段和預設當天日期 須從資料庫導入該天該時段的所有住戶預約紀錄-->
        <div class="information">
            <form>
                <p class="content" >開始時段 : 
                    <select class="option1"  name="SelectTime">
                    <optgroup label="請選擇開始時段">
                            <option value="s1">7:00 
                            <option value="s2">8:00 
                    </select>
                </p>
                <p class="content" >結束時段 : 
                    <select class="option1"  name="SelectTime">
                        <optgroup label="請選擇結束時段">
                            <option value="e1">9:00
                            <option value="e2">10:00
                    </select>
                </p>
                <p class="content">選擇日期 : <input class="option1"type="date"></p>
            </form>
        </div>
        <!---->
        <!--資料庫導入公設編號名稱 顯示當天日期 顯示該公設今日(當天)可容納人數 和最大容納人數-->
        <div class="information2">
                    <span class="grayspace"><span>
                    <div class="middletext">
                       
                            <h4 class="h4"> 01<span>游泳池|</span><span>2021/5/13</span></h4>
                            <h3 class="h3"><span class="now_user">目前使用人數 :</span>
                                <span class="num1">5 </span>
                                <span class="num">/</span>
                                <span class="num">20</span>
                            </h3>
                            
                       
                    </div>
        </div>
        <!---->
        <!--點選全選時系統自動選取所有住戶 -->
        <div class="select_box" style="width:70%;margin:auto">
            <label style="color:#fc6471;font-weight:bold">
                <input type="checkbox" name="CheckAll" value="" id="CheckAll" />
            全選</label>
            <span class="content3"data-toggle="modal" data-target="#exampleModalCenter5">
                 選取後點此傳送通知 <img class="plane" src="img/send.svg">
            </span>
        </div>
            <div class="information">
            <!-- 管理員傳送通知給住戶點選連結後出現彈跳視窗 資料庫導入並顯示管理員勾選的住戶的戶別 
            輸入訊息按確認送出後將訊息通知給住戶端 -->
            <div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="" action="">
                            <div class="modal-body">
                                <header class="headmessage">
                                    <div class="M_logo">
                                        <h5 class="conversation"><img style="width:20px;height:20px" src="img/conversation.svg"> 通知重要訊息</h5>
                                    </div>
                                </header><br>
                                <div class="M_wrap">
                                    <div class="M_title">
                                    <!-- 資料庫導入管理者勾選的戶別 -->
                                        <p class="spacing">戶別 :&nbsp; 16, 22, 45
                                            <div class="ti" name="" id=""></div>
                                        </p>
                                        <p class="spacing">
                                            * 輸入欲通知的訊息 :</p>
                                        <div style="width:80%;margin:auto;">
                                        
                                            <textarea class="tt" name="description" placeholder="輸入訊息 :"></textarea>
                                        </div>
                                    </div>
                                    <!-- 訊息傳送給住戶的通知 -->
                                    <div class="M_title">
                                        
                                    
                                        <br><br>
                                        
                                        <div class="message_btn">
                                            <button type="button" class="m_cancel_btn" data-bs-dismiss="modal" id="hide">
                                                <a style="color:#fc6471">取消</a>
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="m_submit_btn" id="go" >
                                            確認
                                            </button>
                                            
                                        </div> 

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>
        <!--切換住戶預約紀錄 類似tab的作法-->
        <div class="situation">
            <input type="button" value="已預約"  class="cancle_btn">
            <input type="button" value="已取消" class="cancle_btn">
            <input type="button" value="已完成" class="cancle_btn">
        </div>
        <br>
        <div class="information2">
            <span class="grayspace" style="border: 3px solid #808080"><span>
                    <div class="middletext2">
                        <input type="checkbox" id="check" name="Checkbox[]">
                        01<span>游泳池</span>
                        <div class="data" >
                            <span class="phonespan"> 戶別 : 12 </span>
                            <span> 登記人 : aaa </span>
                            <p><span> 預約時段 : 8:00 ~ 9:00</span>
                            <span> 預約日期 : 2021<span>/05<span><span>/12 <span> </span></p>
                        </div>
                    </div>
        </div>
        <div class="information2">
            <span class="grayspace" style="border: 3px solid #808080"><span>
                    <div class="middletext2">
                        <input type="checkbox" name="Checkbox[]" id="check" >
                        01<span>游泳池</span>
                        <div class="data">
                            <span>戶別 : 12 </span>
                            <span>  登記人 : aaa </span>
                            <p><span> 預約時段 : 8:00 ~ 9:00</span>
                            <span> 預約日期 : 2021<span>/05<span><span>/12 <span> </span></p>
                        </div>
                    </div>
        </div>

        
        <hr>
    </div>
</div>
<script>
        $('#exampleModalCenter').on('shown.bs.modal', function () {
            $('#hide').click(function (event){
                $('#exampleModalCenter').modal('hide');
            });
        })
        $('#exampleModalCenter').on('shown.bs.modal', function () {
                $('#go').click(function (event){
                    $('#exampleModalCenter').modal('hide');
                });
        })
        // $(document).ready(function () {
        //     $('#selectall').click(function (e) { 
        //         e.preventDefault();
        //         $('check').
                
        //     });
        // });
        $(document).ready(function(){
            $("#CheckAll").click(function(){
                if($("#CheckAll").prop("checked")){//如果全選按鈕有被選擇的話（被選擇是true）
                    $("input[name='Checkbox[]']").each(function(){
                    $(this).prop("checked",true);//把所有的核取方框的property都變成勾選
                    })
                }else{
                    $("input[name='Checkbox[]']").each(function(){
                    $(this).prop("checked",false);//把所有的核方框的property都取消勾選
                    })
            }
            })
 })
    </script>