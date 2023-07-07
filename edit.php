<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>ADMIN-Edit Product</title>
    <link rel="icon" href="img/icon.png">
    <style>
        input{
            text-transform: lowercase !important;
        }
    </style>
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index.html" class="logo"><i class="fas fa-shopping-basket"></i>Grocery</a>
        <div class="icons">
            <div class="home-btn" data-title="Home"><a href="index.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="Admin"><a href="admin.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="products-btn" data-title="Products"><a href="products.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="Arabic"><a href="edit2.php"><i class="fas fa-language"></i></a></div>
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
        header('location: products.php');
    }
?>
    <div class="container">
        <center>
            <div class="main">
                <h1><u>Edit Product</u></h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <img src="<?php echo $data['image']?>" alt="prod" style="width:200px; margin:10px auto; border-radius:50%;"><br>
                    <input type="text" name="name" value="<?php echo $data['name']?>" placeholder="Product Name"><br>
                    <input type="text" name="category" value="<?php echo $data['category']?>" placeholder="Product Category"><br>
                    <input type="text" name="price" value="<?php echo $data['price']?>" placeholder="Product Price"><br>
                    <input type="file" name="image" id="file" style="display: none;">
                    <label for="file" class="btn btn-secondary">Update Image</label>
                    <button name="update" class="btn btn-success">Update Product</button><br>
                    <a href="products.php" class="btn btn-info text-white viewalll">View All Products <i class="fa fa-arrow-right px-1"></i></a>
                </form>
            </div>
        </center>
    </div>
</body>
</html>