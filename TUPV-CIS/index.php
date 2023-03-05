
  <?php
  include "connection.php";
  session_start();
  include "autoUpdate.php";

  

  if (isset($_POST['login'])) {
    $username = $_POST['ID'];
    $password = $_POST['Pass'];

    $sql = mysqli_query($con, "SELECT * FROM newusertbl WHERE IDno = '$username' AND Pass = '$password'");
    $sql2 = mysqli_query($con,"SELECT * FROM schoolyear");


    if ($sql->num_rows > 0) {
      while ($row = $sql->fetch_assoc()) {

        $_SESSION['FullName'] = $row['FullName'];
        $_SESSION['IDno'] = $row['IDno'];
      
        $_SESSION['Pass'] = $row['Pass'];
      
      }

      if ($sql2->num_rows > 0) {
        while ($row = $sql2->fetch_assoc()) {
          
          $_SESSION['SchoolYear'] = $row['SchoolYear'];
        
        
        }

      if($username == $_SESSION['IDno'] && $password == $_SESSION['Pass']){
        $_SESSION['IDno'] = $username;
        $_SESSION['FullName'];
        $_SESSION['SchoolYear'];
        
        header('location: dashboard.php');
      }else{
        echo "<script> alert('Incorrect Username or Password'); </script> ";
        // header('location: index.php');
        
      }

   
    }  else {
      
              ECHO "<script>alert('Incorrect ID or Password'); </script>";
     }

  }
  }

?>


<!DOCTYPE html>
<html>
<head>
  <title>LOGIN | TUPV-CIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap4.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="tupvlogo.png"
                          style="width: 175px;" alt="logo">
                        <!-- <h4 class="mt-1 mb-5 pb-1"></h4> -->
                      </div>
      

                      <form action="index.php" method="post">
                        <p class="title text-center mt-4">
                            Login to your account
                        </p>


                        <div class="form-input mb-6">
                            <span><i class="fa fa-envelope-o"></i></span>
                            <input type="text" name="ID" placeholder="Unique ID" tabindex="10" class="form-control shadow-none" required>
                          </div>
      
                          <div class="form-input mb-6">
                            <span><i class="fa fa-key"></i></span>
                            <input type="password" name="Pass" placeholder="Password" tabindex="10" class="form-control shadow-none" required>
                          </div>
      
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <input class="sbtn btn-block fa-lg gradient-custom-2 mb-3 p-3" type="submit" value="LOGIN" name="login">
<!-- 
                          <a class="text-muted" href="#!">Forgot Password</a> -->
                        </div>
      
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">Welcome to TUPV Clinic Inventory System</h4>
                      <p class="medium mb-0">HEE HEE </p>
                      <p>-Michael Jackson </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>
