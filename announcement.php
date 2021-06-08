<?php
    //新增公告處理區域
    if(isset($_POST['submit'])){
        if($_POST['submit'] == 'new'){
            $sql = "SELECT MAX(`ANNOUNCEMENT_ID`) FROM `announcement` WHERE (`COMMUNITY_ID` = $community);";
            $statement = $conn->query($sql);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $announcement = $row['MAX(`ANNOUNCEMENT_ID`)'] + 1;
            $sql = "INSERT INTO `announcement` 
                    (`ANNOUNCEMENT_ID`, `COMMUNITY_ID`, `ANNOUNCEMENT_TITLE`,
                    `ANNOUNCEMENT_DATE`, `ANNOUNCEMENT_TYPE`, `ANNOUNCEMENT_INC`,
                    `ANNOUNCEMENT_CONTENT`, `ANNOUNCEMENT_DOC`)
                    VALUES ($announcement, $community, :title, NOW(), :type, '社區管理公告', :content, :file);";
            $statement = $conn->prepare($sql);
            // 檢查檔案是否上傳成功
            if ($_FILES['file']['error'] === UPLOAD_ERR_OK){
                // 檢查資料夾的建立
                $file_path = './upload/' . $community . '/';
                if(!file_exists($file_path)){
                    mkdir($file_path);
                }
                // 檢查檔案是否已經存在
                if (!file_exists('upload/' . $community . '/' . $_FILES['file']['name'])){
                    $file = $_FILES['file']['tmp_name'];
                    $dest = 'upload/' . $community . '/' . $_FILES['file']['name'];
                    // 將檔案移至指定位置
                    move_uploaded_file($file, $dest);
                }
            } elseif ($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
            } elseif ($_FILES['file']['error'] === UPLOAD_ERR_INI_SIZE) {
                echo '上傳檔案超過限制大小<br>';
            } else {
                echo '錯誤代碼：' . $_FILES['file']['error'] . '<br/>';
            }
            // SQL執行
            try{
                $result = $statement->execute(
                    array(
                        ':title' => $_POST['title'],
                        ':type' => $_POST['type'], 
                        ':content' =>  $_POST['content'],
                        ':file' => isset($_FILES['file']['name']) ? $_FILES['file']['name'] : null
                    )
                );
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        elseif ($_POST['submit'] == 'modify') {
            $sql = "UPDATE `announcement` SET `ANNOUNCEMENT_TITLE` = :title, `ANNOUNCEMENT_TYPE` = :type,
                    `ANNOUNCEMENT_CONTENT` = :content, `ANNOUNCEMENT_DOC` = :file
                    WHERE `ANNOUNCEMENT_ID` = :announcement AND `COMMUNITY_ID` = $community;";
            $statement = $conn->prepare($sql);
            if ($_FILES['file']['error'] != UPLOAD_ERR_NO_FILE){
                // 檢查檔案是否已經存在
                if (!file_exists('upload/' . $community . '/' . $_FILES['file']['name'])){
                    //對不起修改的時候我懶得刪除舊檔案了QQ
                    $file = $_FILES['file']['tmp_name'];
                    $dest = 'upload/' . $community . '/' . $_FILES['file']['name'];
                    // 將檔案移至指定位置
                    move_uploaded_file($file, $dest);
                }
            }
            try{
                $result = $statement->execute(
                    array(
                        ':announcement' => $_POST['announcement'],
                        ':title' => $_POST['title'],
                        ':type' => $_POST['type'], 
                        ':content' =>  $_POST['content'],
                        ':file' => $_FILES['file']['name']
                    )
                );
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        elseif ($_POST['submit'] == 'delete') {
            $sql = "DELETE FROM `announcement`
                    WHERE `ANNOUNCEMENT_ID` = ? AND `COMMUNITY_ID` = $community;";
            $statement = $conn->prepare($sql);
            //這邊也沒有把檔案刪除QAQ
            try{
                $result = $statement->execute(array($_POST['announcement']));
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/a.css" type="text/css" />
<script src="js/announcement.js"></script>

<!-- 公告功能選項清單 -->
<div class="act_wrap">
    <div class="act_icon">
        <?php
            if($auth == 3){
        ?>
        <!-- 註冊彈跳視窗 -->
        <button id="new" type="button" data-toggle="modal" data-target="#exampleModalCenter2" style="border:0; background: transparent;">
            <div class="a_icon_circle">
                <img src="img/add.svg" alt="">
            </div>
        </button>
        <?php
            }
        ?>
        <select form="select" onchange="submit()" name="types" class="sel" value="<?=isset($_POST['types'])?$_POST['types']:''?>">
            <option disabled <?=isset($_POST['types'])?'':'selected'?> hidden>篩選</option>
            <option value="">所有</option>
            <option value="生活"<?=isset($_POST['types'])?($_POST['types']=='生活'?'selected':''):''?>>生活</option>
            <option value="廣告"<?=isset($_POST['types'])?($_POST['types']=='廣告'?'selected':''):''?>>廣告</option>
            <option value="緊急通知"<?=isset($_POST['types'])?($_POST['types']=='緊急通知'?'selected':''):''?>>緊急通知</option>
            <option value="財務"<?=isset($_POST['types'])?($_POST['types']=='財務'?'selected':''):''?>>財務</option>
        </select>
    </div>
    <div class="act_icon">
        <form id="select" action="home.php" method="POST" style="display:flex;align-items: center;">
            <input type="text" name="search" class="search_input" placeholder="<?=isset($_POST['search'])?$_POST['search']:''?>">
            <div class="a_icon_circle">
                <img onclick="submit()" src="img/search.svg" alt="">
            </div>
        </form>
    </div>
</div>

<?php
    //公告分類篩選
    $type = isset($_POST['types']) ? $_POST['types'] : '' ;
    //公告查詢(標題或內容)
    $search = isset($_POST['search']) ? $_POST['search'] : '' ;
    $sql = "SELECT `ANNOUNCEMENT_ID`,`ANNOUNCEMENT_TITLE`,`ANNOUNCEMENT_TYPE`,
            `ANNOUNCEMENT_DATE`,`ANNOUNCEMENT_CONTENT`,`ANNOUNCEMENT_DOC`
            FROM `announcement` WHERE `COMMUNITY_ID` = $community 
            AND `ANNOUNCEMENT_TYPE` LIKE ?
            AND (`ANNOUNCEMENT_TITLE` LIKE ? OR `ANNOUNCEMENT_CONTENT` LIKE ?)
            ORDER BY ANNOUNCEMENT_DATE DESC;";
    $statement = $conn->prepare($sql);
    $statement->execute(array(
        "%".$type."%",
        "%".$search."%",
        "%".$search."%"
    ));
    while( $row = $statement->fetch(PDO::FETCH_ASSOC) ){
    ?>
    <!-- 每一獨立公告區塊 -->
    <div class="announcement">
        <hr>
        <!-- 公告選取框及公告類型 -->
        <div class="item_nav">
            <div class="act_icon">
                <?php
                    if( $auth <= 3 ){
                ?>
                <a class="edit" href='#' data-id="<?=$row['ANNOUNCEMENT_ID']?>" data-toggle="modal" data-target="#exampleModalCenter2">
                    <img src="img/edit.svg" alt="">
                </a>
                <a class="delete" href='#' data-id="<?=$row['ANNOUNCEMENT_ID']?>" data-toggle="modal" data-target="#exampleModal">
                    <img src='img/delete.svg' alt='' style="margin-left: 1em;">
                </a>
                <?php
                    }
                ?>
            </div>
            <p>
                <span>類型：</span>
                <span><?=$row['ANNOUNCEMENT_TYPE']?></span>
            </p>
        </div>
        <!-- 公告內容 -->
        <div class="container">
            <!-- 公告發布帳號及發佈時間、地點 -->
            <div class="item_info">
                <!-- 隨公告人不同，圖片也不同 -->
                <!-- 目前沒有針對使用者設置個人圖片故無法完成 -->
                <div class="logo">
                    <img src="img/icon_boy.svg" alt="">
                </div>
                <!-- 公告時間及地點皆不相同，需連結資料庫 -->
                <div class="info">
                    <p><?=$row['ANNOUNCEMENT_TITLE']?></p>
                    <div class="sub_info">
                        <img src="img/calender.svg" alt="">
                        <p><?=date_format(date_create($row['ANNOUNCEMENT_DATE']),"Y/m/d H:i:s")?></p>
                    </div>
                </div>
            </div>
            <!-- 公告內容敘述，需連結資料庫 -->
            <div class="item_profile">
                <p><?=$row['ANNOUNCEMENT_CONTENT']?></p>
                <p>
                    <?=$row['ANNOUNCEMENT_DOC']?'附件:':''?>
                    <a target="_blank" href="<?='upload/' . $community . '/' . $row['ANNOUNCEMENT_DOC']?>">
                        <?=$row['ANNOUNCEMENT_DOC']?>
                    </a>
                </p>
            </div>
        </div>
    </div>
    <?php
    }
    if($auth == 3){
?>
<!-- 註冊內容模型 -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="home.php" method="POST" enctype="multipart/form-data">
                <input id="announcement" type="hidden" name="announcement" value="">
                <div class="M_title">
                    <div class="modal-header">
                        <h5 class="modal-title ti" id="exampleModalLabel2">新增公告</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <p>
                        公告標題 
                        <input type="text" id="title" name="title" class="text_input" />
                    </p>
                    <p>公告類型 
                        <select name="type" id="type">
                            <option value="生活">生活</option>
                            <option value="廣告">廣告</option>
                            <option value="緊急通知">緊急通知</option>
                            <option value="財務">財務</option>
                        </select>
                    </p>
                    <p>公告內容</p>
                    <textarea id="content" name="content" cols="30" rows="10"></textarea>
                    <input id="file" type="file" name="file" class="file_input">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="j_btn" id="submit" name="submit" value="new">
                        確認
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 內容模型結尾 -->
<!-- 確認刪除彈跳視窗 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">確認刪除此公吿?</h5>
            </div>
            <div class="modal-body">
                確定欲刪除請點選確認 謝謝您!!
            </div>
            <div class="modal-footer">
                <form action="home.php" method="POST">
                    <input type="hidden" name="announcement" value="del">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="hide">取消</button>
                    <!--管理員點選確認取消後該公設的應移除公設清單-->
                    <button type="submit" class="btn btn-info" name="submit" id="go">確認</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
