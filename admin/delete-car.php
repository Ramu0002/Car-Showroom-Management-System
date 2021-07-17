<?php 
    //Include COnstants Page
    include('../config/constants.php');

    //echo "Delete car Page";

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $image_name =$_GET['image_name'];
       
        //2. Remove the Image if Available
        if ($image_name != "") 
        {
            $path = "../images/car/".$image_name;

            $remove = unlink($path);

            if ($remove==false) 
            {
                 $_SESSION['upload'] = "<div class='error' >Failed to delete image.</div>";

                 header('location:'.SITEURL.'admin/manage_car.php');

                 die();
            }
        }
        //CHeck whether the image is available or not and Delete only if available
     
        //3. Delete car from Database
        $sql = "DELETE FROM tbl_car WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage car with Session Message
        if($res==true)
        {
            //car Deleted
            $_SESSION['delete'] = "<div class='success'>car   Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage_car.php');
        }
        else
        {
            //Failed to Delete car
            $_SESSION['delete'] = "<div class='error'>Failed to Delete car .</div>";
            header('location:'.SITEURL.'admin/manage_car.php');
        }

        

    }
    else
    {
        //Redirect to Manage car Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "<div class ='error'>Unauthorized access</div>";
       
        header('location:'.SITEURL.'admin/manage_car.php');
    }

?>