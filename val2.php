<?php 
    include 'config.php';
    use PHPMailer\PHPMailer\PHPMailer;
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>Buy Validation</title>
    <link rel="icon" href="img/icon.png">
</head>
<body class="container">
    <?php
include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
    }
    if(!isset($user_id)){
        mysqli_query($con, "DELETE FROM mybag ");
        header('location:login.php');
    }else{
        $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE userid = '$user_id'") or die('query failed');
        if(mysqli_num_rows($SELECT) > 0){
            $row = mysqli_fetch_assoc($SELECT);
        }
        $note = "<center>
                    <i class='fa fa-user fs-1 mt-5'></i>
                    <h1 class='mb-5'>$row[username]</h1>
                </center>
                ";
        if(isset($note)){
            echo "$note";
        }
        // 
        if(isset($_POST['buy'])){
          $allbag = mysqli_query($con, "SELECT * FROM mybag");
            while($rowbag = mysqli_fetch_array($allbag)){
                $name = $rowbag['name'];
                $allprod = mysqli_query($con, "SELECT * FROM products WHERE name = '$name'");
                $rowprod = mysqli_fetch_array($allprod);
                if($rowprod['count'] > $rowbag['count']){
                    $counts = $rowprod['count'] - $rowbag['count'];
                    mysqli_query($con, "UPDATE products SET count='$counts' WHERE name='$name'");
                }else{
                    mysqli_query($con, "DELETE FROM products WHERE name='$name'");
                }
                // ADD SALES TABLE
                $USERNAME = $row['username'];
                $USERID = $user_id;
                $PRODUCTNAME = $rowbag['name'];
                $CATEGORY = $rowbag['category'];
                $PRICE = $rowbag['price'];
                $COUNT = $rowbag['count'];
                $TOTAL = $rowbag['total'];
                mysqli_query($con, "INSERT INTO sale (userid, username, productname, category, price, count, total) VALUES ('$USERID', '$USERNAME','$PRODUCTNAME', '$CATEGORY', '$PRICE', '$COUNT', '$TOTAL')");
            }
            // -----------------------------sending email--------------------------
            $bod = "
            <html>
            <body>
            <center>
                <table style='text-align:center; border:1px solid #000;'>
                    <thead>
                        <tr>
                            <th scope='col'>اسم المنتح</th>
                            <th scope='col'>نوع المنتح</th>
                            <th scope='col'>سعر المنتح</th>
                            <th scope='col'>كميه المنتح</th>
                            <th scope='col'>السعر الكلي</th>
                        </tr>
                    </thead>
                    <hr style='width:100%; text-align:center; margin:auto;'>
                    <tbody>
            ";
            $result1 = mysqli_query($con, "SELECT * FROM mybag");
            $sum1 = mysqli_query($con, "SELECT SUM(total) FROM mybag");
            $col1 = mysqli_fetch_array($sum1);
            while($row1 = mysqli_fetch_array($result1)){
                if($row1['category'] == "لحوم" || $row1['category'] =="البان" || $row1['category'] =="فواكه" || $row1['category'] =="خضراوات"){
                    $bod .= "
                        <tr>
                            <td>$row1[name]</td>
                            <td>$row1[category]</td>
                            <td>$row1[price]$</td>
                            <td>$row1[count]</td>
                            <td>$row1[total]$</td>
                        </tr>
                    ";
                }else{
                    $bod .= "";
                }
            };
            $bod .= 
            "              </tbody>
                        </table>
                        <h2> Total:$col1[0]$</h2>
                    </center>
                </body>
            </html>
            
            ";
            $ToEmail = $row['useremail'];
            // 
            require 'includes/Exception.php';
            require 'includes/PHPMailer.php';
            require 'includes/SMTP.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = "true";
            $mail->SMTPSecure = "ssl";
            $mail->Port = "465";
            $mail->Username = "abdogoda0a@gmail.com";
            $mail->Password = "a1b2d3o4.g";
            $mail->Subject = "Test Email Using PHPMAILER";
            $mail->isHTML(true);
            $mail->setFrom($ToEmail);
            $mail->Body = $bod;
            $mail->addAddress($ToEmail);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_pear'=>false,
                'verify_pear_name'=>false,
                'allow_self_signed'=>false
            ));
            if($mail->Send()){
                echo "Email Sent Successfully";
            }else{
                echo "Email Sent Failure";
            }
            $mail->smtpClose();
          // Reset mybag
            mysqli_query($con, "DELETE FROM mybag");
            echo "<script>alert('العمليه تمت بنجاح!');</script>";
        }
    }
        ?>
    <center>
        <main>
            <table class='table table-bordered text-center'>
                <thead>
                    <tr>
                        <th scope='col'>اسم المنتح</th>
                        <th scope='col'>نوع المنتح</th>
                        <th scope='col'>سعر المنتح</th>
                        <th scope='col'>الكميه</th>
                        <th scope='col'>السعر الكلي</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include('config.php');
                        $result = mysqli_query($con, "SELECT * FROM mybag");
                        $sum = mysqli_query($con, "SELECT SUM(total) FROM mybag");
                        $col = mysqli_fetch_array($sum);
                        while($row = mysqli_fetch_array($result)){
                            if($row['category'] == "لحوم" || $row['category'] =="البان" || $row['category'] =="فواكه" || $row['category'] =="خضراوات"){
                                echo "
                                    <tr>
                                        <td>$row[name]</td>
                                        <td>$row[category]</td>
                                        <td>$row[price]$</td>
                                        <td>$row[count]</td>
                                        <td>$row[total]$</td>
                                    </tr>
                                ";
                            }else{
                                echo "";
                            }
                        };
                    ?>
                </tbody>
            </table>
        </main>
        <br>
        <div class="total fs-3 bg-secondary rounded-5"> :السعر الكلي  <span><?php echo "$col[0]$";?></span></div>
        <br><br>
        <form action="val2.php" method="POST" class="d-inline">
            <button name="buy" class="btn btn-success text-white fs-3">شراء</button>
        </form>
        <button onclick="window.print()" class="btn btn-primary text-white fs-3 d-inline">طباعه</button><br><br><br>
        <a href="mybag2.php" class="btn btn-info text-white fw-bold float-end p-1">الجوع الي الحقيبه >></a>
        
    </center>
</body>
</html>