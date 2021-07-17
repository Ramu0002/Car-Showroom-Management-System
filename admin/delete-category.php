<?php
 
 include('../config/constants.php');


 if (isset($_GET['id']) AND isset($_GET['image_name']))
  {
     // code...

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];



    if ($image_name !="")
     {
        // code...
        $path = "../images/category/".$image_name;

        $remove = unlink($path);

        if ($remove==false)
         {
            // code...
            $_SESSION['remove'] =" <div class='error'>Failed to remove category </div>";
            header('location'.SITEURL.'admin/manage_category.php ');

            die();


        }

    }
     
       $sql = "DELETE FROM tbl_category WHERE id=$id";

       $res = mysqli_query($conn , $sql);

       if($res == true)
       {
      $_SESSION['delete'] = "<div class='success'> Deleted Successful</div>";
      header('location'.SITEURL.'admin/manage_category.php');

       } 
       else
       {

         $_SESSION['delete'] = "<div class='error'> Deleted unsuccessful</div>";
      header('location'.SITEURL.'admin/manage_category.php');
      

       }

 }
else
{

    header('location:'.SITEURL.'admin/manage_category.php');
}



?>