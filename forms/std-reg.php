<?php 

require '../config/config.php';


$name       = "null";  
$temp_name  = "null";  
$pendingr1 = "null";
$pendingr2 = "null";
$pendingr3 = "null";
$adhar			= "null";
$Lgaurdian = "null";
$Lcontact = "null";
$occupation = "null";
$study = "null";
$institute = "null";
$rent1 = "null";

$year1       = "null";  
$month1  = "null";  
$date1 = "null";
$pmode2 = "null";
$pmode1 = "null";
$rent2			= "null";
$year2 = "null";
$month2 = "null";
$date2 = "null";
$rent3 = "null";
$year3 = "null";
$month3 = "null";
$date3 = "null";
$pmode3 = "null";
















if(isset($_POST['submit'])){
 




  $name       = $_FILES['file']['name'];  
  $temp_name  = $_FILES['file']['tmp_name'];  
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
  $email			= $_POST['email'];
  $whatsapp			= $_POST['whatsapp'];
  $Rent			= $_POST['rent'];

  $Date			= $_POST['date'];

  $rent2			= $_POST['rent2'];
  $year2			= $_POST['year2'];
  $month2			= $_POST['month2'];
  $date2			= $_POST['date2'];
  $mode2			= $_POST['mode2'];
  $pendingr1			= $_POST['pending1'];

  $rent1			= $_POST['rent1'];
  $year1			= $_POST['year1'];
  $month1			= $_POST['month1'];
  $date1			= $_POST['date1'];
  $mode1			= $_POST['mode1'];
  $pendingr2			= $_POST['pending2'];

  $rent3			= $_POST['rent3'];
  $year3			= $_POST['year3'];
  $month3			= $_POST['month3'];
  $date3			= $_POST['date3'];
  $mode3			= $_POST['mode3'];
  $pendingr3			= $_POST['pending3'];

  $q1			= $_POST['q1'];
  $q2			= $_POST['q2'];
  $q3			= $_POST['q3'];
  $paid = "Paid";
  $unpaid = "Pending";

$ptype1 = "1st Advance";
$ptype2 = "2nd Advance";


 


$selectquery = " select * from floor where seatno='$seatno'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$roomtype = $res['roomtype'];
$floor = $res['floor'];
$seattype = $res['seattype'];
$roomno = $res['roomno'];


}



$insertquery= "insert into student(Registration, Name, email,whatsapp, fname, Scontact, Fcontact, Lgaurdian, Lcontact, occupation, study, institute, adhar, dob, address, seatno, Rent, Date, img, roomtype, floor, seattype, roomno) values('$Registration','$Name','$email','$whatsapp','$fname','$Scontact','$Fcontact','$Lgaurdian', '$Lcontact','$occupation','$study','$institute','$adhar','$dob','$address','$seatno','$Rent','$Date','$name','$roomtype','$floor','$seattype','$roomno' )";
$res = mysqli_query($conn,$insertquery);

$name       = $_FILES['file']['name'];  
$temp_name  = $_FILES['file']['tmp_name'];  
$location = 'uploads/';  
if(move_uploaded_file($temp_name, $location.$name)){
$insertquery= "insert into student(img) values('$name') where Registration='$Registration'";
$res = mysqli_query($conn,$insertquery);
}


if($q1=="Yes"){
$insertquery1= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode) values('$Registration','$address','$fname','$Name','$paid','$seatno','$rent1','$pendingr1','$year1','$month1','$date1','$mode1')";
$res7 = mysqli_query($conn,$insertquery1);

}else if($q1=="No"){
  $insertquery4= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode) values('$Registration','$address','$fname','$Name','$unpaid','$seatno','$rent1','$pendingr1','$year1','$month1','$date1','$mode1')";
$res4 = mysqli_query($conn,$insertquery4);
}


if($q2=="Yes"){
$insertquery2= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode, ptype) values('$Registration','$address','$fname','$Name','$paid','$seatno','$rent2','$pendingr2','$year2','$month2','$date2','$mode2','$ptype1')";
$res2 = mysqli_query($conn,$insertquery2);
}

else if($q2=="No"){
  $insertquery5= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode, ptype) values('$Registration','$address','$fname','$Name','$unpaid','$seatno','$rent1','$pendingr1','$year1','$month1','$date1','$mode1','$ptype1')";
$res5 = mysqli_query($conn,$insertquery5);
}


if($q3=="Yes"){
$insertquery3= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode, ptype) values('$Registration','$address','$fname','$Name','$paid','$seatno','$rent3','$pendingr3','$year3','$month3','$date3','$mode3','$ptype2')";
$res3 = mysqli_query($conn,$insertquery3);
}

else if($q3=="No"){
  $insertquery6= "insert into payments(Registration, address, fname, Name, paystatus, seatno, rent, pendingr, year, month, date, pmode, ptype) values('$Registration','$address','$fname','$Name','$unpaid','$seatno','$rent1','$pendingr1','$year1','$month1','$date1','$mode1','$ptype2')";
$res6 = mysqli_query($conn,$insertquery6);
}



  header('Location: ../sms/welcome.php?name='.$Name.'&contact='.$Scontact);






}


  

else{
  ?>
  <script>
    alert("submit not working");
    </script>
    <?php
}

?>