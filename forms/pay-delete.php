<?php
require '../config/config.php';

 $ID			= $_GET['ID'];

 $insertquery= "DELETE FROM payments WHERE ID='$ID'";
 $res = mysqli_query($conn,$insertquery);
 if($res){

    header('Location: ../payments.php');

 }else{
     echo "not working";
 }


?>