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



  <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <?php
                    
                    include 'config/config.php';
                    $month= date("F");
                    $select = "SELECT sum(Rent) as sum FROM student  WHERE rentstatus='Unpaid' and status='Active' ";
                    $queryy= mysqli_query($conn,$select);
                    $numm= mysqli_num_rows($queryy);
                    while ($row = mysqli_fetch_assoc($queryy))
                    { 
                    ?>
                    <h4 class="font-weight-normal mb-3"><?php echo date("F")  ?> Pending Payment <i class="mdi mdi-currency-inr mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $row['sum']  ?></h2>
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
$month= date("F");
$selectquery = "SELECT sum(rent) as total FROM payments  WHERE month='$month' AND status='Active' AND paystatus='Paid' AND ptype='Monthly'";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while ($row = mysqli_fetch_assoc($query))
{ 

?>
                    <h4 class="font-weight-normal mb-3"><?php echo $month  ?> Payment<i class="mdi mdi-currency-inr mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $row['total']  ?></h2>
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
$month= date("F");
$selectqueryu = "SELECT  * FROM payments WHERE month='$month' AND status='Active'  AND paystatus='Paid' ";
$queryu= mysqli_query($conn,$selectqueryu);
$numu= mysqli_num_rows($queryu);

?>

                    <h4 class="font-weight-normal mb-3">Total <?php echo $month ?> Transaction <i class="mdi mdi-currency-inr mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $numu  ?></h2>
                
                  </div>
                </div>
              </div>
            </div>






                <div class="card">
                  <div class="card-body">
                  <div class="row">
                      <div class="col">
                        <h4 class="card-title">All Payments</h4>
                      </div>
                      <div class="col">
                          <a class="btn btn-gradient-primary" href="apayments.php" >Add New Payment</a>
                      </div>
                      <div class="col">
                    <form method="post" action="export/export-pay.php">
     <input type="submit" class="btn btn-success" name="export" class="btn btn-success" value="Export" />
    </form>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger" href="pdf/payments-pdf.php">Generate PDF</a>
                      </div>
                  </div>
                  
                   
                    </p>
                    <table id="datatableid" class="table table-hover">
                      <thead>
                        <tr>
                      
                        <th>Reciept</th>
                          <th>Reg. No.</th>
                          <th>Name</th>
                         
                         
                          <th>Paid</th>
                        
                          <th>Type</th>
                          <th>Year</th>
                          <th>Month</th>
                          <th>Date</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';

$selectquery = " select * from payments where paystatus='Paid' ORDER BY recorddate DESC  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = "0";
while($res= mysqli_fetch_array($query)){
 $counter++;
?>
                        <tr>
                    
                          <td><?php echo $res['ID']  ?></td>
                          <td><?php echo $res['Registration']  ?></td>
                          <td><?php echo $res['Name']  ?></td>
                         
                         
                          <td><?php echo $res['rent']  ?></td>
                         
                          <td><?php echo $res['ptype']  ?></td>
                          
                          <td><?php echo $res['year']  ?></td>
                          <td><?php echo $res['month']  ?></td> 
                          <td><?php echo $res['date']  ?></td>
                          <td><a href="updatepayment.php?ID=<?php echo $res['ID'] ?>"  style="color:green;">Edit</a><a class="ml-1" href="pdf/reciept.php?ID=<?php echo $res['ID'] ?>"  style="font-size:15px; color:red;"><i class="mdi mdi-download "></i>Print</a></td>
                        
                        </tr>
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
    <!-- plugins:js -->
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
