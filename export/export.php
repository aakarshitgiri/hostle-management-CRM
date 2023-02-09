<?php
include '../config/config.php';

$output = '';
$counter = '1';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student ORDER BY recorddate DESC";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
      while($row = mysqli_fetch_array($result))
      {
         
  $output .= '
   <table class="table" bordered="1">  
                    <tr> 
                          <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th> 
                          <th>Father Name</th>
                          <th>Student Contact</th>
                          <th>Email</th>
                          <th>Whatsapp</th>
                          <th>Father Contact</th>
                          <th>Local Gaurdian</th>
                          <th>Gaurdian Contact</th>
                          <th>Father Ocuupation</th>
                          <th>Study</th>
                          <th>Institute</th>
                          <th>Adhar Card</th>
                          <th>Date Of Birth</th>
                          <th>Address</th>
                          <th>Room type</th>
                          <th>Floor</th>
                          <th>Seat Type</th>
                          <th>Room No</th>
                          <th>Seat No</th>
                          <th>Rent</th>
                          <th>Date</th>
                          <th>Status</th>

                    </tr>
  ';

   $output .= '
                    <tr>  
                          <td>'.$counter.'</td>
                          <td>'.$row["Registration"].'</td>
                          <td>'.$row["Name"].'</td>
                         
                          <td>'.$row["fname"].'</td>
                          <td>'.$row["Scontact"].'</td>
                          <td>'.$row["email"].'</td>
                        
                          <td>'.$row["whatsapp"].'</td>
                          <td>'.$row["Fcontact"].'</td>
                          <td>'.$row["Lgaurdian"].'</td>
                          <td>'.$row["Lcontact"].'</td>
                          <td>'.$row["occupation"].'</td>
                          <td>'.$row["study"].'</td>
                          <td>'.$row["institute"].'</td>
                          <td>'.$row["adhar"].'</td>
                          <td>'.$row["dob"].'</td>
                          <td>'.$row["address"].'</td>
                          <td>'.$row["roomtype"].'</td>
                          <td>'.$row["floor"].'</td>
                          <td>'.$row["seattype"].'</td>
                          <td>'.$row["roomno"].'</td>
                          <td>'.$row["seatno"].'</td>
                          <td>'.$row["Rent"].'</td>
                          <td>'.$row["Date"].'</td>
                          <td>'.$row["status"].'</td>
                    </tr>
   ';
    $counter++;
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

?>