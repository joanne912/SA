<?php
    if(!isset($_GET['facility'])){
        echo "<script>
                window.location.href='home.php?page=facility';
            </script>"; 
    }
    $sql = "SELECT `FACILITIES_NAME`, `FACILITIES_INTRODUCTION`, `FACILITIES_DESCRIPTION`,
        `FACILITIES_PLACE`, HOUR(`FACILITIES_OPEN_TIME`), HOUR(`FACILITIES_CLOSE_TIME`),
        `FACILITIES_IMG1`, `FACILITIES_IMG2`, `FACILITIES_IMG3`, `FACILITIES_POINT`,
        `FACILITIES_LIMIT` FROM `facilities` WHERE ( `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community );";
    $statement = $conn->prepare($sql);
    $statement->execute(array($_GET['facility']));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    if(isset($_POST['submit'])){
        // 照片處理
        if(isset($_FILES['photofile1'])){
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
            }elseif($_FILES['photofile3']['error'] === UPLOAD_ERR_NO_FILE){
            }else {
                echo '錯誤代碼：' . $_FILES['photofile1']['error'] . '<br/>';
            }
        }
        if(isset($_FILES['photofile2'])){
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
            }elseif($_FILES['photofile3']['error'] === UPLOAD_ERR_NO_FILE){
            }else {
                echo '錯誤代碼：' . $_FILES['photofile2']['error'] . '<br/>';
            }
        }
        if(isset($_FILES['photofile3'])){
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
            }elseif($_FILES['photofile3']['error'] === UPLOAD_ERR_NO_FILE){
            }else {
                echo '錯誤代碼：' . $_FILES['photofile3']['error'] . '<br/>';
            }
        }
        
        $sql2 = "UPDATE `facilities` SET `FACILITIES_NAME` = :name, `FACILITIES_INTRODUCTION` = :intro,
                `FACILITIES_DESCRIPTION` = :description, `FACILITIES_OPEN_TIME` = :startTime,
                `FACILITIES_CLOSE_TIME` = :endTime, `FACILITIES_POINT` = :point, `FACILITIES_LIMIT` = :limit,
                `FACILITIES_IMG1` = :img1, `FACILITIES_IMG2` = :img2, `FACILITIES_IMG3` = :img3
                WHERE `COMMUNITY_ID` = :community_id AND `FACILITIES_ID` = :facilities_id;";
        $update = $conn->prepare($sql2);
        $update->execute(
            array(
                ':name' => $_POST['title'],
                ':intro' => $_POST['introduction'], 
                ':description' => $_POST['introduction'],
                ':startTime' => $_POST['startTime'],
                ':endTime' => $_POST['endTime'],
                ':point' => $_POST['point'],
                ':limit' => $_POST['limit'],
                ':img1' => isset($_FILES['photofile1']['name']) ? $_FILES['photofile1']['name'] : $row['FACILITIES_IMG1'],
                ':img2' => isset($_FILES['photofile2']['name']) ? $_FILES['photofile2']['name'] : $row['FACILITIES_IMG2'],
                ':img3' => isset($_FILES['photofile3']['name']) ? $_FILES['photofile3']['name'] : $row['FACILITIES_IMG3'],
                ':community_id' => $community,
                ':facilities_id' => $_GET['facility']
            )
        );
        echo "<script> window.location.href='home.php?page=facility'</script>"; 
    }
    $statement->execute(array($_GET['facility']));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/facility_detail.css">
<script src="js/facility.js"></script>
<div class="container">
    <form action="home.php?page=facility&method=look&facility=<?=$_GET['facility']?>" method="POST">
        <div class="outside">
            <div class="head">
                <div class="name">
                    <p>
                        <span>公設名稱 : </span>
                        <span><?=$row['FACILITIES_NAME']?></span>
                    </p>
                    <?php 
                        if ($auth <= 3) {
                    ?>
                    <a href='#' class="edit"><img src='img/edit.svg' alt=''></a>
                    <?php
                        }
                    ?>
                </div>
                <?php
                    if ($auth != 3) {
                ?>
                <div class="name2">
                    <a href="facility_reserve.php?facility=<?=$_GET['facility']?>"><input class="go" type="button" value="前往預約"></a>
                </div>
                <?php
                    }
                ?>
            </div>
            <hr>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./img/fac/<?=$row['FACILITIES_IMG1']?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/fac/<?=$row['FACILITIES_IMG2']==''?$row['FACILITIES_IMG1']:$row['FACILITIES_IMG2']?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/fac/<?=$row['FACILITIES_IMG3']==''?$row['FACILITIES_IMG2']==''?$row['FACILITIES_IMG1']:$row['FACILITIES_IMG2']:$row['FACILITIES_IMG3']?>" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="photoUpload">
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
                <img src="./img/fac/<?=$row['FACILITIES_IMG1']?>" class="photo" id="photo1">
                <img src="./img/fac/<?=$row['FACILITIES_IMG2']==''?$row['FACILITIES_IMG1']:$row['FACILITIES_IMG2']?>" class="photo" id="photo2">
                <img src="./img/fac/<?=$row['FACILITIES_IMG3']==''?$row['FACILITIES_IMG2']==''?$row['FACILITIES_IMG1']:$row['FACILITIES_IMG2']:$row['FACILITIES_IMG3']?>" class="photo" id="photo3">
            </div>
            <p class="dot"><img src="img/circle.svg"> &nbsp公設時段 : </img></p>
            <!--資料庫匯出該公設預約時段-->
            <div class="information">
                <p class="content" id="time">
                    <span><?=$row['HOUR(`FACILITIES_OPEN_TIME`)']?>:00</span>
                    <span>~</span>
                    <span><?=$row['HOUR(`FACILITIES_CLOSE_TIME`)']?>:00</span>
                </p>
            </div>
            <div class="information" id="intro">
                <p class="content"><?=$row['FACILITIES_INTRODUCTION']?></p>
            </div>
            <hr>
        </div>
        <div class="outside">
            <p class="dot"><img src="img/circle.svg"> &nbsp使用說明 : </img></p>
            <!--資料庫匯出該公設說明和其他注意事項-->
            <div class="information" id="data">
                <p class="content">
                    <span>人數上限：</span>
                    <span><?=$row['FACILITIES_LIMIT']?></span>
                    <span> 人</span>
                </p>
                <p class="content">
                    <span>已預約人數 : </span>
                    <span>10</span>
                    <span> 人</span>
                </p>
                <p class="content">
                    <span>公設所需點數：</span>
                    <span><?=$row['FACILITIES_POINT']?></span>
                    <span>點</span>
                </p>
                <p class="content">
                    <span>其他：</span>
                    <span><?=$row['FACILITIES_DESCRIPTION']?></span>
                </p>
            </div>
            <hr>
        </div>
    </form>
</div>