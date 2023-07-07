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
    <title>المشرف | تعديل المنتجات</title>
    <link rel="icon" href="img/icon.png">
    <style>
        input{
            text-transform: lowercase !important;
        }
        select{
            border: none;
            outline: none;
            border-radius: 5px;
            border: 1px solid silver;
            box-shadow: 1px 1px 5px silver;
            width: 80%;
            margin: 5px auto !important;
            padding: 5px;
            font-size: 17px;
            color: #666;
        }
    </style>
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <div class="icons">
            <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="المشرف"><a href="admin2.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="products-btn" data-title="المنتجات"><a href="products2.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="الانجليزيه"><a href="edit.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <?php 
        include('config.php');
        $ID = $_GET['id'];
        $up = mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
        $data = mysqli_fetch_array($up);

    if(isset($_POST['update'])){
        $NAME = $_POST['name'];
        $CATEGORY = $_POST['category'];
        $PRICE = $_POST['price'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "img/prod/".$image_name;
        $update = "UPDATE products SET name='$NAME', category='$CATEGORY', price='$PRICE', image='$image_up' WHERE id=$ID";
        mysqli_query($con, $update);
        header('location: products2.php');
    }
?>
    <div class="container">
        <center>
            <div class="main">
                <h1><u>تعديل المنتج</u></h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <img src="<?php echo $data['image']?>" alt="prod" style="width:200px; margin:10px auto; border-radius:50%;"><br>
                    <input type="text" name="name" value="<?php echo $data['name']?>" placeholder="اسم المنتج"><br>
                    <select name="category">
                        <option value="<?php echo $data['category']?>"><?php echo $data['category']?></option>
                        <option value="خضراوات">خضراوات</option>
                        <option value="فواكه">فواكه</option>
                        <option value="البان">البان</option>
                        <option value="لحوم">لحوم</option>
                    </select><br>
                    <input type="text" name="price" value="<?php echo $data['price']?>" placeholder="سعر المنتج"><br>
                    <input type="file" name="image" id="file" style="display: none;">
                    <label for="file" class="btn btn-secondary">تحديث الصوره</label>
                    <button name="update" class="btn btn-success">تحديث المنتج</button><br>
                    <a href="products2.php" class="btn btn-info text-white viewalll"> عرض كل المنتجات <i class="fa fa-arrow-left px-1"></i></a>
                </form>
            </div>
        </center>
    </div>
</body>
</html>