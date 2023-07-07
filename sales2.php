<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>المشرف | المبيعات</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <div class="icons">
            <div class="home-btn" data-title="الرءيسيه"><a href="index2.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="المشرف"><a href="admin2.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="users-btn" data-title="المستخدمين"><a href="users2.php"><i class="fas fa-users"></i></a></div>
            <div class="products-btn" data-title="المنتجات"><a href="products2.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="الانجليزيه"><a href="sales.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading"> <span>المبيعات</span> كل</h1>
        <div class="box-container">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>رقم المستخدم</th>
                <th>اسم المستخدم</th>
                <th>اسم المنتج</th>
                <th>نوع المنتج</th>
                <th>السعر</th>
                <th>الكميه</th>
                <th>السعر الكلي</th>
                <th>زمن العمليه</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM sale");
                while($row = mysqli_fetch_array($result)){
                  if($row['category'] == "لحوم" || $row['category'] =="البان" || $row['category'] =="فواكه" || $row['category'] =="خضراوات"){
                    echo "
                      <tr>
                        <td>$row[userid]</td>
                        <td>$row[username]</td>
                        <td>$row[productname]</td>
                        <td>$row[category]</td>
                        <td>$row[price]$</td>
                        <td>$row[count]</td>
                        <td>$row[total]$</td>
                        <td>$row[time]</td>
                      </tr>
                    ";
                  }else{
                    echo "";
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
        <center>
          <form action="" method="POST">
          <button type="submit" name="delete" class="btn btn-danger fs-3">حذف الكل</button>
          </form>
        </center>
    </section>
    <?php 
      if(isset($_POST['delete'])){
        mysqli_query($con, "DELETE FROM sale");
        header('location: sales2.php');
      }
    ?>
    
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>