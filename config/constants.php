<?php
        // session start

        session_start();

        // Create constants to store non repeating values

        define('SITEURL','http://localhost/food-order/');

        $conn= mysqli_connect("localhost","root","","food-order") or die(mysqli_error($conn));
        
?>