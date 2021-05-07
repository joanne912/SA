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
        a:hover{
            text-decoration: none !important;
            color: white;
        }
    </style>
</head>

<body>
    <?php
        @$page = $_GET["page"];
    ?>
    <div class="all">
        <!-- 下面這個區域是上方的header -->
        <?php require("header.php"); ?>

        <!-- 下面開始是左側彈出視窗的區域 -->
        <?php require("nav.php"); ?>

        <div class="main">
            <?php 
                if ($page == "personal"){
                    include("personal.php");
                }
                else if ($page == "package"){
                    include("add_facilities.php");
                }
                else if ($page == "order"){
                    include("m_facilities.php");
                }
                else if ($page == "announ"){
                    include("announcement.php");
                }
                else{
                    include("m_repair_fac.php");
                }
            ?>
        </div>
    </div>
</body>

</html>