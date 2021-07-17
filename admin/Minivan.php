<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Minivan-Cars</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

             if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
             
         
             if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
             
         
             if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }
             
         
           
        
        ?>
        <br><br>

                <!-- Button to Add car -->
                <a href="<?php echo SITEURL; ?>admin/add-car3.php" class="btn-primary">Add car</a>

                <br /><br /><br />

                <table border = "2" class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                       <th>image</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>Active</th>
                        
                    </tr>

                    <?php 

                        //Query to Get all car from Database
                        $sql = "SELECT * FROM tbl_car3";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Create Serial Number Variable and assign value as 1
                        $sn=1;

                        //Check whether we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                      $imagename = $row['imagename'];
                                $price = $row['price'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $title; ?></td>
                                        
                                         <td>
                                            <?php 

                                            if ($imagename!="") 
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/car2/<?php echo $imagename;?>" width="100px">

                                                <?php 
                                            }
                                                else
                                                {
                                                    echo "image not added";
                                                }


                                             ?>
                                                
                                            </td>

                                         <td>$<?php echo $price; ?></td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //WE do not have data
                            //We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No car Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>