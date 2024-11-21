<?php
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
        <?php 
            if(isset($_GET['id']))
            {
                $id_raw=strval($_GET['id']);
                $id=mysqli_real_escape_string($conn,$id_raw);
                

                $sql="select * from tbl_food where food_id='$id' ";
                

                $result=mysqli_query($conn,$sql);
                // echo $result;
                // print_r($result);


                $row=mysqli_fetch_assoc($result);

                $title=$row['title'];
                $description=$row['description'];
                $price=$row['price'];
                $current_image=$row['image_name'];
                $current_category=$row['category'];
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-food.php');
            }

        ?>
        <form action="#" method="post" onsubmit="return addvalid()" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" required><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" id="price" value="<?php echo $price;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php 

                            if($current_image=="")
                            {
                                echo "<div class='error'>Image not available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" alt="" width="150px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image</td>

                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <option <?php if($current_category=="veg") {echo "selected";}?> value="veg">veg</option>
                            <option <?php if($current_category=="non-veg") {echo "selected";}?> value="non-veg">non-veg</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?= $id;?>">
                        <input type="hidden" name="current_image" value="<?= $current_image;?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 

          if(isset($_POST['submit']))
          {
              $id=$_POST['id'];
              
              $title=mysqli_real_escape_string($conn,$_POST['title']);
              $description=mysqli_real_escape_string($conn,$_POST['description']);
              $price=$_POST['price'];
              $current_image=$_POST['current_image'];
              $category=$_POST['category'];

              if(isset($_FILES['image']['name']))
              {
                  $image_name=$_FILES['image']['name'];
                  if($image_name!="")
                  {
                      $ext=end(explode('.',$image_name));
                      $image_name=$title.time().'.'.$ext;

                      $src_path=$_FILES['image']['tmp_name'];
                      $dest_path="../images/food/".$image_name;

                      $upload=move_uploaded_file($src_path,$dest_path);

                      if($current_image!="")
                      {
                           $remove_path="../images/food/".$current_image;
                           $remove=unlink($remove_path);

                           
                      }
                  }
                  else
                  {
                    $image_name=$current_image;
                  }
              }
              else
              {
                  $image_name=$current_image;
              }

              $sql2="update tbl_food set 
              title='$title',
              description='$description',
              price='$price',
              image_name='$image_name',
              category='$category'
              where id=$id ";

           

              $result2=mysqli_query($conn,$sql2);
              if($result2)
              {
                  $_SESSION['update']="<div class='success'>Food updated successfully.</div>";
                  header('location:'.SITEURL.'admin/manage-food.php');
              }
              else
              {
                $_SESSION['update']="<div class='error'>Failed to update Food.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
              }

             
          }
        ?>
    </div>
</div>
<?php
    include('partials/footer.php');
?>