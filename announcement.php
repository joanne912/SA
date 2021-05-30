<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/a.css" type="text/css" />


<div class="act_wrap">
    <div class="act_icon">
        <?php
            if($auth == 3){
        ?>
        <!-- 註冊彈跳視窗 -->
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter2" style="border:0; background: transparent;">
            <div class="a_icon_circle">
                <img src="img/add.svg" alt="">
            </div>
        </button>

        <!-- 註冊內容模型 -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="M_title">
                        <div class="modal-header">
                            <h5 class="modal-title ti" id="exampleModalLabel">新增公告</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>公告標題 <input type="text" name="" id="" class="text_input"></p>
                        <p>公告類型 
                            <select name="" id="">
                                <option value="">生活</option>
                                <option value="">廣告</option>
                                <option value="">緊急通知</option>
                                <option value="">財務</option>
                            </select>
                        </p>
                        <p>公告內容</p>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <input type="file" name="" id="" class="file_input">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-toggle="modal" data-dismiss="modal" data-target="#exampleModalCenter" class="j_btn">
                            確認
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 內容模型結尾 -->
        <?php
            }
        ?>
        <!-- <div class="a_icon_circle">
            <a href="home.php?method=announ_add"><img src="img/add.svg" alt=""></a>
        </div> -->
        
        <select name="" id="" class="sel">
        <!-- <div class="a_icon_circle">
            <img src="img/filter.svg" alt="">
        </div> -->
            <optgroup>
                <option value="">篩選</option>
                <option value="">生活</option>
                <option value="">廣告</option>
                <option value="">緊急通知</option>
                <option value="">財務</option>
            </optgroup>
        </select>
        <!-- <form action="" style="display:flex;align-items: center;">
            <input type="text" name="" id="" class="search_input">
            <div class="a_icon_circle">
                <img src="img/search.svg" alt="">
            </div>
        </form> -->
        <!-- <input type="text" name="" id="">
        <div class="a_icon_circle">
            <img src="img/search.svg" alt="">
        </div> -->
    </div>
    <div class="act_icon">
        <form action="" style="display:flex;align-items: center;">
            <input type="text" name="" id="" class="search_input">
            <div class="a_icon_circle">
                <img src="img/search.svg" alt="">
            </div>
        </form>
        <!-- <div class="a_icon_circle">
            <img src="img/clock.svg" alt=""><span>最新</span>
        </div>
        <div class="a_icon_circle">
            <img src="img/hot.svg" alt=""><span>熱門</span>
        </div> -->
    </div>
</div>
<hr>
<!-- 每一獨立公告區塊 -->
<!-- 公告選取框及公告類型 -->
<div class="item_nav">
    <div class="act_icon">
        <img src="img/edit.svg" alt="">
        <img src="img/delete.svg" alt="" style="margin-left: 1em;">
    </div>
    <p>項目：活動</p>
</div>
<!-- 公告內容 -->
<div class="container">
    <!-- 公告發布帳號及發佈時間、地點 -->
    <div class="item_info">
        <!-- 隨公告人不同，圖片也不同 -->
        <div class="logo">
            <img src="img/icon_boy.svg" alt="">
        </div>
        <!-- 公告時間及地點皆不相同，需連結資料庫 -->
        <div class="info">
            <p>名字 or 社團名稱</p>
            <div class="sub_info">
                <img src="img/calender.svg" alt="">
                <p>2021.05.01</p>
                <!-- <img src="img/location.svg" alt="">
                <p>location</p> -->
            </div>
        </div>
    </div>
    <!-- 公告內容敘述，需連結資料庫 -->
    <div class="item_profile">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi voluptatibus eveniet nobis sit
            numquam
            praesentium architecto nihil ipsum molestias. Distinctio facilis quos culpa perferendis architecto vero
            cumque, officia odit tempore?
            Ratione nisi necessitatibus officia consequuntur labore animi aspernatur in neque quidem amet error
            nulla
            dolorum aliquid eos sunt assumenda quisquam, quia maxime asperiores voluptate dolor ullam eveniet
            debitis.
            Unde, ipsum.
            Natus, magni! Beatae numquam praesentium dolorem quia doloribus eum obcaecati, repellat culpa iure,
            rerum,
            sit saepe mollitia distinctio similique corrupti esse commodi aperiam nisi consequatur earum officia.
            Accusantium, minus nihil.</p>
    </div>
    <!-- 公告圖片旋轉木馬，圖片須從資料庫引入 -->
    <!-- <div class="item_img">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/001.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/001.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/001.jpeg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> -->
    <!-- 訊息按鈕群組 -->
    <!-- <div class="message_wrap">
        <div class="icon_wrap">
            <div class="mes_icon">
                <a href="#"><img src="img/thumb.svg" alt=""></a>
                <a href="#"><img src="img/message.svg" alt=""></a>
                <a href="#"><img src="img/reply.svg" alt=""></a>
            </div>
            <div class="mes_private">
                <a href="#"><img src="img/messenger.svg" alt=""></a>
            </div>
        </div> -->
        <!-- 點讚次數需連結資料庫 -->
        <!-- <p>xxx和其他人都說讚</p>
    </div> -->
</div>


