<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/Poppins-Black.ttf">
    <title>الشراء</title>
    <link rel="icon" href="img/icon.png">
    <style>
        .products .proFilter{
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 20px ;
            margin: 15px auto !important;
            width: 75%;
            text-align:center;
        }
        @media(max-width:700px){
            .proFilter{
                flex-wrap: wrap;
                gap: 1px !important;
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
        <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <a href="index2.html" class="homebtn" style="font-size: 25px; display: flex; align-items: center;"><i class="fa fa-arrow-right-rotate"></i> الصفحه الرئيسيه </a>
        <div class="icons">
            <div class="home-btn" data-title="الرسيئيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
            <div class="login-btn" data-title="التسجيل"><a href="login2.php"><i class="fas fa-user"></i></a></div>
            <div class="bag-btn" data-title="حقيبتي"><a href="mybag2.php">
                <i class="fas fa-shopping-bag"></i>
                <p>
                        <?php 
                            include('config.php');
                            $al = mysqli_query($con, "SELECT * FROM mybag");
                            $R = '';
                            while($all = mysqli_fetch_array($al)){
                                if($all['category'] == "لحوم" || $all['category'] =="البان" || $all['category'] =="فواكه" || $all['category'] =="خضراوات"){
                                    $R++;
                                }
                            };
                            echo "$R";
                        ?>
                    </p>
            </a></div>
            <div class="lang-btn" data-title="الانجليزيه"><a href="shop.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products seccategories sectiontion-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading"> <span>المنتجات</span></h1>
        <div class="proFilter">
            <p class="meat-cat cat-btn btn" data-category=".لحوم"><span>اللحوم</span> <i class="fas fa-fish"></i></p>
            <p class="dairy-cat cat-btn btn" data-category=".البان"><span>اللألبان</span> <i class="fas fa-cheese"></i></p>
            <p class="fruits-cat cat-btn btn" data-category=".فواكه"><span>الفواكه</span> <i class="fas fa-apple-alt"></i></p>
            <p class="vegetables-cat cat-btn btn" data-category=".خضراوات"><span>الخضراوت</span> <i class="fas fa-carrot"></i></p>
            <p class="all-cat cat-btn btn active" data-category=".الكل"> الكل</p>
        </div>
        <div class="box-container">
            <?php 
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM products");
                while($row = mysqli_fetch_array($result)){
                    echo "
                        <div class='box $row[category] الكل cat-box'>
                            <img src='$row[image]' alt='Product'>
                            <h3>$row[name]</h3>
                            <p> $row[category] طازجه</p>
                            <div class='price'>$row[price]$</div>
                            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                            </div>
                            <form action='insertCard2.php' method='post' enctype='multipart/form-data'>
                                <input type='number' name='count' min='1' placeholder='Quantity' value='1' style='padding: 5px; border-radius: 5px; margin-bottom: 5px;'><br>
                                <input type='text' name='id' value='$row[id]' style='display:none;'>
                                <button name='add' type='submit' class='btn btn-success'>اضافه الي العربه</button><br>
                            </form>
                        </div>
                    ";
                }
            ?>
        </div>
    </section>

        <!-- footer section -->
        <section class="footer">
        <div class="box-container">
            <div class="boxi">
                <h3>بقالتك <i class="fas fa-shopping-basket"></i></h3>
                <p>بقالتك محل شراء كل ما يخص البقاله من خضراوات وفواكهه وغيرها</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-youtube"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="boxi">
                <h3>معلومات التواصل</h3>
                <a href="#" class="links"><i class="fas fa-phone"></i> +123-456-789</a>
                <a href="#" class="links"><i class="fas fa-phone"></i> +465-894-231</a>
                <a href="#" class="links"><i class="fas fa-envelope"></i> abdogodaoa@gmail.com</a>
                <a href="#" class="links"><i class="fas fa-map-marked-alt"></i> cairo, egypt - 2165465</a>
            </div>
            <div class="boxi">
                <h3>روابط سريعه</h3>
                <a href="index2.html" class="links"><i class="fas fa-arrow-right"></i>الرئيسيه</a>
            </div>
            <div class="boxi">
                <h3>النشره الاخباريه</h3>
                <p>اشترك ليصلك كل جديد</p>
                <input type="email" class="email" placeholder="بريدك الالكتروني"><br>
                <img src="img/payment.png" class="payment-image" alt=""><br>
                <input type="submit" class="btn" value="اشتراك">
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
                    if(!f.classList.contains("meat") && !f.classList.contains("dairy") && !f.classList.contains("fruits") && !f.classList.contains("vegetables")){
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
            if(!e.classList.contains("meat") && !e.classList.contains("dairy") && !e.classList.contains("fruits") && !e.classList.contains("vegetables")){
                e.classList.remove("hidden");
            }
        })
    </script>
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>