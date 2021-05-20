<link rel="stylesheet" href="css/m_facilities.css">
<link rel="stylesheet" href="css/m_repair_fac.css">

<?php 
    // $conn = require_once('conn.php');
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
    <tr>
        <a href='#'>
            <td>1</td>
        </a>
        <td>05/20</td>
        <td>公設名稱</td>
        <td>
            <a href='home.php?page=order&method=detail'>公設問題</a>
        </td>
        <td>
            <p class='resolve'>已處理</p>
        </td>
        <td>
            <p class='wait'></p>
        </td>
        <td>
            <p class='solving'></p>
        </td>
    </tr>
</table>