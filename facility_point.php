
    <link rel="stylesheet" href="css/facility_point.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<style>
    .item_text a{
        color: #808080 !important;
        text-decoration: none !important;
    } 
</style>
<body>
    <div class="container">
        <div class="outside">
            <div class="head" >
                <div class="name">
                    <p>點數紀錄</p>
                </div>
            </div>
            <hr class="h">
            <div class="head" >
                <div class="name2">
                    <!--資料庫抓該住戶的點數-->
                    <p>我的點數:<span class="pp">500</span><span>點</span></p>
                </div>
            </div>
            <hr class="hr1">
            <br>
            <div class="point_nav">
                <div class="ul">
                    <li>點數狀態</li>
                    <li>預約公設</li>
                    <li>預約日期</li>
                    <li class="start">開始時間</li>
                    <li>結束時間</li>
                    <li>點數增減</li>
                </div>
            </div>
            <!--住戶 1.取消:退回點數 +50套用 class="add_point" 資料庫抓公設名稱 取消預約的日期 開始 結束時間 點數
                     2.預約:扣點 -30套用 class="minor_point"-->
            <div class="information2">
                <span class="grayspace"><span>
                <div class="middletext">
                    <span>退回點數</span>
                    <span>01游泳池 </span>
                    <span>2021/5/13</span>
                    <span>8:00</span>
                    <span>9:00</span>
                    <span class="add_point"><font class="add_point">+</font>50</span>
                </div>
            </div>
            <div class="information2">
                <span class="grayspace"><span>
                <div class="middletext">
                    <span>預約扣點</span>
                    <span>01游泳池 </span>
                    <span>2021/5/13</span>
                    <span>8:00 </span>
                    <span>9:00</span>
                    <span class="minor_point"><font class="minor_point">-</font>30
                    </span>
                </div>
            </div>
            <div class="information2">
                <span class="grayspace"><span>
                <div class="middletext">
                    <span>退回點數</span>
                    <span>01游泳池 </span>
                    <span>2021/5/13</span>
                    <span>8:00</span>
                    <span>9:00</span>
                    <span class="add_point"><font class="add_point">+</font>50
                    </span>
                </div>
            </div>

           
        </div>
    </div>
</body>

</html>