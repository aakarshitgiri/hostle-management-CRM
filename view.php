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
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
                
?>
                   <div class="row">
                  <div class="col">
                  <h4 class="card-title mb-5">Student Personal Details</h4>
                </div>
                  <div class="col">
                        <a class="btn btn-danger" href="pdf/std-pdf.php?Registration=<?php echo $Registration ?>&Name=<?php echo $res['Name'] ?>">Generate PDF</a>
                      </div>
</div>
                  <div class="text-center mb-5">
                 
                  <img src="forms/uploads/<?php echo $res['img']  ?>" class="img" style="height:180px; width:150px;">
                  <?php  }?>
                  </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Details</th>
                        <th>Student Details</th>
                 
                      </tr>
                    </thead>
                    <tbody>
                     
                      <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>

                      <tr>
                        <td>Reg. No.</td>
                        <td><?php echo $res['Registration']  ?></td>
                      </tr>
                        <tr>
                        <td>Full Name</td>
                        <td><?php echo $res['Name']  ?></td>
                      </tr>
                        <tr>
                        <td>Father Name</td>
                        <td><?php echo $res['fname']  ?></td>
                      </tr>
                        <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $res['dob']  ?></td>
                      </tr>
                        <tr>
                        <td>Aadhar No.</td>
                        <td><?php echo $res['adhar']  ?></td>
                      </tr>
                        <tr>
                        <td>Study</td>
                        <td><?php echo $res['study']  ?></td>
                      </tr>
                      <tr>
                        <td>Institute</td>
                        <td><?php echo $res['institute']  ?></td>
                      </tr>
                      <tr>
                        <td>Father Occupation</td>
                        <td><?php echo $res['occupation']  ?></td>
                      </tr>
                      <?php  }?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Student Hostel Details</h4>
                                     <table class="table">
                      <thead>
                        <tr>
                          <th>Details</th>
                          <th>Student Details</th>
                   
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>

                        <tr>
                          <td>Room Type</td>
                          <td><?php echo $res['roomtype']  ?></td>
                        </tr>
                          <tr>
                          <td>Floor No.</td>
                          <td><?php echo $res['floor']  ?></td>
                        </tr>
                          <tr>
                          <td>Room No.</td>
                          <td><?php echo $res['roomno']  ?></td>
                        </tr>
                          <tr>
                          <td>Seat No.</td>
                          <td><?php echo $res['seatno']  ?></td>
                        </tr>
                          <tr>
                          <td>Seat Type</td>
                          <td><?php echo $res['seattype']  ?></td>
                        </tr>
                          <tr>
                          <td>Fees</td>
                          <td><?php echo $res['Rent']  ?></td>
                        </tr>
                          <tr>
                          <td>Date</td>
                          <td><?php echo $res['Date']  ?></td>
                        </tr>

                        <?php  }
                        $selectquery = " select * from payments where Registration='$Registration' and ptype='1st Advance'";
                        $query= mysqli_query($conn,$selectquery);
                        $num= mysqli_num_rows($query);

                        while($res= mysqli_fetch_array($query)){

                        ?>
                          <tr>
                          <td>1st Advance Fees</td>
                          <td><?php echo $res['rent']  ?></td>
                        </tr>
                        <?php  }
                        $selectquery = " select * from payments where Registration='$Registration' and ptype='2nd Advance'";
                        $query= mysqli_query($conn,$selectquery);
                        $num= mysqli_num_rows($query);

                        while($res= mysqli_fetch_array($query)){
                        ?>

                        <tr>
                          <td>2nd Advance Fees</td>
                          <td><?php echo $res['rent']  ?></td>
                        </tr>
                          
                        <?php  }?>
                       
                      </tbody>
                    </table>


                    <h4 class="card-title mt-5 ">Student Contact Details</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Details</th>
                            <th>Student Details</th>
                     
                          </tr>
                        </thead>
                        <tbody>
                        <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
 
?>
                          <tr>
                            <td>Student Contact</td>
                            <td><?php echo $res['Scontact']  ?></td>
                          </tr>
                          <tr>
                            <td>Student Email</td>
                            <td><?php echo $res['email']  ?></td>
                          </tr>
                          <tr>
                            <td>Student Whatsapp</td>
                            <td><?php echo $res['whatsapp']  ?></td>
                          </tr>
                            <tr>
                            <td>Father Contact</td>
                            <td><?php echo $res['Fcontact']  ?></td>
                          </tr>
                            <tr>
                            <td>Local Gaurdian</td>
                            <td><?php echo $res['Lgaurdian']  ?></td>
                          </tr>
                            <tr>
                            <td>Gaurdian Contact</td>
                            <td><?php echo $res['Lcontact']  ?></td>
                          </tr>
                            <tr>
                            <td>Address</td>
                            <td><?php echo $res['address']  ?></td>
                          </tr>
                          <?php  }?>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Monthly Fees</h4>
                 
                    </p>
                    <table id="datatableid" class="table table-striped">
                      <thead>
                        <tr>
                          <th> Date</th>
                          <th> Month</th>
                          <th> Year</th>
                          <th> Fees </th>
                          <th> Mode </th>
                          <th> Type </th>
                          <th> Pending </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$select = " select * from payments where Registration='$Registration' AND ptype='Monthly' ";
$queryselect= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryselect);
while($ress= mysqli_fetch_array($queryselect)){
 
?>
     
                        <tr>
                          <td >  <?php echo $ress['date']  ?>  </td>
                          <td> <?php echo $ress['month']  ?> </td>
                          <td>  <?php echo $ress['year']  ?></td>
                          <td> <?php echo $ress['rent']  ?> </td>
                          <td> <?php echo $ress['pmode']  ?> </td>
                          <td> <?php echo $ress['ptype']  ?> </td>
                          <td> <?php echo $ress['pendingr']  ?></td>
                          <td> <?php echo $ress['paystatus']  ?></td>
                        </tr>
                        <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Advance Fees Payments</h4>
                 
                    </p>
                    <table id="datatableid1" class="table table-striped">
                      <thead>
                        <tr>
                          <th> Date</th>
                          <th> Month</th>
                          <th> Year</th>
                          <th> Fees </th>
                          <th> Mode </th>
                          <th> Type </th>
                          <th> Pending </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include 'config/config.php';
$Registration = $_GET['Registration'];
$select = " select * from payments where Registration='$Registration' AND ptype='1st Advance' or ptype='2nd Advance' ";
$queryselect= mysqli_query($conn,$select);
$numm= mysqli_num_rows($queryselect);
while($ress= mysqli_fetch_array($queryselect)){
 
?>
     
                        <tr>
                          <td >  <?php echo $ress['date']  ?>  </td>
                          <td> <?php echo $ress['month']  ?> </td>
                          <td>  <?php echo $ress['year']  ?></td>
                          <td> <?php echo $ress['rent']  ?> </td>
                          <td> <?php echo $ress['pmode']  ?> </td>
                          <td> <?php echo $ress['ptype']  ?> </td>
                          <td> <?php echo $ress['pendingr']  ?></td>
                          <td> <?php echo $ress['paystatus']  ?></td>
                        </tr>
                        <?php  }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
