<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/Poppins-Black.ttf">
    <title>ADMIN-Products</title>
    <link rel="icon" href="img/icon.png">
    <style>
        .hidden{
            display: none;
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
            <div class="users-btn" data-title="Users"><a href="users.php"><i class="fas fa-users"></i></a></div>
            <div class="sales-btn" data-title="Sales"><a href="sales.php"><i class="fas fa-list-check"></i></a></div>
            <div class="lang-btn" data-title="Arabic"><a href="products2.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading">All <span>products</span></h1>
        <div class="box-container">
            <?php
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM products");
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <div class='box all'>
                        <img src='$row[image]' alt='prod$row[id]'>
                        <h3>$row[name]</h3>
                        <p>Fresh And Organic <span>$row[category]</span> </p>
                        <div class='price'>$row[price]$</div>
                        <div class='price'>$row[count] Products</div>
                        <a href='edit.php? id=$row[id]' class='btn btn-success fs-5'>Edit <i class='fas fa-tools mx-1'></i></a>
                        <a href='delete.php? id=$row[id]' class='btn btn-danger fs-5'>Delete <i class='fa fa-trash mx-1'></i></a>
                    </div>
                    ";
                }
            ?>
        </div>
    </section>

    <script>
        document.querySelectorAll(".products .box").forEach((e)=>{
            e.classList.add("hidden")
            if(e.querySelector("p span").textContent !== "لحوم" && e.querySelector("p span").textContent !== "البان" && e.querySelector("p span").textContent !== "فواكه" && e.querySelector("p span").textContent !== "خضراوات"){
                e.classList.remove("hidden");
            }
        })
    </script>
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>