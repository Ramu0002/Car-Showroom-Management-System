<?php  
   

    include('../config/constants.php');

 $id =$_GET ['id'];


$sql = "DELETE FROM tbl_book WHERE id=$id ";

$res = mysqli_query($conn,$sql);


if ($res==true)
 {
	 $_SESSION['delete'] ="<div class='success'>order  deleted successfull</div>";
	 header('location:'.SITEURL.'admin/manage_order.php');




	}
else
{
      $_SESSION['delete'] ="failed to delete Order ";
	 header('location:'.SITEURL.'admin/manage_order.php');


}





?>