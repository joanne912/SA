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
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="css/home.css" type="text/css" />
</head>

<body>
    <?php
        @$page = $_GET["page"];
        @$method = $_GET["method"];
        @$to = $_GET["to"];
    ?>
    <div class="all">
        <!-- 下面這個區域是上方的header -->
        <?php require("header.php"); ?>

        <!-- 下面開始是左側彈出視窗的區域 -->
        <?php require("nav.php"); ?>

        <div class="main">
            <?php
            //管理員與警衛權限
            if ($auth <= 3){
                //權限管理
                if ($page == "m_auth"){
                    ///
                }
                //包裹管理
                else if ($page == "m_package"){
                    ///
                }
                //公設管理
                else if ($page == "facility"){
                    //公設頁面的表頭
                    include("m_facility_header.php");
                    //公設維修
                    if ($method == "repair"){
                        include("m_fac_repair.php");
                    }
                    //公設維修詳細資訊
                    else if ($method == "detail"){
                        include("m_fac_repair_detail.php");
                    }
                    //公設預約紀錄查看
                    else if ($method == "display_booking"){
                        include("m_display_booking.php");
                    }
                    //查看單一預約記錄
                    else if($method == "booking"){
                        include("m_fac_booking.php");
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
                        include("facilities.php");
                    }
                }
                //公告管理(default)
                else{
                    ///
                }
            }
            // 社區管理者(管委會成員，同時也是住戶身分)
            else if ($auth >= 4){
                //社區管理者的查看住戶戶籍代碼
                if($page == "householdid"){
                    if($auth == 4) {
                        if ($method == "look"){
                            include("household_id_default.php");
                        }
                        else{
                            include("household_id.php");
                        }
                    }
                }
                // 個人資訊相關跳轉
                else if ($page == "personal"){
                    include("personal.php");
                }
                // 包裹相關跳轉
                else if ($page == "package"){
                    //include("package.php");
                }
                // 公設相關跳轉
                else if ($page == "facility"){
                    //公設清單表頭
                    include("facility_header.php"); 
                    //查看特定公設
                    if ($method == "look"){
                        include("facility_detail.php");
                    }
                    //預約公設 
                    else if($method == "reserve"){
                        include("facility_reserve.php");
                    }
                    //查看公設預約紀錄
                    else if($method == "records"){
                        if($to == "records_cancle"){
                            include("facility_records_cancle.php");
                        }
                        else if($to == "records_finish"){
                            include("facility_records_finish.php");
                        }
                        else{
                            include("facility_records.php");
                        }
                    }
                    //查看特定預約紀錄
                    else if($method == "record"){
                        include("facility_record.php");
                    }
                    //查看點數紀錄
                    else if($method == "point"){
                        include("facility_point.php");
                    }
                    //公設報修的動作
                    else if($method == "repair_add"){
                        if($to == "repair_status"){
                            include("facility_repair_status.php");
                        }
                        else{
                            include("facility_repair_add.php");
                        }
                    }
                    //維修進度清單
                    else if($method == "repairs"){
                        include("facility_repairs.php");
                    }
                    //觀看維修進度
                    else if($method == "repair"){
                        include("facility_repair.php");
                    }
                    //查看所有公設(default)
                    else{
                        include("facilities.php");
                    }
                }
                // 公告相關跳轉(default)
                else{
                    // if ($method == "announ_add"){
                    //     include("m_announcement_add.php");
                    // }
                    // else{
                        include("announcement.php");
                    // }
                }
            }
        ?>
        </div>
    </div>
</body>

</html>