<?php include 'partials-front/menu.php';?>

<!-- non-veg foods starts here  -->

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Non-veg Foods</h2>

        <?php

                $sql="select * from tbl_food where category='non-veg'";
                $result=mysqli_query($conn,$sql);

                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['food_id'];
                    $title=$row['title'];
                    $description=$row['description']; 
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    ?>

                    <div class="food-menu-box1">
                        <div class="food-menu-img1">
                            <?php 
                            
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not added</div>";

                            }
                            else
                            {       
                                ?>
                                <img src="<?php SITEURL;?>images/food/<?php echo $image_name?>" alt="<?php echo $title;?>" class="img-responsive img-curve">

                                <?php
                            }

                            ?>
                            </div>

                            <div class="food-menu-desc1">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price">Rs.<?php echo $price;?></p>
                                <p class="food-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?food-id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        
                <?php
                    }


                ?>


            <div class="clearfix"></div>
        </div>

</section>




<?php include 'partials-front/footer.php';?>