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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-5">Add New Payment</h4>
                    <form class="form-sample" name="payment" method="post" action="forms/add-payment.php">
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Reg. No.</label>
                            <div class="col-sm-9">
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
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat No.</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="seat" required>
                            
                            <option>Select Seat No.</option>
                            <?php
include 'config/config.php';

$selectquery = " select * from floor where status='filled'  ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
?>
                            <option><?php echo $res['seatno']  ?></option>
                            <?php  }?>

                          </select>
                            </div>
                          </div>
                        </div>
                     
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Rent Fees</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="rent" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pending Fees</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="pending"  />
                            </div>
                          </div>
                        </div>
              
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="year" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9">
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
                   
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="date" placeholder="DD/MM/YYYY" required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="pmode"  required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Type</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="ptype" required />
                              <option>Monthly</option>
                              <option>1st Advance</option>
                              <option>2nd Advance</option>
                           
                              </select>

                            </div>
                          </div>
                        </div>
                      
                      </div>
                        
                       <button type="submit" id="submit" name="submit"  class="btn btn-gradient-primary mr-2">Submit</button>
                     
                    </form>
                  </div>
         
           
     
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include "components/scripts.php" ?>
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
