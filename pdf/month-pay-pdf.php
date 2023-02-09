<?php
require '../config/config.php';
$year			= $_GET['year'];
$month			= $_GET['month'];
$selectquery = " select * from payments where year='$year' AND month='$month' AND paystatus='Paid'   ORDER BY recorddate DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$html='
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>'.$month.','.$year.' Payments</title>
	<style>
	*{text-align:center;
	font-size:12px;}
	
	</style>
</head>
<body>	
	<h1 style="font-size:20px;">'.$month.','.$year.' Payments</h1>';

	$html.= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';
	

	$html.= '<thead>
	<tr>
   
	  <th> Reg. No. </th>
	  <th> Name </th>
  
	  <th> Rent </th>
	  <th> Mode </th>
	<th> Type </th>
	  <th> Year </th>
	  <th> Month </th>
	  <th>Paid Date </th>
	  <th>Status </th>
	</tr>
  </thead>';

  while($res= mysqli_fetch_array($query))

	{


	
  $html.= '<tbody>
                        



 

  <tr>
   
	<td>'.$res['Registration'].'</td>
	<td>'.$res['Name'].'</td>
	<td>'.$res['rent'].'</td>
	<td>'.$res['pmode'].'</td>
  <td>'.$res['ptype'].'</td>
	<td>'.$res['year'].'</td>
	<td>'.$res['month'].'</td>
	<td>'.$res['date'].'</td>
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