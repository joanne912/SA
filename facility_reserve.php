<?php
    include("auth.php");
    $conn = include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社區管理系統</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/f_reserve.js"></script>
    <link rel="stylesheet" href="css/facility_reserve.css">
    <style>
        #information{
            display:none;
        }
        #information.active{
            display:block;
        }
        .tab{
            display: none;
        }
    </style>
</head>
<body>
    <form action="facility_reserve.php" action="POST">
        <div class="container" style="margin-top:5%;">
            <div class="outside">
                <div class="head" >
                    <a href="home.php?page=facility&method=look">
                        <img class="left" src="img/left-arrow.svg">
                    </a> 
                    
                    <span class="name">公設預約</span>
                   
                </div>
                <hr>
                
                <p class="dot"style="font-weight:bold"><img src="img/circle.svg">&nbsp桌球室 : </img></p>
                <!--新增住戶公設預約資訊到資料庫-->
               
                    
                        <!--從資料庫載入可以預約的時段-->
                        <p class="content">開始預約時段 : 
                            <select class="option1" name="StartTime">
                                <optgroup label="請選擇開始時段">
                                    <option value="s1">7:00
                                    <option value="s2">8:00
                            </select>
                        </p>

                        <p class="content">結束預約時段 : 
                            <select class="option1" name="EndTime">
                                <optgroup label="請選擇結束時段">
                                    <option value="e1">8:00
                                    <option value="e2">9:00
                            </select>
                        </p>
                        <p class="content">預約公設日期 : <input class="option1"type="date"></p>
                        <p class="content">預約公設人數 : 
                            <select class="option1" name="SelectPeople">
                                <optgroup label="選擇人數">
                                    <option value="p1">1人
                                    <option value="p2">2人
                                    <option value="p3">3人
                                    <option value="p4">4人
                                    <option value="p5">5人
                            </select>
                        </p><br>
                    <!--資料庫匯出住戶的點數 若住戶點選我要扣點後須顯示在剩餘點數 -->
                    <p class="content">您的點數 : 500 點</p><br>
               
                <!--住戶點選是才會顯示出可以借用的公設 否則不顯示任何可借公設資訊-->
               
                    <p class="content">* 是否要借用設備 ?
                        <div>
                            <input type="radio"  name="borrowtool" value="yes" id="yes">
                            <label for="male"> 是 &nbsp&nbsp&nbsp&nbsp</label> 
                            <input type="radio"  name="borrowtool" value="no" checked id="no">
                            <label for="male"> 否 </label>
                        </div>
                    </p>
                  
                    <div class="tab">
                        <button class="tablinks" onclick="tools(event, '桌球拍')">桌球拍</button>
                        <button class="tablinks" onclick="tools(event, '桌球')">桌球</button>
                        <button class="tablinks" onclick="tools(event, '桌球墊')">桌球墊</button>
                    </div>
                    <div id="桌球拍" class="tabcontent">
                        <p>選擇借用個數 :</p>
                        <p>
                            <div class="check">
                                <input type="checkbox" name="borrownum1" value="a.桌球拍" checked> 0 支
                                <input type="checkbox" name="borrownum1" value="b.桌球拍" > 1 支
                            </div>
                        </p>
                    </div>
                    <div id="桌球" class="tabcontent">
                        <p>選擇借用個數 :</p>
                        <p>
                            <div class="check">
                                <input type="checkbox" name="borrownum2" value="a.桌球"checked > 0 顆
                                <input type="checkbox" name="borrownum2" value="b.桌球" > 1 顆
                            </div>
                        </p> 
                    </div>
                    <div id="桌球墊" class="tabcontent">
                        <p>選擇借用個數 :</p>
                        <p>
                            <div class="check">
                                <input type="checkbox" name="borrownum3" value="a.桌球墊"checked > 0 組
                                <input type="checkbox" name="borrownum3" value="b.桌球墊" > 1 組
                            </div>
                        </p> 
                    </div>
                    <script>
                        function tools(evt, toolName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(toolName).style.display = "block";
                        event.currentTarget.className += " active";
                        }
                    </script>
                <button type="button" class="btn btn-info see_information">確認填寫無誤</button>
               
                    <!--可借用公設資訊End-->
                <hr>
            </div>
            <div class="outside"id="information">
                <p class="dot" style="font-weight:bold"><img src="img/circle.svg"> &nbsp確認預約資訊 : </img></p>
               
                    <!--住戶點數扣除公設點數-->
                    <p class="content">剩餘點數 : 500 - 20 = 480 點</p>
                    <div class="content2" >
                        <label class="content">預約資訊(請確認預約資料無誤) :
                            <!--display住戶預約資訊 若無借用設備則顯示無-->
                        
                                <div class="reserveinform">
                                    <p>預約時段 : 7:00 ~ 10:00</p>
                                    <p>預約日期 : 2021/5/7</p>
                                    <p>預約人數 : 2 人</p>
                                    <p>借用設備 : 桌球1顆</p>
                                </div>
                                </label>
                    </div>
             
                <div>
                    <a href="home.php?page=facility&method=record"><input type="button" value="確認送出"class="send"></a>
                </div>
                <br><br>
                <hr>
            </div>
        </div>
    </form>
</body>
</html>