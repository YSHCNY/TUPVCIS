<?php
    include 'connection.php';
    include "session.php";
    include "autoUpdate.php";

   

   
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Inventory Full List | ADMIN | TUPV-CIS</title>


    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="css/bootstrap4.min.css">   
    <!-- <link rel="stylesheet" href="css/mcs.min.css"> -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/DataTable.min.css">
    <link rel="stylesheet" href="css/style2.css">
    
    <!-- 
    dump


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     -->
   
  
     
</head>

<body>

    <div class="wrapper">
    
    <div class="container mt-5">
    <a href="inventory.php" class="shadow-none"> <i class="fa-solid fa-arrow-left pr-1"></i>
                Back
            </a>
      <section>
        
		
			<h2 class="text-center"><span class = "text-danger">M</span>EDICINE <span class = "text-danger">O</span>UT <span class = "text-danger">F</span>ULL LIST</h2>
            <button class= "btn btn-success float-right mb-2" onclick="window.print();"> print</button>
		
            <table class = "table table-striped table-hover " >
                <thead class="thbg text-light">
                    <tr class = "fs-6">
                       
                        <th>Date Out</th>
                        <th>Medicine</th>
                        <th>Quantity</th> 
                        
                    </tr>
            </thead>
            <tbody>
              

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "tupvcisdb";

                $connection = new mysqli($servername, $username, $password, $database);

            if($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }


            $sql = "SELECT `id`,`da`,`uniqueID`,`genname`,`qty` FROM patient";
            // $sql = "SELECT `MedicineName`, `GenericName`, `ExpDate`, SUM(`qty`), `status` FROM med_inventorY GROUP BY `GenericName`";
            $result = $connection->query($sql);
           

            if(!$result){
                die("Invalid Property " . $connection->connect_error);
            }

            while($row = $result-> fetch_assoc()){
               
             
                $id = $row['id'];
                

                echo'<tr>'
                    .'<td data-title="Date Out">' . $row["da"] . '</td>'
                    .'<td data-title="Medicine Recieved">' . $row["genname"] . '</td>'
                    .'<td data-title="Quantity">' . $row["qty"] . '</td>'
  
                .'</tr>'; 

            }
            ?>
        

            </tbody>
            </table>
          
        
        
        
        
        
            </div>
        <!-- CONTENT END -->
          </section>


         

     
        <!-- --------------------------------------- END CONTENT ------------------------------------------------------------------------------ -->

        </div>
    </div>
    <h6 class = "text-right top-100 sy"><?= $_SESSION['SchoolYear'];?></h6>


    <!-- JS PLUGINS dont touch -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery3.6.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>
    <script src="js/DataTables.min.js"></script>
    <script src="js/mcs.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/solid.js"></script>
    <script src="js/fontawesome.js"></script>


   
 
   <script>
    $(document).ready( function () {
    $('.table').DataTable();
});
   </script>
   
    <!-- <script>
        $(document).ready(function(){
            var dataTable = $('#order_date').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order" : [],
                "ajax":{
                    url:"fetch.php",
                    type: "POST"
                }
            });
        });
    </script> -->

</body>

</html>



