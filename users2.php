<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>المشرف | المستخدمين</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="inde2.html" class="logo"><i class="fas fa-shopping-basket"></i>بقالتك</a>
        <div class="icons">
            <div class="home-btn" data-title="Home"><a href="inde2.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="Admin"><a href="admi2.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="sales-btn" data-title="Sales"><a href="sale2.php"><i class="fas fa-list-check"></i></a></div>
            <div class="products-btn" data-title="Products"><a href="product2.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="Arabic"><a href="users.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading">كل <span>المستخدمين</span></h1>
        <div class="box-container">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>رمز المستخدم</th>
                <th>اسم المستخدم</th>
                <th>البريد الالكتروني</th>
                <th>رقم المستخدم</th>
                <th>عنوان المستخدم</th>
                <th>حذف المستخدم</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM user_form");
                while($row = mysqli_fetch_array($result)){
                    echo "
                      <tr>
                        <td>$row[userid]</td>
                        <td>$row[username]</td>
                        <td>$row[useremail]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>
                          <form method='POST' action='users.php'>
                            <input type='text' name='id' value='$row[userid]' style='display:none;'>
                            <button type='submit' name='delete' class='btn btn-danger fs-5'>حذف المستخدم</button>
                          </form>
                        </td>
                      </tr>
                    ";
                }
              ?>
            </tbody>
          </table>
        </div>
    </section>
    <?php 
      if(isset($_POST['delete'])){
        $ID = $_POST['id'];
        mysqli_query($con, "DELETE FROM user_form WHERE userid=$ID");
      }
    ?>
    
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>