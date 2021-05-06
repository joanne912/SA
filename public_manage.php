<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <>
        <style>
        * {
            color: #808080;
            text-decoration: none;
        }

        .act_wrap {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .act_wrap img {
            width: 3em;
            height: 3em;
        }

        .a_icon_circle {
            width: 6em;
            height: 6em;
            border-radius: 50%;
            background-color: #f7f7fa;
            display: grid;
            place-items: center;
        }

        .item_text {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            margin-top: 1em;
        }

        .item_text a {
            display: inline-block;
            /* background-color: #ffa; */
            width: 6em;
            text-align: center;
            letter-spacing: 6px;
            text-indent: 6px;
        }

        hr {
            width: 100%;
            border: 2px solid #f7f7fa;
            background-color: #f7f7fa;
            margin-top: 2em;
        }

        .text {
            width: 40%;
        }

        .info_wrap {
            width: 90%;
            padding: 2% 3%;
            border: 6px solid #f7f7fa;
            border-radius: 20px;
            margin: auto;
            margin-top: 2em;
            display: flex;
            align-items: center;
            justify-content: space-around;
            align-items: center;
            box-sizing: border-box;
        }

        .icon_group img {
            width: 1.5em;
            height: 1.5em;
        }

        .icon_group {
            height: 10em;
            /* background-color: #c31; */
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            margin-left: 9em;
        }

        .upper a:nth-child(2) {
            margin-left: 1.75em;
        }

        .upper {
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .text p:nth-child(1) {
            color: #c31;
        }

        @media screen and (min-width: 768px) and (max-width: 1200px) {
            .icon_group {
                margin-left: 0;
            }

            .text {
                width: 34%;
            }

            .graphic img {
                width: 200px;
                height: 130px;

            }

            .text p {
                font-size: .5em;
            }

            .info_wrap {
                width: 100%;
            }
        }

        @media screen and (max-width: 400px) {
            .a_icon_circle {
                width: 3em;
                height: 3em;
            }

            .a_icon_circle img {
                width: 1.5em;
                height: 1.5em;
            }

            .item_text a {
                font-size: .5em;
                letter-spacing: 0px;
                text-indent: 0px;
            }

            .info_wrap {
                flex-wrap: wrap;
                padding: 1em;
            }

            .graphic img {
                height: 135px;
            }

            .text {
                width: 85%;
                margin-top: 2em;
            }

            .icon_group {
                justify-content: space-between;
                margin: 0;
                width: 90%;
                margin-top: 2em;
                height: 2em;
            }

            .upper {
                width: 5em;
            }
        }
        </style>
</head>

<body>
    <div class="act_wrap">
        <a href="#">
            <div class="a_icon_circle">
                <img src="img/list.svg" alt="">
            </div>
        </a>
        <a href="#">
            <div class="a_icon_circle">
                <img src="img/add.svg" alt="">
            </div>
        </a>
        <a href="#">
            <div class="a_icon_circle">
                <img src="img/record.svg" alt="">
            </div>
        </a>
        <a href="#">
            <div class="a_icon_circle">
                <img src="img/fix.svg" alt="">
            </div>
        </a>

        <div class="item_text">
            <a href="#">公設清單</a>
            <a href="#">新增公設</a>
            <a href="#">預約記錄</a>
            <a href="#">維修紀錄</a>
        </div>
        <hr>
    </div>
    <div class="info_wrap">
        <div class="graphic">
            <img src="https://fakeimg.pl/250x150/f7f7fa/d3d3d3" alt="">
        </div>
        <div class="text">
            <h2>編號游泳池</h2>
            <p>開放時間：早上9:00-12:00</p>
            <p>其他公設資訊其他公設資訊其他公設資訊其他公設資訊</p>
        </div>
        <div class="icon_group">
            <div class="upper">
                <a href="#"><img src="img/edit.svg" alt=""></a>
                <a href="#"><img src="img/delete.svg" alt=""></a>
            </div>
            <img src="img/next.svg" alt="">
        </div>
    </div>
</body>

</html>