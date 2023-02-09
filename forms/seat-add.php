<?php 

require '../config/config.php';
if(isset($_POST['submit'])){
 

 
  $floor			= $_POST['floor'];
  $roomno			= $_POST['room'];
  $seatno			= $_POST['seat'];
  $seattype			= $_POST['tseat'];
  $roomtype			= $_POST['troom'];
  $status			= $_POST['status'];

  
     



$insertquery= "insert into floor(floor, roomno, seatno, seattype, roomtype, status) values('$floor','$roomno','$seatno','$seattype','$roomtype','$status')";
$res = mysqli_query($conn,$insertquery);

if($res){
  header('Location: ../seats.php');


}  else {   ?>
  <script>
    alert("form submissin not working");
    </script>
    <?php



}






  
}
else{
  ?>
  <script>
    alert("submit not working");
    </script>
    <?php
}

?>