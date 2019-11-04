<?php session_start();

if(empty($_SESSION['userName'])){
        header('location: index.php');return;
    }
?>
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

        <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert -->
        <!--<link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />-->
        
        <link href="assets/css/sweet-alert.min.css" rel="stylesheet">



        <!-- App css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/fonts/icofont/icofont.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- your custom css -->
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>

    <style type="text/css">
        body {
          -webkit-user-select: none;
             -moz-user-select: -moz-none;
              -ms-user-select: none;
                  user-select: none;
        }
    </style>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="dashboard.php" class="logo">
                        <span>
                            <img src="assets/images/logo.png" alt="" height="18">
                        </span>
                        <i>
                            <img src="assets/images/logo_sm.png" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="noti-icon"><img src="assets/images/users/avatar-1.jpg" alt="user" class="img-fluid rounded-circle"></i>
                                <span class="profile-username ml-2 text-dark"><?php echo $_SESSION['userName']; ?> </span> <span class="mdi mdi-menu-down text-dark"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="mdi mdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            
                            <?php if($_SESSION['userType']=='admin'){ ?>
                            <li>
                                <a href="dashboard.php">
                                    <i class="ion-md-speedometer"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fas fa-user-friends"></i> <span> Approvers Master </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="add_approver.php">Add Approver</a></li>
                                    <li><a href="view_approvers.php">View Approver</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="report-master.php">
                                    <i class="far fa-folder-open"></i> <span> Reports Master </span>
                                </a>
                            </li>
                            
                            <?php }else if($_SESSION['userType']=='sub_admin'){ ?>

                             <!--sub admin / approver admin menu -->
                            <li>
                                <a href="dashboard2.php">
                                    <i class="ion-md-speedometer"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fas fa-user-friends"></i> <span> Evaluators Master </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="add_evaluator.php">Add Evaluator</a></li>
                                    <li><a href="view_evaluators.php">View Evaluators</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="ads_master.php">
                                    <i class="fas fa-car"></i> <span> Ads Master </span>
                                </a>
                            </li>

                            <li>
                                <a href="bid_master.php">
                                    <i class="fas fa-gavel"></i> <span> Bid Master </span>
                                </a>
                            </li>
                            
                            <?php } ?>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
