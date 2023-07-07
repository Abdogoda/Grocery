<?php
    include 'config.php';
    session_start();
    if(isset($_POST['submit'])){
        $EMAIL = $_POST['email'];
        $NAME = $_POST['name'];
        $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE useremail = '$EMAIL' AND username = '$NAME'") or die('query failed');
        if(mysqli_num_rows($SELECT) > 0){
            $row = mysqli_fetch_assoc($SELECT);
            $message[] = "Your Password is $row[password]";
        }else{
            $message[] = 'Wrong Name Or Email!';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Forget Password</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
        <!-- header section -->
        <header class="header">
            <a href="index.html" class="logo"><i class="fas fa-shopping-basket"></i>Grocery</a>
            <a href="index.html" class="homebtn">Home Page <i class="fa fa-arrow-right-rotate" style="margin-left: 5px;"></i></a>
            <div class="icons">
                <div class="home-btn" data-title="Home"><a href="index.html"><i class="fas fa-home"></i></a></div>
                <div class="shopping-btn" data-title="Market"><a href="shop.php"><i class="fas fa-shopping-cart"></i></a></div>
                <div class="admin-btn" data-title="Admin"><a href="adminLogin.php"><i class="fas fa-user-gear"></i></a></div>
                <div class="lang-btn" data-title="Arabic"><a href="login2.php"><i class="fas fa-language"></i></a></div>
            </div>
        </header>

        <section class="container">
            <center>
                <h1 class="mHeading">Forget <span>Password</span></h1>
                <div class="amaz-login container">
                    <div class="card">
                        <div class="inner-box" id="amaz-card">
                            <div class="card-front">
                            <h2>Forget Password</h2>
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        echo "<h5 class='alert alert-info' onclick='this.remove()'>'$message'</h5>";
                                    }
                                }
                            ?>
                            <form action="" method="POST">
                                <input type="name" name="name" class="input-box" placeholder="Your Name" required>
                                <input type="email" name="email" class="input-box" placeholder="Your Email" required>
                                <button type="submit" name="submit" class="submit-btn">Submit</button><br>
                            </form>
                            <a href="login.php" class="btn btn-secondary text-white w-50 my-3">Login Now</a><br>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
        <script src="js/main.js"></script>
    </body>
    </html>