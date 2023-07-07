<?php 
    include('config.php');
    if(isset($_POST['upload'])){
        $NAME = $_POST['name'];
        $CATEGORY = $_POST['category'];
        $PRICE = $_POST['price'];
        $COUNT = $_POST['count'];
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "img/prod/" .$image_name;
        $insert = "INSERT INTO products (name, category, price, count, image) VALUES ('$NAME', '$CATEGORY', '$PRICE', '$COUNT', '$image_up')";
        mysqli_query($con, $insert);
        if(move_uploaded_file($image_location, 'img/prod/'.$image_name)){
            echo "<script>alert('Image Uploaded Successfully')</script>";
        }else{
            echo "<script>alert('Something Went Wrong, Image Did not Upload')</script>";
        }
        header('location: admin.html');
    }
?>