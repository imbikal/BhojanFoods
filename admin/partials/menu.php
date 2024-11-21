<?php

    include '../config/constants.php';

    include 'login-check.php';


    if(isset($_POST['logout']))
    {
        header('location:logout.php');
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="../javascript/script.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="logo">
                <img src="../images/bhojan.png" alt="logo">
            </div>
            <ul class="navul">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
            </ul>
        </div>
        <div class="right">
            <form action="" method="POST">
                <input type="submit" name="logout" value="Logout" class="btn1">
            </form>
        </div>
    </div>
        
