
<?php
    include 'connection.php';

    include 'session.php';

    $queryId = $_GET['id'];
    $sql = "SELECT * FROM med_inventory WHERE id = '$queryId'";
    $result = $con->query($sql);
    $field = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $medname = $_POST['mn'];
      
        $dr = $_POST['dr'];
        $ed = $_POST['ed'];
        $des = $_POST['des'];
       
        $sql = "UPDATE med_inventory SET  MedicineName ='$medname', ExpDate='$ed', qty='$des' WHERE id ='$id'";

        if ($con->query($sql) === TRUE) {
            header('location:MEDLIST.php');

        } else {
            echo "Unable to update student record due to ff error" . $con->error;
        }

        $con->close();
    }






?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> MEDLIST | TUPV-CIS</title>


    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="css/bootstrap4.min.css">   
    <link rel="stylesheet" href="css/mcs.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
  
     
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
        

            <div class="sidebar-header text-center">
                <img src="CLLOGO.jpg"
                          style="width: 100px;" alt="logo">
                <h6 class="SBtitle pt-3">TUPV Clinic Inventory System</h6>
            </div>

            <ul class="list-unstyled components">
    
                <li class="mainlist">
                   <a href="MEDLIST.php"> <i class="fa-solid fa-arrow-left pr-1"></i>
                    Back
                </a>
                 
               
                </ul>
            </li>
           
        
            </ul>

        
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn shadow-none btnTogSN">
                        <i class="fas fa-align-left"></i>
                        
                    </button>

             


              

            </nav>

         <!-- ---------------------------------------CONTENT ------------------------------------------------------------------------------ -->
    

 

                    
                  <DIV class = " pb-2">       
                  <h2><i class="fa-solid fa-pen-to-square"></i> Edit User</h2>
              </DIV> 
              <form class="row g-3 editform"  method="POST">
                            <div class="col-md-6">
                                <input type = "hidden" name = "id"  value="<?php echo $field['id'];?>">
                                <label for="inputidno" class="form-label">Medicine Name</label>
                                <input type="text" name="mn" class="form-control shadow-none" value="<?php echo $field['MedicineName'];?>">
                            </div>
                     
                     

                            <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label for="date" >Date Recieved</label>
                                <input type="date" name="dr" class="form-control shadow-none" value="<?php echo $field['DateRecieved'];?>"/>
                
                            </div>        
                            </div>

                            <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label for="date" >Expiration Date</label>
                                <input type="date" name="ed" class="form-control shadow-none" value="<?php echo $field['ExpDate'];?>"/>
                        
                            
                            </div>
                            </div>

                            <div class="col-6">
                                <label for="pw" class="form-label">Quantity</label>
                                <input type="text" name="des" class="form-control shadow-none" value="<?php echo $field['qty'];?>"/>
                            </div>
                     
                      

                            <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-success ">Save</button>
                     

                            </div>
                            
                        
                            </form>

                    
                            <H1 class = "text-center mt-1 sy"><?= $_SESSION['SchoolYear'];?></H1>

         
         
        <!-- --------------------------------------- END CONTENT ------------------------------------------------------------------------------ -->

        </div>
    </div>
    <p class = "text-right top-100 sy"><?= $_SESSION['SchoolYear'];?></p>


    <!-- JS PLUGINS dont touch -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>
    <script src="js/mcs.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/solid.js"></script>

    <script src="js/fontawesome.js"></script>
   
   
    

</body>

</html>



