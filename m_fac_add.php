<?php
    if(isset($_POST['submit'])){
        $name = $introduction = $description = $open = $close = $point = $limit = "";
        $name = $_POST['name'];
        $introduction = $_POST['introduction'];
        $description = $_POST['description'];
        $open = $_POST['open_time'];
        $close = $_POST['close_time'];
        $point = $_POST['point'];
        $limit = $_POST['limit'];
        $sql = "INSERT INTO `facilities` (`FACILITIES_ID`, `COMMUNITY_ID`, `FACILITIES_NAME`, `FACILITIES_INTRODUCTION`, `FACILITIES_DESCRIPTION`, `FACILITIES_PLACE`, `FACILITIES_OPEN_TIME`, `FACILITIES_CLOSE_TIME`, `FACILITIES_IMG1`, `FACILITIES_IMG2`, `FACILITIES_IMG3`, `FACILITIES_POINT`, `FACILITIES_LIMIT`)
                VALUES (3, :community, :name, :introduction, :description, '', :open, :close, '', '', '', :point, :limit)";
        $statement = $conn->prepare($sql);
        try{
            $result = $statement->execute(
                array(
                    ':community' => $community,
                    ':name' => $name, 
                    ':introduction' => $introduction, 
                    ':description' => $description, 
                    ':open' => $open, 
                    ':close' => $close, 
                    ':point' => $point, 
                    ':limit' => $limit
                )
            );
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<link rel="stylesheet" href="css/add_facilities.css">
<div class="wrap">
    <h2>
        我還需要照片上傳區QQ<br>
        <?php
            if($result){
                echo "新增成功";
            }else{
                if(isset($_POST['submit'])){
                    echo "新增失敗!請聯絡工程師";
                }
            }
        ?>
    </h2>
    <form method="POST" action="home.php?page=m_facility&method=add">
        <span>公設名稱： <input type="text" name="name"></span>
        <hr>
        <span><img src="img/circle.svg" alt="">公設時段</span>
        <p>開放時段：<input type="text" name="open_time"></p>
        <p>開放時段：<input type="text" name="close_time"></p>
        <p>公設簡介：</p>
        <textarea rows="5" cols="40" name="introduction"></textarea>
        <hr>
        <span><img src="img/circle.svg" alt="">使用說明</span>
        <p>人數上限：<input type="text" name="limit"></p>
        <p>所需點數：<input type="text" name="point"></p>
        <p>備註等公設相關內容：</p>
        <textarea rows="10" cols="40" name="description"></textarea>
        <div class="btn">
            <input type="submit" name="submit" value="新增確認">
        </div>
    </form>
</div>