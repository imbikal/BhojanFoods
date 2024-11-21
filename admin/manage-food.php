<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
                <br>
                <br>
                <!-- Add admin button starts here -->

                <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Foods</a>
                <!-- Add admin button ends here -->
                <br>
                <br>
                <br>

                <?php  

                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['unauthorized']))
                    {
                        echo $_SESSION['unauthorized'];
                        unset($_SESSION['unauthorized']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                ?>


                <table class="tbl-full">
                    <tr>
                        <th>S.N</th> 
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>

                    <?php

                        $sql="select * from tbl_food";
                        $result=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($result);

                        $sn=1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $id=$row['food_id'];
                                $title=$row['title'];
                                $price=$row['price'];
                                $image_name=$row['image_name'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $title;?></td>

                                     
                                        <td><?php echo $price;?></td>
                                        <td>
                                            <?php

                                                if($image_name=="")
                                                {
                                                    echo "<div class='error'>Image not added.</div>";
                                                }
                                                else
                                                {
                                                    ?>
                                                    
                                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="" width="150px"> 

                                                    <?php
                                                }
                                    
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger" onclick="return mfood()">Delete Food</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
           
                </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>