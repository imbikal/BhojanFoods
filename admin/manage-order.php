<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper1">
        <h1>Manage Order</h1>
        <br><br>
        <?php

            if(isset($_SESSION['update-status']))
            {
                echo $_SESSION['update-status'];
                unset($_SESSION['update-status']);
            }

            
        ?>
        <br>
        <br>

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                    <?php

                        $sql="select *
                                from tbl_food
                                inner join tbl_order on tbl_food.food_id=tbl_order.food_id
                                where status='Ordered'";
                        $result=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($result);
                        if($count>0)
                        {   
                            $sn=1;
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $id=$row['id'];
                                $food=$row['title'];
                                $price=$row['price'];
                                $qty=$row['qty'];
                                $total=$price*$qty;
                                $order_date=$row['order_date'];
                                $status=$row['status'];
                                $customer_name=$row['customer_name'];
                                $customer_contact=$row['customer_contact'];
                                $customer_email=$row['customer_email'];
                                $customer_address=$row['customer_address'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $food;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $order_date;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $customer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td class="action">
                                        <a href="<?php echo SITEURL;?>admin/deliver.php?id=<?php echo $id;?>" class="btn-secondary1" onclick="return deliver()">Deliver</a>
                
                                        <a href="<?php echo SITEURL;?>admin/cancel.php?id=<?php echo $id;?>" class="btn-secondary2" onclick="return cancel()">Cancel</a>
                                    </td>
                                </tr>
                                <?php
                            }

                        }
                        else
                        {
                            echo "<tr><td colspan='12'>Order not available.</td></tr>";
                        }
                    ?>

            </tbody>
                   
         </table>


    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

<?php include('partials/footer.php'); ?>