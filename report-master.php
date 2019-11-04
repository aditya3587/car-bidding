<!-- ===================================================================== -->
<?php
  include 'modules/header.php';
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
                                    <h4 class="page-title float-left">Reports Master</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="portlet"><!-- /primary heading -->
                                    <div class="portlet-heading">
                                        <h3 class="portlet-title text-dark text-uppercase">
                                            Report
                                        </h3>
                                        <div class="portlet-widgets">
                                            <a href="#" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <span class="divider"></span>
                                            <a data-toggle="collapse" href="#portlet1"><i class="mdi mdi-minus"></i></a>
                                            <span class="divider"></span>
                                            <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div id="portlet1" class="panel-collapse collapse show">
                                      <div class="portlet-body chartJS">
                                         <canvas id="lineChart" data-type="Line" width="520" height="250"></canvas>
                                     </div>
                                    </div>
                                </div> <!-- /Portlet -->

                            </div> <!-- end col -->


                        </div> <!-- End row -->








                    </div> <!-- container -->

                </div> <!-- content -->



<!-- ============================================================ -->
<?php
  include 'modules/footer.php';
?>
