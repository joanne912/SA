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
    <style>
        .d-block {
            width: 80%;
            height: 40vh !important;
            margin: auto;
            margin-top: 1em;
        }
        .carousel{
            z-index: -1;
        }
        .act_wrap{
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
        .act_wrap img{
            width: 3em;
            height: 3em;
        }
        .a_icon_circle{
            width: 6em;
            height: 6em;
            border-radius: 50%;
            background-color: #f7f7fa;
            display: grid;
            place-items: center;
        }
        .item_text{
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            margin-top: 1em;
        }
        .item_text a{
            display: inline-block;
            /* background-color: #ffa; */
            width: 6em;
            text-align: center;
            letter-spacing: 6px;
            text-indent: 6px;
            color: #808080;
        }
        hr{
            width: 100%;
            border: 2px solid #f7f7fa;
            background-color: #f7f7fa;
            margin-top: 2em;
        }
    
        .outside{
            width: 90%;
            margin: auto;
            

        }
        .name{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
        }
        .container{
            width: 80%;
            margin: auto;
            padding: 1.5em 0;
            border: 8px solid #f7f7fa;
            border-radius: 20px;
            margin-top: 1em;
            color: #808080;
        }
        /* 
        
        input{
            width: 35%;
            margin: 3%;
            border: 6px solid #f7f7fa;
            border-radius: 10px;
            padding: .4em 1.25em;
            box-sizing: border-box;
            letter-spacing: 2px;
            text-indent: 2px;
            font-size: 1.25em;
            margin-left: -.5em;
        }
        select{
            width: 35%;
            margin: 3%;
            border: 6px solid #f7f7fa;
            border-radius: 10px;
            padding: .4em 1.25em;
            box-sizing: border-box;
            letter-spacing: 2px;
            text-indent: 2px;
            font-size: 1.25em;
            
        }
        form p{
            width: 10%;
            letter-spacing: 2px;
            text-indent: 2px;
        }
       
        .btn{
            width: 9vw;
            height: 6vh;
            font-size: 1em;
            border: 0;
            background-color: #fc6471;
            color: white;
        }
        .btn-wrap{
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin: 0 0 -1em;
        }

         */
         .name p{
             font-size:1.5em;
             margin-bottom: 0;
         }
         .dot{
            width:100%;
            font-size:1.2em;
            list-style:circle;
            margin-top: 2em;
            /* background-color:#f7f7fa; */
            
         }
         .content{
           
            font-size:1.2em;
            list-style:circle;
       
           
            letter-spacing:4px;
            font-size:1em;
            /* text-indent:1.5em; */
         }
         .information{
            width:43%;
            margin:0.1em 0;
            padding:0 1.5em;
         }
         .outside img{
             width:.75em;
             height:.75em;
         }
         .information p{
             margin: .8em 0;
         }
         @media screen and (max-width: 768px){
             .container{
                 width: 100%;
             }
             .name p{
                 font-size: 1em;
             }
             .d-block{
                 height: 20vh !important;
             }
         }
         @media screen and (max-width: 400px){
            .a_icon_circle{
                width: 3em;
                height: 3em;
            }
            .a_icon_circle img{
                width: 1.5em;
                height: 1.5em;
            }
            .item_text a{
                font-size: .5em;
                letter-spacing: 0px;
                text-indent: 0px;
            }
            .information{
                width: 100%;
            }
            .dot{
                font-size:1em;
            }
        }
    </style>
</head>
<body>
    <?php 
        include("facility_header.php"); 
    ?>
    <div class="container">
        <div class="outside">
            <div class="name">
                <p >公設名稱 : 游泳池</p>
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