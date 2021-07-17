

<?php include('partials-front/menu.php'); ?>
   


<div  style="color:black; background-color: black;">

yadhbchgycghxcbb


</div>

    <!-- MEnu Section Starts Here -->
  <section class="car-menu">
        <div class="container">
            <h2 class="text-center">cars</h2>


         <?php     
                    
                    $sql = "SELECT * FROM tbl_car2 WHERE active='Yes' LIMIT 4";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);

                if($count>0){
                    
                    while($row = mysqli_fetch_assoc($res))
                    {
                   $id =  $row['id'];
                   $title = $row['title'];
                     $description = $row['description'];
                       $price = $row['price'];
                   $imagename = $row['imagename'];

                   ?>




            <div class="car-menu-box">
                <div class="car-menu-img">
                    
                </div>


    <div class="car-menu-desc">
        <?php 

          if($imagename=="")
                    {
                        echo "image not available";

                    }
             else
             {


                ?>
                      <img src="<?php echo SITEURL ; ?>images/car2/<?php echo $imagename; ?>" alt=" cars " class="img-responsive img-curve" height="250px">


                <?php 
             }






        ?>

                    <h4 style="font-weight:bold;"><?php echo $title; ?></h4>
                    <p class="car-price">$<?php echo $price; ?></p>
                    <p class="car-detail">
                      <?php echo $description; ?>
                      <br>
                       <button class="btn-secondary">  <a href="<?php echo $title; ?>.php "> KIA <?php echo $title; ?></a> </button> <hr>

                    <br>
</br>
                </div>
            </div>



            <?php 







}
}else
{
    echo "Car not added";

}

?>





</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br><br></br><br></br><br>
<br><br><br><br><br><br><br><br><br><br>

<?php include('partials-front/footer.php'); ?>