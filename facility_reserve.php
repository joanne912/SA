<?php
    include("auth.php");
    $conn = include("conn.php");
    $facility = $_GET['facility'];
    if(isset($_POST['submit'])){
        $sql = "SELECT `FACILITIES_POINT` FROM `facilities`
                WHERE ( `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community );";
        $statement = $conn->prepare($sql);
        $statement->execute(array($facility));
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $fpoint = $row['FACILITIES_POINT'];

        $sql = "SELECT MAX(`FACILITIES_BOOKING_ID`) FROM `facilities_booking` 
                WHERE `COMMUNITY_ID` = $community 
                AND `HOUSEHOLD_ID` = $household
                AND `FACILITIES_ID` = ?;";
        $statement = $conn->prepare($sql);
        $statement->execute(array($facility));
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $booking = $row['MAX(`FACILITIES_BOOKING_ID`)'] + 1;
        $times = $_POST['endTime'] - $_POST['startTime'];
        $sql = "INSERT INTO `facilities_booking` (`FACILITIES_BOOKING_ID`,`COMMUNITY_ID`,
                `HOUSEHOLD_ID`,`FACILITIES_ID`,`FACILITIES_BOOKING_DATE`,
                `FACILITIES_EQUIPMENT_ID`,`FACILITIES_EQUIPMENT_AMOUNT`,
                `FACILITIES_BOOKING_AMOUNT`,`IS_CANCEL`,`POINT_USED`)
                VALUES ($booking,$community,$household,:facility,
                :date,:equipment,:equipAmount,:amount,0,($fpoint*$times));";
        $updatePoint = "UPDATE `household` SET `POINT` = `POINT` - $fpoint
                        WHERE `HOUSEHOLD_ID` = $household AND `COMMUNITY_ID` = $community;";
        $insertTime = "INSERT INTO `facilities_booking_time` (`FACILITIES_BOOKING_ID`,
                        `COMMUNITY_ID`, `FACILITIES_ID`, `FACILITIES_START`, `HOUSEHOLD_ID`)
                        VALUES ($booking,$community,:facility,:startTime,$household);";
        try{
            $statement = $conn->prepare($sql);
            $statement->execute(
                array(
                    ':facility' => $facility,
                    ':date' => $_POST['date'],
                    ':equipment' => isset($_POST['equipment'])?$_POST['equipment']:null,
                    ':equipAmount' => isset($_POST['equipmentAmount'])?$_POST['equipmentAmount']:null,
                    ':amount' => $_POST['numberOfPeople']
                )
            );
            $conn->query($updatePoint);
            $statement = $conn->prepare($insertTime);
            for($i = $_POST['startTime']; $i < $_POST['endTime']; $i++){
                $statement->execute(
                    array(
                        ':facility' => $facility,
                        ':startTime' => $i
                    )
                );
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        echo "<script> window.location.href='home.php?page=facility&method=record&facility=$facility&booking=$booking'</script>";
    }
    $sql = "SELECT `FACILITIES_NAME`, HOUR(`FACILITIES_OPEN_TIME`), HOUR(`FACILITIES_CLOSE_TIME`),
            `FACILITIES_POINT`, `FACILITIES_LIMIT` 
            FROM `facilities` WHERE ( `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community );";
    $statement = $conn->prepare($sql);
    $statement->execute(array($facility));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $startTime = $row['HOUR(`FACILITIES_OPEN_TIME`)'];
    $endTime = $row['HOUR(`FACILITIES_CLOSE_TIME`)'];
    $limit = $row['FACILITIES_LIMIT'];
    $fpoint = $row['FACILITIES_POINT'];
    $sql = "SELECT SUM(`FACILITIES_POINT`)
            FROM `facilities`,`facilities_booking`
            WHERE `facilities`.`FACILITIES_ID` = `facilities_booking`.`FACILITIES_ID`
            AND `HOUSEHOLD_ID` = $household AND `facilities`.`COMMUNITY_ID` = $community
            AND `IS_CANCEL` = 0 ORDER BY `FACILITIES_BOOKING_DATE` DESC;";
    $sum = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    $point = 500 - $sum['SUM(`FACILITIES_POINT`)'];
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
</head>
<body>
    <form action="facility_reserve.php?facility=<?=$facility?>" method="POST">
        <input type="hidden" name="facility" value="<?=$_GET['facility']?>">
        <div class="container" style="margin-top:5%;">
            <div class="outside">
                <div class="head" >
                    <a href="home.php?page=facility&facility=<?=$_GET['facility']?>">
                        <img class="left" src="img/left-arrow.svg">
                    </a> 
                    <span class="name">公設預約</span>
                </div>
                <hr>
                <p class="dot"style="font-weight:bold">
                    <img src="img/circle.svg">
                    <span>&nbsp<?=$row['FACILITIES_NAME']?> : </span>
                </p>
                <!--新增住戶公設預約資訊到資料庫-->
                <!--從資料庫載入可以預約的時段-->
                <p class="content">開始預約時段 : 
                    <select class="option1 getStartTime" name="startTime">
                        <optgroup label="請選擇開始時段">
                            <?php
                                for($i=$startTime;$i<=$endTime;$i++){
                                    echo "<option value='$i'>$i:00</option>";
                                }
                            ?>
                        </optgroup>
                    </select>
                </p>

                <p class="content">結束預約時段 : 
                    <select class="option1 getEndTime" name="endTime">
                        <optgroup label="請選擇結束時段">
                            <?php
                                for($i=$startTime;$i<=$endTime;$i++){
                                    echo "<option value='$i'>$i:00</option>";
                                }
                            ?>
                        </optgroup>
                    </select>
                </p>
                <p class="content">預約公設日期 : 
                    <input class="option1 getDate" name="date" type="date">
                </p>
                <p class="content">預約公設人數 : 
                    <select class="option1 getAmount" name="numberOfPeople">
                        <optgroup label="選擇人數">
                            <?php
                                for($i=1;$i<=$limit;$i++){
                                    echo "<option value='$i'>".$i."人</option>";
                                }
                            ?>
                        </optgroup>
                    </select>
                </p>
                <br>
                <p class="content">您的點數 : <?=$point?> 點</p>
                <p class="content">本次消耗點數 : <?=$fpoint?> 點</p>
                <br>
                <?php
                    $sql = "SELECT `FACILITIES_EQUIPMENT_NAME` FROM `facilities_equipment`
                            WHERE `FACILITIES_ID` = $facility AND `COMMUNITY_ID` = $community ;";
                    $statement = $conn->prepare($sql);
                    $statement->execute(array($facility));
                    $flag = 0;
                    while( $row = $statement->fetch(PDO::FETCH_ASSOC) ){ $flag = 1; }
                    if($flag == 1){
                    ?>
                    <!--住戶點選是才會顯示出可以借用的公設 否則不顯示任何可借公設資訊-->
                    <p class="content">* 是否要借用設備 ? (僅限借用一種)
                        <div>
                            <label>
                                <input type="radio"  name="borrowtool" value="yes" id="yes">
                                是 &nbsp&nbsp&nbsp&nbsp
                            </label> 
                            <label>
                                <input type="radio"  name="borrowtool" value="no" checked id="no">
                                否
                            </label>
                        </div>
                    </p>
                    <div class="tab">
                        <?php
                            $statement->execute(array($facility));
                            while( $row = $statement->fetch(PDO::FETCH_ASSOC) ){
                                echo '<input class="equipmentName" type="button" onclick="tools(event, \''.$row['FACILITIES_EQUIPMENT_NAME'].'\')" value="'.$row['FACILITIES_EQUIPMENT_NAME'].'">';
                            }
                        ?>
                    </div>
                    <?php
                        $sql = "SELECT `FACILITIES_EQUIPMENT_ID`,`FACILITIES_EQUIPMENT_NAME`,
                                `FACILITIES_EQUIPMENT_AMOUNT`,`FACILITIES_EQUIPMENT_UNIT`
                                FROM `facilities_equipment` WHERE `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community ;";
                        $statement = $conn->prepare($sql);
                        $statement->execute(array($facility));
                        while( $row = $statement->fetch(PDO::FETCH_ASSOC) ){
                            ?>
                            <div id="<?=$row['FACILITIES_EQUIPMENT_NAME']?>" class="tabcontent">
                                <p>選擇借用個數 :</p>
                            <p>
                                <div class="check">
                                    <?php for($i=0;$i<=$row['FACILITIES_EQUIPMENT_AMOUNT'];$i++){ ?>
                                    <input type="hidden" name="equipment" value="<?=$row['FACILITIES_EQUIPMENT_ID']?>">
                                    <input type="radio" name="equipmentAmount" value="<?=$i?>"> <?=$i?> <?=$row['FACILITIES_EQUIPMENT_UNIT']?>
                                    <?php } ?>
                                </div>
                            </p>
                        </div>
                        <?php
                        }
                    }
                    echo $flag?'':'本公設沒有提供器材外借';
                ?>
                <br>
                <button type="button" class="btn btn-info see_information">確認填寫無誤</button>
                <!--可借用公設資訊End-->
                <hr>
                <div class="outside"id="information">
                    <p class="dot" style="font-weight:bold"><img src="img/circle.svg"> &nbsp確認預約資訊 : </img></p>
                    <!--住戶點數扣除公設點數-->
                    <p class="content">剩餘點數 :  <?=$point?> - <?=$fpoint?> = <?=$point-$fpoint?> 點</p>
                    <div class="content2" >
                        <label class="content">預約資訊(請確認預約資料無誤) :
                            <!--display住戶預約資訊 若無借用設備則顯示無-->
                            <div class="reserveinform">
                                <p>
                                    <span>預約時段 : </span>
                                    <span id="startTime"></span>
                                    <span> ~ </span>
                                    <span id="endTime"></span>
                                </p>
                                <p>
                                    <span>預約日期 : </span>
                                    <span id="date"></span>
                                </p>
                                <p>
                                    <span>預約人數 : </span>
                                    <span id="amount">2</span>
                                    </p>
                                <p id="equipment">
                                    <span>借用設備 : </span>
                                    <span></span>
                                </p>
                            </div>
                        </label>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="確認送出" class="send">
                    </div>
                    <br><br>
                    <hr>
                </div>
            </div>
        </div>
    </form>
</body>
</html>