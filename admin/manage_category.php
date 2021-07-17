<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Categories</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
          
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

             
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }


           
        
        ?>
        <br><br>

                <!-- Button to Add category -->
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

                <br /><br /><br />

                <table border = "2" class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Category</th>
                        <th>image</th>
                        <th>Featured</th>
                       
                        <th>Active</th>
                        <th>Action </th>
                    </tr>

                    <?php 

                        //Query to Get all CAtegories from Database
                        $sql = "SELECT * FROM tbl_category";

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
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $title; ?></td>

                                        <td>
                                            <?php 

                                            if ($image_name!="") 
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="100px">

                                                <?php 
                                            }
                                                else
                                                {
                                                    echo "image not added";
                                                }


                                             ?>
                                                
                                            </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                       <td <button class="btn-secondary">  <a href="<?php echo $title; ?>.php "> KIA <?php echo $title; ?> cars</a> </button> </td>
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
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>