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
            
         <?php
         require 'config/config.php';
         if(isset($_POST['submit1'])){
          
         
          
           $Registration			= $_POST['reg'];
           
         
         }
         include 'config/config.php';

$selectquery = " select * from student where Registration='$Registration' ";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);
while($res= mysqli_fetch_array($query)){
$Name = $res['Name'];
$Scontact = $res['Scontact'];

}
         
         ?>
 

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                      <div class="col">
                         <h4 class="card-title"><?php echo $Name  ?> All Payments (Contact : <?php echo $Scontact  ?>)</h4>
                       
                      </div>
                      <div class="col">
                        <a class="btn btn-danger" href="pdf/student-pay-pdf.php?Registration=<?php echo $Registration ?>&Name=<?php echo $Name ?>&Scontact=<?php echo $Scontact ?>">Generate PDF</a>
                      </div>
                    </div>
                 
                     
                    <div class="table-responsive" id="payment" >
                      <table id="datatableid" class="table">
                        <thead>
                          <tr>
                        
                            <th> Reg. No. </th>
                            <th> Name </th>
                        
                            <th> Fees </th>
                            <th> Mode </th>
                          <th> Type </th>
                            <th> Year </th>
                            <th> Month </th>
                            <th>Paid Date </th>
                            <th> Payment Status </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
include 'config/config.php';

$selectquery = " select * from payments where Registration='$Registration'  ORDER BY recorddate DESC";
$query= mysqli_query($conn,$selectquery);
$num= mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){

?>
                          <tr>
                         
                            <td><?php echo $res['Registration']  ?></td>
                            <td><?php echo $res['Name']  ?></td>
                            <td><?php echo $res['rent']  ?></td>
                            <td> <?php echo $res['pmode']  ?> </td>
                          <td> <?php echo $res['ptype']  ?> </td>
                            <td><?php echo $res['year']  ?></td>
                            <td><?php echo $res['month']  ?></td>
                            <td><?php echo $res['date']  ?></td>
                            <td><?php echo $res['paystatus']  ?></td>
                          </tr>
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
