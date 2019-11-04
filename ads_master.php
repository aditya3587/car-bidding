<!-- ===================================================================== -->
<?php
  include 'modules/header.php';

  include 'config.php';
  
    $sql = "select ads.*,users.name as evaluatorName from ads inner join users on ads.userId = users.id where ads.status!=1";
    $result = mysqli_query($conn, $sql);

    $sqlActive = "select ads.*,users.name as evaluatorName from ads inner join users on ads.userId = users.id where ads.status=1";
    $resultActive = mysqli_query($conn, $sqlActive);
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
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">

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
                                      <ul class="nav nav-tabs tabs-bordered nav-justified">
                                            <li class="nav-item">
                                                <a href="#tab1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    <span class="d-block d-sm-none"><i class="fas fa-plus"></i></span>
                                                    <span class="d-none d-sm-block">Awaiting For Approval</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab2" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-car"></i></span>
                                                    <span class="d-none d-sm-block">Approved Cars</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab3" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-gavel"></i></span>
                                                    <span class="d-none d-sm-block">Bidding</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#tab4" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-flag"></i></span>
                                                    <span class="d-none d-sm-block">Sold Cars</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                          <!-- Awaiting For Approval -->
                                          <div class="tab-pane active" id="tab1">
                                            <div class="table-responsive">
                                                <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th width="30">#</th>
                                                            <th>Car Model</th>
                                                            <th>Car Company</th>
                                                            <th>Category</th>
                                                            <th>Owner Name</th>
                                                            <th>Owner Contact</th>
                                                            <th>Evaluator Name</th>
                                                            <th>Edit</th>
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
                                                            <td>Category</td>
                                                            <td><?php echo $row['ownerName']; ?></td>
                                                            <td><?php echo $row['ownerContactNumber']; ?>
                                                            </td>
                                                            <td><?php echo $row['evaluatorName']; ?>
                                                              
                                                            </td>

                                                            <td>
                                                              <a href="edit_ads_master.php?id=<?php echo $row['id'];?>" class="btn btn-icon btn-sm waves-effect waves-light btn-warning">
                                                                <i class="fas fa-pencil-alt"></i>
                                                              </a>
                                                            </td>

                                                            <td>
                                                              <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                                <i class="fas fa-check"></i>
                                                              </a>
                                                              &nbsp;
                                                              <?php if($row['status']==1){ ?>
                                                              <a onclick="isConfirm(<?php echo $row['id']; ?>,'0');" class="btn btn-icon btn-sm waves-effect waves-light btn-danger" title="Inactive">
                                                                <!--<i class="far fa-trash-alt"></i>-->
                                                                <i class="fas fa-times"></i>
                                                              </a>
                                                              
                                                          <?php }else{ ?>
                                                          
                                                              <a onclick="isConfirm(<?php echo $row['id']; ?>,'1');" class="btn btn-icon btn-sm waves-effect waves-light btn-green" title="Active">
                                                                <i class="fas fa-check text-white"></i>
                                                              </a>
                                                          
                                                          <?php
                                                              
                                                          } ?>
                                                            </td>

                                                          </tr>
                                                        <?php $counter++; } ?>


                                                        
                                                        

                                                    </tbody>
                                                </table>
                                            </div>
                                          </div><!-- end awaiting for approval-->

                                          <!-- Approved cars -->
                                          <div class="tab-pane" id="tab2">
                                            <div class="table-responsive">
                                                <table id="approved" class="table nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                  <thead>
                                                      <tr>
                                                          <th width="30">#</th>
                                                          <th>Car Model</th>
                                                          <th>Car Company</th>
                                                          <th>Category</th>
                                                          <th>Owner Name</th>
                                                          <th>Owner Contact</th>
                                                          <th>Evaluator Name</th>
                                                          <th>Base Price</th>
                                                          <th>Edit</th>
                                                          <th width="150">Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                    $counter = 1;
                                                    while ($rowActive=mysqli_fetch_assoc($resultActive)) { ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $counter; ?></th>
                                                            <td><?php echo $rowActive['carModel']; ?></td>
                                                            <td><?php echo $rowActive['carCompany']; ?></td>
                                                            <td>Category</td>
                                                            <td><?php echo $rowActive['ownerName']; ?></td>
                                                            <td><?php echo $rowActive['ownerContactNumber']; ?>
                                                              
                                                            </td>
                                                            <td><?php echo $rowActive['evaluatorName']; ?>
                                                              
                                                            </td>
                                                          <?php if($rowActive['basePrice']){ ?>
                                                            <td><b class="text-green"><?php echo number_format($rowActive['basePrice'],2); ?></b></td>
                                                          <?php 
                                                          }else{ ?>
                                                            <td><b class="text-red">Not Set</b></td>
                                                          <?php
                                                              
                                                          }?>
                                                          <td>
                                                             <a href="edit_ads_master.php?id=<?php echo $rowActive['id'];?>" class="btn btn-icon btn-sm waves-effect waves-light btn-warning">
                                                                <i class="fas fa-pencil-alt"></i>
                                                              </a>
                                                          </td>
                                                          <td>

                                                            <a href="set_base_price.php?id=<?php echo base64_encode($rowActive['id']); ?>" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                              <i class="far fa-eye"></i>
                                                            </a>

                                                            &nbsp;
                                                            <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                              <i class="far fa-trash-alt"></i>
                                                            </a>
                                                          </td>
                                                      </tr>

                                                    <?php } ?>
                                                      

                                                  </tbody>
                                                </table>
                                            </div>
                                          </div><!-- end approved cars-->


                                          <?php

                                          $sqlBid = "select ads.*,users.name as evaluatorName from ads inner join users on ads.userId = users.id where ads.basePrice!=0";
                                          $resultBid = mysqli_query($conn, $sqlBid);
                                          ?>

                                          <!-- Bidding -->
                                          <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table id="bidding" class="table nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th width="30">#</th>
                                                            <th>Car Model</th>
                                                            <th>Car Company</th>
                                                            <th>Category</th>
                                                            <th>Base Price</th>
                                                            <th>ESP</th>
                                                            <th>Bid Start Date</th>
                                                            <th>Bid End Date</th>
                                                            <th>Status</th>
                                                            <th width="120">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php
                                                    $counter = 1;
                                                    while ($rowBid=mysqli_fetch_assoc($resultBid)) { ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $counter++; ?></th>
                                                            <td><?php echo $rowBid['carModel']; ?></td>
                                                            <td><?php echo $rowBid['carCompany']; ?></td>
                                                            <td>Stock</td>
                                                            <td><b>&#8377; <?php echo $rowBid['basePrice']; ?></b></td>
                                                            <td><b>&#8377; <?php echo $rowBid['basePrice']; ?></b></td>

                                                            <td><?php if($rowBid['startDate']!='0000-00-00 00:00:00'){ echo  date('Y-m-d',strtotime($rowBid['startDate'])); }else{ echo '-';} ?></td>
                                                            <td><?php if($rowBid['endDate']!='0000-00-00 00:00:00'){ echo  date('Y-m-d',strtotime($rowBid['endDate'])); }else{ echo '-';} ?></td>
                                                            
                                                            <td><span class="label label-warning">Pending</span></td>
                                                            <td>
                                                              <a href="set_bid.php?id=<?php echo base64_encode($rowBid['id']); ?>" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                              <i class="far fa-eye"></i>
                                                            </a>
                                                              &nbsp;
                                                              <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                                <i class="far fa-trash-alt"></i>
                                                              </a>
                                                            </td>
                                                        </tr>

                                                      <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                          </div><!-- end bidding-->

                                          <!-- Car Sold -->
                                          <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table id="sold" class="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                  <thead>
                                                      <tr>
                                                          <th width="30">#</th>
                                                          <th>Car Model</th>
                                                          <th>Car Company</th>
                                                          <th>Winner Name</th>
                                                          <th>Winner Contact</th>
                                                          <th>Base Price</th>
                                                          <th>Bid Amount</th>
                                                          <th width="150">Actions</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Innova</td>
                                                        <td>Toyota</td>
                                                        <td>David Warner</td>
                                                        <td>78987 98777</td>
                                                        <td><b>&#8377; 4,10,000</b></td>
                                                        <td><b>&#8377; 4,50,000</b></td>
                                                        <td>
                                                          <a href="bid-completed.php" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                            <i class="far fa-eye"></i>
                                                          </a>
                                                          &nbsp;
                                                          <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                            <i class="far fa-trash-alt"></i>
                                                          </a>
                                                        </td>
                                                    </tr>

                                                  </tbody>
                                                </table>
                                            </div>
                                          </div><!-- end car sold-->

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
