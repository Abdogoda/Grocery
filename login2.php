<?php
    include 'config.php';
    session_start();
    if(isset($_POST['submit'])){
        $EMAIL = $_POST['email'];
        $PASS = $_POST['password'];
        $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE useremail = '$EMAIL' AND userpassword = '$PASS'") or die('query failed');
        if(mysqli_num_rows($SELECT) > 0){
            $row = mysqli_fetch_assoc($SELECT);
            $_SESSION['user_id'] = $row['userid'];
            header('location:mybag2.php');
        }else{
            $message[] = 'Wrong Password Or Email!';
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
    <title>تسجيل الدخول</title>
    <link rel="icon" href="img/icon.png">
    <style>
        .amaz-login .card .inner-box label{
            margin-right: 5px;
        }
    </style>
</head>
<body>
        <!-- header section -->
        <header class="header">
            <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
            <a href="index2.html" class="homebtn"><i class="fa fa-arrow-left-rotate" style="margin-left: 5px;"></i> الصفحه الرئيسيه </a>
            <div class="icons">
                <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
                <div class="shopping-btn" data-title="الشراء"><a href="shop2.php"><i class="fas fa-shopping-cart"></i></a></div>
                <div class="admin-btn" data-title="المشرف"><a href="adminLogin2.php"><i class="fas fa-user-gear"></i></a></div>
                <div class="lang-btn" data-title="الانجليزيه"><a href="login.php"><i class="fas fa-language"></i></a></div>
            </div>
        </header>

        <section class="container" style="margin:70px auto;">
            <center>
                <!-- amazing login form -->
                <div class="amaz-login container">
                    <div class="card">
                        <div class="inner-box" id="amaz-card">
                            <div class="card-front">
                                <h2>تسجيل الدخول</h2>
                                <?php
                                    if(isset($message)){
                                        foreach($message as $message){
                                            echo "<h5 class='alert alert-info' onclick='this.remove()'>'$message'</h5>";
                                        }
                                    }
                                ?>
                                <form action="" method="post">
                                    <input type="email" name="email" class="input-box" placeholder="البريد الالكتروني" required>
                                    <input type="password" name="password" class="input-box" placeholder="الرقم السري" required>
                                    <button type="submit" name="submit" class="submit-btn">ارسال</button><br>
                                </form>
                                <a href="register2.php" class="btn btn-secondary text-white w-50 my-3">انا جديد هنا</a><br>
                                <a href="forgetPass2.php" class="">هل نسيت كلمه السر؟</a>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </section>
    <script src="js/main.js"></script>
</body>
</html>