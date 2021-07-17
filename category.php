


<?php include('partials-front/menu.php'); ?>


<div  style="color:#190033;background-color: #190033;">

yadhbchgycghxcbb


</div>



<!-- MEnu Section Starts Here -->
  <section class="car-menu">
        <div class="container">
            <h2 class="text-center" style="font-family:normal;">Category</h2>


            <?php     
                    
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes' LIMIT 4";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                if($count>0){
                    
                    while($row = mysqli_fetch_assoc($res))
                    {
                   $id =  $row['id'];
                   $title = $row['title'];
                   $image_name = $row['image_name'];

                   ?>



                 <div class="car-menu-box">
                <div class="car-menu-img">
                    
                </div>

                <div class="car-menu-desc">

                    <?php 
                    if($image_name=="")
                    {
                        echo "image not available";

                    }
             else
             {

                ?>
                      <img src="<?php echo SITEURL ; ?>images/category/<?php echo $image_name; ?>" alt="SUV cars " class="img-responsive img-curve" height="250px">


                <?php 
             }



                    ?>
                    <h4 style="font-weight:bold;"><?php echo $title; ?></h4>


                     <button class="btn-secondary">  <a href="<?php echo $title; ?>-cars.php "> More details on:KIA <?php echo $title; ?> cars</a> </button> <hr>

                  
   
                </div>
            </div>
        


                   <?php 


                    }


                }
else
{

 echo "<div class='error'>Category not added</div>";


}



            ?>
         
    
         
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<br><br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    
<?php include('partials-front/footer.php'); ?>