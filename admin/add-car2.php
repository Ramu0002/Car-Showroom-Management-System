<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add car</h1>

        <br><br>

        <?php 
            if (isset($_SESSION['add']))

   {
    echo $_SESSION['add'];
    unset($_SESSION['add']);


  }

  if (isset($_SESSION['upload']))

   {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);


  }
  
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the car ">
                    </td>
                </tr>
               
                 <tr>
                <td> Select image:</td>
                <td>
                     <input type="file" name="image">                 
                </td>
            </tr>
            
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the car ."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

               
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add car" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the car in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //Check whether radion button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; //SEtting the Default Value
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; //Setting Default Value
                }

                if (isset($_FILES['image']['name']))
             {
                // code...

                $imagename=$_FILES['image']['name'];
                $ext = end(explode('.', $imagename));

                $imagename = "car_".rand(000,900).'.'.$ext;

                $source_path=$_FILES['image']['tmp_name'];
                $destination_path= "../images/car2/".$imagename;

                $upload = move_uploaded_file($source_path, $destination_path);

                if ($upload==false) {
                    $_SESSION['upload'] = "<div class='error'>failed to add car</div>";
                    header('location:'.SITEURL.'admin/add-car2.php');

                    die();

                    // code...
                }

                  }
else
{
    $imagename="";
}

                //3. Insert Into Database

                //Create a SQL Query to Save or Add car
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO tbl_car2 SET 
                    title = '$title',
                      imagename='$imagename',
                    description = '$description',
                    price = $price,
                   
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage car page
                if($res2 == true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'>Car Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage_car2.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add car.</div>";
                    header('location:'.SITEURL.'admin/manage_car2.php');
                }

                
            }

        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>