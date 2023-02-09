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
                    <h4 class="card-title mb-5">Add New Hostel Seat</h4>
                    <form class="form-sample" name="seat" method="post" action="forms/seat-add.php">
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Floor No.</label>
                            <div class="col-sm-9">
                              <input type="text" name="floor" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Room No.</label>
                            <div class="col-sm-9">
                              <input type="text"  name="room" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat No.</label>
                            <div class="col-sm-9">
                              <input type="text"  name="seat" class="form-control" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Seat Type</label>
                            <div class="col-sm-9">
                               <select class="form-control"  name="tseat" required>
                                <option>Choose Seat Type</option>
                                <option>Single</option>
                                <option>Double</option>
                                <option>Triple</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Room Type</label>
                            <div class="col-sm-9">
                               <select class="form-control"  name="troom" required>
                                <option>Choose Room Type</option>
                                <option>AC</option>
                                <option>Non-AC</option>
                               
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control"  name="status" required>
                                <option>Choose Status</option>
                                <option>Filled</option>
                                <option>Vacant</option>
                                
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                       
                      
                     
                       <button type="submit" id="submit" name="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
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
    <?php include "components/scripts.php" ?>
  </body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
