<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car Bidding</title>
        <meta content="" name="" />
        <meta content="" name="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="plugins/morris/morris.css" />

        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert -->
        <link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <!-- your custom css -->

        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="pb-0 account-body">
        <div class="wrapper-page">
            <div class="account-pages">
                <div class="account-box">
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
                    <div class="account-logo-box bg-light-blue p-4">
                        <h3 class="m-0 text-center text-dark-gray">CAR BIDDING</h3>
                    </div>
                    <div class="account-content">
                        <h2>Welcome back! Change Password.</h2>
                        <form autocomplete="off" name="changePasswordForm" class="form-horizontal" method="post" action="sv_change_password.php">
                            <input type="hidden" name="emailId" id="emailId" value="<?php echo $_GET['emailId'];?>">

                            <div class="form-group  mb-4 row">
                                <div class="col-12">
                                    <input class="form-control" type="text" id="password" name="password" required="" placeholder="Password" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-12">
                                    <input class="form-control" type="password" required="" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="off">
                                </div>
                            </div>
                            
                            <!--<div class="form-group row mb-4">-->
                            <!--    <div class="col-12">-->
                            <!--        <div class="checkbox checkbox-success">-->
                                        
                            <!--            <a href="forgot.php" class="text-muted float-right">Forgot your password?</a>-->
                            <!--        </div>-->

                            <!--    </div>-->
                            <!--</div>-->

                            

                            <div class="form-group row text-right m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-md btn-primary waves-effect waves-light" name="submit" value="submit" type="submit">Change Password</button>
                                </div>
                            </div>

                        </form>
                        
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Back to <a href="index.php" class="text-dark m-l-5"><b>Login</b></a></p>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!-- end account-box-->


        </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
             setTimeout(function() {
               $('#successMessage').fadeOut('slow');
            }, 10000);


        </script>

    </body>
</html>
