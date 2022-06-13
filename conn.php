<?php
    $host = "us-cdbr-east-05.cleardb.net";
    $dbname = "heroku_d9b06e138b94926";
    $username = "bd65bfb6ea69c7";
    $password = "54f71482";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
        
        //將錯誤報告設定為拋出exceptions異常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //設定多個參數
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        // 設定UTF-8編碼
        $conn->query('SET NAMES "utf8"');
        // 設定時區
        $conn->query('SET time_zone = "+8:00"');
        return $conn;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>