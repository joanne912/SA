<?php
    $facility = $_GET['facility'];
    $date = date("Y-m-d");
    $sql = "SELECT `FACILITIES_BOOKING_ID`,`facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,
            `FACILITIES_BOOKING_DATE`,`household`.`HOUSEHOLD_ID`,`HOUSEHOLD_ADDRESS`
            FROM `facilities_booking`,`facilities`,`household`
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `facilities`.`COMMUNITY_ID` = `facilities_booking`.`COMMUNITY_ID`
            AND `facilities`.`COMMUNITY_ID` = `household`.`COMMUNITY_ID`
            AND `facilities_booking`.`COMMUNITY_ID` = $community 
            AND `household`.`HOUSEHOLD_ID` = `facilities_booking`.`HOUSEHOLD_ID`
            AND `facilities`.`FACILITIES_ID` = :facility";
    if(isset($_POST['type'])){
        if($_POST['type'] == '已取消'){
            $sql .= " AND `IS_CANCEL` = 1";
        }elseif($_POST['type'] == '已完成'){
            $sql .= " AND `IS_CANCEL` = 0 ";
            $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` < CURDATE() ";
        }elseif($_POST['type'] == '已預約'){
            $sql .= " AND `IS_CANCEL` = 0 ";
            $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` >= CURDATE() ";
        }
    }else{
        $sql .= " AND `IS_CANCEL` = 0 ";
    }
    if(isset($_POST['date'])){
        $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` = '" . $_POST['date'] ."' ";
        $date = $_POST['date'];
    }else{
        $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` = CURDATE() ";
    }

    $statement = $conn->prepare($sql);
    $statement->execute(array(
        ':facility' => $facility
    ));



    $sql = "SELECT `FACILITIES_OPEN_TIME`, `FACILITIES_CLOSE_TIME`,
            `facilities`.`FACILITIES_ID`,`FACILITIES_NAME`,`FACILITIES_LIMIT`, SUM(`FACILITIES_BOOKING_AMOUNT`)
            FROM `facilities_booking`,`facilities`,`household`
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `facilities`.`COMMUNITY_ID` = `facilities_booking`.`COMMUNITY_ID`
            AND `facilities`.`COMMUNITY_ID` = `household`.`COMMUNITY_ID`
            AND `facilities_booking`.`COMMUNITY_ID` = $community 
            AND `household`.`HOUSEHOLD_ID` = `facilities_booking`.`HOUSEHOLD_ID`
            AND `facilities`.`FACILITIES_ID` = :facility";
    if(isset($_POST['type'])){
        if($_POST['type'] == '已取消'){
            $sql .= " AND `IS_CANCEL` = 1";
        }elseif($_POST['type'] == '已完成'){
            $sql .= " AND `IS_CANCEL` = 0 ";
            $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` < CURDATE() ";
        }elseif($_POST['type'] == '已預約'){
            $sql .= " AND `IS_CANCEL` = 0 ";
            $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` >= CURDATE() ";
        }
    }else{
        $sql .= " AND `IS_CANCEL` = 0 ";
    }
    if(isset($_POST['date'])){
        $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` = '" . $_POST['date'] ."' ";
        $date = $_POST['date'];
    }else{
        $sql .= " AND `facilities_booking`.`FACILITIES_BOOKING_DATE` = CURDATE() ";
    }

    $statement2 = $conn->prepare($sql);
    $statement2->execute(array(
        ':facility' => $facility
    ));

    $amount = $statement2->fetch(PDO::FETCH_ASSOC);
    $startTime = strtotime( $amount['FACILITIES_OPEN_TIME'] );
    $endTime = strtotime( $amount['FACILITIES_CLOSE_TIME'] );
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/m_booking_list.css" type="text/css" />
<div class="container" style="height:auto;margin-top:5%;">
    <div class="outside">
        <div class="head">
            <div class="left">
                <a href="home.php?page=facility&method=display_booking"><img src="img/left-arrow.svg"></a>
            </div>
            <div class="name">
                <p>查看住戶預約紀錄</p>
            </div>
        </div>
        <hr>
        <!--預設全選時段和預設當天日期 須從資料庫導入該天該時段的所有住戶預約紀錄-->
        <div class="information">
            <form id="form" action="home.php?page=facility&method=booking&facility=<?=$facility?>" method="post">
                <p class="content" >開始時段 : 
                    <select class="option1 startTime" form="form" name="startTime">
                        <optgroup label="請選擇開始時段">
                        <?php
                            for($i=(int)(date('H',$startTime));$i<=(int)(date('H',$endTime));$i++){
                                $check = '';
                                $check = $i==(int)(date('H',$startTime)) ? 'selected' : '';
                                echo "<option value='$i' $check>$i:00</option>";
                            }
                        ?>
                        </optgroup>
                    </select>
                </p>
                <p class="content" >結束時段 : 
                    <select class="option1 endTime" form="form" name="endTime">
                        <optgroup label="請選擇結束時段">
                        <?php
                            for($i=(int)(date('H',$startTime));$i<=(int)(date('H',$endTime));$i++){
                                $check = '';
                                $check = $i==(int)(date('H',$endTime)) ? 'selected' : '';
                                echo "<option value='$i' $check>$i:00</option>";
                            }
                        ?>
                        </optgroup>
                    </select>
                </p>
                <p class="content">
                    選擇日期 : 
                    <input form="form" class="option1" onchange="submit()" name="date" type="date" value="<?=$date?>">
                </p>
            </form>
        </div>
        <!--資料庫導入公設編號名稱 顯示當天日期 顯示該公設今日(當天)可容納人數 和最大容納人數-->
        <div class="information2">
            <span class="grayspace"><span>
            <div class="middletext">
                <h4 class="h4"> <?=$amount['FACILITIES_ID']?><span><?=$amount['FACILITIES_NAME']?>|</span><span><?=date("Y/m/d")?></span></h4>
                <h3 class="h3"><span class="now_user">目前<?=isset($_POST['type'])?$_POST['type']:'使用'?>人數 :</span>
                    <span class="num1"><?=isset($amount['SUM(`FACILITIES_BOOKING_AMOUNT`)'])?$amount['SUM(`FACILITIES_BOOKING_AMOUNT`)']:'0'?></span>
                    <span class="num">/</span>
                    <span class="num"><?=$amount['FACILITIES_LIMIT']?></span>
                </h3>
            </div>
        </div>
        <!--點選全選時系統自動選取所有住戶 -->
        <div class="select_box" style="width:70%;margin:auto">
            <label style="color:#fc6471;font-weight:bold">
                <input type="checkbox" name="CheckAll" form="form" value="" id="CheckAll" />
            全選</label>
            <span class="content3"data-toggle="modal" data-target="#exampleModalCenter5">
                選取後點此傳送通知 <img class="plane" src="img/send.svg">
            </span>
        </div>
            <div class="information">
        </div><br>
        <!--切換住戶預約紀錄 類似tab的作法-->
        <div class="situation">
            <input type="submit" name="type" form="form" value="已預約" class="cancle_btn">
            <input type="submit" name="type" form="form" value="已取消" class="cancle_btn">
            <input type="submit" name="type" form="form" value="已完成" class="cancle_btn">
        </div>
        <br>
        <?php
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                $sql = "SELECT MIN(`FACILITIES_START`),MAX(`FACILITIES_START`) FROM `facilities_booking_time`
                        WHERE `COMMUNITY_ID` = $community AND `FACILITIES_ID` = ".$row['FACILITIES_ID']."
                        AND `HOUSEHOLD_ID` = " . $row['HOUSEHOLD_ID'] . " AND `FACILITIES_BOOKING_ID` = ".$row['FACILITIES_BOOKING_ID'];
                $time = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="information2">
                    <span class="grayspace" style="border: 3px solid #808080"><span>
                    <div class="middletext2">
                        <input type="checkbox" id="check" name="Checkbox[]">
                        <?=$row['FACILITIES_ID']?><span><?=$row['FACILITIES_NAME']?></span>
                        <div class="data" >
                            <span class="phonespan"> 戶別代碼 : <?=$row['HOUSEHOLD_ID']?> </span>
                            <span> 登記戶 : <?=$row['HOUSEHOLD_ADDRESS']?> </span>
                            <p>
                                <span> 預約時段 : <span><?=$time['MIN(`FACILITIES_START`)']?> : 00 <span>~</span> <?=$time['MAX(`FACILITIES_START`)']?> : 00</span></span>
                                <br>
                                <span> 預約日期 : <?=$row['FACILITIES_BOOKING_DATE']?></span>
                                </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        <hr>
    </div>
</div>

<!-- 管理員傳送通知給住戶點選連結後出現彈跳視窗 資料庫導入並顯示管理員勾選的住戶的戶別 
輸入訊息按確認送出後將訊息通知給住戶端 -->
<div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog"
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
                                <button type="button" class="m_cancel_btn" data-bs-dismiss="modal" id="hide">
                                    <a style="color:#fc6471">取消</a>
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="m_submit_btn" id="go" >
                                確認
                                </button>
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/m_fac_booking.js"></script>