<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 90%;
            margin: auto;
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
            width: 1em;
            height: 1em;
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
            margin-left: 6%;
            margin-top: 1.5em;
        }
        .item_img{
            width: 100vw;
            height: 40vh;
            background-color: #f7f7fa;
            margin-top: 2em;
        }
        .logo img{
            width: 3em;
            height: 3em;
            border-radius: 50%;
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

    </div>
</body>
</html>