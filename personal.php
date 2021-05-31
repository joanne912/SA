
<link rel="stylesheet" href="css/p.css" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="css/p2.css" type="text/css" />


<form method="post" action="personal_update.php">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">姓名</p>
                <input type="text">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2.1em;">地址</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 2em;">E-MAIL</p>
                <input type="text">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2.1em;">手機</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">生日</p>
                <input type="date">
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 1.8em;">戶籍代碼</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 col-xl-6">
                <p style="letter-spacing: 2em;">性別</p>
                <select name="" id="">
                    <option value="BOY">BOY</option>
                    <option value="GIRL">GIRL</option>
                </select>
            </div>
            <div class="col col-md-12 col-xl-6">
                <p style="margin-right: 1.8em;">綁定地址</p>
                <input type="text">
            </div>
        </div>
        <div class="row">
            <div class="btn-wrap col-12">
                <input type="button" value="修改資料" class="btn">
            </div>
        </div>
    </div>
</form>
