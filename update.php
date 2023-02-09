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
                    <h4 class="card-title">Register New Student</h4>
                
                    <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>
                      <p class="card-description"> Personal info </p>
                      <form name="imgupdate" class="form-sample" method="POST" action="forms/std-update.php" enctype="multipart/form-data" >
                      <div class="text-center mb-5 mt-5">
                      <input type="hidden" class="form-control" name="regno" value="<?php echo $res['Registration']  ?>"/>
                        <img src="forms/uploads/<?php echo $res['img']  ?>" class="img" style="height:180px; width:150px;">
                        <input type="file" id="file" name="file" style="margin:5px;" value="<?php echo $res['img']  ?>">
                        <button type="submit" id="submit1" name="submit1" class="btn btn-gradient-primary mr-2">Update</button> 

                          </div>
                           
                         </form>
                          <form name="update" class="form-sample" method="POST" action="forms/std-update.php" enctype="multipart/form-data" >
                      <div class="row">
                        
                           
                           
                              <input type="hidden" class="form-control" name="regno" value="<?php echo $res['Registration']  ?>"/>
                          
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="status" value="<?php echo $res['status']  ?>">
                            <option>Active</option>
                            <option>Inactive</option>
                           </select>

                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="name" value="<?php echo $res['Name']  ?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fname" value="<?php echo $res['fname']  ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="dob" value="<?php echo $res['dob']  ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Student Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="scontact"  value="<?php echo $res['Scontact']  ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="fcontact"  value="<?php echo $res['Fcontact']  ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                         <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Local Gaurdian</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="lname" value="<?php echo $res['Lgaurdian']  ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gaurdian Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="lcontact"  value="<?php echo $res['Lcontact']  ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Aadhar No.</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="adhar" value="<?php echo $res['adhar']  ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Occupation</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="occupation" value="<?php echo $res['occupation']  ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Study</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="study"  value="<?php echo $res['study']  ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Institute</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="institute" value="<?php echo $res['institute']  ?>"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="address" value="<?php echo $res['address']  ?>" />
                            </div>
                          </div>
                        </div>
                       
                      </div>

                      <p class="card-description">Hostel Details</p>
                   
                      <div class="row">
                        
                         <div class="col-md-6">
                           <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat No. </label>
                            <div class="col-sm-9">
                              <select class="form-control" name="seat" value="<?php echo $res['seatno']  ?>">
                               
                                <?php  }?>
                                <?php
include 'config/config.php';

$selectquery = " select * from floor where status='Vacant'  ";
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
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
 
?>
                          <div class="col-md-6">
                        
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="rent" value="<?php echo $res['Rent']  ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="date" value="<?php echo $res['Date']  ?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                   
                       <button type="submit" id="submit" name="submit" class="btn btn-gradient-primary mr-2">Update</button>
                     
                     
                
                    <a type="submit" id="submit2"  class="btn btn-gradient-danger mr-2" href="forms/delete.php?Registration=<?php  echo $res['Registration']  ?>">Delete</a>
                  </div>
                  </form>
                  <?php  }?> 

     
          <!-- partial:../../partials/_footer.html -->
        
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include "components/scripts.php" ?>
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
