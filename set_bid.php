<!-- ===================================================================== -->
<?php
include 'modules/header.php';
  include 'config.php';
  
  if(isset($_GET['id'])){

    $id = base64_decode($_GET['id']);
     $sql = "select * from ads where id='".$id."'";
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
                                      <h4 class="m-t-0 header-title mb-4">Set Bid Date</h4>

                                      <form autocomplete="off" name="myForm" method="post" action="sv_bid_master.php">
                                          <input type="hidden" name="adsHiddenId" id="adsHiddenId" value="<?php echo $id; ?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email">Start Date<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="startDateBid" name="startDate" value="<?php if($row['startDate']!='0000-00-00 00:00:00'){ echo date('Y-m-d',strtotime($row['startDate'])); } ?>" required>
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
                                              <input type="submit" class="btn btn-primary" name="submit" value="Set Bid Date">
                                            </div>

                                        </form>

                                  </div>
                              </div>
                          </div>


                        </div> <!-- End row -->




                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h3 class="m-t-0 mb-4 text-dark-gray"><b><?php echo $row['carModel']; ?></b></h3>

                                      <h4 class="m-t-0 header-title mb-4">Overview</h4>

                                      <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="far fa-calendar-alt"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Year
                                                    <span class="counter"><?php echo $row['year']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="fas fa-road"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    KMs Driven
                                                    <span class="counter"><?php echo $row['kmsDriven']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="fas fa-gas-pump"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Fuel Type
                                                    <span class="counter"><?php echo $row['fuelType']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="icofont-steering"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Transmission
                                                    <span class="counter"><?php echo $row['transmission']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </div><!-- end row -->

                                      <h4 class="m-t-0 header-title mb-4">Top Specifications</h4>

                                      <div class="row mb-5">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="fas fa-tachometer-alt"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Milege
                                                    <span class="counter"><?php echo $row['mileage']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="fas fa-car"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Engine
                                                    <span class="counter"><?php echo $row['engine']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="fas fa-bolt"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Max Power
                                                    <span class="counter"><?php echo $row['maxPower']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6">
                                            <div class="mini-stat border clearfix">
                                                <span class="mini-stat-icon dark">
                                                  <i class="icofont-power-zone"></i>
                                                </span>
                                                <div class="mini-stat-info">
                                                    Torque
                                                    <span class="counter"><?php echo $row['torque']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                      </div><!-- end row -->


                                      <div class="col-md-12">
                                        <ul class="nav nav-tabs tabs-bordered">
                                            <li class="nav-item">
                                                <a href="#spec-b1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Specifications</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#eng-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Engine</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#feat-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Features</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="spec-b1">
                                              <div class="table-responsive">
                                                  <table class="table table-borderless mb-0">
                                                      <tbody>
                                                        <tr>
                                                            <td width="300"><b>Color</b></td>
                                                            <td><?php echo $row['color']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Gear Box</b></td>
                                                            <td><?php echo $row['gearBox']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Seating Capacity</b></td>
                                                            <td><?php echo $row['seatingCapacity']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Synchronizers</b></td>
                                                            <td><?php echo $row['synchroniser']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Steering Type</b></td>
                                                            <td><?php echo $row['stearingType']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Turning Radius</b></td>
                                                            <td><?php echo $row['turningRadius']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Front Break Type</b></td>
                                                            <td><?php echo $row['frontBreakType']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Rear Break Type</b></td>
                                                            <td><?php echo $row['rearBreakType']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Top Speed</b></td>
                                                            <td><?php echo $row['topSpeed']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Acceleration</b></td>
                                                            <td><?php echo $row['acceleration']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Tyre Types</b></td>
                                                            <td><?php echo $row['tyreTypes']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Alloy Wheel Size</b></td>
                                                            <td><?php echo $row['alloyWheelSize']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>No of doors</b></td>
                                                            <td><?php echo $row['noOfDoors']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Cargo Volume</b></td>
                                                            <td><?php echo $row['cargoVolume']; ?></td>
                                                        </tr>
                                                      </tbody>
                                                  </table>
                                              </div>
                                            </div>

                                            <div class="tab-pane" id="eng-b1">
                                              <div class="table-responsive">
                                                  <table class="table table-borderless mb-0">
                                                      <tbody>
                                                        <tr>
                                                            <td width="300"><b>Engine Type</b></td>
                                                            <td><?php echo $row['engineType']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Displacement</b></td>
                                                            <td><?php echo $row['displacement']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Max Power</b></td>
                                                            <td><?php echo $row['maxPower']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Max Torque</b></td>
                                                            <td><?php echo $row['maxTorque']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>No Of Cylinder</b></td>
                                                            <td><?php echo $row['noOfCylinder']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Valves Per Cylinder</b></td>
                                                            <td><?php echo $row['valvesPerCylinder']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Valve Configuration</b></td>
                                                            <td><?php echo $row['valveConfiguration']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Fuel Supply System</b></td>
                                                            <td><?php echo $row['fuelSupplySystem']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>BoreX Stroke</b></td>
                                                            <td><?php echo $row['borexTorque']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Compression Ratio</b></td>
                                                            <td><?php echo $row['compressionRation']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>Turbo Charger</b></td>
                                                            <td><?php echo $row['turboCharger']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="300"><b>superCharger</b></td>
                                                            <td><?php echo $row['superCharger']; ?></td>
                                                        </tr>
                                                      </tbody>
                                                  </table>
                                              </div>
                                            </div>

                                            <div class="tab-pane" id="feat-b1">
                                              <div id="accordion" class="m-b-20">
                                                  <div class="card mb-2">
                                                      <div class="card-header p-3" id="headingOne">
                                                          <h6 class="m-0">
                                                              <a href="#collapseOne" class="text-dark" data-toggle="collapse"
                                                                      aria-expanded="true"
                                                                      aria-controls="collapseOne">
                                                                  Car Interior Features
                                                              </a>
                                                          </h6>
                                                      </div>

                                                      <div id="collapseOne" class="collapse show"
                                                              aria-labelledby="headingOne" data-parent="#accordion">
                                                          <div class="card-body">
                                                              <ul>
                                                                
                                                                
                                                                <?php
                                                                if($row['airConditioner']=='Yes'){
                                                                    echo '<li>Air conditioner</li>';
                                                                }
                                                                if($row['heater']=='Yes'){
                                                                    echo '<li>Heater</li>';
                                                                }
                                                                if($row['adjustableSteering']=='Yes'){
                                                                    echo '<li>Adjustable steering</li>';
                                                                }
                                                                if($row['digitalClock']=='Yes'){
                                                                    echo '<li>Digital clock</li>';
                                                                }
                                                                if($row['rearWashWiper']=='Yes'){
                                                                    echo '<li>Rear wash wiper</li>';
                                                                }
                                                                ?>
                                                                
                                                                
                                                                
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="card mb-2">
                                                      <div class="card-header p-3" id="headingTwo">
                                                          <h6 class="m-0">
                                                              <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                                                      aria-expanded="false"
                                                                      aria-controls="collapseTwo">
                                                                  Car Comfort Features
                                                              </a>
                                                          </h6>
                                                      </div>
                                                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                              data-parent="#accordion">
                                                          <div class="card-body">
                                                              <ul>
                                                                <li>Power steering</li>
                                                                <li>Power windows front</li>
                                                                <li>Power windows rear</li>
                                                                <li>Remote trunk opener</li>
                                                                <li>Remote fuel lid opener</li>
                                                                <li>Low fuel warning light</li>
                                                                <li>Vanity mirror</li>
                                                                <li>Rear seat headrest</li>
                                                                <li>Height adjustable front seat belts</li>
                                                                <li>Cup holders front</li>
                                                                <li>Cup holders rear</li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="card mb-2">
                                                      <div class="card-header p-3" id="headingThree">
                                                          <h6 class="m-0">
                                                              <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                                                      aria-expanded="false"
                                                                      aria-controls="collapseThree">
                                                                  Car Safety Features
                                                              </a>
                                                          </h6>
                                                      </div>
                                                      <div id="collapseThree" class="collapse"
                                                              aria-labelledby="headingThree" data-parent="#accordion">
                                                          <div class="card-body">
                                                              <ul>
                                                                <li>Anti lock braking system</li>
                                                                <li>Central locking</li>
                                                                <li>Power door locks</li>
                                                                <li>Child safety lock</li>
                                                                <li>Anti theft alarm</li>
                                                                <li>Driver airbags</li>
                                                                <li>Passenger airbag</li>
                                                                <li>Rear seat belts</li>
                                                                <li>Seat belt warning</li>
                                                                <li>Adjustable seats</li>
                                                                <li>Keyless entry</li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="card mb-2">
                                                      <div class="card-header p-3" id="headingFour">
                                                          <h6 class="m-0">
                                                              <a href="#collapseFour" class="text-dark collapsed" data-toggle="collapse"
                                                                      aria-expanded="false"
                                                                      aria-controls="collapseFour">
                                                                  Car Exterior Features
                                                              </a>
                                                          </h6>
                                                      </div>
                                                      <div id="collapseFour" class="collapse"
                                                              aria-labelledby="headingFour" data-parent="#accordion">
                                                          <div class="card-body">
                                                              <ul>
                                                                <li>Adjustable head lights</li>
                                                                <li>Manually adjustable exterior rear view mirror</li>
                                                                <li>Rear window wiper</li>
                                                                <li>Alloy wheels</li>
                                                                <li>Tinted glass</li>
                                                                <li>Front fog lights</li>
                                                                <li>Rear window wiper</li>
                                                                <li>Rear window defogger</li>
                                                                <li>Rear window defogger</li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>

                                              </div>
                                            </div>

                                        </div>
                                      </div>

                                      <hr class="mb-5" />

                                      <div class="col-md-12">
                                        <h4 class="m-t-0 header-title mb-4">Photos</h4>

                                        <div class="row">
                                            
                                        <?php
                                        $sqlAdsImages = "select * from adsCarImages where adsId='".$id."'";
                                        $resultAdsImages = mysqli_query($conn, $sqlAdsImages);
                                        
                                        while($rowAdsImages=mysqli_fetch_assoc($resultAdsImages)){
                                        ?>
                                          <div class="col-md-3 col-sm-6">
                                            <div class="cover">
                                              <!--<img src="api/adsImages1/ba9b44ac54d76dc9b7fe0220964b6cf1_extra_large.jpg" alt="">-->
                                              <img src="api/<?php echo $rowAdsImages['imagePath']; ?>" alt="">
                                            </div>
                                          </div>
                                          <!--<div class="col-md-3 col-sm-6">-->
                                          <!--  <div class="cover">-->
                                          <!--    <img src="assets/images/car2.jpg" alt="">-->
                                          <!--  </div>-->
                                          <!--</div>-->
                                          <!--<div class="col-md-3 col-sm-6">-->
                                          <!--  <div class="cover">-->
                                          <!--    <img src="assets/images/car3.jpg" alt="">-->
                                          <!--  </div>-->
                                          <!--</div>-->
                                          <!--<div class="col-md-3 col-sm-6">-->
                                          <!--  <div class="cover">-->
                                          <!--    <img src="assets/images/car4.jpg" alt="">-->
                                          <!--  </div>-->
                                          <!--</div>-->
                                          <?php } ?>
                                        </div>
                                      </div>

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



<div class="modal fade set-base-price" tabindex="-1" role="dialog" aria-labelledby="setBasePrice" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="setBasePrice">Set Base Price</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
              <h4 class="text-center mb-2">Enter the amount as a base price for <br /> <b>Maruti Swift VXi BSIV</b></h4>
              <form autofill="off">
                <div class="form-group">
                  <input type="text" class="form-control" name="" value="&#8377; ">
                </div>
                <div class="form-group text-right">
                  <input type="submit" class="btn btn-secondary" data-dismiss="modal" name="" value="Close">
                  &nbsp;
                  <input type="submit" class="btn btn-primary" name="" value="Set Base Price">
                </div>
              </form>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
