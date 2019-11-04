<?php
  include 'modules/header.php';
  include 'config.php';
?>

<?php
if(isset($_GET['id'])){

	$id = $_GET['id'];
     $sql = "select * from ads where id='".$id."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){
    $row=mysqli_fetch_assoc($result);

?>
<!-- ===================================================================== -->

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
                                    <h4 class="page-title float-left">Edit Ad Master</h4>

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
                                      <h4 class="m-t-0 header-title mb-4">Edit Ad Master</h4>

                                      <form autocomplete="off" name="myform" method="post" action="sv_ads.php">

                                      	<input type="hidden" name="hiddenId" id="hiddenId" value="<?php echo $id;?>">

                                            <div class="form-group">
                                                <label for="name">Owner Name<span class="text-danger">*</span></label>
                                                <input type="text" name="ownerName" parsley-trigger="change" required
                                                        placeholder="Enter name" class="form-control" id="ownerName" value="<?php echo $row['ownerName'];?>" maxlength="60">
                                                        <small><font color="#99A3AE">Charecter Limit : 60</font></small>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Owner Contact Number<span class="text-danger">*</span></label>
                                                    <input type="text" name="ownerContactNumber" parsley-trigger="change" required
                                                            placeholder="Owner Contact Number" class="form-control" id="contactNo" value="<?php echo $row['ownerContactNumber'];?>" maxlength="10">
                                                            <small><font color="#99A3AE">Enter 10 digit mobile number</font></small>
                                                </div>
                                                
                                            </div>


                                            <div class="form-row">

                                            	<div class="form-group col-md-6">
                                                    <label for="email">Car Company<span class="text-danger">*</span></label>
                                                    <input type="text" name="carCompany" parsley-trigger="change" required
                                                            placeholder="Car Company" class="form-control" id="carCompany" value="<?php echo $row['carCompany'];?>">
                                                </div>
                                               
                                                <div class="form-group col-md-6">
                                                  <label for="tel">Car Model<span class="text-danger">*</span></label>
                                                  <input type="text" name="carModel" parsley-trigger="change" required
                                                          placeholder="Enter Car Model" class="form-control" id="carModel" value="<?php echo $row['carModel'];?>">
                                                          
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-6">
                                                  <label for="tel">Base Price<span class="text-danger">*</span></label>
                                                  <input type="text" name="basePrice" parsley-trigger="change" required
                                                          placeholder="Enter Base Price" class="form-control" id="basePrice" value="<?php echo $row['basePrice'];?>">
                                                          
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label for="tel">ESP<span class="text-danger">*</span></label>
                                                  <input type="text" name="esp" parsley-trigger="change" required
                                                          placeholder="Enter Estimated Selling Price" class="form-control" id="esp" value="<?php echo $row['carCompany'];?>">
                                                          
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Start Date<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="startDateBid" name="startDate" value="<?php if($row['startDate']!='0000-00-00 00:00:00'){ echo date('Y-m-d',strtotime($row['startDate'])); } ?>"  required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                        </div>
                                                    </div><!-- input-group -->
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label for="tel">End date<span class="text-danger">*</span></label>
                                                  <div class="input-group">
                                                      <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="endDateBid" name="endDate" value="<?php if($row['endDate']!='0000-00-00 00:00:00'){ echo date('Y-m-d',strtotime($row['endDate'])); } ?>" required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                      </div>
                                                  </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <div class="form-group text-right m-b-0">
                                              <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                            </div>

                                        </form>

                                  </div>
                              </div>
                          </div>


                        </div> <!-- End row -->








                    </div> <!-- container -->

                </div> <!-- content -->


<?php

	}else{
		header('location:ads_master.php');
	}

}else{

	header('location:ads_master.php');

}

?>
<!-- ============================================================ -->
<?php
  include 'modules/footer.php';
?>


