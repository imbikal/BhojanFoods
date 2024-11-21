<?php include 'partials-front/menu.php';?>

<?php 

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=mysqli_real_escape_string($conn,$_POST['message']);

        $sql="insert into tbl_contact (name,email,phone,message) values ('$name','$email','$phone','$message')";
        $result=mysqli_query($conn,$sql);

        if($result)
        {
            ?>
            <script>alert('Message sent successfully')</script>
            <?php
        }
    }


?>

<div class="container">
    <h2 class="text-center">Contact Us</h2>
    <div class="contact">
        <form action="" method="post" onsubmit="return contactvalid()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="name">Phone:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="name">Message:</label>
                <textarea name="message" cols="30" rows="10" required></textarea>
            </div>
            <div class="send">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</div>





<?php include 'partials-front/footer.php';?>