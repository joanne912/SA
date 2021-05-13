<link rel="stylesheet" href="css/m_facilities.css">
<link rel="stylesheet" href="css/m_repair_fac.css">

<?php 
    // $conn = require_once('conn.php');
    include("m_facility_header.php"); 
    // $sql = "SELECT * FROM tablename";
    // $result = mysqli_query($conn, $sql);
?>
<table>
    <thead>
        <th>編號</th>
        <th>日期</th>
        <th>公設名稱</th>
        <th>問題描述</th>
        <th>處理進度</th>
    </thead>
    <?php
    // 大概的後端我都寫好了，只差資料庫
    
    // $rs[4] = "處理中";
        // while ($rs = mysqli_fetch_row($result)){
        //     echo "<tr>";
        //     echo "<a href='#'><td>" . $rs[0] . "</td></a>";
        //     echo "<td>" . $rs[1] . "</td>";
        //     echo "<td>" . $rs[2] . "</td>";
            // echo "<td><a href='home.php?page=order&method=detail'>查看</a></td>";
            // if ($rs[4] == "已處理"){
            //     echo "<td><p class='resolve'>" . $rs[4] . "</p></td>";
            // }
            // else if ($rs[4] == "待處理"){
            //     echo "<td><p class='wait'>" . $rs[4] . "</p></td>";
            // }
            // else if ($rs[4] == "處理中"){
            //     echo "<td><p class='solving'>" . "$rs[4]" . "</p></td>";
            // }
            // echo "</tr>";
        // }
    ?>
</table>