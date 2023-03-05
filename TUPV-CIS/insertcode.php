<?php

include "connection.php";
include "session.php";


// $_SESSION['DeleteMsg'] = "Removed Successfully!";
// $_SESSION['UpdtMsg'] = "Updated Successfully!";


if(isset($_POST['insertbtn']))
{
  
    $idno = $_POST['idno'];
    $fname = $_POST['fn'];
    $pw = $_POST['pw']; 
    $addr = $_POST['addr'];
    $cont = $_POST['cont'];
    $sex = $_POST['sexs'];
    $bday = $_POST['dateofbirth'];
    $bt = $_POST['bt'];

    

    $query = "INSERT INTO newusertbl (`IDno`,`FullName`,`Pass`,`Addr`,`ContactNo`,`Sex`,`Birthdate`,`Bloodtype`) 
                                VALUES ('$idno','$fname','$pw','$addr','$cont','$sex','$bday','$bt')";

    $query_run = mysqli_query($con, $query);

     if($query_run)
    {
        $_SESSION['AddMsg'] = "Added Successfully!";
        header('Location: ADMIN.php');

        
    }
    else 
    {
        echo '<script> alert("Data Not Saved"); </script>';
       
    }
}




// ====================== ADD MEDICINE ================================

if(isset($_POST['addmed']))
{
    
    $today = date('y-m-d');
   
    $genname = $_POST['gn'];
    $dr = $_POST['dr'];
    $ed = $_POST['ed'];
    $des = $_POST['des'];

    $query = "INSERT INTO med_inventory (`dad`,`MedicineName`,`DateRecieved`,`ExpDate`,`qty`,`status`) 
                                VALUES ('$today','$genname','$dr','$ed','$des', 'NOT EXPIRED')";

    $query_run = mysqli_query($con, $query);

     if($query_run)
    {
        $_SESSION['AddMsg'] = "Added Successfully!";
        header('Location: MEDLIST.php');
    }
    else 
    {
        echo '<script> alert("Data Not Saved"); </script>';
       
    }
}





// ======================== ADD PATIENT ==============================


if(isset($_POST['addpatient']))
{
    $today = date('y-m-d');
   
    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $age = $_POST['age'];
    $cont = $_POST['cont'];
    $sec = $_POST['sec'];
    $gn = $_POST['gn'];
    $qty = $_POST['qty'];
    $gn2 = $_POST['gn2'];
    $qty2 = $_POST['qty2'];
   

    $sql = "SELECT * FROM schoolyear";
    $result = $con->query($sql);


   
    while($row = $result-> fetch_assoc()){
            $sy = $row["SchoolYear"];
    }

    // MED 1

    $sql2 = "SELECT `qty` FROM med_inventory WHERE MedicineName = '$gn' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1;";
     $result2 = $con->query($sql2);
     
    while($row = $result2-> fetch_assoc()){
        $tbqty = $row["qty"];
}

     $sql23 = "SELECT `qty` FROM med_inventory WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate DESC LIMIT 1;";
     $result23 = $con->query($sql23);

 
    while($row = $result23-> fetch_assoc()){
            $tbqty23 = $row["qty"];
    }


 

    
    if ($qty > $tbqty ){
        $_SESSION['tb'] = "This much quantity is not available on 1st medicine";
        header('Location: patient.php');
    }
    elseif($qty2 > $tbqty23){
        $_SESSION['tb'] = "This much quantity is not available on 2nd medicine";
        header('Location: patient.php');
    }

    else{
    // patient database

    $query = "INSERT INTO patient (`da`,`time`,`uniqueID`,`FullName`,`Age`,`Contact`,`section`,`genname`,`qty`,`sy`) 
                                 VALUES ('$today',CURRENT_TIME(),'$id','$fn','$age','$cont','$sec','$gn','$qty','$sy')";
    // medicine list

    $query2 = "UPDATE med_inventory SET givento = givento + '$qty' WHERE MedicineName = '$gn' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1";
    $query3 = "UPDATE med_inventory SET qty = qty - '$qty' WHERE MedicineName = '$gn' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1";

   
    $query_run = mysqli_query($con, $query);
    $query_run2 = mysqli_query($con, $query2);
    $query_run3 = mysqli_query($con, $query3);

     if($query_run3 && $query_run2 )
    {
        $_SESSION['AddMsg'] = "Added Successfully!";
        header('Location: patient.php');
    }
    else 
    {
        echo '<script> alert(Data Not Saved); </script>';
       
    }


    // MED 2 /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    if($gn === $gn2){
        $sql2 = "SELECT `qty` FROM med_inventory WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate DESC LIMIT 1;";
        $result2 = $con->query($sql2);
   
    
       while($row = $result2-> fetch_assoc()){
               $tbqty2 = $row["qty"];
       }
   
       
       if ($qty > $tbqty ){
        $_SESSION['tb'] = "This much quantity is not available on 1st medicine";
        header('Location: patient.php');
    }
    elseif( $qty2 > $tbqty2){
        $_SESSION['tb'] = "This much quantity is not available on 2st medicine";
        header('Location: patient.php');
    }
   
       else{
       // patient database
   
       $query = "INSERT INTO patient (`da`,`genname`,`qty`,`sy`) 
                                    VALUES ('$today','$gn2','$qty2','$sy')";
       // medicine list
   
       $query2 = "UPDATE med_inventory SET givento = givento + '$qty2' WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate DESC LIMIT 1";
       $query3 = "UPDATE med_inventory SET qty = qty - '$qty2' WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY DESC ASC LIMIT 1";
   
      
       $query_run = mysqli_query($con, $query);
       $query_run2 = mysqli_query($con, $query2);
       $query_run3 = mysqli_query($con, $query3);
   
        if($query_run3 && $query_run2 )
       {
           $_SESSION['AddMsg'] = "Added Successfully!";
           header('Location: patient.php');
       }
       else 
       {
           echo '<script> alert(Data Not Saved); </script>';
          
       }
   
   }


    }
    else{
    $sql2 = "SELECT `qty` FROM med_inventory WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1;";
     $result2 = $con->query($sql2);

 
    while($row = $result2-> fetch_assoc()){
            $tbqty2 = $row["qty"];
    }

    
    if ($qty > $tbqty ){
        $_SESSION['tb'] = "This much quantity is not available on 1st medicine";
        header('Location: patient.php');
       
    }
    elseif( $qty2 > $tbqty2){
        $_SESSION['tb'] = "This much quantity is not available on 2st medicine";
        header('Location: patient.php');
    }

    else{
    // patient database

    $query = "INSERT INTO patient (`da`,`genname`,`qty`,`sy`) 
                                 VALUES (`$today`,'$gn2','$qty2','$sy')";
    // medicine list

    $query2 = "UPDATE med_inventory SET givento = givento + '$qty2' WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1";
    $query3 = "UPDATE med_inventory SET qty = qty - '$qty2' WHERE MedicineName = '$gn2' AND `status` = 'NOT EXPIRED' ORDER BY ExpDate ASC LIMIT 1";

   
    $query_run = mysqli_query($con, $query);
    $query_run2 = mysqli_query($con, $query2);
    $query_run3 = mysqli_query($con, $query3);

     if($query_run3 && $query_run2 )
    {
        $_SESSION['AddMsg'] = "Added Successfully!";
        header('Location: patient.php');
    }
    else 
    {
        echo '<script> alert(Data Not Saved); </script>';
       
    }

}
    }











}
}


?>
