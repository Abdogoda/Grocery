<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>عربتي</title>
    <link rel="icon" href="img/icon.png">
    <style>
        .profile{
            right:auto;
            left: 10px;
        }
    </style>
</head>
<body class="container">
<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login2.php');
    }
    if(!isset($user_id)){
        mysqli_query($con, "DELETE FROM mybag ");
        header('location:login2.php');
    }else{
        $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE userid = '$user_id'") or die('query failed');
        if(mysqli_num_rows($SELECT) > 0){
            $row = mysqli_fetch_assoc($SELECT);
        }
        $note = "
            <div class = 'profile'>
            <form method='GET'>
            <a name='logout' class='btn btn-danger fs-5' href='mybag2.php?logout=<?php echo $user_id?>' onclick='retutn confirm('هل متاكد من تسخيل الخروج؟');'>الخروج</a>
            </form>
            <span>$row[username]</span>
            <i class='fa fa-user'></i>
            </div>
        ";
    }
    if(isset($_POST['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login2.php');
    }
?>
    <h1 style="border-bottom: 3px solid #333; width:fit-content; padding-bottom:5px; margin:30px;">عربتي</h1>
    <?php
            if(isset($note)){
                echo "$note";
            }
        ?>
    <center>
        <main>
            <table class='table table-bordered text-center'>
                <thead>
                    <tr>
                        <th scope='col'>اسم المنتج</th>
                        <th scope='col'>نوع المنتج</th>
                        <th scope='col'>سعر المنتج</th>
                        <th scope='col'>الكميه</th>
                        <th scope='col'>السعر الكلي</th>
                        <th scope='col'>حذف المنتج</th>
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
                                        <td><a href='delCard2.php? id=$row[id]' class='btn btn-danger'>حذف <i class='fa fa-trash mx-1'></i></a></td>
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
        <div class="total bg-primary fs-3 rounded-5"> المجموع الكلي:  <span><?php echo "$$col[0]";?></span></div>
        <br><br>
        <a href="val2.php" class="btn btn-success text-white fs-5 float-end">شراء</a>
        <a href="delAll2.php" class="btn btn-danger float-end mx-2 fs-5">حذف الكل</a><br><br><br>
        <a href="shop2.php" class="btn btn-info text-white fw-bold float-end p-1"> < الرجوع الي الشراء </a>
    </center>
</body>
</html>