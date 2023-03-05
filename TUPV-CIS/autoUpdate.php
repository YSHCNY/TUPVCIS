<?php  
            
        
                
            $sql = "SELECT * FROM `med_inventory` where ExpDate LIKE CURRENT_DATE";
            $result = $con->query($sql);
 
            while($row = $result-> fetch_assoc()){
 
             $row['ExpDate'];
             $id =  $row['id'];
             $row['status'];
                                           
             if ($sql >= 0){      
                                             
                 $con->query("UPDATE `med_inventory` set `status` = 'EXPIRED' WHERE `id` = '$id'");
               
             }
          
            }
 
               
 
                 ?>
 
 <?php  
             
         
                 
             $sql = "SELECT * FROM `med_inventory` where qty = 0";
             $result = $con->query($sql);
  
             while($row = $result-> fetch_assoc()){
  
         
              $id =  $row['id'];
              $row['qty'];
                                            
              if ($sql >= 0){      
                                              
                  $con->query("UPDATE `med_inventory` set `status` = 'CONSUMED', `ExpDate` = '0' WHERE `id` = '$id'");
                
              }
           
             }
  
    ?>