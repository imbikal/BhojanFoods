<?php include 'partials/menu.php';?>

    <!-- Dashboard section starts here -->

    <div class="main-content">
        <div class="wrapper">
            <h1 class="dash">Dashboard</h1>

            <div class="col-4 text-center">
                <?php
                    
                    $sql2="select * from tbl_food";
                    $result2=mysqli_query($conn,$sql2);
                    
                    $count2=mysqli_num_rows($result2);

                ?>
                <h1><?php echo $count2;?></h1>
                <br>
                Foods
            </div>
            <div class="col-4 text-center">
                <?php
                    
                    $sql3="select * from tbl_order";
                    $result3=mysqli_query($conn,$sql3);
                    
                    $count3=mysqli_num_rows($result3);

                ?>
                 <h1><?php echo $count3;?></h1>
                <br>
                Total Orders
            </div>
            <div class="col-4 text-center">
                <?php

                $sql4="select tbl_food.price,tbl_order.qty,tbl_order.status
                        from tbl_food
                        inner join tbl_order on tbl_food.food_id=tbl_order.food_id
                        where status='Delivered'";
                         
                $result4=mysqli_query($conn,$sql4);
                
                $total_revenue=0;
                while($row=mysqli_fetch_assoc($result4))
                {
                    $qty=$row['qty'];
                    $price=$row['price'];
                    $total_revenue=$total_revenue+$qty*$price;
                }

                ?>
                <h1>Rs.<?php echo $total_revenue;?></h1>
                <br>
                Revenue Generated
            </div>
            <div class="clearfix"></div>

        </div>

    </div>


<?php include 'partials/footer.php';?>