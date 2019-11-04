<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
  include 'config.php';
  
    $sql = "select ads.*,users.name as evaluatorName from ads inner join users on ads.userId = users.id";
    $result = mysqli_query($conn, $sql);
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
                                    <h4 class="page-title float-left">Ads Master</h4>

                                    <div class="clearfix"></div>
                                    
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
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="m-t-0 header-title mb-4">View Ads</h4>

                                      <div class="table-responsive">
                                          <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                              <thead>
                                                  <tr>
                                                      <th width="30">#</th>
                                                      <th>Car Model</th>
                                                      <th>Car Company</th>
                                                      <th>Owner Name</th>
                                                      <th>Owner Contact</th>
                                                      <th>Evaluator Name</th>
                                                      <th>Base Price</th>
                                                      <th width="150">Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  
                                        <?php
                                              $counter = 1;
                                              while ($row=mysqli_fetch_assoc($result)) { ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $counter; ?></th>
                                                      <td><?php echo $row['carModel']; ?></td>
                                                      <td><?php echo $row['carCompany']; ?></td>
                                                      <td><?php echo $row['ownerName']; ?></td>
                                                      <td><?php echo $row['ownerContactNumber']; ?></td>
                                                      <td><?php echo $row['evaluatorName']; ?></td>
                                                      
                                                      <?php if($row['basePrice']){ ?>
                                                        <td><b class="text-green"><?php echo number_format($row['basePrice'],2); ?></b></td>
                                                      <?php 
                                                      }else{ ?>
                                                        <td><b class="text-red">Not Set</b></td>
                                                      <?php
                                                          
                                                      }?>
                                                      
                                                      <td>
                                                        <a href="set_base_price.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                          <i class="far fa-eye"></i>
                                                        </a>
                                                        &nbsp;
                                                        
                                                        <?php if($row['status']==1){ ?>
                                                            <a onclick="isConfirm(<?php echo $row['id']; ?>,'0');" class="btn btn-icon btn-sm waves-effect waves-light btn-danger" title="Inactive">
                                                              <!--<i class="far fa-trash-alt"></i>-->
                                                              <i class="far fa-times-circle"></i>
                                                            </a>
                                                            
                                                        <?php }else{ ?>
                                                        
                                                            
                                                            
                                                            <a onclick="isConfirm(<?php echo $row['id']; ?>,'1');" class="btn btn-icon btn-sm waves-effect waves-light btn-green" title="Active">
                                                              <i class="far fa-check-circle"></i>
                                                            </a>
                                                        
                                                        <?php
                                                            
                                                        } ?>
                                                        
                                                        
                                                      </td>
                                                  </tr>
                                                  
                                            <?php $counter++; } ?>
                                                  <!--<tr>-->
                                                  <!--    <th scope="row">2</th>-->
                                                  <!--    <td>Go+</td>-->
                                                  <!--    <td>Datsun</td>-->
                                                  <!--    <td>Pete Sariya</td>-->
                                                  <!--    <td>88989 88898</td>-->
                                                  <!--    <td>Smith Doe</td>-->
                                                  <!--    <td><b>&#8377; 5,20,000</b></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="set-base-price.php" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
                                                  <!--        <i class="far fa-eye"></i>-->
                                                  <!--      </a>-->
                                                  <!--      &nbsp;-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">-->
                                                  <!--        <i class="far fa-trash-alt"></i>-->
                                                  <!--      </a>-->
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
    
    function isConfirm(id,status){
        
        if(status==1){
            
                swal({   
                 title: 'Are you sure?',
                 text: "You want to Active!",
                 type: "success",   
                 showCancelButton: true,   
                 confirmButtonColor: "#AEDEF4",   
                 confirmButtonText: "Yes!",   
                 cancelButtonText: "No!",   
                 closeOnConfirm: false,  
                 closeOnCancel: false 
             }, function(isConfirm){   
                 if (isConfirm) {     
                     location.href = 'sv_ads.php?id='+id+'&status='+status+'&action=isConfirm';  
                 } else {   
                     swal("Cancelled", "Cancelled", "error");   
                 } 
             });
                
        }else{
            
            swal({   
                 title: 'Are you sure?',
                 text: "You want to Inactive!",
                 type: "warning",   
                 showCancelButton: true,   
                 confirmButtonColor: "#DD6B55",   
                 confirmButtonText: "Yes!",   
                 cancelButtonText: "No!",   
                 closeOnConfirm: false,  
                 closeOnCancel: false 
             }, function(isConfirm){   
                 if (isConfirm) {     
                     location.href = 'sv_ads.php?id='+id+'&status='+status+'&action=isConfirm';    
                 } else {   
                     swal("Cancelled", "Cancelled", "error");   
                 } 
             });
                
            
        }
     
    
    
 }
</script>
