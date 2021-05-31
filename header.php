<?php
    if ($auth <= 3){
        if ($page == "m_package"){
            $title = "包裹管理";
        }
        else if ($page == "facility"){
            $title = "公設管理";
        }
        else{
            $title = "公告管理";
        }
    }
    else if ($auth >= 4){
        if ($page == "householdid"){
            $title = "住戶戶籍代碼";
        }
        else if ($page == "personal"){
            $title = "個人資訊";
        }
        else if ($page == "package"){
            $title = "我的包裹";
        }
        else if ($page == "facility"){
            $title = "公設預約";
        }
        else{
            $title = "社區公告";
        }
    }
?>
<header>
    <div class="sub">
        <div class="menu" onclick="toggle2()">
            <img src="img/menu.svg" alt="">
        </div>
        <div class="title">
            <!-- 下面這個不會顯示出來 -->
            <img src="img/logout.svg" alt="">
            <!--要把登出改到彈出區域-->
            <span><?=$title?></span>
        </div>
    </div>
    <!-- 網頁版的設定、登出、通知按鈕，手機版時會消失 -->
    <div class="func_wrap">
        <?php
            if($auth >= 4){
        ?>
        <a href="#">setting</a>
        <?php
            }
        ?>
        <a href="logout.php">logout</a>
    </div>
</header>