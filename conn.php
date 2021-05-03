<?php
    $host = "";
    $dbname = "";
    $username = "";
    $password = "";
    
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