<?php

    include 'partials-front/menu.php';

?>

<?php

if(isset($_SESSION['order']))
{
    ?>
    <script>alert("<?php echo $_SESSION['order'];?>")</script>
    <?php
    unset($_SESSION['order']);
}
?>

<!-- image slider starts here -->

<div class="slider-container">
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide"><img src="images/slider/momos.jpg" alt="food1"></div>
            <div class="swiper-slide"><img src="images/slider/chowmin.jpg" alt="food1"></div>
            <div class="swiper-slide"><img src="images/slider/pizza.jpg" alt="food1"></div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    loop: true,

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
</script>

<!-- most popular foods starts here -->

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Most Popular Foods</h2>

        <?php

                $sql="select * from tbl_food";
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


    <?php include 'partials-front/footer.php'; ?>