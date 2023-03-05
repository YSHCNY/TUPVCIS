
<?php
    include 'connection.php';
   include 'session.php';
    

    $queryId = $_GET['idno'];
    $sql = "SELECT * FROM newusertbl WHERE IDno = '$queryId'";
    $result = $con->query($sql);
    $field = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $id = $_POST['IDno'];
        $fn = $_POST['FullName'];
  
        $pw = $_POST['Pass'];
        $addr = $_POST['Addr'];
        $cont = $_POST['ContactNo'];
        $sex = $_POST['Sex'];
        $bday = $_POST['Birthdate'];
        $bt = $_POST['Bloodtype'];
       
        $sql = "UPDATE newusertbl SET IDno='$id', FullName='$fn', Pass='$pw', Addr='$addr', ContactNo='$cont', Sex='$sex', Birthdate='$bday', Birthdate='$bday', Bloodtype='$bt' WHERE IDno ='$id'";

        if ($con->query($sql) === TRUE) {
            header('location:ADMIN.php');

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

    <title>ADMIN | TUPV-CIS</title>


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
                   <a href="ADMIN.php"> <i class="fa-solid fa-arrow-left pr-1"></i>
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
                        <form class="row g-3 editform" action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="inputidno" class="form-label">ID Number</label>
                                <input type="text" name="IDno" class="form-control fcedit shadow-none" value="<?php echo $field['IDno'];?>">
                            </div>

                            <div class="col-md-6">
                                <label for="inputfn" class="form-label">Full Name</label>
                                <input type="text" name="FullName" class="form-control fcedit shadow-none" value="<?php echo $field['FullName'];?>">
                            </div>

                    

                            <div class="col-6">
                                <label for="pw" class="form-label">Password</label>
                                <input type="Password" name="Pass" class="form-control fcedit shadow-none" value="<?php echo $field['Pass'];?>">
                            </div>

                        

                            <div class="col-12 ">
                                <label for="address" class="form-label">Address</label>
                                <input type="address" name="Addr" class="form-control fcedit shadow-none" value="<?php echo $field['Addr'];?>">
                            </div>
    

                            <div class="col-md-4">
                                <label for="inputCons" class="form-label">Contact</label>
                                <input type="text" name="ContactNo" class="form-control fcedit shadow-none" value="<?php echo $field['ContactNo'];?>">
                            </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Sex</label>
                                <select id="inputState" class="form-select shadow-none" name="Sex" placeholder ="choose" value="<?php echo $field['Sex'];?>">
                                <option selected disabled ><?php echo $field['Sex'];?></option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputbt" class="form-label">Bloodtype</label>
                                <input type="text" name="Bloodtype" class="form-control fcedit shadow-none" value="<?php echo $field['Bloodtype'];?>">
                            </div>

                            <!-- UPLOAD IMAGE -->
                            <div class="col-md-6">
                            <label for="date" >Upload image</label>
                            <input type="hidden" name="size" value="1000000">
                                <input type="file" name="Image" class="form-control shadow-none fs-7"/>              
                            </div>         
                            
                            <div class="col-md-4">
                            <div class="form-group mb-3">
                            <label for="date" >Date</label>
                                <input type="date" name="Birthdate" class="form-control fcedit shadow-none" value="<?php echo $field['Birthdate'];?>"/>
                                     
                            </div>                
                         </div>
                      

                            <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-success col-3">Save</button>
                          
                            </div>
                            
                        
                            </form>

                    

                            <H1 class = "text-center mt-1 sy"><?= $_SESSION['SchoolYear'];?></H1>
         
         
        <!-- --------------------------------------- END CONTENT ------------------------------------------------------------------------------ -->

        </div>
    </div>

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



