<?php
    include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Website</title>
    <link rel="stylesheet" href="../css/admin.css">
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

        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br>


        <form action="" method="post" class="text-center">
            Username<br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn1">
            <br><br>
        </form>
    </div>
</body>
</html>

<?php
 
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username=="bhojan" && $password=="bhojan123")
        {
            $_SESSION['user']=$username;
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login']= "<div class='error text-center'>Invalid username and password</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }


?>