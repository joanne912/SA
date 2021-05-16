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
    <link rel="stylesheet" href="css/facility_reserve.css">
</head>
<body>
    <div class="container">
        <div class="outside">
            <div class="head">
                <div class="left">
                    <a href="home.php?page=order&method=look"><img src="img/left-arrow.svg"></a> 
                </div>
                <div class="name">
                    <p >公設預約</p>
                </div>
            
            </div>
            <hr>
            
            <p class="dot"><img src="img/circle.svg">&nbsp公設名稱 : </img></p>
            <!--新增住戶公設預約資訊到資料庫-->
            <div class="information">
                <form>
                      <!--從資料庫載入可以預約的時段-->
                    <label class="content">預約時段 : </label>
                    <select class="option1" name="SelectTime">
                        <optgroup label="早上時段">
                            <option value="am1">7:00 ~ 8:00
                            <option value="am2">8:00 ~ 9:00
                        <optgroup label="下午時段">
                            <option value="pm1">13:00 ~ 14:00
                            <option value="pm2">15:00 ~ 16:00
                    </select>
                </form>
                <p class="content">預約日期 : <input type="date"></p>
               <form>
                    <label class="content">預約人數 : </label>
                        <select class="option1" name="SelectPeople">
                            <optgroup label="選擇人數">
                                <option value="p1">1人
                                <option value="p2">2人
                                <option value="p3">3人
                                <option value="p4">4人
                                <option value="p5">5人
                        </select>
                </form>
                <p class="content">電&nbsp&nbsp&nbsp&nbsp    話 : <input type="text"></p>
                <p class="content">&nbspEmail &nbsp&nbsp: <input type="text"></p>
                <!--資料庫匯出住戶的點數 若住戶點選我要扣點後須顯示剩餘點數-->
                <p class="content">您的點數 : 點
                    <input type="button" value="我要扣點"class="coupon_btn" style="background-color:rgb(5, 148, 41)">
                    <input type="button" value="取消"class="cancle_btn">
                </p>
            </div>
             <!--住戶點選是才會顯示出可以借用的公設 否則不顯示任何可借公設資訊-->
            <div class="information">
                <p class="content">* 是否要借用設備 ?
                    <div>
                        <input type="radio"  name="borrowtool" value="yes">
                        <label for="male"> 是 &nbsp&nbsp&nbsp&nbsp</label> 
                        <input type="radio"  name="borrowtool" value="no" checked >
                        <label for="male"> 否 </label>
                    </div>
                </p>
                <!--若使用者選擇否不會顯示設備借用選單 是則顯示-->
                <div class="tab">
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
            </div>
                 <!--可借用公設資訊End-->
            <hr>
        </div>
        <div class="outside">
            <p class="dot"><img src="img/circle.svg"> &nbsp確認預約資訊 : </img></p>
            <div class="information">
                  <!--住戶點數扣除公設點數-->
                <p class="content">剩餘點數 :  點</p>
                <div class="content2">
                    <label class="content">預約資訊 :
                         <!--display住戶預約資訊-->
                        <span class="result">
                            預約時段 : 7:00 ~ 10:00 <br>
                            預約日期 : 2021/5/7<br>
                            預約人數 : 2 人<br>
                            電 &nbsp&nbsp&nbsp&nbsp話&nbsp: 0967543213<br>
                             Email &nbsp&nbsp   : njjjijds@gmail.com<br>
                        </sapn>
                </div>
            </div>
            <div>
                <a href="home.php?page=order"><input type="button" value="確認送出"class="send"></a>
            </div>
            <hr>
        </div>
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
        evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>