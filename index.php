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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">

            <div class="container">
              <div class="row">
                <div class="col">
                <img src="assets/images/loader.gif" height="375px" class="card-img-top" >
                </div>
                <div class="col">
                <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                 <h3 style="color:#9a55ff;"> <i class="mdi mdi-home"></i> Royal Boys Hostel</h3>
                </div>
             
                <form class="pt-3" action="login.php" method="post">
                  <?php if (isset($_GET['error'])) { ?>
     	          	<p class="error"><?php echo $_GET['error']; ?></p>
                	<?php } ?>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="uname" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input  type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>

                
                  <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                  </div>
               
                 
                </form>
              </div>
                </div>
  
              </div>
            </div> 
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
 
    <?php include "components/scripts.php" ?>
  </body>
</html>