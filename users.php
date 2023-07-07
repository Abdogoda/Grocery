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
    <title>ADMIN-USERS</title>
    <link rel="icon" href="img/icon.png">
</head>
<body>
    <!-- header section -->
    <header class="header">
        <a href="index.html" class="logo"><i class="fas fa-shopping-basket"></i>Grocery</a>
        <div class="icons">
            <div class="home-btn" data-title="Home"><a href="index.html"><i class="fas fa-home"></i></a></div>
            <div class="admin-btn" data-title="Admin"><a href="admin.html"><i class="fas fa-user-gear"></i></a></div>
            <div class="sales-btn" data-title="Sales"><a href="sales.php"><i class="fas fa-list-check"></i></a></div>
            <div class="products-btn" data-title="Products"><a href="products.php"><i class="fas fa-server"></i></a></div>
            <div class="lang-btn" data-title="Arabic"><a href="users2.php"><i class="fas fa-language"></i></a></div>
        </div>
    </header>

    <!-- products section-->
    <section class="products" id="products" style="margin-top: 30px;">
        <h1 class="mHeading">All <span>Users</span></h1>
        <div class="box-container">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Address</th>
                <th>Delete User</th>
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
                            <button type='submit' name='delete' class='btn btn-danger fs-5'>Delete User</button>
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
        mysqli_query($con, "DELETE FROM sale WHERE userid=$ID");
        header('location:users.php');
      }
    ?>
    
    <script src="js/main.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>