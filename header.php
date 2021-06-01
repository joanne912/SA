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

                    <div class="dropdown">
                        <button class="dropbtn"> <a href="#">巴黎大廈54</a></button>
                        <div class="dropdown-content">
                            <a href="#">上北大44</a>
                            <a href="#">輔大宿舍32</a>
                            <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#exampleModalCenter">前往多重社區開通</a>
                        </div>
                        
                
                
                        <?php
                            }
                        ?>
                    <!-- <a href="logout.php" >logout</a> -->
                    </div>
                    <a class="logout"style=""href="logout.php" >logout</a>
            </div>
                <!---->
                <!-- 重設密碼內容模型 -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form method="POST" action="password_check.php">
                            <div class="modal-body">
                                <header class="modal_header">
                                        <p >多重社區開通</p>
                                </header>
                                <div class="M_wrap">
                                    <!-- 戶籍代碼輸入框 -->
                                    <div class="M_enter" >
                                            <label for="household">戶別</label><br>
                                            <input type="text" id="household" name="household" placeholder="請填寫戶別"/>
                                            <label for="household_id">戶籍代碼</label>
                                            <input type="text" id="household_id" name="household_id" placeholder="請填寫戶籍代碼"/>
                                            <label for="community_id">社區代碼</label>
                                            <input type="text" id="community_id" name="community_id" placeholder="請填寫"/>
                                        <br><br>
                                        <a href="#" class="btn3" name="add_community_btn">開通社區</a>
                                        <!-- <input type="submit" name="add_community_btn" value="開通" class="btn3"> -->
                                    </div>
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>
            </div>
            
        
            <!---->
    
    </div>
</header>