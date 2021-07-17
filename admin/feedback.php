<?php include('partials/menu.php'); ?>
    
<div class="main-content">
   	<div class="wrapper">
   		
        <h2>Customer feedback</h2>
   	</div>
</div>

<?php  

if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
  
     

?>



  <table border = "2" class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Customer-name</th>
                       
                        <th>Customer contact</th>
                        <th>Customer email</th>
                        <th>Feedback</th>
                        
                    </tr>

                    <?php 

                        //Query to Get all feedback from Database
                        $sql = "SELECT * FROM tbl_feedback";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                      
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
                                
                                         $id=$row['id'];
                                      $full_name = $row['full_name'];
                                $contact = $row['contact'];
                                $email  = $row['email'];
                                $feedback = $row['feedback'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        
                                         <td><?php echo $full_name; ?></td>
                                        
                                        
                                         <td><?php echo $contact ; ?></td>

                                        <td><?php echo $email ; ?></td>
                                        <td><?php echo $feedback; ?></td>
                                      
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
                                <td colspan="6"><div class="error">No feedback Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>