<?php 

require '../config/config.php';
$pendingr = "null";
if(isset($_POST['submit'])){
 

 
  $Registration			= $_POST['reg'];
  $Name			= $_POST['name'];
  
  $seatno			= $_POST['seat'];
  $rent			= $_POST['rent'];
  $pendingr			= $_POST['pending'];
  $year			= $_POST['year'];
  $month			= $_POST['month'];
  $date			= $_POST['date'];
  $pmode			= $_POST['pmode'];
  $ptype			= $_POST['ptype'];
  $paid = "Paid";
  

  $selectquery = " SELECT * FROM payments WHERE Registration='$Registration' AND month='$month' AND year='$year' AND paystatus='Pending' AND ptype='$ptype' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$res2= mysqli_fetch_array($query);
$ID = $res2['ID'];
if($num>0){
  $insertquery1= "DELETE FROM payments WHERE Registration='$Registration' AND month='$month' AND year='$year' AND paystatus='Pending' AND ptype='$ptype'";
$res1 = mysqli_query($conn,$insertquery1);
}   


$selectquery = " SELECT * FROM student WHERE Registration='$Registration'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
$fname = $res['fname'];
$address = $res['address'];
     



$insertquery= "insert into payments(ID, Registration, address, fname, Name, paystatus, ptype, pmode, seatno, rent, pendingr, year, month, date) values('$ID','$Registration',;$address','$fname','$Name','$paid','$ptype','$pmode','$seatno','$rent','$pendingr','$year','$month','$date')";
$res = mysqli_query($conn,$insertquery);



if($res){
  header('Location: ../payments.php');


}  else {   ?>
  <script>
    alert("form submissin not working");
    </script>
    <?php



}


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