
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/m_booking_list.css" type="text/css" />
<div class="container" style="height:auto;margin-top:5%;">
    <div class="outside">
        <div class="head">
            <div class="left">
                <a href="m_display_booking.php"><img src="img/left-arrow.svg"></a>
            </div>
            <div class="name">
                <p>查看住戶預約紀錄</p>
            </div>
        </div>
        <hr>
        <!--預設全選時段和預設當天日期 須從資料庫導入該天該時段的所有住戶預約紀錄-->
        <div class="information">
            <form>
                <label class="content" style="margin-left:1em">選擇時段 : </label>
                <select class="option1" style="padding:.5em .1em" name="SelectTime">
                    <optgroup label="時段全選">
                        <option value="all">全選
                    <optgroup label="早上時段">
                        <option value="am1">7:00 ~ 8:00
                        <option value="am2">8:00 ~ 9:00
                    <optgroup label="下午時段">
                        <option value="pm1">13:00 ~ 14:00
                        <option value="pm2">15:00 ~ 16:00
                </select>

                <label class="content3" style="font-size:1em">選擇日期 : </label>
                <input class="content2" style="margin-left:1em" type="date">
            </form>
        </div>
        <!---->
        <!--資料庫導入公設編號名稱 顯示當天日期 顯示該公設今日(當天)可容納人數 和最大容納人數-->
        <div class="information2">
                    <span class="grayspace"><span>
                    <div class="middletext">
                        01<span>游泳池|</span><span>2021/5/13</span><br>
                        <span class="now_user" style="font-size:1.5em;color:rgb(35, 35, 94)">目前使用人數 :
                            <span class="num" style="font-size:1.5em;color:#fc6471">5 </span>
                            <span class="num" style="font-size:1em;color:#fc6471">/</span>
                            <span class="num" style="font-size:1em;color:#fc6471">20</span>
                        </span>
                    </div>
        </div>
        <!---->
        <!--點選全選時系統自動選取所有住戶 -->
        <div class="information2">
            <button type="button" class="coupon_btn">全選</button>
            <span class="content3"data-toggle="modal" data-target="#exampleModalCenter">
                    <img style="width:15px;height:15px" src="img/send.svg"> 選取後點此傳送通知
            </span>
            <!-- 管理員傳送通知給住戶點選連結後出現彈跳視窗 資料庫導入並顯示管理員勾選的住戶的戶別 
            輸入訊息按確認送出後將訊息通知給住戶端 -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                            <button type="cancel" class="m_cancel_btn">
                                                <a style="color:#fc6471"href="home.php?page=m_facility&method=booking">取消</a>
                                            </button>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="m_submit_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                            確認
                                            </button>
                                            <!-- Modal 使管理員確認有成功送出信件 條件:住戶有收到信件通知-->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">已成功送出通知!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal 顯示管理員輸入的訊息 -->
                                                <div class="modal-body">
                                                    通知的訊息 : <br> 游泳池在早上不開放 造成住戶不便深感抱歉!!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">關閉</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <!---->
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
            <input type="button" value="已預約" style="color:#fc6471;letter-spacing:1.2px" class="cancle_btn">
            <input type="button" value="已取消" class="cancle_btn">
            <input type="button" value="已完成" class="cancle_btn">
        </div>
        <br>
        <div class="information2">
            <span class="grayspace" style="border: 3px solid #808080"><span>
                    <div class="middletext2">
                        <input type="checkbox" name="" id="">
                        01<span>|游泳池</span>
                        <img style="weight:20px;height:20px" src="img/swimmer.svg"><br>
                        <div class="data" style="letter-spacing:1.2px">
                            <span>戶別: 12
                                |登記人: aaa
                                |預約時段: 8:00 ~ 9:00
                                |預約日期: 20210512 </span>
                        </div>
                    </div>
        </div>

        <div class="information2">
            <span class="grayspace" style="border: 3px solid #808080"><span>
                    <div class="middletext2">
                        <input type="checkbox" name="" id="">
                        01<span>|游泳池</span>
                        <img style="weight:20px;height:20px" src="img/swimmer.svg"><br>
                        <div class="data" style="letter-spacing:1.2px">
                            <span>戶別: 12
                                |登記人: aaa
                                |預約時段: 8:00 ~ 9:00
                                |預約日期: 20210512 </span>
                        </div>
                    </div>
        </div>
        <hr>
    </div>
</div>
