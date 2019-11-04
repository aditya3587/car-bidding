<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
    include 'config.php';
  
if(isset($_GET['id'])){

    $id = $_GET['id'];
     $sql = "select * from users where id='".$id."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){
    $row=mysqli_fetch_assoc($result);
?>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Evaluators Master</h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <div class="col-lg-12">
                              <?php

                                  if(isset($_SESSION['success'])){ ?>
        
                                      <div id="successMessage" class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <?php echo $_SESSION['success'];?>
                                            </div>
                                   <?php  
                                  }
        
                                  if(isset($_SESSION['error'])){ ?>
        
                                     <div id="successMessage" class="alert alert-danger alert-dismissable">
                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <?php echo $_SESSION['error']; ?>
                                       </div>
                                  <?php
                                  }
        
                                  unset($_SESSION['success']);
                                  unset($_SESSION['error']);
                                ?>
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="m-t-0 header-title mb-4">Edit Evaluator</h4>

                                      <form autocomplete="off" name="myform" method="post" action="sv_evaluator.php">
                                          <input type="hidden" name="hiddenId" value="<?php echo $id; ?>" required>
                                            <div class="form-group">
                                                <label for="name">Name<span class="text-danger">*</span></label>
                                                <input type="text" name="name" parsley-trigger="change" required
                                                        placeholder="Enter name" class="form-control" id="name" maxlength="30" value="<?php echo $row['name']; ?>">
                                                        <small><font color="#99A3AE">Charecter Limit : 30</font></small>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email id<span class="text-danger">*</span></label>
                                                    <input type="email" name="emailId" parsley-trigger="change" required 
                                                            placeholder="Enter email id" class="form-control" id="emailId" value="<?php echo $row['emailId']; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="tel">Contact no<span class="text-danger">*</span></label>
                                                  <input type="text" name="contactNo" parsley-trigger="change" required
                                                          placeholder="Enter contact no" class="form-control" id="contactNo" maxlength="10" value="<?php echo $row['contactNo']; ?>">
                                                          <small><font color="#99A3AE">Enter 10 digit mobile number</font></small>
                                                </div>
                                            </div>
                                            <div class="form-group text-right m-b-0">
                                              <input type="submit" class="btn btn-primary" name="submit" value="Edit Evaluator">
                                            </div>

                                        </form>

                                  </div>
                              </div>
                          </div>


                        </div> <!-- End row -->








                    </div> <!-- container -->

                </div> <!-- content -->



<!-- ============================================================ -->
<?php

    }
}
  include 'modules/footer.php';
?>
