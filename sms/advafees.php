
<?php 
include '../config/config.php';

$selectquery = " select * from payments where paystatus='Pending' and ptype='1st Advance' or paystatus='Pending' and ptype='2nd Advance'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = "0";
$ac= "50200017174907";
$ifsc= "HDFCOOO1267";
while($res= mysqli_fetch_array($query)){
$reg = $res['Registration'];
$name = $res['Name'];
$date= $res['recorddate'];
$month= $res['month'];
$year= $res['year'];
$selectquery1 = " select * from student where status='Active' AND Registration=$reg  ";
$query1= mysqli_query($conn,$selectquery1);
$num1= mysqli_num_rows($query1);


while($ress= mysqli_fetch_array($query1)){
  $contact= $ress['Scontact'];
  


$fields = array(
    "sender_id" => "RBHHZG",
    "message" => "129441",
    "authorization = zAm4y3dBFSEjvbtT0Y2cloiHaXnQ8suGpVL9rekh5gRPwqCJKNDtO7GHpMo3qlVIB4WwbJfdNCunYvXF",
    "variables_values" => "$name|$month|$date|$ac|$ifsc",
    "route" => "dlt",
    "numbers" => "$contact",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: zAm4y3dBFSEjvbtT0Y2cloiHaXnQ8suGpVL9rekh5gRPwqCJKNDtO7GHpMo3qlVIB4WwbJfdNCunYvXF",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  header('Location: ../notification.php');
}
}
}
?>











