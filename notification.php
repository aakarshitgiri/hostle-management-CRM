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
          
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Select Students</h4>
               
                </p>
                <form name="notify" method="POST" action="forms/notify.php">
                <table id="datatableid" class="table table-hover">
                  <thead>
                    <tr>
                    <th>#</th>
                    <th>Check Box</th>
                      <th>Reg. No.</th>
                      <th>Name</th>
                      <th>Email</th>
                     
                      <th>Contact</th>
                      <th>Seat No.</th>
                      <th>Fees</th>
                      <th>Whatsapp</th>
                     
                  </thead>
                  <tbody>
                  <?php
include 'config/config.php';

$selectquery = " select * from student where status='Active' ORDER BY recorddate DESC ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
$counter = 0;
while($res= mysqli_fetch_array($query)){
  $registration= $res['Registration'];
  $counter++;
?>

                    <tr>
                      <td><?php echo $counter ?></td>
                      <td><div class="container" style=" margin-bottom:15%; text-align:center;"><input class="form-check-input" type="checkbox" value="<?php echo $res['email']  ?>" name="checkbox[]" id="checkbox"></div></td>
                      <td><?php echo $res['Registration']  ?></td>
                      <td name="Name{}"><?php echo $res['Name']  ?></td>
                      <td><?php echo $res['email']  ?></td>
                     
                      <td><?php echo $res['Scontact']  ?></td>
                      <td><?php echo $res['seatno']  ?></td>
                      <td><?php echo $res['Rent']  ?> <?php echo $res['rentstatus']  ?></td>
                      <td>  <a type="button" class="btn btn-gradient-success btn-icon-text btn-sm" style="font-size:10px;" href="http://api.whatsapp.com/send?phone=<?php echo $res['whatsapp']  ?>" target="_blank">
                      <i style="color:white; font-size:12px;" class="mdi mdi-whatsapp"></i> Whatsapp </a></td>
                      
                   </tr>
                   <?php  }?>
                  </tbody>
                </table>
              </div>
            </div>


<br>
          <div class="row mt-12">
           

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-5">Send Messege</h4>
                <div class="template-demo mb-5">
                      <a type="button" class="btn btn-gradient-primary btn-fw" href="sms/dushera.php">Dushera</a>
                      <a type="button" class="btn btn-gradient-secondary btn-fw" href="sms/diwali.php">Diwali</a>
                      <a type="button" class="btn btn-gradient-success btn-fw" href="sms/holi.php">Holi</a>
                      <a type="button" class="btn btn-gradient-danger btn-fw" href="sms/newyear.php">New Year</a>
                      <a type="button" class="btn btn-gradient-warning btn-fw"href="sms/newsession.php">New Session</a>
                      <a type="button" class="btn btn-gradient-info btn-fw" href="sms/hostlefees.php">Pending Fees</a>
                      <a type="button" class="btn btn-gradient-light btn-fw" href="sms/advafees.php">Pending Advanced</a>
                      <a type="button" class="btn btn-gradient-danger btn-fw" href="sms/rakshabandhan.php">Raksha Bandhan</a>
                      <a type="button" class="btn btn-gradient-warning btn-fw"href="sms/eid.php">Eid</a>
                      <a type="button" class="btn btn-gradient-info btn-fw" href="sms/christmas.php">Christmas</a>
                      <a type="button" class="btn btn-gradient-light btn-fw" href="sms/bhaidooj.php">Bhai Dooj</a>
                    
                    </div>
                 
               
                 
              
                </div>
              </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-5">Send Notification On Email</h4>
                <div class="form-group">
                    <label for="exampleTextarea1">Enter Subject</label>
                    <input class="form-control" name="subject" id="subject" ></input>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleTextarea1">Enter Messege</label>
                    <textarea class="form-control" name="messege" id="messege" rows="4"></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                 
              
                </div>
              </div>
            </div>
            </form>
         
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Hostel Close Notification</h4>
                    <form name="cloase" action="sms/close.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Reason</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="reason" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Close From (Date)</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="date1" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">End Date </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="date2" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="submit" id="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>   
              
                </div>
              </div>
            </div>
            
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">New Session Start Date </h4>
                    <form name="cloase" action="sms/newsession.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">New Session Date</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="date" required/>
                            </div>
                          </div>
                        </div>
                       
                      </div>
                      <button type="submit" name="submit" id="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>   
              
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


               
           
     
          <!-- partial:../../partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
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
    <!-- End custom js for this page -->
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
