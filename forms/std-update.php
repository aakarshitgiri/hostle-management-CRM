<?php 

require '../config/config.php';

if(isset($_POST['submit1'])){
 
  $Registration			= $_POST['regno'];
  $name       = $_FILES['file']['name'];  
  $temp_name  = $_FILES['file']['tmp_name'];  
$location = 'uploads/';  
if(move_uploaded_file($temp_name, $location.$name)){


     




$insertquery= "UPDATE student SET img='$name' WHERE Registration='$Registration'";
$res = mysqli_query($conn,$insertquery);

if($res){
  header('Location: ../student.php');


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






if(isset($_POST['submit'])){
 



  $Registration			= $_POST['regno'];
  
  
  $Name			= $_POST['name'];
  $fname			= $_POST['fname'];
  $Scontact			= $_POST['scontact'];
  $Fcontact				= $_POST['fcontact'];
  $Lgaurdian			= $_POST['lname'];
  $Lcontact			= $_POST['lcontact'];
  $occupation			= $_POST['occupation'];
  $study			= $_POST['study'];
  $institute			= $_POST['institute'];
  $adhar			= $_POST['adhar'];
  $dob			= $_POST['dob'];
  $address			= $_POST['address'];
  $seatno			= $_POST['seat'];
  $status = $_POST['status'];
  $Rent			= $_POST['rent'];
  $Security			= $_POST['smoney'];
  $Date			= $_POST['date'];

     
$selectquery = " select * from floor where seatno='$seatno'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$roomtype = $res['roomtype'];
$floor = $res['floor'];
$seattype = $res['seattype'];
$roomno = $res['roomno'];


}



$insertquery= "UPDATE student SET Name='$Name',fname='$fname',Scontact='$Scontact',status='$status',Fcontact='$Fcontact',Lgaurdian='$Lgaurdian',Lcontact='$Lcontact',occupation='$occupation',study='$study',institute='$institute',adhar='$adhar',dob='$dob',address='$address',seatno='$seatno',Rent='$Rent',Security='$Security',Date='$Date',roomtype='$roomtype',floor='$floor',seattype='$seattype',roomno='$roomno' WHERE Registration='$Registration'";
$res = mysqli_query($conn,$insertquery);

$insert= "UPDATE monthly SET Name='$Name',contact='$Scontact',statusq='$status',seatno='$seatno',rent='$Rent' WHERE Registration='$Registration'";
$res1 = mysqli_query($conn,$insert);

if($res){
  header('Location: ../student.php');


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




if(isset($_POST['submit2'])){
 



  $Registration			= $_POST['regno'];
  
  
 
$insertquery= "DELETE FROM student WHERE Registration='$Registration'";
$res = mysqli_query($conn,$insertquery);

$insertquery1= "DELETE FROM payments WHERE Registration='$Registration'";
$res1 = mysqli_query($conn,$insertquery1);

include '../config/config.php';

$selectquery = " select * from student where Registration='$Registration'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
$img = $res['img'];
$ifile = '/hostel-dashboard/forms/uploads/'. $img; 

unlink($_SERVER['DOCUMENT_ROOT'] .$ifile);
}

if($res and $res1){
  header('Location: ../student.php');


}  else {   ?>
  <script>
    alert("form submissin not working");
    </script>
    <?php

}









}





  






?>