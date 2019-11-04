<!-- ===================================================================== -->
<?php

  $currentDate = date('Y-m-d H:i:s');

  include 'modules/header.php';
  include 'config.php';


     $sql = "select ads.*,users.name as evaluatorName from ads inner join users on ads.userId = users.id where ads.basePrice!=0 and startDate<='".$currentDate."' and startDate!='0000-00-00 00:00:00' ";
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
                                    <h4 class="page-title float-left">Bid Master</h4>

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
                                      <h4 class="m-t-0 header-title mb-4">View Biddings</h4>

                                      <div class="table-responsive">
                                          <table id="datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                      <td><b>&#8377;<?php echo number_format($row['basePrice'],2); ?></b></td>

                                                       <td><b>&#8377;<?php echo number_format($row['esp'],2); ?></b></td>

                                                      <td><?php if($row['startDate']!='0000-00-00 00:00:00'){ echo  date('Y-m-d',strtotime($row['startDate'])); }else{ echo '-';} ?></td>
                                                      <td><?php if($row['endDate']!='0000-00-00 00:00:00'){ echo  date('Y-m-d',strtotime($row['endDate'])); }else{ echo '-';} ?></td>
                                                     
                                                      
                                                      <td>
                                                        <a href="bid-in-progress.php?adsId=<?php echo $row['id'];?>" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                          <i class="far fa-eye"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                          <i class="far fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                  </tr>
                                                  
                                            <?php $counter++; } ?>
                                            
                                                  <!--<tr>-->
                                                  <!--    <th scope="row">1</th>-->
                                                  <!--    <td>Swift</td>-->
                                                  <!--    <td>Maruti Suzuki</td>-->
                                                  <!--    <td><b>&#8377; 5,20,000</b></td>-->
                                                  <!--    <td>-</td>-->
                                                  <!--    <td>-</td>-->
                                                  <!--    <td><span class="label label-warning">Pending</span></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="set-bid.php" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
                                                  <!--        <i class="far fa-eye"></i>-->
                                                  <!--      </a>-->
                                                  <!--      &nbsp;-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">-->
                                                  <!--        <i class="far fa-trash-alt"></i>-->
                                                  <!--      </a>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->

                                                  <!--<tr>-->
                                                  <!--    <th scope="row">2</th>-->
                                                  <!--    <td>Go+</td>-->
                                                  <!--    <td>Datsun</td>-->
                                                  <!--    <td><b>&#8377; 3,10,000</b></td>-->
                                                  <!--    <td>15 April, 2019</td>-->
                                                  <!--    <td>01 May, 2019</td>-->
                                                  <!--    <td><span class="label label-default">Not Started</span></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
                                                  <!--        <i class="far fa-eye"></i>-->
                                                  <!--      </a>-->
                                                  <!--      &nbsp;-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">-->
                                                  <!--        <i class="far fa-trash-alt"></i>-->
                                                  <!--      </a>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->

                                                  <!--<tr>-->
                                                  <!--    <th scope="row">3</th>-->
                                                  <!--    <td>Innova</td>-->
                                                  <!--    <td>Toyota</td>-->
                                                  <!--    <td><b>&#8377; 9,10,000</b></td>-->
                                                  <!--    <td>02 April, 2019</td>-->
                                                  <!--    <td>20 April, 2019</td>-->
                                                  <!--    <td><span class="label label-primary">In Progress</span></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="bid-in-progress.php" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
                                                  <!--        <i class="far fa-eye"></i>-->
                                                  <!--      </a>-->
                                                  <!--      &nbsp;-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">-->
                                                  <!--        <i class="far fa-trash-alt"></i>-->
                                                  <!--      </a>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->

                                                  <!--<tr>-->
                                                  <!--    <th scope="row">4</th>-->
                                                  <!--    <td>Innova</td>-->
                                                  <!--    <td>Toyota</td>-->
                                                  <!--    <td><b>&#8377; 7,10,000</b></td>-->
                                                  <!--    <td>10 March, 2019</td>-->
                                                  <!--    <td>20 March, 2019</td>-->
                                                  <!--    <td><span class="label label-green">Car Sold</span></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="bid-completed.php" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
                                                  <!--        <i class="far fa-eye"></i>-->
                                                  <!--      </a>-->
                                                  <!--      &nbsp;-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">-->
                                                  <!--        <i class="far fa-trash-alt"></i>-->
                                                  <!--      </a>-->
                                                  <!--    </td>-->
                                                  <!--</tr>-->

                                                  <!--<tr>-->
                                                  <!--    <th scope="row">5</th>-->
                                                  <!--    <td>Baleno</td>-->
                                                  <!--    <td>Maruti Suzuki Nexa</td>-->
                                                  <!--    <td><b>&#8377; 5,35,000</b></td>-->
                                                  <!--    <td>10 March, 2019</td>-->
                                                  <!--    <td>20 March, 2019</td>-->
                                                  <!--    <td><span class="label label-danger">Aborted</span></td>-->
                                                  <!--    <td>-->
                                                  <!--      <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">-->
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
                     location.href = 'sv_bid_master.php?id='+id+'&status='+status+'&action=isConfirm';  
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
                     location.href = 'sv_bid_master.php?id='+id+'&status='+status+'&action=isConfirm';    
                 } else {   
                     swal("Cancelled", "Cancelled", "error");   
                 } 
             });
                
            
        }
     
    
    
 }
</script>
