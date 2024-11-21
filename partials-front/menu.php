<?php include('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="javascript/script.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="logo">
                <img src="images/bhojan.png" alt="logo">
            </div>
            <ul class="navul">
                <li><a href="index.php">Home</a></li>
                <li>Categories
                    <ul class="submenu">
                        <li><a href="veg.php">Veg</a></li>
                        <li><a href="non-veg.php">Non-Veg</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="right">
            <form action="<?php echo SITEURL;?>search-food.php" method="POST">
                <input type="search" name="search" placeholder="Search for food">
                <input type="submit" name="submit" value="Search" class="btn1"> 
            </form>
            <?php

            if(!isset($_SESSION['user-login']))
            {
                ?>
                   <form action="<?php echo SITEURL;?>login.php" method="POST">
                        <input type="submit" name="login" value="Login" class="btn1">
                    </form>
                <?php
            }
            else
            {
                ?>
                <form action="<?php echo SITEURL;?>logout.php" method="POST">
                     <input type="submit" name="logout" value="Logout" class="btn1">
                 </form>
             <?php
            }
            ?>


        </div>
    </div>