<link rel="stylesheet" href="css/facility_records.css" type="text/css" />
<body>
      <!-- 顯示住戶已預約 已取消 已完成的預約紀錄 -->
    <div class="situation">
        <!-- if按下button 要加上class="" -->
        <a href="home.php?page=facility&method=records"><input type="button" value="已預約"  class="cancle_btn"></a>
        <a href="home.php?page=facility&method=records&to=records_cancle"><input type="button" value="已取消" class="cancle_btn"></a>
        <a href="home.php?page=facility&method=records&to=records_finish"><input type="button" value="已完成" class="cancle_btn"></a>
    </div>
</body>