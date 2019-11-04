<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car Bidding</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">
        
               <link href="plugins/notifications/notification.css" rel="stylesheet" />


        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="plugins/morris/morris.css">

        <!-- sweet alerts -->
        <link href="plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- your custom css -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="pb-0">
        <div class="wrapper-page">
            <div class="account-pages">
                <div class="account-box">
                    <div class="account-logo-box bg-color-1 p-4">
                        <h3 class="m-0 text-center text-white">Car Bidding</h3>
                    </div>
                    <div class="account-content">
                      <p class="text-muted mb-4">Please reset your password</p>
                        <form class="form-horizontal" name="myForm" method="POST" action="sv_change_password_api.php">
                            <input type="hidden" name="emailId" id="emailId" value="<?php echo $_GET['emailId'];?>">


                            <!--<div class="form-group  mb-4 row">-->
                            <!--    <div class="col-12">-->
                            <!--        <label for="emailaddress">Email Address :</label>-->
                            <!--        <input class="form-control" type="email" name="emailId" id="emailaddress" required="" placeholder="john@deo.com">-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            
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


                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                  <input type="submit" name="submit" class="btn btn-md btn-block btn-primary"  value="Reset Password" />
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
            
            <input type="hidden" name="successMessageInput" id="successMessageInput" value="<?php if(isset($_SESSION['success'])){ echo $_SESSION['success']; } ?>">

      <input type="hidden" name="errorMessageInput" id="errorMessageInput" value="<?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } ?>">


        </div>


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        
        <script src="plugins/notifications/notify.min.js"></script>
        <script src="plugins/notifications/notify-metro.js"></script>
        <script src="plugins/notifications/notifications.js"></script>

        <!-- Parsley js -->
        <script src="plugins/parsleyjs/parsley.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        
        
        
 <script>
        $(document).ready(function() {
            $('form').parsley();
        });

    function notificatData(style,position, title, text) {
        var icon = "fa fa-adjust";
        if(style == "error"){
            icon = "fa fa-exclamation";
        }else if(style == "warning"){
            icon = "fa fa-warning";
        }else if(style == "success"){
            icon = "fa fa-check";
        }else if(style == "info"){
            icon = "fa fa-question";
        }else{
            icon = "fa fa-adjust";
        }   
        $.notify({
            title: title,
            text: text,
            image: "<i class='"+icon+"'></i>"
        }, {
            style: 'metro',
            className: style,
            globalPosition:position,
            showAnimation: "show",
            showDuration: 0,
            hideDuration: 0,
            autoHideDelay: 5000,
            autoHide: true,
            clickToHide: true
        });
    }
            //$.notify("Access granted", "success");

            function showSuccessMessage(){
              var successMessageInput = $("#successMessageInput").val();
              
              notificatData("success","top right","Success",successMessageInput);
            }

            function showErrorMessage(){
              var errorMessageInput = $("#errorMessageInput").val();
              notificatData("error","top right","Error",errorMessageInput);
            }
        </script>
        <?php
        if(isset($_SESSION['success'])){

            echo '<script type="text/javascript"> showSuccessMessage(); </script>';

        }else if(isset($_SESSION['error'])){

            echo '<script type="text/javascript"> showErrorMessage(); </script>';

        }



        unset($_SESSION['success']);
        unset($_SESSION['error']);
        ?>


    </body>

</html>
