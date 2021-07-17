  


<?php include('partials-front/menu2.php'); ?>
   

<div  style="background-color:#190033; color: #190033;"> 

dskhc
</div>


    <div  style=" background: url(images/order.jpg);width: 1250px; height: 1000px;">
<div style="text-align: center;" >

        

 <?php 
         if(isset($_SESSION['order1']))     //checking whether session is set or not
            {
                echo $_SESSION['order1'];  //display the session message if set
                unset($_SESSION['order1']); //removing session message
            }

?>


 <?php 
         if(isset($_SESSION['order1']))     //checking whether session is set or not
            {
                echo $_SESSION['order1'];  //display the session message if set
                unset($_SESSION['order1']); //removing session message
            }

?>
     
    <section class="car-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your Booking.</h2>

            <form action="" method ="POST" class="order">
                <fieldset>
                    <legend>Selected car</legend>

                    <div class="car-menu-img">
                        <img src="images/logo.jfif" alt="logo" class="img-responsive img-curve">
                    </div>
    
                    <div class="car-menu-desc">
                        <h3>Carnival</h3>
                       <input type="hidden" name="car" value="Carnival">

                        <p class="car-price">$32000</p>
                       <input type="hidden" name="price" value="$32000">

                      </div>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input  name="contact" placeholder="Enter your Ph no. " class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter your Email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                </fieldset>





            </form>

<?php

   if (isset($_POST['submit'])) //checking button clicked or not
    {


        $car = $_POST['car'];
      
       
       $customer_name = $_POST['full_name'];
        $customer_contact = $_POST['contact'];
      
       $customer_email = $_POST['email'];
      
       $customer_address = $_POST['address'];
       

       // sql query 
       
        $sql = "INSERT INTO tbl_book SET    


           car='$car',
           
           
           customer_name='$customer_name',
         customer_contact='$customer_contact',
         
         customer_email='$customer_email',
         
         customer_address='$customer_address'
         
         ";
         
      $res = mysqli_query($conn,$sql);

      //4. Redirect with MEssage to  order page
                if($res== true)
                {
                    //Data inserted Successfullly
                    $_SESSION['order1'] = "<div style = 'font-weight:bold ; color:white ; text-align: center;'>Car order Successfully.</div>";
                      header('location:'.SITEURL.'carnival-order.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['order1'] = "<div class='error'>Failed to order  car.</div>";
                    header('location:'.SITEURL.'carnival-order.php');
                }








      
   }


?>
  

        </div>
    </section>
    </div>
   

<!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

<!-- social Section Ends Here -->
    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">ORS</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>