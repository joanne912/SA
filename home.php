<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function toggle2() {
            $("#menu-wrap").animate({
                'width': 'toggle'
            });
        }
    </script>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
</head>

<body>
    <div class="all">
        <!-- 下面這個區域是上方的banner -->
        <header>
            <div class="sub">
                <div class="menu" onclick="toggle2()">
                    <img src="img/menu.svg" alt="">
                </div>
                <div class="title">
                    <!-- 下面這個不會顯示出來 -->
                    <img src="img/logout.svg" alt="">
                    <!--要把登出改到彈出區域-->
                    <span>個人資料</span>
                </div>
            </div>
            <!-- 網頁版的設定、登出、通知按鈕，手機版時會消失 -->
            <div class="func_wrap">
                <a href="#">setting</a>
                <a href="#">logout</a>
                <img src="img/bell.svg" alt="">
            </div>
        </header>
        <!-- 下面開始是左側彈出視窗的區域 -->
        <div id="menu-wrap">
            <div class="sub-wrap">
                <div class="icon">
                    <div class="icon_circle">
                        <img src="img/icon_boy.svg" alt="">
                    </div>
                    <span>title</span>
                </div>
                <div class="option-wrap">
                    <a href="#">個人資訊</a>
                    <a href="#">我的包裹</a>
                    <a href="#">公設預約</a>
                    <a href="#">社區公告</a>
                    <!-- 這個位置要加登出 -->
                    <!-- 手機版時設定、登出、通知的按鈕位置，網頁版時會消失 -->
                    <div class="else">
                        <a href="#"><img src="img/setting.svg" alt=""></a>
                        <a href="#"><img src="img/logout.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
        
        </div>
    </div>
</body>

</html>