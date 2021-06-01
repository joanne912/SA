<?php
    //表單回傳處理區
    if(isset($_POST['submit'])&&isset($_POST['repair'])&&isset($_POST['facility'])&&isset($_POST['status'])){
        $sql = "UPDATE `facilities_repair`
        SET `FACILITIES_REPAIR_STATE` = :status , `FACILITIES_REPAIR_RETURN` = :return
        WHERE (`FACILITIES_REPAIR_ID` = :repair
        AND `FACILITIES_ID` = :facility
        AND `COMMUNITY_ID` = :community);";
        $statement = $conn->prepare($sql);
        try{
            $statement->execute(
                array(
                    ':status' => $_POST['status'],
                    ':return' => $_POST['return'],
                    ':repair' => $_POST['repair'],
                    ':facility' => $_POST['facility'],
                    ':community' => $community
                )
            );
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        header("refresh:0;url=home.php?page=facility&method=repair");
        exit();
    }
    //顯示公設報修狀況
    if(!isset($_GET['repair'])){
        header("location:home.php?page=facility&method=repair");
    }
    $sql = "SELECT `facilities_repair`.`FACILITIES_ID`, `FACILITIES_REPAIR_ID`, `FACILITIES_NAME`,
            `FACILITIES_REPAIR_CONTENT`,`FACILITIES_REPAIR_STATE`, `FACILITIES_REPAIR_RETURN`
            FROM `facilities_repair`,`facilities` 
            WHERE ( `FACILITIES_REPAIR_ID` = ?
            AND `facilities_repair`.`FACILITIES_ID` = `facilities`.`FACILITIES_ID`
            AND `facilities_repair`.`COMMUNITY_ID` = $community);";
    $statement = $conn->prepare($sql);
    $statement->execute(array($_GET['repair']));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if( $row['FACILITIES_REPAIR_STATE'] == 'waiting' ){
        $check = '待處理';
    }else if( $row['FACILITIES_REPAIR_STATE'] == 'solving' ){
        $check = '處理中';
    }else if( $row['FACILITIES_REPAIR_STATE'] == 'resolve' ){
        $check = '已處理';
    }
?>
<link rel="stylesheet" href="css/m_repair_fac_reply.css">
<div class="wrap">
    <form action="home.php?page=facility&method=detail" method="POST">
        <p><img src="img/circle.svg" alt=""> 公設名稱：<?=$row['FACILITIES_NAME']?></p>
        <hr>
        <p><img src="img/circle.svg" alt=""> 問題描述：</p>
        <textarea name="content" id="" cols="30" rows="5"><?=$row['FACILITIES_REPAIR_CONTENT']?></textarea>
        <p><img src="img/circle.svg" alt=""> 進度回報：</p>
        <div class="radio_wrap">
            <label>
                <input type="radio" name="status" value="waiting" <?=($row['FACILITIES_REPAIR_STATE'] == 'waiting') ? "checked" : "" ?>>
                <span class="radio_text">待處理</span>
            </label>
            <label>
                <input type="radio" name="status" value="solving" <?=($row['FACILITIES_REPAIR_STATE'] == 'solving') ? "checked" : "" ?>>
                <span class="radio_text">處理中</span>
            </label>
            <label>
                <input type="radio" name="status" value="resolve" <?=($row['FACILITIES_REPAIR_STATE'] == 'resolve') ? "checked" : "" ?>>
                <span class="radio_text">已處理</span>
            </label>
        </div>
        <hr>
        <p><img src="img/circle.svg" alt=""> 處理結果：</p>
        <textarea name="return" id="" cols="30" rows="5"><?=$row['FACILITIES_REPAIR_RETURN']?></textarea>
        <div class="btn">
            <input type="hidden" name="facility" value="<?=$row['FACILITIES_ID']?>">
            <input type="hidden" name="repair" value="<?=$row['FACILITIES_REPAIR_ID']?>">
            <input type="submit" name="submit" value="確認送出">
        </div>
    </form>
</div>