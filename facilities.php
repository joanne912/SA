<?php
    if(isset($_POST['submit'])){
        $sql = "DELETE FROM `facilities`
                WHERE `FACILITIES_ID` = ? AND `COMMUNITY_ID` = $community;";
        $statement = $conn->prepare($sql);
        try{
            $result = $statement->execute(array($_POST['facility']));
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/facilities.css">
<?php
    $sql = "SELECT `FACILITIES_ID`,`FACILITIES_NAME`, `FACILITIES_INTRODUCTION`,
            `FACILITIES_PLACE`, HOUR(`FACILITIES_OPEN_TIME`), HOUR(`FACILITIES_CLOSE_TIME`),
            `FACILITIES_IMG1` FROM `facilities` WHERE ( `COMMUNITY_ID` = $community );";
    
    foreach( $conn->query($sql) as $row ){
        ?>
        <!-- 每個獨立的公設資訊 -->
        <div class='info_wrap'>
            <!-- 公設圖片，需連結資料庫 -->
            <div class='graphic'>
                <img style="border-radius:8px;width:250px;height:160px"src='./img/fac/<?=$row["FACILITIES_IMG1"]?>' alt=''>
            </div>
            <!-- 每一公設的名稱及簡介，需連結資料庫 -->
            <div class='text'>
                <h2><?=$row['FACILITIES_ID']?><?=$row['FACILITIES_NAME']?></h2>
                <p>開放時間：<?=$row['HOUR(`FACILITIES_OPEN_TIME`)']?>:00~<?=$row['HOUR(`FACILITIES_CLOSE_TIME`)']?>:00</p>
                <p><?=$row['FACILITIES_INTRODUCTION']?></p>
            </div>
            <!-- 管理員的刪除按鈕群組 -->
            <div class='icon_group'>
                <div class='upper'>
                    <?php
                        if($auth <= 3){
                    ?>
                    <a href='#' class="delete" data-id="<?=$row['FACILITIES_ID']?>" data-toggle="modal" data-target="#exampleModal"><img src='img/delete.svg' alt=''></a>
                    <?php
                        }
                    ?>
                <!---->
                </div>
                <a href='home.php?page=facility&method=look&facility=<?=$row["FACILITIES_ID"]?>'><img src='img/next.svg' alt=''></a>
            </div>
        </div>
        <?php
    }
?>

<!-- 確認刪除彈跳視窗 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="home.php?page=facility" method="POST">
        <input type="hidden" name="facility">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:blue;font-weight:bold"class="modal-title" id="exampleModalLabel">確認刪除此公設 ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cross"></button>
                </div>
                <div class="modal-body">
                    確定欲刪除請點選確認 謝謝您!!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="hide">取消</button>
                <!--管理員點選確認取消後該公設的應移除公設清單-->
                <button type="submit" name="submit" class="btn btn-info" id="go">確認</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--確認刪除彈跳視窗botton動態效果-->
<script src="js/facilities.js"></script>