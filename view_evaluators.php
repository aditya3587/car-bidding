<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
  include 'config.php';
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
                                      <h4 class="m-t-0 header-title mb-4">View Evaluators</h4>

                                      <div class="table-responsive">
                                          <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                              <thead>
                                                  <tr>
                                                      <th width="30">#</th>
                                                      <th>Name</th>
                                                      <th>Email</th>
                                                      <th>Contact</th>
                                                      <th width="150">Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  
                                                  <?php
                                                  
                                                      $sqlEvaluatorsApproved = "select * from users where userType='evaluators' and status='1' order by id desc";
                                                      $resultEvaluatorsApproved = mysqli_query($conn, $sqlEvaluatorsApproved);
                                                      
                                                      $counter = 1;
                                                    while ($rowEvaluatorsApproved=mysqli_fetch_assoc($resultEvaluatorsApproved)) {
                                                      ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $counter; ?></th>
                                                      <td><?php echo $rowEvaluatorsApproved['name']; ?></td>
                                                      <td><?php echo $rowEvaluatorsApproved['emailId']; ?></td>
                                                      <td><?php echo $rowEvaluatorsApproved['contactNo']; ?></td>
                                                      <td>
                                                        <a href="edit_evaluator.php?id=<?php echo $rowEvaluatorsApproved['id']; ?>" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                          <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a onclick="isDelete(<?php echo $rowEvaluatorsApproved['id']; ?>);" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                          <i class="far fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                  </tr>
                                                 <?php $counter++; } ?>
                                              </tbody>
                                          </table>
                                      </div>

                                  </div>
                              </div>
                          </div>


                        </div> <!-- End row -->








                    </div> <!-- container -->

                </div> <!-- content -->



<!-- ============================================================ -->
<?php
  include 'modules/footer.php';
?>


<script type="text/javascript">
  

 function isDelete(id){
     
    swal({   
             title: 'Are you sure?',
             text: "You want to delete!",
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes!",   
             cancelButtonText: "No!",   
             closeOnConfirm: false,  
             closeOnCancel: false 
         }, function(isConfirm){   
             if (isConfirm) {     
alert("sdsds")
                 location.href = 'sv_evaluator.php?id='+id+'&action=delete';  
             } else {   
                 swal("Cancelled", "Cancelled", "error");   
             } 
         });
    
 }

</script>