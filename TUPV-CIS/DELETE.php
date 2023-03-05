<?php 
    include "connection.php";
    include 'session.php';

    $today = date('d-m-y');

    if (isset($_GET['delfa'])){

        $id2 = $_GET['idno'];
    $sql3 = "INSERT INTO userlist_archive(`IDno`,`FullName`,`Pass`,`Addr`,`ContactNo`,`Sex`,`Birthdate`,`Bloodtype`) SELECT  `IDno`,`FullName`,`Pass`,`Addr`,`ContactNo`,`Sex`,`Birthdate`,`Bloodtype` FROM newusertbl WHERE `IDno` = '$id2'";


        
    if($con->query($sql3) === TRUE){
    $id = $_GET['idno'];
    $sql = "DELETE FROM newusertbl WHERE `newusertbl`.`IDno` = '$id'";

    if ($con->query($sql) === TRUE) {
        $_SESSION['DeleteMsg'] = "Removed Successfully!";
        header('location: ADMIN.php');

    } else {
        echo "Unable to delete record.";
    }
}
}



?>


<?php
include "connection.php";

if (isset($_GET['delmed'])){
   
    $id = $_GET['id'];
    $sql = "DELETE FROM med_inventory WHERE `med_inventory`.`id` = '$id'";

  
    if ($con->query($sql) === TRUE) {
    
        $_SESSION['DeleteMsg'] = "Removed Successfully!";
        header('location: MEDLIST.php');

    } 
}

?>