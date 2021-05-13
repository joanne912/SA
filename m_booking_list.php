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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/m_booking_list.css" type="text/css"/>
    <style>
     @media screen and (max-width: 768px){
        .container{
            height:auto;
        }
         .content{
             font-size:1.2em !important;
             margin-left:2em !important;
         }
         .coupon_btn{
             margin-right:0px ;
         }
        .container{
            width:95%;
            /* display:flex;
            justify-content:center;
            margin:auto; */
        }
        .name{
            margin-left:28%;
        }
        .option1{
            margin-right:39%
        }
        .content3{
            font-size:1.2em !important;
            color:#808080;
            letter-spacing:4px;
            margin: 0 0;
            margin-left:2em;
        }
        .content2{
            
            width:18.5em;
        }
        .middletext{
           
           padding:2.5em 8em;
       }
    }
    @media screen and (max-width: 400px){
        .container{
            height:auto;
        }
        .coupon_btn{
            width:4em !important;
            margin-left:.7em!important;
        }
        .cancle_btn{
            margin-left: 7%;
        }
        .name p{
            font-size:0.7em;
            margin-left: 0%;
            font-weight:bold;
        }
        .head{
            width:100%;
        }
        .container{
            width:95%;
            display:flex;
            justify-content:center;
            margin:auto;
        }
        .content3{
            width:40%;
            font-size:.5em !important; 
            margin-left:4em !important;
            margin-bottom:.6em;
            width:19em;
        }
        .option1{
            margin-left:2.5em;
            text-indent: 3px;
            width:19em !important;
        }
       .content2{
           width:73%;
           margin:0 0 !important;
           margin-left:2.5em !important;
           text-indent: 3px;
       }
       .content{
        font-size:1em !important; 
       }
       .middletext{
           font-size:0.6em;
           padding:2.5em 0.55em;
           margin-left:2%;
       }
       .now_user{
           font-size:1em;
       }
       .stuation{
           width:60%;
       }
       .name{
           margin-left:15%;
       }
       .grayspace{
           width:90%;
           display:flex;
           justify-content:center;
           margin:auto;
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
            <div class="information" >
                <form>
                      <!--從資料庫載入可以預約的時段-->
                    <label class="content" style="margin-left:1em">選擇時段 : </label>
                    <select class="option1" style="padding:.5em .1em"name="SelectTime">
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
                    <input class="content2" style="margin-left:1em" type="date" > 
                </form> 
            </div>
            <div class="information2">
                <span class="grayspace"><span>
                <div class="middletext" >
                    編號<span>游泳池|</span><span>2021/5/13</span><br>
                    <span class="now_user" style="font-size:1.5em;color:rgb(35, 35, 94)">目前使用人數 : 
                        <span class="num" style="font-size:1.5em;color:#fc6471">5 </span>
                        <span class="num"style="font-size:1em;color:#fc6471">/</span>
                        <span class="num"style="font-size:1em;color:#fc6471">20</span>
                    </span>
                </div>  
            </div>
            
             <!--住戶點選是才會顯示出可以借用的公設 否則不顯示任何可借公設資訊-->
            <div class="information2">
                <button type="button" class="coupon_btn">全選</button>
                <span class="content3"> <img class="sending" src="img/send.svg"> 選取傳送通知的對象</span>
            </div><br>
            <div class="situation">
                <input type="button" value="已預約" style="color:#fc6471;letter-spacing:1.2px"class="cancle_btn">
                <input type="button" value="已取消"class="cancle_btn">
                <input type="button" value="已完成"class="cancle_btn">
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
                <!-- <p class="content">* 是否要借用設備 ?
                    <div>
                        <input type="radio"  name="borrowtool" value="yes">
                        <label for="male"> 是 &nbsp&nbsp&nbsp&nbsp</label> 
                        <input type="radio"  name="borrowtool" value="no" checked >
                        <label for="male"> 否 </label>
                    </div>
                </p> -->
                <!--若使用者選擇否不會顯示設備借用選單 是則顯示-->
                <!-- <div class="tab">
                    <button class="tablinks" onclick="tools(event, 'Table')">桌球拍</button>
                    <button class="tablinks" onclick="tools(event, 'Micro')">麥克風</button>
                    <button class="tablinks" onclick="tools(event, 'Air')">冷氣遙控器</button>
                </div>

                <div id="Table" class="tabcontent">
                    <p>選擇借用項目 :</p>
                    <p>
                        <div class="check">
                            <input type="checkbox" name="borrownum" value="a.桌球拍" > a.桌球拍
                            <input type="checkbox" name="borrownum" value="b.桌球拍" > b.桌球拍
                        </div>
                    </p>
                </div>

                <div id="Micro" class="tabcontent">
                    <p>選擇借用項目 :</p>
                    <p>
                        <div class="check">
                            <input type="checkbox" name="borrownum" value="a.麥克風" > a.麥克風
                            <input type="checkbox" name="borrownum" value="b.麥克風" > b.麥克風
                        </div>
                    </p> 
                </div>

                <div id="Air" class="tabcontent">
                    <p>選擇借用項目 :</p>
                    <p>
                        <div class="check">
                            <input type="checkbox" name="borrownum" value="a.冷氣遙控器" > a.冷氣遙控器
                            <input type="checkbox" name="borrownum" value="b.冷氣遙控器" > b.冷氣遙控器
                        </div>
                    </p> 
                </div>
            </div> -->
                 <!--可借用公設資訊End-->
   
