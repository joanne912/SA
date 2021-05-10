<?php
    $host = "us-cdbr-east-03.cleardb.com";
    $dbname = "heroku_cb1e0eb718e0348";
    $username = "bdb2063a517cf6";
    $password = "346f2a25";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
        
        //將錯誤報告設定為拋出exceptions異常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>