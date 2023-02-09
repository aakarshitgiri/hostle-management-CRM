<?php
include 'config/config.php';

$m = date("F");
$y = date("Y");
$unpaid = 'Pending';
$paid='Paid';

$selectquery = " select * from student  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$Registration= $res['Registration'];
$Name = $res['Name'];
$seatno = $res['seatno'];
$rent = $res['Rent'];
$contact = $res['Scontact'];
$statusq = $res['status'];

$select = " select * from monthly where Registration='$Registration'";
$queryselect= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryselect);
if($numm>0){

    $select1 = " select * from monthly where Registration='$Registration' and year='$y' and month='$m' ";
    $queryselect1= mysqli_query($conn,$select1);
    $numm1= mysqli_num_rows($queryselect1);
    
    if($numm1>0){


    $selectpay = " select  * from payments where Registration='$Registration' and year='$y' and month='$m' and paystatus='$paid' ";
    $queryselect1= mysqli_query($conn,$selectpay);
    $num= mysqli_num_rows($queryselect1);
    
    if($num>0){
        $insertquery= "UPDATE monthly SET status='Paid' WHERE Registration='$Registration' AND year='$y' AND month='$m'";
        $res = mysqli_query($conn,$insertquery);
       

    }else{
        $insertquery= "UPDATE monthly SET status='Pending' WHERE Registration='$Registration' AND year='$y' AND month='$m'";
        $res = mysqli_query($conn,$insertquery);
      
    }
    
    }else{
    $insert = "insert into monthly(Registration, Name, contact, statusq, rent, seatno, year, month, status) values('$Registration','$Name','$contact','$statusq','$rent','$seatno','$y','$m','$unpaid') ";
    $resw = mysqli_query($conn,$insert);
   
    }
}else{
    $insert = "insert into monthly(Registration, Name, contact, statusq, rent, seatno, year, month, status) values('$Registration','$Name','$contact','$statusq','$rent','$seatno','$y','$m','$unpaid') ";
    $resw = mysqli_query($conn,$insert);
  
}

}




?>