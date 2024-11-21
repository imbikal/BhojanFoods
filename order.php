<?php 

    include 'partials-front/menu.php';

    if(!isset($_SESSION['user-login']))
    {
    
        $_SESSION['user-login-msz']="Please login to order food";
        header("location:".SITEURL."login.php");

    }



?>

<?php 

    if(isset($_GET['food-id']))
    {
        $food_id_raw=strval($_GET['food-id']); 
        $food_id=mysqli_real_escape_string($conn,$food_id_raw);
        $sql="select * from tbl_food where food_id='$food_id'";
        $result=mysqli_query($conn,$sql);
        
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            $row=mysqli_fetch_assoc($result);
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }
    
?>
    

<section class="food-order">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order</h2>

            <form action="" class="order" method="post" onsubmit="return contactvalid()">
                <fieldset>
                    <div class="food-menu-img">
                    <?php 

                        if($image_name=="")
                        {
                            echo "<div class='error'>Image not available</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve">
                            <?php
                        }

                    ?>
                    </div>
    
                    <div class="food-menu-desc">

                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <input type="hidden" name="food_id" value="<?php echo $food_id_raw;?>">

                        <p class="food-price">Rs.<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" id="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" id="name"  class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" id="phone" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" id="email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <input type="text" name="address" class="input-responsive" required>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 

                if(isset($_POST['submit']))
                {
                    $food_id=$_POST['food_id'];
                    $qty=$_POST['qty'];
                    $order_date=date("Y-m-d h:i:s a");
                    $status="Ordered";
                    $customer_name=$_POST['full-name'];
                    $customer_contact=$_POST['contact'];
                    $customer_email=$_POST['email'];
                    $customer_address=mysqli_real_escape_string($conn,$_POST['address']);



                    $sql2="insert into tbl_order (food_id,qty,order_date,status,customer_name,customer_contact,customer_email,customer_address) values ($food_id,$qty,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";

                    $result2=mysqli_query($conn,$sql2);

                    if($result2)
                    {
                            
                            $_SESSION['order']="Food ordered successfully";
                            header('location:'.SITEURL);

                    }
                    else
                    {
                            $_SESSION['order']="Failed to order food";
                            header('location:'.SITEURL);
                    }

                }
            ?>

        </div>
    </section>




<?php include 'partials-front/footer.php';?>