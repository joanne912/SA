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
            $title = "社區公設";
        }
        else{
            $title = "社區公告";
        }
    }
    $sql = "SELECT `COMMUNITY_NAME`,`household`.`HOUSEHOLD_ADDRESS`
            FROM `community`,`household` 
            WHERE `HOUSEHOLD_ID` = $household
            AND `community`.`COMMUNITY_ID` = $community
            AND `community`.`COMMUNITY_ID` = `household`.`COMMUNITY_ID`";
    $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
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
        <div class="dropdown">
            <button class="dropbtn">
                <a href="#"><?=$row['COMMUNITY_NAME']."<br>".$row['HOUSEHOLD_ADDRESS']?></a>
            </button>
            <div class="dropdown-content">
                <form id="changeCommunity" action="home.php" method="post">
                    <?php
                        foreach($estates as $key=>$estate){
                            $h = $estate['HOUSEHOLD_ID'];
                            $c = $estate['COMMUNITY_ID'];
                            $sql = "SELECT `COMMUNITY_NAME`,`household`.`HOUSEHOLD_ADDRESS`
                                    FROM `community`,`household` 
                                    WHERE `HOUSEHOLD_ID` = $h
                                    AND `community`.`COMMUNITY_ID` = $c
                                    AND `community`.`COMMUNITY_ID` = `household`.`COMMUNITY_ID`";
                            $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <a class="changeCommunity" data-key="<?=$key?>" href="#"><?=$row['COMMUNITY_NAME']."<br>".$row['HOUSEHOLD_ADDRESS']?></a>
                            <?php
                        }
                    ?>
                    <input type="hidden" name="changeCommunity">
                </form>
                <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#exampleModalCenter">多重社區開通</a>
            </div>
        </div>
        <a class="logout"style=""href="logout.php" >logout</a>
    </div>
</header>

<!-- 多重社區開通內容模型 -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="multi_communities.php" id="multi_communities">
                <div class="modal-body">
                    <header class="modal_header">
                            <p>多重社區開通</p>
                    </header>
                    <div class="M_wrap">
                        <!-- 戶籍代碼輸入框 -->
                        <div class="M_enter" >
                                <label for="community_id">社區代碼</label>
                                <input type="text" id="community_id" name="community_id" placeholder="請填寫"/>
                                <label for="household_id">戶籍代碼</label>
                                <input type="text" id="household_id" name="household_id" placeholder="請填寫戶籍代碼"/>
                                <label for="household">戶別</label><br>
                                <input type="text" id="household" name="household" placeholder="請填寫戶別"/>
                            <!-- <br><br>
                            <a href="javascript:document:multi_communities.submit();" class="btn3" name="add_community_btn">開通社區</a> -->
                            <input type="submit" name="add_community_btn" value="開通" class="btn3" style="background: #c0c0e2; color:white; font-size:0.5em; margin-top:1.5em;">
                        </div>
                    </div>
                </div>
            </form>     
        </div>
    </div>
</div>