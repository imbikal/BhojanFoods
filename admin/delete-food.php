<?php
    
    include('../config/constants.php');
    if(isset($_GET['id']))
    {
        $id_raw=strval($_GET['id']);
        $id=mysqli_real_escape_string($conn,$id_raw);
        $image_name=$_GET['image_name'];

        if($image_name!="")
        {
            $path="../images/food/".$image_name;

            $remove=unlink($path);

        }
        
        $sql= "delete from tbl_food where id='$id'";
        $result=mysqli_query($conn,$sql);

        if($result)
        {
            $_SESSION['delete']="<div class='success'>Food deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete']="<div class='error'>Failed to  deleted food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        $_SESSION['unauthorized']="<div class='error'>Unauthorized Access.</div>";
    }

?>