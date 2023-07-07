<?php
    $user = $_POST['adminName'];
    $pass = $_POST['adminPassword'];
    if(isset($_POST['submit'])){
        if($user == "aa" && $pass == "aa"){
            header('location: admin2.html');
        }else{
            // echo "<h1>Wrong Username Or Password</h1>" ;
            // header('location: adminLogin.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Admin Login</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
        <!-- header section -->
        <header class="header">
            <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
            <a href="index2.html" class="homebtn"><i class="fa fa-arrow-right-rotate" style="margin-left: 5px;"></i> الصفحه الرئيسيه </a>
            <div class="icons">
                <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
                <div class="shopping-btn" data-title="التسوق"><a href="shop2.php"><i class="fas fa-shopping-cart"></i></a></div>
                <div class="login-btn" data-title="التسجيل"><a href="login2.php"><i class="fas fa-user"></i></a></div>
                <div class="lang-btn" data-title="الانجليزيه"><a href="adminLogin.php"><i class="fas fa-language"></i></a></div>
            </div>
        </header>

        <section class="container">
            <center>
                <!-- amazing login form -->
                <div class="amaz-login container">
                    <div class="card">
                        <div class="inner-box">
                            <div class="card-front" style="background-image: linear-gradient(rgba(66, 56, 0, 0.8),rgba(0, 58, 53, 0.8)),url(img/Admin.png);">
                                <h2>تسجيل المشرف</h2>
                                <form action="" method="post">
                                    <input type="text" class="input-box" placeholder="اسم المشرف" name="adminName" required>
                                    <input type="password" class="input-box" placeholder="الرقم السري" name="adminPassword" required>
                                    <div class="submit-con">
                                        <button type="submit" class="submit-btn" name="submit">تسجيل</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </section>
        <script src="js/main.js"></script>
</body>
</html>