<?php
    // require_once("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function toggle2() {
        $("#menu-wrap").animate({
            'width': 'toggle'
        });
    }
    </script>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
    <style>
        #menu-wrap {
            display: none;
            height: 88vh;
        }
        #menu-wrap a{
            text-decoration: none !important;
            color: #808080 !important;
        }
        #menu-wrap a:hover{
            text-decoration: none !important;
            color: white;
        }
        .title span{
            color: black !important;
        }
    </style>
</head>

<body>
    <?php
        @$page = $_GET["page"];
        @$method = $_GET["method"];
    ?>
    <div class="all">
        <!-- 下面這個區域是上方的header -->
        <?php require("header.php"); ?>

        <!-- 下面開始是左側彈出視窗的區域 -->
        <?php require("nav.php"); ?>

        <div class="main">
            <?php 
                // 個人資訊相關跳轉
                if ($page == "personal"){
                    include("personal.php");
                }
                // 包裹相關跳轉
                else if ($page == "package"){
                    include("add_facilities.php");
                }
                // 公設相關跳轉
                else if ($page == "order"){
                    if ($method == "repair"){
                        include("m_repair_fac.php");
                    }
                    else if ($method == "list"){
                        include("m_facilities.php");
                    }
                    else if ($method == "look"){
                        include("facility_detail.php");
                    }
                    else if ($method == "add"){
                        include("add_facilities.php");
                    }
                    else{
                        include("m_facilities.php");
                    }
                }
                // 公告相關跳轉
                else if ($page == "announ"){
                    include("announcement.php");
                }
                else{
                //     if ($method == "look"){
                //         include("add_facilities.php");
                //     }
                //     else if($method == "list"){
                        include("m_facilities.php");
                //     }
                //     else{
                //         include("m_repair_fac.php");
                //     }
                }
            ?>
        </div>
    </div>
</body>

</html>