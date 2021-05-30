<?php
    if ($auth <= 3){
?>
<div id="menu-wrap">
    <div class="sub-wrap">
        <div class="icon">
            <div class="icon_circle">
                <img src="img/icon_boy.svg" alt="">
            </div>
            <span>管理員</span>
        </div>
        <div class="option-wrap">
            <a href="home.php?page=m_package">包裹管理</a>
            <a href="home.php?page=facility">公設管理</a>
            <a href="home.php">公告管理</a>
            <!-- 這個位置要加登出 -->
            <!-- 手機版時設定、登出、通知的按鈕位置，網頁版時會消失 -->
            <div class="else">
                <a href="#"><img src="img/setting.svg" alt=""></a>
                <a href="logout.php"><img src="img/logout.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<?php
    } else if ($auth == 4){
?>
<div id="menu-wrap">
    <div class="sub-wrap">
        <div class="icon">
            <div class="icon_circle">
                <img src="img/icon_boy.svg" alt="">
            </div>
            <span>title</span>
        </div>
        <div class="option-wrap"> 
            <a href="home.php?page=householdid">住戶戶籍代碼</a>
            <a href="home.php?page=personal">個人資訊</a>
            <a href="home.php?page=package">我的包裹</a>
            <a href="home.php?page=facility">公設預約</a>
            <a href="home.php">社區公告</a>
            <!-- 這個位置要加登出 -->
            <!-- 手機版時設定、登出、通知的按鈕位置，網頁版時會消失 -->
            <div class="else">
                <a href="#"><img src="img/setting.svg" alt=""></a>
                <a href="logout.php"><img src="img/logout.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<?php
    } else if ($auth == 5){
?>
<div id="menu-wrap">
    <div class="sub-wrap">
        <div class="icon">
            <div class="icon_circle">
                <img src="img/icon_boy.svg" alt="">
            </div>
            <span>title</span>
        </div>
        <div class="option-wrap">
            <a href="home.php?page=personal">個人資訊</a>
            <a href="home.php?page=package">我的包裹</a>
            <a href="home.php?page=facility">公設預約</a>
            <a href="home.php">社區公告</a>
            <!-- 這個位置要加登出 -->
            <!-- 手機版時設定、登出、通知的按鈕位置，網頁版時會消失 -->
            <div class="else">
                <a href="#"><img src="img/setting.svg" alt=""></a>
                <a href="logout.php"><img src="img/logout.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>