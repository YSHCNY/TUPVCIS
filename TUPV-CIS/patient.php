<?php
    include 'connection.php';
    include "autoUpdate.php";
        include 'session.php';

        $sy = $_SESSION['SchoolYear'];

        if (isset($_POST['updatesy'])) {
            $sy = $_POST['SYCODE'];
            $sql2 = mysqli_query($con,"SELECT * FROM schoolyear");
    
            if ($sql2->num_rows > 0) {
                while ($row = $sql2->fetch_assoc()) {                 
                $SYY = $row['sycode'];
                }
    
            if($sy == $SYY){
             
                header('location: settings.php');
            }else{
                echo "<script> alert('Incorrect School Year Code'); </script> ";
               
                
            }
    
        
            }  else {
            
                echo "<script> alert('Incorrect School Year Code'); </script> ";
            }
    
        }
        
    
   
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Patient New | ADMIN | TUPV-CIS</title>


    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="css/bootstrap4.min.css">   
    <!-- <link rel="stylesheet" href="css/mcs.min.css"> -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <nav id="sidebar">
        

            <div class="sidebar-header text-center">
                <img src="CLLOGO.jpg"
                          style="width: 100px;" alt="logo">
                <h6 class="SBtitle pt-3">TUPV Clinic Inventory System</h6>
            </div>

            <ul class="list-unstyled components">
    
                <li class="mainlist">
                   <a href="dashboard.php"> <i class="fa-solid fa-table-columns pr-1"></i>
                    Dashboard
                </a>

                </li>

                <li class="active mainlist">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-bed-pulse"></i> Patient</a>
                <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <li>
                        <a href="patient.php">Patient New</a>
                    </li>
                    <li>
                        <a href="pview.php">Patient List</a>
                    </li>
            
                </ul>
            </li>

                <li class=" mainlist">
                    <a href="inventory.php"><i class="fa-solid fa-clipboard-list pr-1"></i>
                    Inventory</a>
                </li>
          
                <li class="mainlist">
                <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-box-archive"></i> Archive</a>
                <ul class="collapse list-unstyled" id="pageSubmenu4">
                  
                    <li>
                        <a href="patArch.php">Patient</a>
                    </li>
                    <li>
                        <a href="userArch.php">User</a>
                    </li>   
            
                </ul>
            </li>

                <li class=" mainlist">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-prescription-bottle-medical pr-1"></i> Medicine</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="MEDLIST.php" >Medicine List</a>
                    </li>
                    <li>
                        <a href="ExpDateList.php">Expired List</a>
                    </li>
                    <li>
                        <a href="consumed.php">Consumed List</a>
                    </li>
            
                </ul>
            </li>
           
               <li class=" mainlist">
                    <a href="ADMIN.php"> <i class="fa-solid fa-id-badge pr-1"></i>User List</a>
                </li>
            </ul>

            <div class="row g-3 ml-2">
            <h6 class ="text-white fs-6  col-12"> <i class="fa-solid fa-id-card"></i> : <?= $_SESSION['IDno'];?></h6>
            <h6 class ="text-white fs-6  col-12"> <i class="fa-solid fa-user-doctor"></i> : <?= $_SESSION['FullName'];?></h6>
            </div>

        
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn shadow-none btnTogSN">
                        <i class="fas fa-align-left"></i>
                        
                    </button>

                   <div class="btn-group dropstart d-flex  ">
                            <div class="dropdown-centered">
                            <button class="btn btnset shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-sliders"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                           
                            <li><a class="dropdown-item" href="logout.php" type="button">Logout </a></li>
                            <li> <a class="dropdown-item" type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Settings</a></li> 
                            </ul>
                            </div>

                                </div>
            <!-- modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content ">
                        <form method="POST">
                        <div class="modal-header bg-success">
                       
                         <h5 class="modal-title fs-5" id="staticBackdropLabel">ENTER SY UPDATE CODE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-5">
                         <input type="PASSWORD" name="SYCODE" placeholder="Input SY CODE" class="form-control shadow-none mb-2  mt-3 rounded-5 " id="inputfn">
                                    </div>
                                    <div class="modal-footer">
                                    <button class="btn btn-success rounded-5 w-100 text-white" name="updatesy" type="submit">Submit</button>

                                    </div>
                                      </div>
                                     </div>
                                     </div>
                                     </form>
              

            </nav>

         <!-- ---------------------------------------CONTENT ------------------------------------------------------------------------------ -->
            <h2 class="mb-3 text-center"><span class="text-danger">N</span>EW <span class="text-danger">P</span>ATIENT </h2>
           
            <?php
                if(isset($_SESSION['AddMsg'])){

                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?php echo $_SESSION['AddMsg']; ?> </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset ($_SESSION['AddMsg']);
                }
                ?>

                <?php
                if(isset($_SESSION['tb'])){

                    ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong> <?php echo $_SESSION['tb']; ?> </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset ($_SESSION['tb']);
                }
                ?>

                
         <form class="row g-3 medadd" action="insertcode.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <label for="inputidno" class="form-label">ID Number</label>
                                <input type="text" name="id" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-8">
                                <label for="inputfn" class="form-label">Full Name</label>
                                <input type="text" name="fn" class="form-control shadow-none" required>
                            </div>

                            <div class="col-6">
                                <label for="pw" class="form-label">Section</label>
                                <input type="text" name="sec" class="form-control shadow-none"  required>
                            </div>
                           
                            <div class="col-2">
                                <label for="inputun" class="form-label">Age</label>
                                <input type="text" name="age" class="form-control shadow-none"  required>
                            </div>

                            <div class="col-4 ">
                                <label for="address" class="form-label">Contact</label>
                                <input type="text" name="cont" class="form-control shadow-none" required>
                            </div>

                        <!-- CODE FOR MEDS -->

                        <!-- MED 1 -->
                        <?php
                                $sql = "SELECT `id`,`dad`,`MedicineName`,`DateRecieved`, `ExpDate`, SUM(qty) `qty`, SUM(givento) `givento`,`status` FROM med_inventory WHERE `status` = 'NOT EXPIRED'  GROUP BY `MedicineName` ASC";
                                 $result = $con->query($sql); 

                           
                            ?>           
                            <div class="col-5">
                                <label for="inputfn" class="form-label">Generic Name </label>
                                <select name="gn" id="gn" onchange="fetchmed()" class="form-control shadow-none" required>
                                <option selected disabled>---</option>
                               
                                <?php
                                while($row = $result-> fetch_assoc()) {  
                                   $med = $row["MedicineName"];
                                
                                 
                                     ?>

                                     <option value="<?php echo $med; ?>"><?php  echo $med ?> </option>
                                     <?php
                                     }
   
                                     ?>
                                  </select>
                                    </div>
                                   

                            <div class="col-md-5">
                                
                                <label for="inputCons" class="form-label">Quantity</label>
                                <input type="text" name="qty" class="form-control shadow-none" required>
                            </div>
                           
                      <!-- MED 2 -->
                      <?php
                                $sql = "SELECT `id`,`dad`,`MedicineName`,`DateRecieved`, `ExpDate`, SUM(qty) `qty`, SUM(givento) `givento`,`status` FROM med_inventory WHERE `status` = 'NOT EXPIRED'  GROUP BY `MedicineName` ASC";
                                 $result = $con->query($sql); 

                           
                            ?>           
                            <div class="col-5">
                                <label for="inputfn" class="form-label"></label>
                                <select name="gn2" id="gn2" onchange="fetchmed()" class="form-control shadow-none" required>
                                <option selected disabled>---</option>
                               
                                <?php
                                while($row = $result-> fetch_assoc()) {  
                                   $med = $row["MedicineName"];
                                
                                 
                                     ?>

                                     <option value="<?php echo $med; ?>"><?php  echo $med ?> </option>
                                     <?php
                                     }
   
                                     ?>
                                  </select>
                                    </div>
                                   

                            <div class="col-md-5">
                                
                                <label for="inputCons" class="form-label"></label>
                                <input type="text" name="qty2" class="form-control shadow-none" required>
                            </div>
                    

                            <div class="modal-footer">
                            <button type="submit" name="addpatient" class="btn btn-success col-4 mt-4 ">Save</button>
                    

                            </div>
                        
                            </form>



                    
                                        
                           
         
         
        <!-- --------------------------------------- END CONTENT ------------------------------------------------------------------------------ -->

        </div>
        
    </div>
    <p class = "text-right top-100 sy"><?= $_SESSION['SchoolYear'];?></p>

    

    <!-- JS PLUGINS dont touch -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery3.6.min.js"></script>
    <!-- <script src="js/jquery.slim.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>
    <script src="js/mcs.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/solid.js"></script>
    <script src="js/fontawesome.js"></script>
  

   
    

</body>

</html>



<!-- 
might use later






                      
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Generic Name</label>
                                <select id="inputState" class="form-select shadow-none" name="sex" placeholder ="choose">
                                <option selected disabled>---</option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Brand Name</label>
                                <select id="inputState" class="form-select shadow-none" name="sex" placeholder ="choose">
                                <option selected disabled>---</option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                </select>
                            </div> -->
