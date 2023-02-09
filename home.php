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
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <?php
include 'config/config.php';

$selectquery = " select * from student where rentstatus='Unpaid' and status='Active' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

$select = " select * from student where status='Active'  ";
$queryy= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryy);


?>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body" >
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                   
                    <h4 class="font-weight-normal mb-3">Unpaid Students <i class="mdi mdi-account mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $num  ?></h2>
                  
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
$selectquery = "SELECT sum(rent) as total FROM payments  WHERE month='$month' AND status='Active' AND ptype='Monthly' AND paystatus='Paid'";
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
                    <h4 class="font-weight-normal mb-3">Total Active Students <i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-1"><?php echo $numm  ?></h2>
                
                  </div>
                </div>
              </div>
            </div>
          

  <div class="row mb-5 ">
    <div class="col text-center">
      <button type="button" class="btn btn-gradient-primary btn-fw m-2" ><a href="register.php" style="color:white;">Add Student</a></button>
    </div>
    <div class="col  text-center">
      <button type="button" class="btn btn-gradient-success btn-fw m-2"><a href="apayments.php" style="color:white;">Add Payment</a></button>
    </div>
    <div class="col  text-center">
      <button type="button" class="btn btn-gradient-info btn-fw m-2"><a href="addseat.php" style="color:white;">Add Seat</a></button>
    </div>
  </div>



            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Check Monthly Payments</h4>
                    <form class="form-sample" name="payment" method="post" action="monthly-payments.php">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Year</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="year" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Month</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="month" required />
                              <option>January</option>
                              <option>February</option>
                              <option>March</option>
                              <option>April</option>
                              <option>May</option>
                              <option>June</option>
                              <option>July</option>
                              <option>August</option>
                              <option>September</option>
                              <option>October</option>
                              <option>November</option>
                              <option>December</option>

                              </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-4">
                        <button type="submit" id="submit" name="submit" class="btn btn-gradient-primary mr-2"  >Check</button>
                        </div>
</form>
                      </div>
                     
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Check Student Payments</h4>
                    <form class="form-sample" name="payment" method="post" action="student-payments.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Select Registration Number</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="reg" required>
                            
                            <option>Select Reg. No.</option>
                            <?php
include 'config/config.php';

$selectquery = " select * from student ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
?>
                            <option><?php echo $res['Registration']  ?></option>
                            <?php  }?>

                          </select>
                            </div>
                          </div>
                        </div>
                       
                        
                        <div class="col-md-4">
                        <button type="submit" id="submit1" name="submit1" class="btn btn-gradient-primary mr-2"  >Check</button>
                        </div>
</form>
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
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
