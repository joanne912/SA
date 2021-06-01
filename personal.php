<?php
//修改個人資訊
if(isset($_POST['submit'])){
    $sql = "UPDATE `household`,`user`,`resident`
            SET `USER_NAME` = :name,`HOUSEHOLD_ADDRESS` = :address,`RESIDENT_PHONE` = :phone,
            `RESIDENT_BDATE` = :birth,`RESIDENT_GENDER` = :gender
            WHERE `user`.`USER_ID` = `resident`.`USER_ID`
            AND `user`.`USER_ID` = $id
            AND `household`.`HOUSEHOLD_ID` = $household
            AND `household`.`COMMUNITY_ID` = $community";
    $statement = $conn->prepare($sql);
    try{
        $result = $statement->execute(array(
            ':name' => $_POST['name'],
            ':address' => $_POST['address'],
            ':phone' => $_POST['phone'],
            ':birth' => $_POST['birth'],
            ':gender' => $_POST['gender'],
        ));
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}


// 顯示原有個人資訊
    $sql = "SELECT `USER_NAME`,`HOUSEHOLD_ADDRESS`,`USER_ACCOUNT`,`RESIDENT_PHONE`,`RESIDENT_BDATE`,`RESIDENT_GENDER`
            FROM `household`,`user`,`resident`
            WHERE `user`.`USER_ID` = `resident`.`USER_ID`
            AND `user`.`USER_ID` = $id
            AND `household`.`HOUSEHOLD_ID` = $household
            AND `household`.`COMMUNITY_ID` = $community";
    $row = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="css/p.css" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/p2.css" type="text/css" />


<form method="post" action="home.php?page=personal">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">姓名</p>
                <input name="name" type="text" value="<?=$row['USER_NAME']?>">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2.1em;">地址</p>
                <input name="address" type="text" value="<?=$row['HOUSEHOLD_ADDRESS']?>">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 2em;">E-MAIL</p>
                <input disabled name="email" type="text" value="<?=$row['USER_ACCOUNT']?>">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2.1em;">手機</p>
                <input name="phone" type="text" value="<?=$row['RESIDENT_PHONE']?>">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">生日</p>
                <input name="birth" type="date" value="<?=date_format(date_create($row['RESIDENT_BDATE']),"Y-m-d")?>">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 1.8em;">戶籍代碼</p>
                <input disabled type="text" value="<?=$household?>">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">性別</p>
                <select name="gender">
                    <option value="男" <?=($row['RESIDENT_GENDER']=='男')?'selected':''?>>男</option>
                    <option value="女" <?=($row['RESIDENT_GENDER']=='女')?'selected':''?>>女</option>
                </select>
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 1.8em;">綁定地址</p>
                <input disabled type="text" value="<?=$row['HOUSEHOLD_ADDRESS']?>">
            </div>
        </div>
        <div class="row">
            <div class="btn-wrap col-12">
                <input name="submit" type="submit" value="修改資料" class="btn">
            </div>
        </div>
    </div>
</form>
