<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/Poppins-Black.ttf">
    <title>Shop</title>
    <link rel="icon" href="img/icon.png">
    <style>
        .products .proFilter{
            display: flex ;
            justify-content: center !important;
            align-items: center !important;
            gap: 20px ;
            margin: 15px auto !important;
            width: 75%;
            text-align:center;
        }
        @media(max-width:850px){
            .proFilter{
                flex-wrap: wrap;
                gap: 1px !important;
                width: 100% !important;
            }
        }
        @media(max-width:450px){
            .proFilter p span{
                display: none !important;
            }
        }
        .products .proFilter li{
            padding: 10px;
            margin: 10px;
            letter-spacing: 2px;
        }
        .products .proFilter li svg{
            margin-left:7px;
        }
        .hidden{
            display: none !important;
        }
        .active{
            background-color: var(--orange) !important;
            border-color: var(--black) !important;
        }
        .products .box-container{
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 20px !important;
            flex-wrap: wrap !important;
        }
        .products .box{
            width:300px;
            max-width: 300px !important;
            padding-bottom: 20px;
        }
        .products .box img, .products .box h3{
            margin: 0;
        }
        /* / */
        .bag-btn p{
            position: absolute;
            width: 20px;
            height: 20px;
            line-height: 20px;
            border-radius: 50%;
            top: -5px;
            right: -5px;
            background-color: var(--orange);
            color: white;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }
        .bag-btn::after{
            top:auto;
        }
    </style>
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index.html" class="logo"><i class="fas fa-shopping-basket"></i>Grocery</a>
        <a href="index.html" class="homebtn" style="font-size: 25px; display: flex; align-items: center;">Home Page <i class="fa fa-arrow-right-rotate"></i></a>
        <div class="icons">
            <div class="home-btn" data-title="Home"><a href="index.html"><i class="fas fa-home"></i></a></div>
            <div class="login-btn" data-title="Login"><a href="login.php"><i class="fas fa-user"></i></a></div>
            <div class="bag-btn" data-title="MyBag"><a href="mybag.php">
                    <i class="fas fa-shopping-bag"></i>
                    <p>
                        <?php 
                            include('config.php');
                            $al = mysqli_query($con, "SELECT * FROM mybag");
                            $R = '';
                            while($all = mysqli_fetch_array($al)){
                                if($all['category'] == "meat" || $all['category'] =="dairy" || $all['category'] =="fruits" || $all['category'] =="vegetables"){
                                    $R++;
                                }
                            };
                            echo "$R";
                        ?>
                    </p>
            </a></div>
            <div class="lang-btn" data-title="Arabic"><a href="shop2.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products seccategories sectiontion-->
    <div class="products" id="products" style="margin:80px auto;">
    <h1 class="mHeading">our <span>products</span></h1>
        <div class="proFilter">
            <p class="meat-cat cat-btn btn" data-category=".meat"><span>Meat</span> <i class="fas fa-fish"></i></p>
            <p class="dairy-cat cat-btn btn" data-category=".dairy"><span>Dairy</span> <i class="fas fa-cheese"></i></p>
            <p class="fruits-cat cat-btn btn" data-category=".fruits"><span>Fruits</span> <i class="fas fa-apple-alt"></i></p>
            <p class="vegetables-cat cat-btn btn" data-category=".vegetables"><span>Vegetables</span> <i class="fas fa-carrot"></i></p>
            <p class="all-cat cat-btn btn active" data-category=".allCats">All <span>Products</span></p>
        </div>
        <div class="box-container">
            <?php 
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM products");
                while($row = mysqli_fetch_array($result)){
                    echo "
                        <div class='box $row[category] allCats cat-box'>
                            <img src='$row[image]' alt='Product'>
                            <h3>$row[name]</h3>
                            <p>Fresh $row[category]</p>
                            <div class='price'>$row[price]$</div>
                            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                            </div>
                            <form action='insertCard.php' method='post' enctype='multipart/form-data'>
                                <input type='number' name='count' min='1' placeholder='Quantity' value='1' style='padding: 5px; border-radius: 5px; margin-bottom: 5px;'><br>
                                <input type='text' name='id' value='$row[id]' style='display:none;'>
                                <button name='add' type='submit' class='btn btn-success'>Add to cart</button><br>
                            </form>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>

        <!-- footer section -->
        <section class="footer">
            <div class="box-container">
                <div class="boxi">
                    <h3>Grocery <i class="fas fa-shopping-basket"></i></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, maxime.</p>
                    <div class="share">
                        <div class="fab fa-facebook-f"></div>
                        <div class="fab fa-twitter"></div>
                        <div class="fab fa-youtube"></div>
                        <div class="fab fa-linkedin"></div>
                        <div class="fab fa-instagram"></div>
                    </div>
                </div>
                <div class="boxi">
                    <h3>contact info</h3>
                    <a href="#" class="links"><i class="fas fa-phone"></i> +123-456-789</a>
                    <a href="#" class="links"><i class="fas fa-phone"></i> +465-894-231</a>
                    <a href="#" class="links"><i class="fas fa-envelope"></i> abdogodaoa@gmail.com</a>
                    <a href="#" class="links"><i class="fas fa-map-marked-alt"></i> cairo, egypt - 2165465</a>
                </div>
                <div class="boxi">
                    <h3>quick links</h3>
                    <a href="index.html" style="display: flex; align-items: center;">Home Page <i class="fa fa-arrow-right-to-bracket" style="margin-left: 5px;"></i></a>
                </div>
                <div class="boxi">
                    <h3>newsletter</h3>
                    <p>subscribe for latest update</p>
                    <input type="email" class="email" placeholder="your email"><br>
                    <img src="img/payment.png" class="payment-image" alt=""><br>
                    <input type="submit" class="btn" value="subscribe">
                </div>
            </div>
        </section>

    <script>
        // categories
        catBtns = document.querySelectorAll(".cat-btn");
        catBtns.forEach((e)=> {
            e.addEventListener("click", ()=> {
                document.querySelectorAll(".cat-box").forEach((x)=>{
                    x.classList.add("hidden");
                    catBtns.forEach((d)=> {
                        d.classList.remove("active");
                    })
                    e.classList.add("active");
                })
                document.querySelectorAll(e.dataset.category).forEach((f) => {
                        if(!f.classList.contains("لحوم") && !f.classList.contains("البان") && !f.classList.contains("فواكه") && !f.classList.contains("خضراوات")){
                            f.classList.remove("hidden");
                        }else{
                            f.classList.add("hidden");
                        }
                })
            })
        })
        // 
        document.querySelectorAll(".cat-box").forEach((e)=>{
            e.classList.add("hidden");
            if(!e.classList.contains("لحوم") && !e.classList.contains("البان") && !e.classList.contains("فواكه") && !e.classList.contains("خضراوات")){
                e.classList.remove("hidden");
            }
        })
    </script>
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>