
<?php  include('partials/menu.php') ?>




<div class="main-content">
 <div class="wrapper">
    <h1>Add category</h1>

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

<br>


    <form action="" method="POST" enctype="multipart/form-data">
        
         <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Title of the car">
                </td>
            </tr>
            <br>
            <tr>
                <td> Select image:</td>
                <td>
                     <input type="file" name="image">                 
                </td>
            </tr>
            
            <br>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                    
                </td>
               </tr>
                  <br>
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                    
                </td>
               </tr>
   <br>
            
   <br>
              <tr>
                
                <td colspan="2">
                <input type="submit" name="submit" value="add category" class="btn-secondary">
                </td>
            </tr>

         </table>    


    </form>
        
<?php 

     //check whether button clicked or not
     if (isset($_POST['submit']))
      {
        //get data

        $title = $_POST['title'];
            


                 if (isset($_POST['featured']))
                  { 
                    $featured = $_POST['featured'];

                    // code...
                 }
                 else
                 {
                    $featured = "No";
                 }

                  if (isset($_POST['active']))
                  { 
                    $active = $_POST['active'];

                    // code...
                 }
                 else
                 {
                    $active = "No";
                 }
           
            if (isset($_FILES['image']['name']))
             {
                // code...

                $image_name=$_FILES['image']['name'];
                $ext = end(explode('.', $image_name));

                $image_name = "car_category_".rand(000,900).'.'.$ext;

                $source_path=$_FILES['image']['tmp_name'];
                $destination_path= "../images/category/".$image_name;

                $upload = move_uploaded_file($source_path, $destination_path);

                if ($upload==false) {
                    $_SESSION['upload'] = "failed to add car";
                    header('location:'.SITEURL.'admin/add-category.php');

                    die();

                    // code...
                }

            }
else
{
    $image_name="";
}









              $sql = "INSERT INTO tbl_category SET 
                   title = '$title',
                   image_name='$image_name',
                   featured = '$featured',
                   active='$active'";
              
              $res = mysqli_query($conn, $sql);

                if ($res == true) 

                {
                  $_SESSION['add'] = "<div class='success'>Category added successful.</div>";
                  header('location:'.SITEURL.'admin/manage_category.php');


                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>failed add category</div>";
                  header('location:'.SITEURL.'admin/add-category.php');

                }
 









             }

?>



  </div>  
 </div>






<?php  include('partials/footer.php') ?>