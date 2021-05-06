<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
        width: 80%;
        margin: auto;
        /* background-color: #ffa; */
        padding: 1.5em 0;
        border: 8px solid #f7f7fa;
        border-radius: 20px;
        margin-top: 1em;
    }

    form {
        width: 90%;
        margin: auto;
        /* background-color: #c31; */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        align-items: center;

    }

    input {
        width: 35%;
        margin: 3%;
        border: 6px solid #f7f7fa;
        border-radius: 10px;
        padding: .4em 1.25em;
        box-sizing: border-box;
        letter-spacing: 2px;
        text-indent: 2px;
        font-size: 1.25em;
        margin-left: -.5em;
    }

    select {
        width: 35%;
        margin: 3%;
        border: 6px solid #f7f7fa;
        border-radius: 10px;
        padding: .4em 1.25em;
        box-sizing: border-box;
        letter-spacing: 2px;
        text-indent: 2px;
        font-size: 1.25em;
        /* letter-spacing: 2px;
            text-indent: 2px; */
    }

    form p {
        width: 10%;
        letter-spacing: 2px;
        text-indent: 2px;
    }

    /* p:nth-child(4){
            margin: 1em;
        } */
    .btn {
        width: 9vw;
        height: 6vh;
        font-size: 1em;
        border: 0;
        background-color: #fc6471;
        color: white;
    }

    .btn-wrap {
        width: 100%;
        /* background-color: #c31; */
        display: flex;
        justify-content: flex-end;
        margin: 0 0 -1em;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="">
            <p>姓名</p>
            <input type="text">
            <p>E-MAIL</p>
            <input type="text">
            <p>生日</p>
            <input type="date">
            <p>性別</p>
            <select name="" id="">
                <option value="BOY">BOY</option>
                <option value="GIRL">GIRL</option>
            </select>
            <p>地址</p>
            <input type="text">
            <p>手機</p>
            <input type="text">
            <p>家電</p>
            <input type="text">
            <p>綁定地址</p>
            <input type="text">
            <div class="btn-wrap">
                <input type="button" value="修改資料" class="btn">
            </div>
        </form>
    </div>
</body>

</html>