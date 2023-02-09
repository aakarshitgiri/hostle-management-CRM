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

          <ul class="nav nav-tabs" id="myTab" role="tablist" >
  <li class="nav-item" role="presentation">
    <button class="nav-link active btn-outline-warning" style="color:black;" id="home-tab" data-bs-toggle="tab" data-bs-target="#sacv" type="button" role="tab" aria-controls="sacv" aria-selected="true">Single AC </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-outline-warning" style="color:black;" id="profile-tab" data-bs-toggle="tab" data-bs-target="#dacv" type="button" role="tab" aria-controls="dacv" aria-selected="false">Double AC </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-outline-warning" style="color:black;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tacv" type="button" role="tab" aria-controls="tacv" aria-selected="false">Triple AC </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-outline-warning" style="color:black;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#snacv" type="button" role="tab" aria-controls="snacv" aria-selected="false">Single Non-AC </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-outline-warning" style="color:black;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dnacv" type="button" role="tab" aria-controls="dnacv" aria-selected="false">Double Non-AC </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link btn-outline-warning" style="color:black;" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tnacv" type="button" role="tab" aria-controls="tnacv" aria-selected="false">Triple Non-AC</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="sacv" role="tabpanel" aria-labelledby="home-tab">

  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Single' and status='Vacant' and roomtype='AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>  
                        <h4 class="card-title">Single AC Vacant Seat    <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                   
                  </div>
                   
                    </p>
                    <table id="datatableid" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Single' and status='Vacant' and roomtype='AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>  
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
           

  </div>
  <div class="tab-pane fade" id="dacv" role="tabpanel" aria-labelledby="profile-tab">
  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Double' and status='Vacant' and roomtype='AC' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>
                        <h4 class="card-title">Double AC Vacant Seat <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                     
                  </div>
                   
                    </p>
                    <table id="datatableid1" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Double' and status='Vacant' and roomtype='AC' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
         
  </div>
  <div class="tab-pane fade" id="tacv" role="tabpanel" aria-labelledby="contact-tab">
  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Triple' and status='Vacant' and roomtype='AC' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>
                        <h4 class="card-title">Triple AC Vacant Seat <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                     
                  </div>
                   
                    </p>
                    <table id="datatableid2" class="table table-hover">
                      <thead>
                        <tr>
                     
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Triple' and status='Vacant' and roomtype='AC' ";
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
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
            
  </div>
  <div class="tab-pane fade" id="snacv" role="tabpanel" aria-labelledby="home-tab">  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Single' and status='Vacant' and roomtype='Non-AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>
                        <h4 class="card-title">Single Non-AC Vacant Seat <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                     
                  </div>
                   
                    </p>
                    <table id="datatableid3" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Single' and status='Vacant' and roomtype='Non-AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        
  <div class="tab-pane fade" id="dnacv" role="tabpanel" aria-labelledby="profile-tab">  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Double' and status='Vacant' and roomtype='Non-AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>
                        <h4 class="card-title">Double Non-AC Vacant Seat <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                     
                  </div>
                   
                    </p>
                    <table id="datatableid4" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Double' and status='Vacant' and roomtype='Non-AC'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        
  <div class="tab-pane fade" id="tnacv" role="tabpanel" aria-labelledby="contact-tab">
  <br>
  <br>
  <div class="card">
                  <div class="card-body">
                     <div class="row">
                      <div class="col">
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Triple' and status='Vacant' and roomtype='Non-AC' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

?>
                        <h4 class="card-title">Triple Non-AC Vacant Seat <label class="badge badge-danger" style="margin-left:10px;">Total Vacant Seats : <?php echo $num  ?></label></h4>
                      </div>
                     
                  </div>
                   
                    </p>
                    <table id="datatableid5" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Seat No.</th>
                          <th>Floor No.</th>
                          <th>Room No.</th>
                          
                         
                          <th>Seat Type</th>
                          <th>Room Type</th>
                          <th>Status</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from floor where seattype='Triple' and status='Vacant' and roomtype='Non-AC' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['floor']  ?></td>
                          <td><?php echo $res['roomno']  ?></td>
                         
                         
                          <td><?php echo $res['seattype']  ?></td>
                          <td><?php echo $res['roomtype']  ?></td>
                         
                          <td><?php echo $res['status']  ?></td> 
                         
                         <?php  }?>
                      </tbody>
                    </table>
                  </div>
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


$(document).ready(function() {

$('#datatableid1').DataTable({
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


$(document).ready(function() {

$('#datatableid2').DataTable({
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



$(document).ready(function() {

$('#datatableid3').DataTable({
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



$(document).ready(function() {

$('#datatableid4').DataTable({
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



$(document).ready(function() {

$('#datatableid5').DataTable({
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
