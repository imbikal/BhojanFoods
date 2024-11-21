

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Website</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/script.js"></script>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Signup</h1><br><br>
        <br>


        <form action="signup.php" method="post" class="text-center" onsubmit="return signupvalid()">
            Full Name<br>
            <input type="text" name="fullname" id="name" placeholder="Enter Full Name" required><br><br>
            Username<br>
            <input type="text" name="username" placeholder="Enter Username" required><br><br>
            Password<br>
            <input type="password" name="password" id="pass" placeholder="Enter Password" required><br><br>
           Confirm Password<br>
            <input type="password" name="cpassword"id="cpass" placeholder="Enter Confirm Password" required><br><br>

            <input type="submit" name="submit" value="Signup" class="btn1" >
            <br><br>
        </form>
    </div>
</body>
</html>

<?php
    include('config/constants.php');
?>
<?php

    if(isset($_POST['submit']))
    {
        $fullname=$_POST['fullname'];
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);

        $sql="select * from tbl_user where username='$username'";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);

        if($count>0)
        {
            ?>
            <script>alert('username is already exists')</script>
        

            <?php
            

        }
        else
        {
            $sql1="insert into tbl_user (full_name,username,password) values ('$fullname','$username','$password')";
            $result1=mysqli_query($conn,$sql1);
    
            if($result1)
            {
                $_SESSION['user-add']= "User account created successfully";
                header("location:".SITEURL."login.php");
            }
        }




    }


?>
