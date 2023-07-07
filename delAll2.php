<?php 
    include('config.php');
    $ID = $_GET['id'];
    mysqli_query($con, "DELETE FROM mybag ");
    header('location: mybag2.php');
?>