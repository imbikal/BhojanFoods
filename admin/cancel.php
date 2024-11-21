<?php

    include '../config/constants.php';
    if(isset($_GET['id']))
        {
            $id=$_GET['id'];

            $sql="update tbl_order set status='Cancelled' where id=$id";
            $result=mysqli_query($conn,$sql);


            if($result)
            {
               $_SESSION['update-status']="<div class='success'>Order cancelled successfully.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }

        }
?>        