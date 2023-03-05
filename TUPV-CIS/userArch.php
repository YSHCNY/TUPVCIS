git<?php
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

    <title>PATIENT LIST | ADMIN | TUPV-CIS</title>


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
        <!-- Sidebar  -->
       
         <!-- ---------------------------------------CONTENT ------------------------------------------------------------------------------ -->

      <div class="container mt-5">
    
      <section class="pb-5">
      <div class="table-responsive" id="nmt">
    <div class="container">
        
    <a href="pview.php" class="shadow-none"> <i class="fa-solid fa-arrow-left pr-1"></i>
                Back
            </a>
      <h2 class="text-center"><span class="text-danger">P</span>REVIOUS <span class="text-danger">U</span>SERS</h2>
      <button class= "btn btn-success mb-3 float-right " onclick="window.print();"> print</button>
     

    
      <table class = "table table-striped table-hover ">
                <thead class="thbg text-light">
                    <tr class = "fs-6">
                        <th>Unique ID</th>
                        <th>Full Name</th>
                        <th>Password</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Sex</th>
                        <th>Birthdate</th> 
                        <th>Bloodtype</th> 
                        
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


            $sql = "SELECT * FROM userlist_archive ORDER BY `dd` DESC";
            $result = $connection->query($sql);
            if(!$result){
                die("Invalid Property " . $connection->connect_error);
            }

            while($row = $result-> fetch_assoc()){   
                $id = $row['id'];
                

                echo'<tr>'
               
                .'<td data-title="unique ID">' . $row["IDno"] . '</td>'
                .'<td data-title="Full Name">' . $row["FullName"] . '</td>'
               
                .'<td data-title="Password">' . $row["Pass"] . '</td>'
                .'<td data-title="Address">' . $row["Addr"] . '</td>'
                .'<td data-title="Contact">' . $row["ContactNo"] . '</td>'
                .'<td data-title="Sex">' . $row["Sex"] . '</td>'
                .'<td data-title="Birthdate">' . $row["Birthdate"] . '</td>'
                .'<td data-title="Bloodtype"> ' . $row["Bloodtype"] . ' </td>'
              
          
     
                .'</tr>'; 

            }
            ?>
        

            </tbody>
            </table>
          
    

        </div>

              
             
        
        
        
        
        
        </div>


          </div>

        <!-- CONTENT END -->
          </section>
          
     
        <!-- --------------------------------------- END CONTENT ------------------------------------------------------------------------------ -->
      
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
   
    

</body>

</html>



