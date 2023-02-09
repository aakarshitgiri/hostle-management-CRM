<?php 

require '../config/config.php';



     
$seatno			= $_GET['seatno'];




$insertquery= "DELETE FROM floor WHERE seatno='$seatno'";
$res = mysqli_query($conn,$insertquery);

if($res){
  header('Location: ../seats.php');


}  else {   ?>
  <script>
    alert("form submissin not working");
    </script>
    <?php

}




  



?>