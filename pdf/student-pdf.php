<?php
require '../config/config.php';
$selectquery = " SELECT * FROM student ORDER BY recorddate DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter="0";
$html='
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hostel Students</title>
	<style>
	*{text-align:center;
	font-size:12px;}
	
	</style>
</head>
<body>	
	<h1 style="font-size:20px;">Hostel Students</h1>';

	$html.= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';
	

	$html.= '<thead>
	<tr>
    <th>#</th>
    <th>Reg. No.</th>
    <th>Name</th> 
    <th>Contact</th>
    <th>Father Name</th>
    <th>Seat No.</th>
    <th>Room No.</th>
    <th>Seat type</th>
    <th>Room Type</th>
    <th>Rent</th>
    <th>Status</th>
  </thead>';

  while($res= mysqli_fetch_array($query))
  
  {
  
    $counter++;
	
  $html.= '<tbody>
                        



 

  <tr>
    <td>'.$counter.'</td>
	<td>'.$res['Registration'].'</td>
	<td>'.$res['Name'].'</td>
	<td>'.$res['Scontact'].'</td>
	<td>'.$res['fname'].'</td>
    <td>'.$res['seatno'].'</td>
    <td>'.$res['roomno'].'</td>
    <td>'.$res['seattype'].'</td>
    <td>'.$res['roomtype'].'</td>
	<td>'.$res['Rent'].'</td>
	<td>'.$res['status'].'</td>
	
  </tr>
   
</tbody>
';   


}
$html.= '</table>		
</body>
</html>';

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf= new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));

?>