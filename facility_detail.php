<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="css/facility_detail.css">
</head>

<body>
    <?php
        if ($auth == 5){
            include("facility_header.php");
        }
    ?>
    <div class="container">
        <div class="outside">
            <div class="head">
                <div class="name">
                    <p>公設名稱 : 游泳池</p>
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
                        <img class="d-block w-100" src="img/001.jpeg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/001.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/001.jpeg" alt="Third slide">
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
                <p class="content">早上9:00~12:00</p>
                <p class="content">下午2:00~6:00</p>
            </div>
            <div class="information">
                <p class="content">平日、假日皆開放使用平日、假日皆開放使用，疫情期開放上限20人預約</p>
            </div>
            <hr>
        </div>
        <div class="outside">
            <p class="dot"><img src="img/circle.svg"> &nbsp使用說明 : </img></p>
            <!--資料庫匯出該公設說明和其他注意事項-->
            <div class="information">
                <p class="content">人數上限： </p>
                <p class="content">已預約人數 :</p>
                <p class="content">公設所需點數： 點</p>
                <p class="content">可使用時間： /次</p>
                <p class="content">其他：</p>
            </div>
            <hr>
        </div>
    </div>
</body>

</html>