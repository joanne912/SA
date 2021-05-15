<?php
    include("auth.php");
    $conn = include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社區管理系統</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    function toggle2() {

        if ($("#menu-wrap").css('visibility') == 'visible') {
            $("#menu-wrap").animate({
                'width': 'toggle'
            });
        } else {
            $("#menu-wrap").css({
                'visibility': 'visible'
            });
        }
    }
    </script>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
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
            //管理員與警衛權限
            if ($auth <= 4){
                //權限管理
                if ($page == "m_auth"){
                    ///
                }
                //包裹管理
                else if ($page == "m_package"){
                    ///
                }
                //公設管理
                else if ($page == "m_facility"){
                    //公設頁面的表頭
                    include("m_facility_header.php");
                    //公設維修
                    if ($method == "repair"){
                        include("m_fac_repair.php");
                    }
                    else if ($method == "detail"){
                        include("m_fac_repair_detail.php");
                    }
                    //公設預約紀錄查看
                    else if ($method == "display_booking"){
                        include("m_display_booking.php");
                    }
                    //新增公設
                    else if ($method == "add"){
                        include("m_fac_add.php");
                    }
                    //查看特定公設
                    else if ($method == "look"){
                        include("facility_detail.php");
                    }
                    //顯示所有公設
                    else{
                        include("m_facilities.php");
                    }
                }
                //公告管理(default)
                else{
                    ///
                }
            }
            //一般使用者
            else if ($auth == 5){
                // 個人資訊相關跳轉
                if ($page == "personal"){
                    include("personal.php");
                }
                // 包裹相關跳轉
                else if ($page == "package"){
                    //include("package.php");
                }
                // 公設相關跳轉
                else if ($page == "order"){
                    //查看特定公設
                    if ($method == "look"){
                        include("facility_detail.php");
                    }
                    //查看公設預約紀錄
                        
                    //查看所有公設(default)
                    else{
                        include("facilities.php");
                    }
                    
                }
                // 公告相關跳轉(default)
                else{
                    include("announcement.php");
                }
            }
            
            
        ?>
        </div>
    </div>
</body>

</html>