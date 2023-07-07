<?php 
    include('config.php');
    $ID = $_GET['id'];
        $up = mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
        $data = mysqli_fetch_array($up);
    if(isset($_POST['delete'])){
        mysqli_query($con, "DELETE FROM products WHERE id=$ID");
        header('location: products2.php');
    }
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>المشرف | حذف المنتجات</title>
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <div class="icons">
            <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="المشرف"><a href="admin2.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="products-btn" data-title="المنتجات"><a href="products2.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="الانجليزيه"><a href="delete.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <div class="container">
        <center>
            <div class="main">
                <h1><u>حذف المنتج</u></h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <img src="<?php echo $data['image']?>" alt="prod" style="width:200px; margin:10px auto; border-radius:50%;"><br>
                    <input type="text" name="name" value="<?php echo $data['name']?>" disabled><br>
                    <input type="text" name="category" value="<?php echo $data['category']?>" disabled><br>
                    <input type="text" name="price" value="<?php echo $data['price']?>" disabled><br>
                    <button name="delete" class="btn btn-danger">حذف المنتج</button> <br>
                    <a href="products2.php" class="btn btn-info text-white viewalll">عرض كل المنتجات <i class="fa fa-arrow-left px-1"></i></a>
                </form>
            </div>
        </center>
    </div>
</body>
</html>