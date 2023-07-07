<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $NAME = $_POST['name'];
        $EMAIL = $_POST['email'];
        $PHONE = $_POST['phone'];
        $ADDRESS = $_POST['address'];
        $PASS = $_POST['password'];
        $CPASS = $_POST['cpassword'];
        if ($PASS == $CPASS){
            $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE useremail = '$EMAIL' AND userpassword = '$PASS'") or die('query failed');
            if(mysqli_num_rows($SELECT) > 0){
                $message[] = 'المستخدم موجود مسبقا!';
            }else{
                $message[] = 'تم التسجيل بنجاح!';
                mysqli_query($con, "INSERT INTO user_form (username, useremail, userpassword, phone, address) VALUES ('$NAME', '$EMAIL', '$PASS', '$PHONE', '$ADDRESS')") or die('query failed');
                header('location:login2.php');
            }
        }else{
            $message[] = 'الرقم السري غير متطابق!';
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
    <title>انشاء حساب</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
        <!-- header section -->
        <header class="header">
            <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
            <a href="index2.html" class="homebtn"><i class="fa fa-arrow-left-rotate" style="margin-left: 5px;"></i> الصفحه الرئيسيه  </a>
            <div class="icons">
                <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
                <div class="shopping-btn" data-title="التسوق"><a href="shop2.php"><i class="fas fa-shopping-cart"></i></a></div>
                <div class="admin-btn" data-title="المشرف"><a href="adminLogin2.php"><i class="fas fa-user-gear"></i></a></div>
                <div class="lang-btn" data-title="الانجليزيه"><a href="register.php"><i class="fas fa-language"></i></a></div>
            </div>
        </header>

        <section class="container" style="margin:50px auto; margin-bottom:0;">
            <center>
                <div class="amaz-login container">
                    <div class="card" style="height: 580px;">
                        <div class="inner-box" id="amaz-card">
                        <div class="card-front">
                            <h2>انشاء حساب</h2>
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        echo "<h5 class='alert alert-info' onclick='this.remove()'>'$message'</h5>";
                                    }
                                }
                            ?>
                            <form action="" method="post">
                                <input type="text" class="input-box" name="name" placeholder="اسمك" required>
                                <input type="email" class="input-box" name="email" placeholder="بريدك الالكتروني" required>
                                <input type="tel" class="input-box" name="phone" placeholder="رقم الهاتف" >
                                <input type="text" class="input-box" name="address" placeholder="العنوان" >
                                <input type="password" class="input-box" name="password" placeholder="الرقم السري" required>
                                <input type="password" class="input-box" name="cpassword" placeholder="تاكيد الرقم السري" required>
                                <button type="submit" name="submit" class="submit-btn">ارسال</button><br>
                            </form>
                            <a href="login2.php" class="btn btn-secondary text-white w-50 my-3">لدي حساب</a>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
        <script src="js/main.js"></script>
    </body>
    </html>