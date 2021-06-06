<?php
    if(isset($_POST['submit'])){

        $sql = "SELECT MAX(`FACILITIES_ID`) FROM facilities WHERE (`COMMUNITY_ID` = $community);";
        $statement = $conn->query($sql);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $facility = $row['MAX(`FACILITIES_ID`)'] + 1;

        // 照片處理
        if ($_FILES['photofile1']['error'] === UPLOAD_ERR_OK){
            // 檢查資料夾的建立
            $file_path = './img/fac/';
            // 檢查檔案是否已經存在
            if (!file_exists($file_path. $_FILES['photofile1']['name'])){
                $file = $_FILES['photofile1']['tmp_name'];
                $dest = $file_path. $_FILES['photofile1']['name'];
                // 將檔案移至指定位置
                move_uploaded_file($file, $dest);
            }
        } elseif ($_FILES['photofile1']['error'] === UPLOAD_ERR_NO_FILE) {
            echo '請至少上傳一張照片' . '<br/>';
        } else {
            echo '錯誤代碼：' . $_FILES['photofile1']['error'] . '<br/>';
        }
        // 第二張照片
        if ($_FILES['photofile2']['error'] === UPLOAD_ERR_OK){
            // 檢查資料夾的建立
            $file_path = './img/fac/';
            // 檢查檔案是否已經存在
            if (!file_exists($file_path. $_FILES['photofile2']['name'])){
                $file = $_FILES['photofile2']['tmp_name'];
                $dest = $file_path. $_FILES['photofile2']['name'];
                // 將檔案移至指定位置
                move_uploaded_file($file, $dest);
            }
        } elseif ($_FILES['photofile2']['error'] === UPLOAD_ERR_NO_FILE) {
        } else {
            echo '錯誤代碼：' . $_FILES['photofile2']['error'] . '<br/>';
        }
        //第三張照片
        if ($_FILES['photofile3']['error'] === UPLOAD_ERR_OK){
            // 檢查資料夾的建立
            $file_path = './img/fac/';
            // 檢查檔案是否已經存在
            if (!file_exists($file_path. $_FILES['photofile3']['name'])){
                $file = $_FILES['photofile3']['tmp_name'];
                $dest = $file_path. $_FILES['photofile3']['name'];
                // 將檔案移至指定位置
                move_uploaded_file($file, $dest);
            }
        } elseif ($_FILES['photofile3']['error'] === UPLOAD_ERR_NO_FILE) {
        } else {
            echo '錯誤代碼：' . $_FILES['photofile3']['error'] . '<br/>';
        }

        $sql = "INSERT INTO `facilities` (`FACILITIES_ID`, `COMMUNITY_ID`, `FACILITIES_NAME`, `FACILITIES_INTRODUCTION`, `FACILITIES_DESCRIPTION`, `FACILITIES_PLACE`, `FACILITIES_OPEN_TIME`, `FACILITIES_CLOSE_TIME`, `FACILITIES_IMG1`, `FACILITIES_IMG2`, `FACILITIES_IMG3`, `FACILITIES_POINT`, `FACILITIES_LIMIT`)
                VALUES (:facility, :community, :name, :introduction, :description, '', :open, :close, :img1, :img2, :img3, :point, :limit)";
        $statement = $conn->prepare($sql);
        try{
            $result = $statement->execute(
                array(
                    ':facility' => $facility,
                    ':community' => $community,
                    ':name' => $_POST['name'], 
                    ':introduction' => $_POST['introduction'], 
                    ':description' => $_POST['description'], 
                    ':open' => $_POST['open_time'], 
                    ':close' => $_POST['close_time'], 
                    ':point' => $_POST['point'], 
                    ':limit' => $_POST['limit'],
                    ':img1' => $_FILES['photofile1']['name'],
                    ':img2' => isset($_FILES['photofile2']['name']) ? $_FILES['photofile2']['name'] : null,
                    ':img3' => isset($_FILES['photofile3']['name']) ? $_FILES['photofile3']['name'] : null
                )
            );
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $n = count($_POST['equip']['name']);
        for($i = 0; $i < $n; $i++){
            $sql = "SELECT MAX(`FACILITIES_EQUIPMENT_ID`) FROM `facilities_equipment` 
                    WHERE `COMMUNITY_ID` = $community AND `FACILITIES_ID` = $facility;";
            $statement = $conn->query($sql);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $equipment = $row['MAX(`FACILITIES_EQUIPMENT_ID`)'] + 1;

            $sql = "INSERT INTO `facilities_equipment` (`FACILITIES_EQUIPMENT_ID`, `COMMUNITY_ID`,
            `FACILITIES_ID`,`FACILITIES_EQUIPMENT_NAME`,`FACILITIES_EQUIPMENT_AMOUNT`,`FACILITIES_EQUIPMENT_UNIT`)
            VALUES ($equipment,$community,$facility,:name,:amount,:unit)";
            $statement = $conn->prepare($sql);
            try{
                $statement->execute(
                    array(
                        ':name' => $_POST['equip']['name'][$i],
                        ':amount' => $_POST['equip']['amount'][$i],
                        ':unit' => $_POST['equip']['unit'][$i]
                    )
                );
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>
<link rel="stylesheet" href="css/add_facilities.css">
<div class="wrap">
    <?php
        if(isset($result)){
            if($result){
                echo "新增成功";
            }else{
                if(isset($_POST['submit'])){
                    echo "新增失敗!請聯絡工程師";
                }
            }
        }
    ?>
    <form method="POST" action="home.php?page=facility&method=add" enctype="multipart/form-data">
        <h2 style="margin: 1.5em 0;">
        新增公設服務<br>
        </h2>
        <hr>
        <span><img src="img/circle.svg" alt="">公設名稱： <input type="text" name="name"></span>
        <hr>
        <div>
            <span>
                <img src="img/circle.svg" alt="">公設照片
            </span>
            請選擇欲上傳的公設照片:(請至少上傳一張)
            <br>
            <input type="file" id="photofile1" name="photofile1">
            <br>
            <input type="file" id="photofile2" name="photofile2">
            <br>
            <input type="file" id="photofile3" name="photofile3">
            <br>
            <img src="" class="photo" id="photo1">
            <img src="" class="photo" id="photo2">
            <img src="" class="photo" id="photo3">
        </div>
        <hr>
        <span><img src="img/circle.svg" alt="">公設時段</span>
        <p>開放時間：<input type="text" name="open_time" placeholder="例如:09:00"></p>
        <p>關閉時間：<input type="text" name="close_time" placeholder="例如:21:00"></p>
        <p>公設簡介：</p>
        <textarea rows="5" cols="40" name="introduction"></textarea>
        <hr>
        <span><img src="img/circle.svg" alt="">新增器材</span>
        <p>器材名稱：<input id="equipName" type="text"></p>
        <p>器材數量：<input id="equipAmount" type="text"></p>
        <p>器材單位：<input id="equipUnit" type="text"></p>
        <input type="button" id="equipAdd" name="equipAdd" value="新增" style="padding: .25em .5em; background: #fc6471; color: white;border: 0; border-radius: 5px;">
        <!-- 列出已新增器材 -->
        <p>
            
        </p>
        <hr>
        <span><img src="img/circle.svg" alt="">使用說明</span>
        <p>人數上限：<input type="text" name="limit"></p>
        <p>所需點數：<input type="text" name="point"></p>
        <p>備註等公設相關內容：</p>
        <textarea rows="10" cols="40" name="description"></textarea>
        <div class="btn">
            <input type="submit" name="submit" value="新增確認">
        </div>
    </form>
    <script src="js/facility_add.js"></script>
</div>