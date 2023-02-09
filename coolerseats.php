<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- plugins:css -->
    <?php include "components/links.php" ?> 
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include "components/nav.php" ?> 
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "components/sidebar.php" ?> 
      <div class="main-panel">
          <div class="content-wrapper">










                <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                        <h4 class="card-title">Non-AC Seats</h4>
                      </div>
                      <div class="col">
                          <a class="btn btn-gradient-primary" href="addseat.php" >Add New Seat</a>
                      </div>
                  </div>
                   
                    </p>
                    <table id="datatableid" class="table table-hover">
                      <thead>
                        <tr>
                 
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where roomtype='Non-AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                          <td>
                           
                          <a  class="btn-sm btn-danger" style="font-size:11px; padding:7px;" href="forms/seat-delete.php?seatno=<?php echo $res['seatno'] ?>">Delete</a>
                          
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>



      
           
     
          <!-- partial:../../partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php


include 'config/config.php';

$selectquery = " select * from floor  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$seatno= $res['seatno'];

    $select = " select * from student where seatno='$seatno' and status='Active' ";
    $result = mysqli_query($conn,$select);
    if (mysqli_num_rows($result)){
     $updatequery= "UPDATE floor SET status='Filled' WHERE seatno='$seatno'";
    $res = mysqli_query($conn,$updatequery);

    }
    else {
        $updatequery= "UPDATE floor SET status='Vacant' WHERE seatno='$seatno'";
        $res = mysqli_query($conn,$updatequery);

    }
    
  
}

?>

<?php

$month= date("F");
include 'config/config.php';

$selectquery = " select * from student  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$Registration= $res['Registration'];

    $select = " select * from payments where Registration='$Registration' AND month='$month' AND paystatus='Paid'";
    $result = mysqli_query($conn,$select);
    if (mysqli_num_rows($result)){
     
       


$updatequery= "UPDATE student SET rentstatus='Paid' WHERE Registration='$Registration'";
$res = mysqli_query($conn,$updatequery);

    }
    else{
        $updatequery= "UPDATE student SET rentstatus='Unpaid' WHERE Registration='$Registration'";
        $res = mysqli_query($conn,$updatequery);
    }
  
}

?>
<?php


include 'config/config.php';

$selectquery = " select * from payments  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$Registration= $res['Registration'];

    $select = " select * from student where Registration='$Registration' and status='Active'";
    $result = mysqli_query($conn,$select);
    if (mysqli_num_rows($result)){
     $updatequery= "UPDATE payments SET status='Active' WHERE Registration='$Registration'";
    $res = mysqli_query($conn,$updatequery);

    }
    else {
        $updatequery= "UPDATE payments SET status='Inactive' WHERE Registration='$Registration'";
        $res = mysqli_query($conn,$updatequery);

    }
    
  
}

?>
    <?php include "components/scripts.php" ?>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {

    $('#datatableid').DataTable({
      "paggingType": "full_numbers",
      "lenghtMenu":[
        [10,25,50,-1],
      [10,25,50,'All']
    ],
    responsive:true,
    language:{
      search: "_INPUT_",
      searchPlaceholder: "Search",
    } 
     
    });
} );
</script>
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
