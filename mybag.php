
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style3.css">
    <title>My Bag</title>
    <link rel="icon" href="img/icon.png">
</head>
<body class="container">
<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
    }
    if(!isset($user_id)){
        mysqli_query($con, "DELETE FROM mybag ");
        header('location:login.php');
    }else{
        $SELECT = mysqli_query($con, "SELECT * FROM user_form WHERE userid = '$user_id'") or die('query failed');
            $row = mysqli_fetch_assoc($SELECT);
            $note = "
            <div class = 'profile'>
            <i class='fa fa-user'></i>
            <span>$row[username]</span>
            <form method='GET'>
            <a name='logout' class='btn btn-danger fs-5' href='mybag.php?logout=<?php echo $user_id?>' onclick='retutn confirm('Are You Sure To Logout?');' class='btn btn-danger fs-5'>Logout</a>
            </form>
            </div>
            ";
    }
    if(isset($_POST['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
    }
?>
    <h1 style="border-bottom: 3px solid #333; width:fit-content; padding-bottom:5px; margin:30px;">My Bag</h1>
    <?php
            if(isset($note)){
                echo "$note";
            }
        ?>
    <center>
        <main>
            <table class='table table-bordered text-center'>
                <thead>
                    <tr>
                        <th scope='col'>Product Name</th>
                        <th scope='col'>Product Category</th>
                        <th scope='col'>Product Pirce</th>
                        <th scope='col'>Product Counts</th>
                        <th scope='col'>Total Price</th>
                        <th scope='col'>Delete Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include('config.php');
                        $result = mysqli_query($con, "SELECT * FROM mybag");
                        $sum = mysqli_query($con, "SELECT SUM(total) FROM mybag");
                        $col = mysqli_fetch_array($sum);
                        while($row = mysqli_fetch_array($result)){
                            if($row['category'] == "meat" || $row['category'] =="dairy" || $row['category'] =="fruits" || $row['category'] =="vegetables"){
                                echo "
                                    <tr>
                                        <td>$row[name]</td>
                                        <td>$row[category]</td>
                                        <td>$row[price]$</td>
                                        <td>$row[count]</td>
                                        <td>$row[total]$</td>
                                        <td><a href='delCard.php? id=$row[id]' class='btn btn-danger'>Delete <i class='fa fa-trash mx-1'></i></a></td>
                                    </tr>
                                ";
                            }else{
                                echo "";
                            }
                        };
                    ?>
                </tbody>
            </table>
        </main>
        <br>
        <div class="total fs-3 bg-primary rounded-5"> Total:  <span><?php echo "$col[0]$";?></span></div>
        <br><br>
        <a href="val.php" class="btn btn-success text-white fs-5 float-end">Buy</a>
        <a href="delAll.php" class="btn btn-danger float-end mx-2 fs-5">Delete All</a><br><br><br>
        <a href="shop.php" class="btn btn-info text-white fw-bold float-end p-1">Back To Shop >></a>
    </center>
</body>
</html>