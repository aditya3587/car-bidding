<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
  include 'config.php';

  if(isset($_GET['adsId'])){

    $sql = "select * from ads where id='".$_GET['adsId']."' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)){
    $row=mysqli_fetch_assoc($result);

    $sqlMax = "select max(bidderAmount) as maxBidderAmount from bid_master where adsId='".$_GET['adsId']."' ";
    $resultMax = mysqli_query($conn, $sqlMax);

    $rowMax=mysqli_fetch_assoc($resultMax);

    //Get bidders data
    $sqlBidderData = "select * from bid_master where adsId='".$_GET['adsId']."' order by bidderAmount desc";
    $resultBidderData = mysqli_query($conn, $sqlBidderData);


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
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h3 class="m-t-0 text-dark-gray mb-4"><b><?php echo $row['carModel']; ?></b></h3>

                                      <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                          <div class="mini-stat clearfix">
                                            <div class="mini-stat-info">
                                                  Owner Name
                                                  <span class="counter">
                                                    <?php echo $row['ownerName']; ?>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                          <div class="mini-stat clearfix">
                                            <div class="mini-stat-info">
                                                  Contact Number
                                                  <span class="counter">
                                                    <?php echo $row['ownerContactNumber']; ?>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                          <div class="mini-stat clearfix">
                                            <div class="mini-stat-info">
                                                  Base Price
                                                  <span class="counter">
                                                    &#8377; <?php echo number_format($row['basePrice'],2); ?>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                          <div class="mini-stat clearfix">
                                            <div class="mini-stat-info text-red">
                                                  Estimated Selling Price
                                                  <span class="counter">
                                                    &#8377; <?php echo number_format($row['esp'],2); ?>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>

                                        <div class="col-md-4 col-sm-6">
                                          <div class="mini-stat bg-red text-white clearfix">
                                            <div class="mini-stat-info">
                                                  Bid Amount
                                                  <span class="counter">
                                                    &#8377; <?php echo number_format($rowMax['maxBidderAmount'],2); ?>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                  </div>
                              </div>
                          </div>


                        </div> <!-- End row -->



                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="m-t-0 header-title mb-4">Aspirant List</h4>

                                      <div class="table-responsive">
                                          <table id="datatable" class="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                              <thead>
                                                  <tr>
                                                      <th width="30">#</th>
                                                      <th>Name</th>
                                                      <th>Email ID</th>
                                                      <th>Contact No</th>
                                                      <th>Bid Amount</th>
                                                      <th width="70">Rank</th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                            <?php
                                              $counter = 1;
                                              while ($rowBidderData=mysqli_fetch_assoc($resultBidderData)) { ?>
                                                  <tr>
                                                      <th scope="row"><?php echo $counter; ?></th>
                                                      <td><?php echo $rowBidderData['bidderName']; ?></td>
                                                      <td><?php echo $rowBidderData['bidderEmail']; ?></td>
                                                      <td><?php echo $rowBidderData['bidderContactNo']; ?></td>
                                                      <td><b>&#8377; <?php echo number_format($rowBidderData['bidderAmount'],2); ?></b></td>

                                                      <?php if($counter==1){?>
                                                      <td>
                                                        <a class="btn bg-green text-white">
                                                          <?php echo $counter; ?>
                                                        </a>
                                                      </td>
                                                    <?php }else{ ?>

                                                      <td>
                                                        <a class="btn bg-light-gray">
                                                          <?php echo $counter; ?>
                                                        </a>
                                                      </td>

                                                   <?php } ?>
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

    }else{
      header('location:bid_master.php');
    }

  }else{
    header('location:bid_master.php');
  }
  include 'modules/footer.php';
?>
