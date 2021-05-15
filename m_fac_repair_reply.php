<link rel="stylesheet" href="css/m_repair_fac_reply.css">

<?php
//     $conn = require_once('conn.php');
//     $sql = "";
//     $result = mysqli_query($conn, $sql);
// ?>
<div class="wrap">
    <form action="home.php">
        <p><img src="img/circle.svg" alt=""> 公設名稱：<?php echo ("游泳池"); ?></p>
        <hr>
        <p><img src="img/circle.svg" alt=""> 問題描述：</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <p><img src="img/circle.svg" alt=""> 進度回報：</p>
        <div class="radio_wrap">
            <input type="radio" name="status" value="待處理"><span class="radio_text">待處理</span>
            <input type="radio" name="status" value="處理中"><span class="radio_text">處理中</span>
            <input type="radio" name="status" value="已處理"><span class="radio_text">已處理</span>
        </div>
        <hr>
        <p><img src="img/circle.svg" alt=""> 處理結果：</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <div class="btn">
            <input type="submit" value="確認送出">
        </div>
    </form>
</div>