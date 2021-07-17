<?php 

     //authorisation
    
if (!isset($_SESSION['user']))
 {
    


    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access admin panel.</div>";
    //redirect to login
    header('location:'.SITEURL.'admin/login.php');




}



?>
