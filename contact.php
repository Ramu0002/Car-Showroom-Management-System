  


<?php include('partials-front/menu2.php'); ?>
   

    <div  style=" background: url(images/contact.jpg);width: 1250px; height: 1000px; background-repeat: none;" >
<div style="text-align: center;" >
        
     </div>
     <div style="background-color: black;">
     
     <?php 
            if(isset($_SESSION['feedback'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['feedback']; //Display the SEssion Message if SEt
                unset($_SESSION['feedback']); //Remove Session Message
            }
        ?>



</div>


    <section class="car-search">
        <div class="container">
            <br>
            <form style="float: right;"  action="" method ="POST" class="order">

                <fieldset>
<div class="car-menu-img">
                        <img src="images/logo.jfif" alt="logo" class="img-responsive img-curve">
                    </div>
    
                    <div class="car-menu-desc">
                        <h3>Enter your feedback</h3>
                       <input type="hidden" name="car" value="Soul">
</div>
                   
                </fieldset>
                
                <fieldset>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="Enter your name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your Ph no. " class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter your Email" class="input-responsive" required>

                    <div class="order-label">Feedback</div>
                   <textarea name="feedback" rows="10" placeholder="Enter your feedback" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                </fieldset>





            </form>
            <form>
            <fieldset>
             <h2>CONTACT US</h2>
       <P>Kia Corporation, commonly known as Kia, is a South Korean multinational automobile manufacturer 
        headquartered in Seoul. It is South Korea's second-largest automobile manufacturer after part 
        company Hyundai Motor Company.</P>
        <br><br>
    
          <h3>Address</h3>
          <p>jp nagar 2nd phase , campus road,<br> Bangaluru,Karnataka,<br>560078</p>
         </div>
        </div>
        </fieldset>

      
     
       
        </form>
      
              

            <?php

   if (isset($_POST['submit']))
    {


        
       
       $full_name = $_POST['full_name'];
        $contact = $_POST['contact'];
      
       $email = $_POST['email'];
      
       $feedback = $_POST['feedback'];
       
        $sql = "INSERT INTO tbl_feedback SET 

           full_name='$full_name',
         contact ='$contact ',
         
         email ='$email ',
         
         feedback ='$feedback'
         
         ";
         
      $res = mysqli_query($conn,$sql);

      //4. Redirect with MEssage to  contact page
                if($res== true)
                {
                    //Data inserted Successfullly
                    $_SESSION['feedback'] = "<div style = 'font-weight:bold ; color:white; text-align: center;' >Feedback sent  Successfully.</div>";
                      header('location:'.SITEURL.'contact.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['feedback'] = "<div class='error'>Failed to give feedback.</div>";
                    header('location:'.SITEURL.'contact.php');
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