<?php
include '../config/config.php';

$output = '';
$counter = '1';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM payments ORDER BY recorddate DESC";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr> 
                          <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th> 
                          <th>Seat No</th>
                          <th>Rent</th>
                          <th>Pending</th>
                          <th>Year</th>

                          <th>Month</th> 
                          <th>Status</th>
                          <th>Date</th>
                          <th>Payment Mode</th>
                          <th>Payment Type</th>
                          <th>Payment Status</th>

                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
     
   $output .= '
                    <tr>  
                          <td>'.$counter.'</td>
                          <td>'.$row["Registration"].'</td>
                          <td>'.$row["Name"].'</td>
                         
                          <td>'.$row["seatno"].'</td>
                          <td>'.$row["rent"].'</td>
                          <td>'.$row["pendingr"].'</td>
                        
                          <td>'.$row["year"].'</td>
                          <td>'.$row["month"].'</td>
                          <td>'.$row["status"].'</td>
                          <td>'.$row["date"].'</td>
                          <td>'.$row["pmode"].'</td>
                          <td>'.$row["ptype"].'</td>
                          <td>'.$row["paystatus"].'</td>
                         
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