<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
  include 'config.php';
  
    $sqlTotalEvaluators = "select count(*) as cnt from users where userType='evaluators' ";
    $resultTotalEvaluators = mysqli_query($conn, $sqlTotalEvaluators);
    $rowTotalEvaluators=mysqli_fetch_assoc($resultTotalEvaluators);
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
                                    <h4 class="page-title float-left">Welcome !</h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="widget-panel widget-style-2 bg-blue">
                                    <i class="fas fa-user-friends"></i>
                                    <h2 class="m-0 text-white" data-plugin="counterup"><?php echo $rowTotalEvaluators['cnt']; ?></h2>
                                    <div>Total Evaluators</div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="widget-panel widget-style-2 bg-dark-blue">
                                    <i class="far fa-folder-open"></i>
                                    <h2 class="m-0 text-white" data-plugin="counterup">96</h2>
                                    <div>Total Ads</div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="widget-panel widget-style-2 bg-green">
                                    <i class="far fa-folder-open"></i>
                                    <h2 class="m-0 text-white" data-plugin="counterup">65</h2>
                                    <div>Total Bids</div>
                                </div>
                            </div>
                        </div> <!-- end row -->


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
                                      <h4 class="m-t-0 header-title mb-4">New Evaluators List</h4>

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
                                                  
                                                  $sqlEvaluatorsPending = "select * from users where userType='evaluators' and status='0' order by id desc";
                                                  $resultEvaluatorsPending = mysqli_query($conn, $sqlEvaluatorsPending);
                                                  
                                                  $counter = 1;
                                                while ($rowEvaluatorsPending=mysqli_fetch_assoc($resultEvaluatorsPending)) {
                                                  ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $counter; ?></th>
                                                      <td><?php echo $rowEvaluatorsPending['name']; ?></td>
                                                      <td><?php echo $rowEvaluatorsPending['emailId']; ?></td>
                                                      <td><?php echo $rowEvaluatorsPending['contactNo']; ?></td>
                                                      <td>
                                                        <a href="#" onclick="isApproved(<?php echo $rowEvaluatorsPending['id']; ?>);"  class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                          <i class="fas fa-check"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" onclick="isDeclined(<?php echo $rowEvaluatorsPending['id']; ?>);" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                          <i class="fas fa-times"></i>
                                                        </a>
                                                      </td>
                                                  </tr>
                                                  
                                                  <?php } ?>
                                                  <!--<tr>-->
                                                  <!--    <th scope="row">2</th>-->
                                                  <!--    <td>John Smith</td>-->
                                                  <!--    <td>johnsmith@email.com</td>-->
                                                  <!--    <td>87878 77878</td>-->
                                                  <!--    <td width="150">-->
                                                  <!--      <button class="btn btn-sm btn-approved">-->
                                                  <!--        APPROVED-->
                                                  <!--      </button>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->
                                                  <!--<tr>-->
                                                  <!--    <th scope="row">3</th>-->
                                                  <!--    <td>Johnathan Deo</td>-->
                                                  <!--    <td>johndeo@email.com</td>-->
                                                  <!--    <td>99889 88998</td>-->
                                                  <!--    <td width="150">-->
                                                  <!--      <button class="btn btn-sm btn-rejected">-->
                                                  <!--        REJECTED-->
                                                  <!--      </button>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->
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

<script>
     function isApproved(id){
        
        var status = '1';

        swal({   
             title: 'Are you sure?',
             text: "You want to approve!",
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes!",   
             cancelButtonText: "No!",   
             closeOnConfirm: false,  
             closeOnCancel: false 
         }, function(isConfirm){   
             if (isConfirm) {     

                 location.href = 'sv_evaluator.php?id='+id+'&action=changeStatus&status='+status;  
             } else {   

                 swal("Cancelled", "Cancelled", "error");   
             } 
         });
    }
    
    function isDeclined(id){
    var status="2";

    swal({   
             title: 'Are you sure?',
             text: "You want to decline!",
             type: "warning",   
             showCancelButton: true,   
             confirmButtonColor: "#DD6B55",   
             confirmButtonText: "Yes!",   
             cancelButtonText: "No!",   
             closeOnConfirm: false,  
             closeOnCancel: false 
         }, function(isConfirm){   
             if (isConfirm) {     

                 location.href = 'sv_evaluator.php?id='+id+'&action=changeStatus&status='+status;    
             } else {   

                 swal("Cancelled", "Cancelled", "error");   
             } 
         });
    
 }

</script>
