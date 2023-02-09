<?php
require '../config/config.php';
$pending = "null";
$pmode			= "null";
$Rent			= "null";
if(isset($_POST['submit'])){
 



 $ID			= $_GET['ID'];
 $Registration			= $_POST['reg'];
 $Name			= $_POST['name'];
 $fname			= $_POST['fname'];
 $seatno			= $_POST['seat'];

 $Rent			= $_POST['rent'];
 $pending			= $_POST['pending'];
 $year			= $_POST['year'];
 $month			= $_POST['month'];
 $Date			= $_POST['date'];
 $pmode			= $_POST['pmode'];
 $ptype			= $_POST['ptype'];

 $selectquery = " SELECT * FROM student WHERE Registration='$Registration'";
 $query= mysqli_query($conn,$selectquery);
 $num= mysqli_num_rows($query);
 
 while($res= mysqli_fetch_array($query)){
 $fname = $res['fname'];
 $address = $res['address'];



$insertquery= "UPDATE payments SET Registration='$Registration',address='$address',fname='$fname',Name='$Name',seatno='$seatno',rent='$Rent',pendingr='$pending',year='$year',month='$month',date='$Date',pmode='$pmode',ptype='$ptype' WHERE ID='$ID'";
$res = mysqli_query($conn,$insertquery);


 }


if($res){
 header('Location: ../payments.php');


}  
 
}





if(isset($_POST['submit1'])){
  $ID			= $_GET['ID'];
$selectquery = " SELECT * FROM payments WHERE ID='$ID' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$res= mysqli_fetch_array($query);
  $registration= $res['Registration'];
  $year = $res['year'];
  $month = $res['month'];


$insertquery1= "DELETE FROM monthly WHERE Registration='$registration' AND year='$year' AND month='$month'";
$res1 = mysqli_query($conn,$insertquery1);

if($res1){
  header('Location: pay-delete.php?ID='.$ID);

}else{
  echo "not working";
}









}





 






?>