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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="page-header">
              
     
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body" >
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <?php
include 'config/config.php';

$selectquery = "SELECT sum(pendingr) as total FROM payments  WHERE ptype='1st Advance' OR ptype='2nd Advance' AND status='Active' AND paystatus='Pending'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{ 

?>
                    <h4 class="font-weight-normal mb-3">Pending Advance Fees <i class="mdi mdi-currency-inr mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $row['total']  ?></h2>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
<?php
include 'config/config.php';
$month = date('F');
$selectquery = "SELECT sum(rent) as total1 FROM monthly  WHERE status='Pending' AND statusq='Active' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{ 

?>
                    <h4 class="font-weight-normal mb-3">Pending Fees<i class="mdi mdi-currency-inr mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $row['total1']  ?></h2>
          <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <?php
include 'config/config.php';

$selectquery = " select * from student where adhar='' and status='Active' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);




?>
   
                    <h4 class="font-weight-normal mb-3">Pending Student ID <i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1">  <h2 class="mb-1"><?php echo $num  ?></h2></h2>
                   
                  </div>
                </div>
              </div>
            </div>
          



            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Monthly Fees</h4>
             
                    <table id="datatableid2" class="table table-hover">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Seat No.</th>
                       
                          <th>Pending</th>
                          <th>Year</th>
                          <th>Month</th>
                        
                          
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from monthly where status='Pending' ORDER BY timestamp DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['Registration']  ?></td>
                          <td><?php echo $res['Name']  ?></td>
                          <td><?php echo $res['contact']  ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['rent']  ?> <label class="ml-1 badge badge-danger"><?php echo $res['status']  ?></label></td>
                          <td><?php echo $res['year']  ?></td>
                          <td><?php echo $res['month']  ?></td> 
                     
                          <?php  }?>  
                      </tbody>
                    </table>
                     
                    <a type="button" class="btn btn-gradient-info btn-fw mt-3 mb-3" href="sms/hostlefees.php">Pending Fees Notification</a>
                    
                  </div>
                </div>
              </div>
            </div>





        















            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Advance Fees</h4>
                    <table id="datatableid1" class="table table-hover">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th>
                      
                          <th>Seat No.</th>
                          <th>Status</th>
                          <th>Advance Pending</th>
                          <th>Type</th>
                          <th>Due Date</th>
                          <th>Year</th>
                          <th>Month</th>
                          
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from payments where paystatus='Pending' and ptype='1st Advance' or paystatus='Pending' and ptype='2nd Advance'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = "0";
while($res= mysqli_fetch_array($query)){
  $counter++
?>
                        <tr>
                        <td><?php echo $counter  ?></td>
                          <td><?php echo $res['Registration']  ?></td>
                          <td><?php echo $res['Name']  ?></td>
                        
                          <td><?php echo $res['seatno']  ?></td>
                          <td><?php echo $res['status']  ?></td>
                          <td><?php echo $res['pendingr']  ?> <label class="ml-1 badge badge-danger"><?php echo $res['paystatus']  ?></label> </td>
                          <td><?php echo $res['ptype']  ?></td>
                          <td><?php echo $res['date']  ?></td> 
                          <td><?php echo $res['year']  ?></td> 
                          <td><?php echo $res['month']  ?></td> 
                          <?php  }?>  
                      </tbody>
                    </table>

                    <a type="button" class="btn btn-gradient-light btn-fw mt-3 mb-3" href="sms/advafees.php">Pending Advanced Fees Notification</a>



                     
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Student Photo</h4>
                    <table id="datatableid3" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Seat No.</th>
                     
                          <th>Image Status</th>
                          <th>Student Status</th>
                          
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from student where status='Active' and img='' ORDER BY recorddate DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['Registration']  ?></td>
                          <td><?php echo $res['Name']  ?></td>
                          <td><?php echo $res['Scontact']  ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                       
                          <td><label class="ml-1 badge badge-danger">Pending</label></td>
                          <td><?php echo $res['status']  ?></td> 
                          <?php  }?>  
                      </tbody>
                    </table>
                     
                     
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pending Student ID</h4>
                    <table id="datatableid4" class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Reg. No.</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Seat No.</th>
                          <th>ID Status</th>
                      
                          <th>Student Status</th>
                          
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from student where status='Active' and adhar='' ORDER BY recorddate DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $counter++;
?>
                        <tr>
                          <td><?php echo $counter ?></td>
                          <td><?php echo $res['Registration']  ?></td>
                          <td><?php echo $res['Name']  ?></td>
                          <td><?php echo $res['Scontact']  ?></td>
                          <td><?php echo $res['seatno']  ?></td>
                          <td><label class="ml-1 badge badge-danger">Pending</label></td>
                        
                          <td><?php echo $res['status']  ?></td> 
                          <?php  }?>  
                      </tbody>
                    </table>
                      </div>
                     
                    
                  </div>
                </div>
              </div>
            </div>

          
           </div>
             
        
         
        </div>
    
      </div>
     
    </div>
 


    <?php


include 'config/config.php';

$selectquery = " select * from floor  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$seatno= $res['seatno'];

    $select = " select * from student where seatno='$seatno' and status='Active'";
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
</script>
<script>
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
</script>
<script>
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
</script>
<script>
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
</script>
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
