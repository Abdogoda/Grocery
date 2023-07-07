<?php 
    include('config.php');
    mysqli_query($con, "DELETE FROM mybag ");
    header('location: mybag.php');
?>