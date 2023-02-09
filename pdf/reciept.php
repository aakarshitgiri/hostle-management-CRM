<?php

require '../config/config.php';

 $ID			= $_GET['ID'];
 
 $selectquery = " select * from payments where paystatus='Paid' and ID='$ID'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
$date = $res['date'];

$html='<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Royal Boys Hostel</title>
	
</head>
<body>
<table width="100%">
	
		<tr>
			<td style="font-weight:bold;">Reciept No. : '.$res['ID'].'<br>Date :'.$res['date'].'</td>
			
			<td style="text-align:right; font-weight:bold;">Phone : 0522-2200440, 2200884<br/>Mobile: 9838478720</td>
		</tr>
	</table>	
    <div style="text-align:center;">	
	<h1 style="font-size:40px; margin-bottom: -15px;">Royal Boys Hostel</h1>
	<p style="margin-bottom: 15px;">Naval Kishore Road, Hazratganj, Lucknow</p>
	</div>
	<table border="1" cellpadding="10" cellspacing="0" width="100%">
		
		<tr>
		
			<td style="font-weight:bold;">Registration No.</td>
			<td style="font-weight:bold;">'.$res['Registration'].'</td>
		</tr>
		<tr>
		
			<td style="font-weight:bold;">Seat No.</td>
			<td style="font-weight:bold;">'.$res['seatno'].'</td>
		</tr>
		<tr>
		
			<td style="font-weight:bold;">Name</td>
			<td style="font-weight:bold;">'.$res['Name'].'</td>
		</tr>
		<tr>
	
			<td style="font-weight:bold;">Father Name</td>
			<td style="font-weight:bold;">'.$res['fname'].'</td>
		</tr>
		
		<tr>
		
			<td style="font-weight:bold;">Address</td>
			<td style="font-weight:bold;">'.$res['address'].'</td>
		</tr>
			
		<tr>
		
			<td style="font-weight:bold;">Month</td>
			<td style="font-weight:bold;">'.$res['month'].','.$res['year'].'</td>
		</tr>
			
	
	</table>	
	<br><br>

	<table width="100%">
	
		<tr>
			<td style="border-style: solid; border-width: medium; border-radius: 10px; padding:10px;    width: 100px; font-size:20px;     font-weight: bold;">Rs. '.$res['rent'].'</td>
			<td></td>
			<td style="text-align:center; font-weight:bold;">Sign</td>
		</tr>
	</table>	
</body>
</html>';



}

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf= new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));

?>