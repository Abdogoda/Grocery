<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/Poppins-Black.ttf">
    <title>المشرف | المنتجات</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <div class="icons">
            <div class="home-btn" data-title="الرئيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="المشرف"><a href="admin2.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="users-btn" data-title="المستخدمين"><a href="users2.php"><i class="fas fa-users"></i></a></div>
            <div class="sales-btn" data-title="المبيعات"><a href="sales2.php"><i class="fas fa-list-check"></i></a></div>
            <div class="lang-btn" data-title="الانجليزيه"><a href="products.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading">كل <span>المنتجات</span></h1>
        <div class="box-container">
            <?php
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM products");
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <div class='box'>
                        <img src='$row[image]' alt='prod$row[id]'>
                        <h3>$row[name]</h3>
                        <p> <span>$row[category]</span> طازجه وعضويه  </p>
                        <div class='price'>$row[price]$</div>
                        <div class='price'>منتج $row[count] </div>
                        <a href='edit2.php? id=$row[id]' class='btn btn-success fs-5'>تعديل <i class='fas fa-tools mx-1'></i></a>
                        <a href='delete2.php? id=$row[id]' class='btn btn-danger fs-5'>حذف <i class='fa fa-trash mx-1'></i></a>
                    </div>
                    ";
                }
            ?>
        </div>
    </section>

    <script>
        document.querySelectorAll(".products .box").forEach((e)=>{
            e.classList.add("hidden")
            if(e.querySelector("p span").textContent !== "meat" && e.querySelector("p span").textContent !== "dairy" && e.querySelector("p span").textContent !== "fruits" && e.querySelector("p span").textContent !== "vegetables"){
                e.classList.remove("hidden");
            }
        })
    </script>
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>