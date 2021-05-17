<?php
    $time = '5';

    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<!-- =======
    $_SESSION = array(); 
    session_destroy(); 
>>>>>>> 754491974e0119c2a86c9cc59a7f529177ac1b66 -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <style>
    .all{
        width: 100vw;
        height: 100vh;
        display: grid;
        place-items: center;
        padding: .5em 1em;
        box-sizing: border-box;
    }
    .container{
        background-color: #f7f7fa;
        padding: 10em 0;
        border: 6px solid #f7f7fa;
        border-radius: 10px;
        display: grid;
        place-items: center;
        box-sizing: border-box;
    }
    p{
        width: 100%;
        font-size: 3em;
        font-weight: 700;
        letter-spacing:  20px;
        text-indent: 20px;
        /* background-color: #fc6471;; */
        background-color: #fc6471;
        text-align: center;
        padding: 0;
     
        
    }
    p:nth-child(1){
        width: 65%;
        display: inline;
        color: white;
    }
    /* span{
        color: #fc6471;
        background-color: #fc6471;
        color: white;
        padding: 0 0 0 20px;
        margin-right: 20px;
    } */
    p:nth-child(2){
        background-color: transparent;
        color: #808080;
        margin: .5em 0 0;
    }
    .col{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
    .text{
        width: 70%;
        /* background-color: #c31; */
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    @media screen and (max-width: 768px) {
        .container {
            /* height: 100vh; */
            width: 95%;
        }
        p{
            width: 100%;
            font-size: 2em;
            font-weight: 700;
            letter-spacing: 5px;  
            text-indent: 10px;      
        }
    }

    @media screen and (max-width: 400px) {
        .container {
            /* height: 100vh; */
            width: 95%;
            display: flex;
            justify-content: center;
            margin: auto;
        }
        p{
            width: 100%;
            font-size: 1.5em;
            font-weight: 700;
            letter-spacing: 2.5px;  
            text-indent: 2.5px;      
        }
    }
    </style>
</head>
<body>
<div class="all">
    <div class="container">
        <div class="col align-self-center">
            <div class="text">
                    <p style=" text-align:center;">感謝使用! </p>
                    <p>
                        <?php
                        echo "".$time."秒後登出";
                        header("refresh:$time;url=index.html");
                        ?>
                    </p>
            </div>
        </div>
    </div>
</div>
</body>
