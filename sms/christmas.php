
<?php 
include '../config/config.php';

$selectquery = " select * from student where status='Active'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);


while($res= mysqli_fetch_array($query)){
  $contact= $res['Scontact'];
  $name= $res['Name'];




$fields = array(
    "sender_id" => "RBHHZG",
    "message" => "129439",
    "authorization = zAm4y3dBFSEjvbtT0Y2cloiHaXnQ8suGpVL9rekh5gRPwqCJKNDtO7GHpMo3qlVIB4WwbJfdNCunYvXF",
    "variables_values" => "$name",
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
?>