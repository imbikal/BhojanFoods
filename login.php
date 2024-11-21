<?php
    include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1><br><br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']) ;
            
        }
        if(isset($_SESSION['user-add']))
        {
            
            ?>
            <script>alert('<?php echo $_SESSION['user-add'];?>')</script>
            <?php
            unset($_SESSION['user-add']) ;

        }
        if(isset($_SESSION['user-login-msz']))
        {
            
            ?>
            <script>alert('<?php echo $_SESSION['user-login-msz'];?>')</script>
            <?php
            unset($_SESSION['user-login-msz']) ;
        }

        ?>
        <br>


        <form action="" method="post" class="text-center">
            Username<br>
            <input type="text" name="username" placeholder="Enter Username" required><br><br>
            Password<br>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>

            <input type="submit" name="submit" value="Login" class="btn1">
            <br><br>
        </form>
        <p>If you don't have an account, Click <a href="signup.php">here</a> to Signup.</p>

    </div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=md5($_POST['password']);

        $sql="select * from tbl_user where username='$username' AND password='$password'";

        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);

        if($count==1)
        {
            $_SESSION['user-login']=$username;
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            ?>
            <script>alert('Invalid username and password')</script>
        

            <?php
        }

    }

?>


