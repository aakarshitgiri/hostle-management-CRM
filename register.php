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
             <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Register New Student</h4>
                    <form name="register" class="form-sample" method="post" action="forms/std-reg.php" enctype="multipart/form-data" onsubmit="return validate()">
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Reg. No.</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="regno" required/>
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
                            <label class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fname" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="dd/mm/yyyy" name="dob" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Student Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="xxxxxxxxxxx" name="scontact" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="xxxxxxxxxxx" name="fcontact" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="xyz@abc.com" name="email" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Whatsapp</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="xxxxxxxxxx" name="whatsapp" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                         <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Local Gaurdian</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="lname" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gaurdian Contact</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="xxxxxxxxxxx" name="lcontact" />
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Aadhar No.</label>
                            <div class="col-sm-9">
                              <input class="form-control"  placeholder="xxxxxxxxxxxxxxxx" name="adhar" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Father Occupation</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="occupation" />
                            </div>
                          </div>
                        </div>
                      </div>
                          <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Study</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="study" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Institute</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="institute" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="address" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-3">
                            Student Image
                          </div>
                          <div class="col-9">
                        <input type="file" id="file" name="file" >
                        </div>

                      </div>
                        </div>
                      </div>

                      <p class="card-description">Hostel Details</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat No.</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="seat" required>
                            
                                <option>Enter Seat No.</option>
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
                         
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="rent" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="dd/mm/yyyy" name="date" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      
                      <p class="card-description">Fees  Details</p>
                     
                    
                      <div class="row">

                     
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees Paid ? </label>
                            <div class="col-sm-9">
                            <select class="form-control" name="q1" required />
                            <option></option>
                                  <option>Yes</option>
                                  <option>No</option>
                                  <option>Not Needed</option>
                           
                                </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees Paid</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="rent1"  />
                            </div>
                          </div>
                        </div>
                      
                   
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="year1"  required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9">
                              <select class="form-control select" name="month1" required  />
                              <option></option>
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
                              <input class="form-control"  name="date1" placeholder="DD/MM/YYYY" required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="mode1"   />
                            </div>
                          </div>
                        </div>
                      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pending Amount</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="pending1"   />
                            </div>
                          </div>
                        </div>
                      </div>
                             
              
                     
                             
                      <p class="card-description">1st Advance Fees Details</p>
                      <div class="row">

                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Advance Fee Paid ? </label>
                            <div class="col-sm-9">
                            <select class="form-control" name="q2" required />
                            <option></option>
                                  <option>Yes</option>
                                  <option>No</option>
                                  <option>Not Needed</option>
                           
                                </select>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fee Paid</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="rent2"  />
                            </div>
                          </div>
                        </div>
                      
                   
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="year2" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="month2" required />
                              <option></option>
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
                              <input class="form-control"  name="date2" placeholder="DD/MM/YYYY" required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="mode2"   />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pending Amount</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="pending2"   />
                            </div>
                          </div>
                        </div>
                      
                      </div>

                                      
                      <p class="card-description">2nd Advance Fees Details</p>
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fees Paid ? </label>
                            <div class="col-sm-9">
                            <select class="form-control" name="q3" required />
                            <option></option>
                                  <option>Yes</option>
                                  <option>No</option>
                                  <option>Not Needed</option>
                           
                                </select>
                            </div>
                          </div>
                        </div>


                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fee Paid</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="rent3"  />
                            </div>
                          </div>
                        </div>
                      
                   
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9">
                              <input class="form-control" name="year3" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Month</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="month3" required />
                              <option></option>
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
                              <input class="form-control"  name="date3" placeholder="DD/MM/YYYY" required />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="mode3"   />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pending Amount</label>
                            <div class="col-sm-9">
                              <input class="form-control"  name="pending3"   />
                            </div>
                          </div>
                        </div>
                      </div>
                       <button type="submit" id="submit" name="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                 
                    </form>


<script>

        function validate() {
        var dob = document.forms["register"]["dob"];
        var scontact = document.forms["register"]["scontact"];
        var fcontact = document.forms["register"]["fcontact"];
     
        var date = document.forms["register"]["date"];
        var phoneno = /^\d{10}$/;
        var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;


        if (!dob.value.match(pattern)) {
            window.alert(
              "Please enter valid date of birth.");
            dob.focus();
            return false;
        }

        if (!date.value.match(pattern)) {
            window.alert(
              "Please enter valid date of registration.");
            date.focus();
            return false;
        }

        if (!scontact.value.match(phoneno)) {
            window.alert(
              "Please enter valid Student Number.");
              scontact.focus();
            return false;
        }

        if (!fcontact.value.match(phoneno)) {
            window.alert(
              "Please enter valid Father Number.");
              fcontact.focus();
            return false;
        }

      
        return true;
    }
</script>

                  </div>
        </div>
      </div>
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
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
