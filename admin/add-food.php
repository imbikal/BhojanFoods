<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add food</h1>

        <form action="" method="post" onsubmit="return addvalid()" enctype="multipart/form-data" >
            <table>
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" required>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" id="price" required>
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <option value="veg">veg</option>
                            <option value="non-veg">non-veg</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
              </table>
        </form>

        <?php 

            if(isset($_POST['submit']))
            {
                $title=mysqli_real_escape_string($conn,$_POST['title']);
                $description=mysqli_real_escape_string($conn,$_POST['description']);
                $price=$_POST['price'];
                $category=$_POST['category'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name=$_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $exp= explode('.',$image_name);
                        $ext= end($exp);


                        $image_name=$title.time().".".$ext;

                        $src=$_FILES['image']['tmp_name'];
                        $dst="../images/food/".$image_name;

                        $upload=move_uploaded_file($src,$dst);


                    }
                }
                else
                {
                    $image_name="";
                }

                
                $sql="insert into tbl_food (title,description,price,image_name,category) values ('$title','$description','$price','$image_name','$category')";
                $result=mysqli_query($conn,$sql);
                echo $result;

                if($result)
                {
                    $_SESSION['add']="<div class='success'>Food added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');

                }
                else
                {
                    $_SESSION['add']="<div class='error'>Failed to add food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }


            }

        ?>
    </div>
</div>

<?php include('partials/footer.php');?>