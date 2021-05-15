<link rel="stylesheet" href="css/m_display_booking.css" type="text/css" />
<style>
    .textcontent{
        width:100%;
        background-color:white;
        letter-spacing:2px;
        font-size:1.2em;
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin:auto;
    }
    @media screen and (max-width: 768px) and (max-width:900px){
        .textcontent{
            font-size:1em;
        }
    }
    @media screen and (max-width: 400px){
        .textcontent{
            font-size:1em;
            margin-top:20%;
            width:63%;
        }
    }
</style>

<body>
    <!-- 每個獨立的公設資訊 -->
    <div class="info_wrap"style="width:100%;">
        <!-- 每一公設的編號 公設icon 名稱 可容納人數 今日預約人數，需連結資料庫-->
        <div class="textcontent" >
            <div>
                <span class="name">編號 |</span>
                <span class="name">游泳池 <img class="facility_img" src="img/swimmer.svg"> </span>
                <span>| 最大容納人數 ：20 人</span>
                <span>| 今日預約人數 : 5 人</span>
            </div>
        </div>
        <!-- 管理員的查看住戶預約紀錄按鈕 -->
        <div class="icon_group">
            <div class="upper"></div>
            <a href="m_fac_booking.php"><img src="img/next.svg" alt=""></a>
        </div>
    </div>
</body>

</html>


