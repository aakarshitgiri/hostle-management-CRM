<?php



 
include '../config/config.php';


 $Registration			= $_GET['Registration'];

 
 $selectquery = " select * from student where Registration='$Registration'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
$img = $res['img'];
$ifile = '/hostel-dashboard/forms/uploads/'. $img; 

unlink($_SERVER['DOCUMENT_ROOT'] .$ifile);
}
 

$insertquery= "DELETE FROM student WHERE Registration='$Registration'";
$res = mysqli_query($conn,$insertquery);

$insertquery1= "DELETE FROM payments WHERE Registration='$Registration'";
$res1 = mysqli_query($conn,$insertquery1);

$insertquery2= "DELETE FROM monthly WHERE Registration='$Registration'";
$res2 = mysqli_query($conn,$insertquery2);




if($res and $res1){
 header('Location: ../student.php');


} 

