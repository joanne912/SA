<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/p.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<style>
.container{
    /* display: grid;
    justify-items: center; */
    margin: 10vh 0;
}
input{
    width: 45%;
}
select{
    width: 45%;
}
p{
    display:inline;
    letter-spacing: 8px;
    /* margin: 1em 0; */
}
.row{
    width: 90%;
    margin: 5px auto;
    display: flex;
    justify-content: space-between;
}

.col-sm{
    text-align: center;
    /* display: flex;
    justify-content: space-between;
    flex-wrap: wrap; */
    z-index:-100;
    margin: 0.5em;
}

.row-1{
    width: 100%;
}
.btn{
    background-color: #fc6471;
    color: white;
    border-radius: 5px;
}
@media screen and (max-width: 768px) {
    .container{
        margin: 15vh 0;
    }
    .btn {
        width: 15vw;
        height: 3vh;
        margin-right: 1.6em;
        padding: 0 0 0.1em 0;
    }
}
@media screen and (max-width: 400px){
    /* .col-sm{
        display: flex;
        justify-content: space-between;
    } */
    p{
        width: 100% !important;
        text-align: left;
        display: inline-block;
        margin-right:0 !important;
        margin:1em 0;
    }
    input{
        width: 100%;
    }
    select{
        width: 100%;
    }
    .row{
        width: 100%;
    }
    .btn {
        width: 50vw;
        height: 5vh;
        margin-right: 1.6em;
    }
}
</style>

<body>
<form method="post" action="personal_update.php">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p style="letter-spacing: 2em;">姓名</p>
                <input type="text">
            </div>
            <div class="col-sm">
                <p style="letter-spacing: 2em;">地址</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <p style="margin-right: 2em;">E-MAIL</p>
                <input type="text">
            </div>
            <div class="col-sm">
                <p style="letter-spacing: 2em;">手機</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <p style="letter-spacing: 2em;">生日</p>
                <input type="date">
            </div>
            <div class="col-sm">
                <p style="margin-right: 1.5em;">戶籍代碼</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <p style="letter-spacing: 2em;">性別</p>
                <select name="" id="">
                    <option value="BOY">BOY</option>
                    <option value="GIRL">GIRL</option>
                </select>
            </div>
            <div class="col-sm">
                <p style="margin-right: 1.5em;">綁定地址</p>
                <input type="text">
            </div>
        </div>
        <div class="row row-1">
            <div class="btn-wrap">
                <input type="button" value="修改資料" class="btn">
            </div>
        </div>
    </div>
</form>
</body>
</html>