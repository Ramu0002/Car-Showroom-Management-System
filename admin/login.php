<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LogIn - Car management wesite</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>



<body>
     <div class="login">
     	<h1 class="text-center">login</h1>
<br>
<br>


<?php 

   if (isset($_SESSION['login']))
    {

    	echo $_SESSION['login'];
    	unset($_SESSION['login']);

    	 if(isset($_SESSION['no-login-message']))
   {
   	echo $_SESSION['no-login-message'];
   	unset($_SESSION['no-login-message']);
   }

   	// code...
   }

   ?>


<form action="" method="POST" class="text-center">
	Username:<br>
	<input type="text" name="username" placeholder="ENter your Username"><br><br>


	Password:<br>

	<input type="Password" name="password" placeholder="enter Password"><br><br>



	<input type="submit" name="submit" value="Login" class="btn-primary"><br>




</form>


     </div>


</body>
</html>


<?php 
 if (isset($_POST['submit']))
   {
        
         //1.get the data
   	    $username = $_POST['username'];
   	    $password = md5($_POST['password']);

         // sql to check username password exists or not

   	     $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password = '$password'";
    
    //exe sql query

   	    $res = mysqli_query($conn , $sql);
        
        //count rows 
        $count = mysqli_num_rows($res);

    
        if ($count==1)
         {
        	// code...
        	$_SESSION['login'] = "<div class='success'>Login successfull</div>";
            $_SESSION['user'] = $username;
        	header('location:'.SITEURL.'admin/');
        }
else
{
         $_SESSION['login'] = "<div class='error text-center'>Username or password not correct.Try again</div>";

        	header('location:'.SITEURL.'admin/login.php');
        
}



}







?>