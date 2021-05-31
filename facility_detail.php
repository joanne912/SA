<?php
    if(!isset($_GET['facility'])){
        header("location:home.php?page=facility");
    }
    $sql = "SELECT `FACILITIES_NAME`, `FACILITIES_INTRODUCTION`, `FACILITIES_DESCRIPTION`,
            `FACILITIES_PLACE`, HOUR(`FACILITIES_OPEN_TIME`), HOUR(`FACILITIES_CLOSE_TIME`),
            `FACILITIES_IMG1`, `FACILITIES_IMG2`, `FACILITIES_IMG3`, `FACILITIES_POINT`,
            `FACILITIES_LIMIT` FROM `facilities` WHERE ( `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community );";
    $statement = $conn->prepare($sql);
    $statement->execute(array($_GET['facility']));
    $row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/facility_detail.css">
<style>
    .item_text a{
        text-decoration: none !important;
    } 
</style>
<div class="container">
    <div class="outside">
        <div class="head">
            <div class="name">
            
                <p>公設名稱 : <?=$row['FACILITIES_NAME']?></p>
            <?php 
                if($auth==3){
                    echo "<a href='#'><img src='https://image.flaticon.com/icons/png/512/1159/1159633.png' alt=''></a>";
                }
            ?>
            </div>
            <?php
                if ($auth == 5){
                    echo '<div class="name2"><a href="facility_reserve.php"><input class="go" style="" type="submit" value="前往預約"></a></div>';
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
                    <img class="d-block w-100" src="<?=$row['FACILITIES_IMG1']?>" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?=$row['FACILITIES_IMG2']?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?=$row['FACILITIES_IMG3']?>" alt="Third slide">
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
        <p class="dot"><img src="img/circle.svg"> &nbsp公設時段 : </img></p>
        <!--資料庫匯出該公設預約時段-->
        <div class="information">
            <p class="content"><?=$row['HOUR(`FACILITIES_OPEN_TIME`)']?>:00~<?=$row['HOUR(`FACILITIES_CLOSE_TIME`)']?>:00</p>
        </div>
        <div class="information">
            <p class="content"><?=$row['FACILITIES_INTRODUCTION']?></p>
        </div>
        <hr>
    </div>
    <div class="outside">
        <p class="dot"><img src="img/circle.svg"> &nbsp使用說明 : </img></p>
        <!--資料庫匯出該公設說明和其他注意事項-->
        <div class="information">
            <p class="content">人數上限：<?=$row['FACILITIES_LIMIT']?></p>
            <p class="content">已預約人數 :功能未完成</p>
            <p class="content">公設所需點數：<?=$row['FACILITIES_POINT']?>點</p>
            <p class="content">其他：<?=$row['FACILITIES_DESCRIPTION']?></p>
        </div>
        <hr>
    </div>
</div>