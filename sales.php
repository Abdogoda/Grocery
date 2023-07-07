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
    <title>ADMIN-SALES</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index.html" class="logo"><i class="fas fa-shopping-basket"></i>Grocery</a>
        <div class="icons">
            <div class="home-btn" data-title="Home"><a href="index.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="Admin"><a href="admin.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="users-btn" data-title="Users"><a href="users.php"><i class="fas fa-users"></i></a></div>
            <div class="products-btn" data-title="Products"><a href="products.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="Arabic"><a href="sales2.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading">All <span>Sales</span></h1>
        <div class="box-container">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Count</th>
                <th>Total</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include('config.php');
                $result = mysqli_query($con, "SELECT * FROM sale");
                while($row = mysqli_fetch_array($result)){
                  if($row['category'] == "meat" || $row['category'] =="dairy" || $row['category'] =="fruits" || $row['category'] =="vegetables"){
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
          <button type="submit" name="delete" class="btn btn-danger fs-3">Delete All</button>
          </form>
        </center>
    </section>
    <?php 
      if(isset($_POST['delete'])){
        mysqli_query($con, "DELETE FROM sale");
        header('location: sales.php');
      }
    ?>
    
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>