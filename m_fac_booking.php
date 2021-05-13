<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="css/m_booking_list.css" type="text/css" />
    <style>
    .headmessage {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: #d5d5e9;
    }

    .conversation {
        font-size: 20px;
        letter-spacing: 4px;
        width: 100%;
        margin: auto;
        text-align: center;
        padding: 15px 40px;
        color: #808080;
    }

    textarea {
        border: 4px solid #d5d5e9;
        border-radius: 5px;
        padding: 1em;
        box-sizing: border-box;
        font-size: 1em;
        color: black;
        letter-spacing: 3px;
        text-indent: 3px;
        align: center;
    }

    .M_enter {
        margin: auto;
        /* display: flex;
        flex-wrap: wrap;
        justify-content: center; */
    }

    .message {
        margin: 5px 0 0 5px;
        padding: 0 0;
        box-sizing: border-box;
        text-transform: lowercase;
    }

    .M_enter input {
        /* background: #f7f7fa; */
        border: 2px solid #d5d5e9;
        height: 5em;
        width: 8em;
    }

    @media screen and (max-width: 768px) {
        .container {
            height: auto;
        }

        .content {
            font-size: 1.2em !important;
            margin-left: 2em !important;
        }

        .coupon_btn {
            margin-right: 0px;
        }

        .container {
            width: 95%;
            /* display:flex;
            justify-content:center;
            margin:auto; */
        }

        .name {
            margin-left: 28%;
        }

        .option1 {
            margin-right: 39%
        }

        .content3 {
            font-size: 1.2em !important;
            color: #808080;
            letter-spacing: 4px;
            margin: 0 0;
            margin-left: 2em;
        }

        .content2 {

            width: 18.5em;
        }

        .middletext {

            padding: 2.5em 8em;
        }
    }

    @media screen and (max-width: 400px) {
        .container {
            height: auto;
        }

        .coupon_btn {
            width: 4em !important;
            margin-left: .7em !important;
        }

        .cancle_btn {
            margin-left: 7%;
        }

        .name p {
            font-size: 0.7em;
            margin-left: 0%;
            font-weight: bold;
        }

        .head {
            width: 100%;
        }

        .container {
            width: 95%;
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .content3 {
            width: 40%;
            font-size: .5em !important;
            margin-left: 4em !important;
            margin-bottom: .6em;
            width: 19em;
        }

        .option1 {
            margin-left: 2.5em;
            text-indent: 3px;
            width: 19em !important;
        }

        .content2 {
            width: 73%;
            margin: 0 0 !important;
            margin-left: 2.5em !important;
            text-indent: 3px;
        }

        .content {
            font-size: 1em !important;
        }

        .middletext {
            font-size: 0.6em;
            padding: 2.5em 0.55em;
            margin-left: 2%;
        }

        .now_user {
            font-size: 1em;
        }

        .stuation {
            width: 60%;
        }

        .name {
            margin-left: 15%;
        }

        .grayspace {
            width: 90%;
            display: flex;
            justify-content: center;
            margin: auto;
        }
    }
    </style>
</head>

<body>
    <?php 
        include("facility_header.php"); 
    ?>
    <div class="container" style="height:auto">
        <div class="outside">
            <div class="head">
                <div class="left">
                    <a href="m_display_booking.php"><img src="img/left-arrow.svg"></a>
                </div>
                <div class="name">
                    <p>公設預約紀錄清單</p>
                </div>
            </div>
            <hr>
            <!--新增住戶公設預約資訊到資料庫-->
            <div class="information">
                <form>
                    <!--從資料庫載入可以預約的時段-->
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
            <div class="information2">
                <span class="grayspace"><span>
                        <div class="middletext">
                            編號<span>游泳池|</span><span>2021/5/13</span><br>
                            <span class="now_user" style="font-size:1.5em;color:rgb(35, 35, 94)">目前使用人數 :
                                <span class="num" style="font-size:1.5em;color:#fc6471">5 </span>
                                <span class="num" style="font-size:1em;color:#fc6471">/</span>
                                <span class="num" style="font-size:1em;color:#fc6471">20</span>
                            </span>
                        </div>
            </div>

            <!--住戶點選是才會顯示出可以借用的公設 否則不顯示任何可借公設資訊-->
            <div class="information2">
                <button type="button" class="coupon_btn">全選</button>
                <span class="content3">
                    <a href="" data-toggle="modal" data-target="#exampleModalCenter">
                        <img style="width:15px;height:15px" src="img/send.svg"> 選取後點此傳送通知
                    </a>
                </span>
                <!-- 登入內容模型 -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form method="POST" action="login_check.php">
                                <div class="modal-body">
                                    <header class="headmessage">
                                        <div class="M_logo">
                                            <h5 class="conversation"><img src="img/conversation.svg"> 通知重要訊息</h5>
                                        </div>
                                    </header><br>
                                    <div class="M_wrap">
                                        <div class="M_title">
                                            <p>戶別 :</p>
                                            <hr>
                                        </div>
                                        <!-- 帳號密碼輸入框 -->
                                        <div class="M_enter">
                                            <label align="left">
                                                輸入欲通知的訊息 :<br><br>
                                                <textarea rows="10" cols="40" name="" id=""
                                                    placeholder="輸入訊息:"></textarea>
                                            </label>
                                            <br>
                                            <label align="left">
                                                密碼:<br>
                                                <input type="password" id="password" />
                                            </label>
                                            <br>
                                            <input type="submit" name="login_btn" value="一般登入" />
                                        </div>
                                        <button type="button" data-toggle="modal" data-dismiss="modal"
                                            data-target="#exampleModalCenter2">
                                            /register/
                                        </button>
                                        <p>其他登入方式</p>
                                        <!-- 選擇其他登入方式的按鈕 -->
                                        <div class="M_regis_option">
                                            <div class="M_option">
                                                <img src="img/google.svg" alt="" />
                                            </div>
                                            <div class="M_option">
                                                <img src="img/facebook.svg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!---->
            </div><br>
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
                            編號<span>|游泳池</span>
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
                            編號<span>|游泳池</span>
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
</body>

</html>