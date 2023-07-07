<?php
    include('config.php');
    if(isset($_POST['add'])){
        $ID = $_POST['id'];
        $up = mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
        $data = mysqli_fetch_array($up);
        $NAME = $data['name'];
        $CATEGORY = $data['category'];
        $PRICE = $data['price'];
        $COUNT = $_POST['count'];
        $TOTAL = $COUNT * $PRICE;

        session_start();
        $user_id = $_SESSION['user_id'];
        if(!isset($user_id)){
            header('location:login.php');
        }else{
            $insert = "INSERT INTO mybag (name, category, price, count, total) VALUES ('$NAME', '$CATEGORY', '$PRICE', '$COUNT', '$TOTAL')";
            mysqli_query($con, $insert);
            header('location: shop.php');
        }
    }
?>