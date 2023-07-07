<?php 
    include('config.php');
    $ID = $_GET['id'];
    mysqli_query($con, "DELETE FROM mybag WHERE id=$ID");
    header('location: mybag2.php');
?>