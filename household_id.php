<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/p.css" type="text/css" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <style>
        /* .top{
            width:100vw;
            height: 20vh;
            background-color: #ffc;
        }
        .bottom{
            width:100vw;
            height: 80vh;
            background-color: red;
        } */
    </style>
</head>
<body>  
    <form action="home.php?page=householdid" method=POST>
	<!-- <input type=hidden name="method" value="query"> 現在method變數值是query，避免搜尋後值消失，所以用hidden再傳一次值 -->
	<p align=center>請輸入戶別:
        <input type=text name="searchtxt" value=<?php echo $searchtxt; ?>>
        <input type=submit value="搜尋戶籍戶別">
    </p>
	</form>
    <table class="table table-hover">
	<tr class="warning"><td>戶別</td><td>戶籍代碼</td><td>查看</td></tr>
    <?php	
        $conn = include "conn.php";
        $searchtxt = $_POST["searchtxt"];  
        if(empty($searchtxt))
            {
            $sql="select * from household"; //預設搜尋的SQL字串
            }
        else
            {
            $sql="select * from household where HOUSEHOLD_ADDRESS = $searchtxt"; 
            }
        $search=$conn->query($sql);
        while($record=$search->fetch())
        {
            echo "<tr><td>$record[2]</td><td>$record[0]</td>";
            echo "<td><a href=home.php?page=householdid&method=look&household_id=$record[0]>[查看]</a></td></tr>"; 
        }
    ?>
    </table>
</body>
</html>