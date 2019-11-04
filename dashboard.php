<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
  include 'config.php';
  
    $sqlTotalApprovers = "select count(*) as cnt from users where userType='sub_admin' ";
    $resultTotalApprovers = mysqli_query($conn, $sqlTotalApprovers);
    $rowTotalApprovers=mysqli_fetch_assoc($resultTotalApprovers);
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
                                    <h2 class="m-0 text-white" data-plugin="counterup"><?php echo $rowTotalApprovers['cnt']; ?></h2>
                                    <div>Total Approvers</div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="widget-panel widget-style-2 bg-dark-blue">
                                    <i class="far fa-folder-open"></i>
                                    <h2 class="m-0 text-white" data-plugin="counterup">35</h2>
                                    <div>Total Reports</div>
                                </div>
                            </div>
                        </div> <!-- end row -->


                        <div class="row">
                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="m-t-0 header-title mb-4">New Approvers List</h4>

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
                                                  <tr>
                                                      <th scope="row">1</th>
                                                      <td>Mark Henry</td>
                                                      <td>markhenry@email.com</td>
                                                      <td>98989 89898</td>
                                                      <td>
                                                        <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-primary">
                                                          <i class="fas fa-check"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" class="btn btn-icon btn-sm waves-effect waves-light btn-danger">
                                                          <i class="fas fa-times"></i>
                                                        </a>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <th scope="row">2</th>
                                                      <td>John Smith</td>
                                                      <td>johnsmith@email.com</td>
                                                      <td>87878 77878</td>
                                                      <td width="150">
                                                        <button class="btn btn-sm btn-approved">
                                                          APPROVED
                                                        </button>
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                      <th scope="row">3</th>
                                                      <td>Johnathan Deo</td>
                                                      <td>johndeo@email.com</td>
                                                      <td>99889 88998</td>
                                                      <td width="150">
                                                        <button class="btn btn-sm btn-rejected">
                                                          REJECTED
                                                        </button>
                                                      </td>
                                                  </tr>
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
