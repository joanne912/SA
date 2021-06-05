<?php
if($_FILES["my_file"]["error"]===UPLOAD_ERR_OK){
    echo "檔案名稱:" .$_FILES["my_file"]["name"]. "<br/>";
    echo "檔案類型:" .$_FILES["my_file"]["type"]. "<br/>";
    echo "檔案大小:" .($_FILES["my_file"]["size"]/1024). "KB<br/>";
    echo "暫存名稱:" .$_FILES["my_file"]["tmp_name"]. "<br/>";
    if(file_exists("m_fac_add/".$_FILES["my_file"]["name"])){
        echo "檔案已存在"."<br/>";
    }
    else{
        $tempFileName = $_FILES["my_file"]["tmp_name"];
        $dest = "img/fac/".$_FILES["my_file"]["name"];
        //move_uploaded_file($file, $dest);
    }
}
else{
    echo "錯誤代碼:".$_FILES["my_file"]["error"]."<br/>";
}
?>
<?php
if($_FILES["my_file"]["type"]=="image/jpeg"){
    ?>
    <img src="<?php echo $dest?>">
    <?php
}else{
    ?>
    <video src="<?php echo $dest?>" controls></video>
    <?php
}
    header("refresh:5;url=home.php?page=facility&method=add");
?>