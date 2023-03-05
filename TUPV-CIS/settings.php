<?php
       include 'connection.php';
       include 'session.php';

   
       $sql = "SELECT * FROM schoolyear ";
       $result = $con->query($sql);
       $field = $result->fetch_assoc();
      
       if (isset($_POST['updatesy'])) {
            $id = $_POST['id'];
            $yyyy = $_POST['yyyy'];
            $yy = $_POST['yy'];
          

           
                    
     $sql2 = "UPDATE schoolyear SET `SchoolYear` = 'SY:' '$yyyy' '-' '$yy' WHERE id ='$id'";

        $sql3 = "INSERT INTO patientArchive(`da`,`time`,`uniqueID`,`FullName`,`Age`,`Contact`,`section`,`genname`,`qty`,`sy`) SELECT `da`,`time`,`uniqueID`,`FullName`,`Age`,`Contact`,`section`,`genname`,`qty`,`sy` FROM patient";
        
        if($con->query($sql3) === TRUE && $con->query($sql2) === TRUE){
                $query = "DELETE FROM patient";
                $result = $con->query($query);

                header('location:logout.php');
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

    <title>UPDATE SY | ADMIN | TUPV-CIS</title>


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
   
  <style>
    .center {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
      

    }
  </style>
     
</head>

<body style="background: #c51a3a;">




<div class="center bg-light rounded-4 ">
<a href="dashboard.php" name="insertbtn" class="btn btn-danger mt-3 ml-3"><i class="fa-solid fa-arrow-left pr-1"></i></a>
                       
    <div class = "p-5 pt-2">
    
    <form action="" method="post">
      
        <h5  class="form-label">UPDATE SCHOOL YEAR</h5>
        <div class="row">
            
        <input type="hidden" name = "id" value="<?php echo $field['id'];?>">
            <div class="col-2 text-center">
            <h2> SY: </h2>
            </div>

            <div class="col-4">
                 <input type="text" name="yyyy" placeholder="YYYY" maxlength="4" class="form-control shadow-none mb-3 rounded-5 " id="inputfn">   
                 </div>

                    <div class="col-1 text-center">
                <h2>-</h2>
                </div>

            <div class="col-4 ">   
                <input type="text" name="yy" placeholder="YY" maxlength="2" class="form-control shadow-none mb-3 rounded-5 " id="inputfn">
            </div>
       
     
        </div>
       
        <button class="btn btn-danger rounded-5 w-100 text-white" name="updatesy" type="submit">Submit</button>
  
                        </button>
    </form>
    </div>
</div>








<!--  FUTURE FEATURE AFTER UPDATE ARCHIVE STUDENT PATIENT FROM THE LIST-->



    <!-- JS PLUGINS dont touch -->
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap4.min.js"></script>
    <script src="js/mcs.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/solid.js"></script>
    <script src="js/fontawesome.js"></script>
   
   
    

</body>

</html>



<!-- dump









                        .'<button type="button" class="btn btn-danger shadow-none m-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">'
                        .'<i class="fa-solid fa-eraser "></i>'
                        .'</button>'



    
<button type="button" class="btn btn-danger rounded-5 w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                 UPDATE


                          <div class="modal fade " id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header bg-dark">
                         <h5 class="modal-title fs-5" id="staticBackdropLabel">   ENTER SY UPDATE CODE   </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                    
                                     <input type="PASSWORD" name="SYCODE" placeholder="Input SY CODE" class="form-control shadow-none mb-2  mt-3 rounded-5 " id="inputfn">
                                    </div>
                                    <div class="modal-footer">
                                  
                                    
                                    </div>
                                      </div>
                                     </div>
                                     </div>




-->