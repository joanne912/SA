<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            list-style: none;
            color: #808080;
        }
        .item_nav{
            padding: 2% 3%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            /* border-bottom: 1px solid #d3d3d3; */
        }
        .item_nav p{
            padding: .5% .7%;
            font-size: .8em;
            background-color: #f7f7fa;
            border-radius: 30px;
            color: #808080;
        }
        .item_info{
            display: flex;
            align-items: center;
            /* width: 90%;
            margin: auto; */
            padding: .5em;
            box-sizing: border-box;
        }
        .logo{
            width: 4em;
            height: 4em;
            border-radius: 50%;
            background-color: #f7f7fa;
            display: grid;
            place-items: center;
        }
        .item_nav input{
            
        }
        .info{
            margin-left: 2.5em;
            height: 3em;
        }
        .info img{
            width: 1.25em;
            height: 1.25em;
        }
        .sub_info{
            display: flex;
            margin-top: .5em;
            align-items: center;
        }
        .sub_info p{
            margin: 0 1.25em 0 .5em;
        }    
        .item_profile{
            width: 70%;
            margin-left: 1.5%;
            margin-top: 1.5em;
            /* display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical; */
        }
        .item_img{
            width: 100%;
            /* background-color: #f7f7fa; */
            margin-top: 2em;
            margin: auto;
        }
        .logo img{
            width: 3em;
            height: 3em;
            border-radius: 50%;
        }
        .d-block{
            width: 80%;
            height: 20em;
            margin: auto;
        }
        .carousel-control-prev-icon{
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='black' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e")
        }
        .carousel-control-next-icon{
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='black' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e")
        }
        .mes_icon{
            width: 20%;
            /* background-color: #ffa; */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .mes_icon img{
            width: 1.75em;
            height: 1.75em;
        }
        .mes_private img{
            width: 1.75em;
            height: 1.75em;
        }
        .container{
            width: 90%;
            margin: auto;
        }
        .icon_wrap{
            /* width: 95%; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: auto;
            margin-top: 1.1em;
        }
        .message_wrap p{
            margin-top: 1em;
            letter-spacing: 5px;
            text-indent: 5px;
            font-size: 1em;
        }
        @media screen and (min-width: 768px;){
            .item_profile{
                width: 100vw;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <header>

    </header>
    <div class="item_nav">
        <input type="checkbox" name="" id="">
        <p>項目：活動</p>
    </div>
    <div class="container">
        <div class="item_info">
            <div class="logo">
                <img src="img/icon_boy.svg" alt="">
            </div>
            <div class="info">
                <p>名字 or 社團名稱</p>
                <div class="sub_info">
                    <img src="img/calender.svg" alt="">
                    <p>2021.05.01</p>
                    <img src="img/location.svg" alt="">
                    <p>location</p>
                </div>
            </div>
        </div>
        <div class="item_profile">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi voluptatibus eveniet nobis sit numquam praesentium architecto nihil ipsum molestias. Distinctio facilis quos culpa perferendis architecto vero cumque, officia odit tempore?
            Ratione nisi necessitatibus officia consequuntur labore animi aspernatur in neque quidem amet error nulla dolorum aliquid eos sunt assumenda quisquam, quia maxime asperiores voluptate dolor ullam eveniet debitis. Unde, ipsum.
            Natus, magni! Beatae numquam praesentium dolorem quia doloribus eum obcaecati, repellat culpa iure, rerum, sit saepe mollitia distinctio similique corrupti esse commodi aperiam nisi consequatur earum officia. Accusantium, minus nihil.</p>
        </div>
        <div class="item_img">
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
        </div>
        <div class="message_wrap">
            <div class="icon_wrap">
                <div class="mes_icon">
                    <a href="#"><img src="img/thumb.svg" alt=""></a>
                    <a href="#"><img src="img/message.svg" alt=""></a>
                    <a href="#"><img src="img/reply.svg" alt=""></a>
                </div>
                <div class="mes_private">
                    <a href="#"><img src="img/messenger.svg" alt=""></a>
                </div>
            </div>
            <p>xxx和其他人都說讚</p>
        </div>
        
    </div>
</body>
</html>