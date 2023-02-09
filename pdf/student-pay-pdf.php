<?php
require '../config/config.php';
$Registration			= $_GET['Registration'];
$Name			= $_GET['Name'];
$Scontact			= $_GET['Scontact'];
$selectquery = " select * from payments where Registration='$Registration'  ORDER BY recorddate DESC";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter="0";
$html='
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>'.$Name.' All Payments</title>
	<style>
	*{text-align:center;
	font-size:12px;}
	
	</style>
</head>
<body>	
	<h1 style="font-size:20px;">'.$Name.' Payments (Contact: '.$Scontact.')</h1>';

	$html.= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';
	

	$html.= '<thead>
	<tr>
    <th>#</th>
    <th> Reg. No. </th>
    <th> Name </th>

    <th> Rent </th>
    <th> Mode </th>
  <th> Type </th>
    <th> Year </th>
    <th> Month </th>
    <th>Paid Date </th>
    <th>Status</th>
    <th> Payment Status </th>
  </thead>';

  while($res= mysqli_fetch_array($query)){

$counter++;

	
  $html.= '<tbody>
                        



 

  <tr>
  <td>'.$counter.'</td>
	<td>'.$res['Registration'].'</td>
	<td>'.$res['Name'].'</td>
	<td>'.$res['rent'].'</td>
	<td>'.$res['pmode'].'</td>
  <td>'.$res['ptype'].'</td>
	<td>'.$res['year'].'</td>
	<td>'.$res['month'].'</td>
	<td>'.$res['date'].'</td>
    <td>'.$res['status'].'</td>
	<td>'.$res['paystatus'].'</td>
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