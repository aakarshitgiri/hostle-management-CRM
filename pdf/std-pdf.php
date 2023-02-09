
<?php
require '../config/config.php';
$Registration			= $_GET['Registration'];
$Name			= $_GET['Name'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

$html='
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  grid-area: header;
  background-color: #f1f1f1;
  padding: 5px;
  text-align: center;
  font-size:20px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas: 
    "header header header header header header" 
    "left left middle middle right right" 
    "footer footer footer footer footer footer";
  /* grid-column-gap: 10px; - if you want gap between the columns */
} 

.left,

.right {
  padding: 10px;
  margin: 5px;
  width:600px;
  height: fit-content; /* Should be removed. Only for demonstration */
}

/* Style the left column */
.left {
  grid-area: left;
}




/* Style the right column */
.right {
  grid-area: right;
}


table, th, td {
  border: 1px solid black;
}

table {
  width: 100%;
}


</style>
</head>

  <div class="header">
    <h2>Royal Boys Hostel</h2>
  </div>';

	$html.= '
    
   ';
  
$html.='
<h4>Student Personal Details</h4>
    
    <table border="1" cellpadding="10" cellspacing="0" width="100%">';
	

	$html.= '<thead>
	<tr>
   
    <th>Details</th>
    <th>Student Details</th>
	</tr>
  </thead>';
  $selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

  while($res= mysqli_fetch_array($query))
  {

	
  $html.= '<tbody>
                        



 

  <tr>
  <td>Reg. No.</td>
  <td>'.$res['Registration'].'</td>
</tr>
  <tr>
  <td>Full Name</td>
  <td>'.$res['Name'].'</td>
</tr>
  <tr>
  <td>Father Name</td>
  <td>'.$res['fname'].'</td>
</tr>
  <tr>
  <td>Date of Birth</td>
  <td>'.$res['dob'].'</td>
</tr>
  <tr>
  <td>Aadhar No.</td>
  <td>'.$res['adhar'].'</td>
</tr>
  <tr>
  <td>Study</td>
  <td>'.$res['Name'].'</td>
</tr>
<tr>
  <td>Institute</td>
  <td>'.$res['institute'].'</td>
</tr>
<tr>
  <td>Father Occupation</td>
  <td>'.$res['occupation'].'</td>
</tr>
   
</tbody>
';   


}
$html.= '</table>



  <h4>Student Hostel Details</h4>
  <table border="1" cellpadding="10" cellspacing="0" width="100%">';
  $html.= '<thead>
  <tr>
  <th>Details</th>
  <th>Student Details</th>

</tr>
  </thead>';
  $selectquery = " select * from student where Registration='$Registration' ";
  $query= mysqli_query($conn,$selectquery);
  $num= mysqli_num_rows($query);
  
    while($res= mysqli_fetch_array($query))
    {
  
  
$html.= '<tbody>
                      




<tr>
<td>Room Type</td>
<td>'.$res['roomtype'].'</td>
</tr>
<tr>
<td>Floor No.</td>
<td>'.$res['floor'].'</td>
</tr>
<tr>
<td>Room No.</td>
<td>'.$res['roomno'].'</td>
</tr>
<tr>
<td>Seat No.</td>
<td>'.$res['seatno'].'</td>
</tr>
<tr>
<td>Seat Type</td>
<td>'.$res['seattype'].'</td>
</tr>
<tr>
<td>Rent</td>
<td>'.$res['Rent'].'</td>
</tr>
<tr>
<td>Date</td>
<td>'.$res['Date'].'</td>
</tr>
<tr>
<td>Security Deposit</td>
<td>'.$res['Security'].'</td>
</tr>
 
</tbody>
';   


}

$html.= '</table>


 <br><br><br>
  <h4>Student Contact Details</h4>
  <table border="1" cellpadding="10" cellspacing="0" width="100%">';
  $html.= '<thead>
  <tr>
  <th>Details</th>
  <th>Student Details</th>

</tr>
  </thead>';
  $selectquery = " select * from student where Registration='$Registration' ";
  $query= mysqli_query($conn,$selectquery);
  $num= mysqli_num_rows($query);
  
    while($res= mysqli_fetch_array($query))
    {
  
  
$html.= '<tbody>
                      



<tr>
<td>Student Contact</td>
<td>'.$res['Scontact'].'</td>
</tr>
<tr>
<td>Student Email</td>
<td>'.$res['email'].'</td>
</tr>
<tr>
<td>Student Whatsapp</td>
<td>'.$res['whatsapp'].'</td>
</tr>
<tr>
<td>Father Contact</td>
<td>'.$res['Fcontact'].'</td>
</tr>
<tr>
<td>Local Gaurdian</td>
<td>'.$res['Lgaurdian'].'</td>
</tr>
<tr>
<td>Gaurdian Contact</td>
<td>'.$res['Lcontact'].'</td>
</tr>
<tr>
<td>Address</td>
<td>'.$res['address'].'</td>
</tr>
 
</tbody>
';   


}

$html.='</table>
</div>
</div>';


$html.='<h1 style="font-size:20px;">Monthly Payments</h1>';

$html.= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';


$html.= '<thead>
<tr>
 
<th> Date</th>
<th> Month</th>
<th> Year</th>
<th> Rent </th>
<th> Mode </th>
<th> Type </th>
<th> Pending </th>
<th> Status </th>
</tr>
</thead>';

$select = " select * from payments where Registration='$Registration' AND ptype='Monthly' ";
$queryselect= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryselect);
while($ress= mysqli_fetch_array($queryselect)){



$html.= '<tbody>
                      





<tr>
 
                          <td >'.$ress['date'].'</td>
                          <td>'.$ress['month'].'</td>
                          <td>'.$ress['year'].'</td>
                          <td>'.$ress['rent'].'</td>
                          <td>'.$ress['pmode'].'</td>
                          <td>'.$ress['ptype'].'</td>
                          <td>'.$ress['pendingr'].'</td>
                          <td>'.$ress['paystatus'].'</td>
</tr>
 
</tbody>
';   


} 
$html.='</table> <br><br>';

$html.='<h1 style="font-size:20px;">Advance Payments</h1>';

$html.= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';


$html.= '<thead>
<tr>
 
<th> Date</th>
<th> Month</th>
<th> Year</th>
<th> Rent </th>
<th> Mode </th>
<th> Type </th>
<th> Pending </th>
<th> Status </th>
</tr>
</thead>';

$select = " select * from payments where Registration='$Registration' AND ptype='1st Advance' or ptype='2nd Advance'";
$queryselect= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryselect);
while($ress= mysqli_fetch_array($queryselect)){



$html.= '<tbody>
                      





<tr>
 
                          <td >'.$ress['date'].'</td>
                          <td>'.$ress['month'].'</td>
                          <td>'.$ress['year'].'</td>
                          <td>'.$ress['rent'].'</td>
                          <td>'.$ress['pmode'].'</td>
                          <td>'.$ress['ptype'].'</td>
                          <td>'.$ress['pendingr'].'</td>
                          <td>'.$ress['paystatus'].'</td>
</tr>
 
</tbody>
';   


} 
$html.='</table><br><br>';
$html.='</body>
</html>';

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf= new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream($Name,array("Attachment"=>0));



?>