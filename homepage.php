<!-- <!DOCTYPE html>
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
        }
        html{
            height: 100%;
        }
    </style>
</head>
<body>
    
</body>
</html> -->

























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
            text-decoration: none
        }
        body, html{
            width: 100%;
            height: 100%;
        }
        .all{
            width: 100%;
            height: 100%;
            display: flex;
        }
        header{
            width: 25%;
            height: 100vh;
            background: #f7f7fa;
            /* background-color: transparent; */
            padding: 40px 50px;
            box-sizing: border-box;
            display: grid;
            place-items: center;
            /* position: fixed; */
        }
        nav{
            width: 100%;
            /* background: #ffa; */
            display: grid;
            place-items: center;
        }
        nav a{
            display: block;
        }
        .logo{
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #fc6471;
            display: grid;
            place-items: center;
        }
        .logo span{
            color: white;
            font-weight: 500;
            font-size: 25px;
            letter-spacing: 8px;
            text-indent: 8px;
        }
        .title{
            font-size: 35px;
            color: #d3d3d3;
            margin: 40px 0 0 0;
            letter-spacing: 4px;
            text-indent: 4px;
        }
        .option_wrap{
            margin: 45px 0 0;
        }
        .option_wrap a{
            margin: 35px 0 0;
            letter-spacing: 3px;
            text-indent: 3px;
            color: #808080;
        }
        .main{
            overflow-y: auto;
            flex: 1 1 500px;
        }
        .profile{
            width: 100%;
            height: 20%;
            background: #d5d5e9;
            padding: 25px 70px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
        }
        .profile span{
            /* background: #c31; */
            padding: 3px 5px;
            font-size: 4vh;
            letter-spacing: 5px;
            text-indent: 5px;
            margin-left: 10px;
            color: black;
            /* text-decoration: underline; */
        }
        .profile img{
            width: 40px;
            height: 40px;
        }
        .data_wrap{
            width: 90%;
            height: 73%;
            /* background: #c31; */
            margin: auto;
            margin-top: 40px;
            /* border-radius: 10px;
            border: 10px solid #f7f7fa; */
        }
        .data{
            width: 100%;
            height: 83%;
            border-radius: 10px;
            border: 10px solid #f7f7fa;
            box-sizing: border-box;
            padding: 10px 10px;
        }
        .other a{
            color: black;
            display: block;
            margin-left: 10px;
            letter-spacing: 3px;
            text-indent: 3px;
        }
        .other{
            width: 100%;
            height: 17%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            /* background-color: #ffa; */
        }
        .other img{
            width: 25px;
            height: 25px;
        }
        @media screen and (max-width: 400px;) {
            .profile span{
                font-size: 2vw;
            }
            .profile img{
                width: 1.5rem;
                height: 1.5rem;
            }
        }
        @media screen and (max-width: 768px) {
            header{
                position: absolute;
                width: 50%;
                display: none;
            }
            .profile{
                font-size: 2vw;
                padding: 15px 25px;
            }
            .profile span{
                letter-spacing: 4px;
                text-indent: 4px;
            }
            /* .profile img{
                width: 1.5rem;
                height: 1.5rem;
            } */
        }
    </style>
</head>
<body>
    <div class="all">
        <header>
            <nav>
                <div class="logo">
                    <span>LOGO</span>
                </div>
                <div class="title">
                    <span>TITLE</span>
                </div>
                <div class="option_wrap">
                    <a href="#">個人資訊</a>
                    <a href="#">我的包裹</a>
                    <a href="#">公設預約</a>
                    <a href="#">社區公告</a>
                </div>
            </nav>
        </header>
        <div class="main">
            <div class="profile">
            <img src="https://www.flaticon.com/svg/vstatic/svg/2522/2522086.svg?token=exp=1619533505~hmac=d9ab4f922269ea3a24fff771cbe40a78" alt="">
                <span>我的個人資訊</span>
            </div>
            <div class="data_wrap">
                <div class="data">
                    <div class="item">
                    
                    </div>
                    <div class="item">

                    </div>
                    <div class="item">

                    </div>
                    <div class="item">

                    </div>
                    <div class="item">

                    </div>
                    <div class="item">

                    </div>
                </div>
                <div class="other">
                    <img src="" alt="">
                    <a href="#">同戶開通</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>