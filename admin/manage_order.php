<?php include('partials/menu.php'); ?>
    
<div class="main-content">
   	<div class="wrapper">
   		
        <h2>Manage order</h2>
   	</div>
</div>

<?php  

   if (isset($_SESSION['delete']))

   {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);

}
     

?>



  <table border = "2" class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Car</th>
                       <th>Customer Name</th>
                        <th>Customer contact</th>
                        <th>Customer email</th>
                        <th>Customer address</th>
                        
                        
                    </tr>

                    <?php 

                        //Query to Get all order from Database
                        $sql = "SELECT * FROM tbl_book";

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
                                $car = $row['car'];
                                      $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $car; ?></td>
                                         <td><?php echo $customer_name; ?></td>
                                        
                                        
                                         <td><?php echo $customer_contact; ?></td>

                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                     
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
                                <td colspan="6"><div class="error">No customer Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>