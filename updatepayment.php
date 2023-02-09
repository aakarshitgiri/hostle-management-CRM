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
                    <h4 class="card-title mb-5">Update Payment</h4>
                    <?php
include 'config/config.php';
$ID = $_GET['ID'];
$selectquery = " select * from payments where ID='$ID' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>
                    <form class="form-sample" name="payment" method="post" action="forms/pay-update.php?ID=<?php echo $ID ?>">
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Reg. No.</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="reg" value="<?php echo $res['Registration']  ?>" required>
                          
                            <option><?php echo $res['Registration']  ?></option>
                            <?php  }?>
                            <option>Select Reg. No.</option>
                            <?php
include 'config/config.php';

$selectquery = " select * from student where status='Active' ";
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

                        <?php
include 'config/config.php';
$ID = $_GET['ID'];
$selectquery = " select * from payments where ID='$ID' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" value="<?php echo $res['Name']  ?>" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fathers Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fname" value="<?php echo $res['fname']  ?>" required/>
                            </div>
                          </div>
                        </div>
                      
                      
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat No.</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="seat" required>
                            <option><?php echo $res['seatno']  ?></option>

                            <?php  }?>
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
                        <?php
include 'config/config.php';
$ID = $_GET['ID'];
$selectquery = " select * from payments where ID='$ID' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="rent"  value="<?php echo $res['rent']  ?>"  />
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
                              <input class="form-control" name="year"  value="<?php echo $res['year']  ?>" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="month"  value="<?php echo $res['month']  ?>" required />
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
                              <input class="form-control"  name="date"  value="<?php echo $res['date']  ?>" required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="pmode"   value="<?php echo $res['pmode']  ?>"  />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Type</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="ptype"  value="<?php echo $res['ptype']  ?>" required />
                              <option>Monthly</option>
                              <option>1st Advance</option>
                              <option>2nd Advance</option>
                           
                              </select>

                            </div>
                          </div>
                        </div>
                      
                      </div>
                        
                       <button type="submit" id="submit" name="submit"  class="btn btn-gradient-primary mr-2">Submit</button>
                       <button type="submit" id="submit" name="submit1"  class="btn btn-gradient-danger mr-2">Delete</button>
                       <?php  }?>
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
