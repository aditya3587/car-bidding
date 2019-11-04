<?php
session_start();
include 'config.php';
include 'PHPMailerAutoload.php';


//print_r($_POST);exit;
if(isset($_POST['submit'])){

	$emailId = $_POST['emailId'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$returnUrl="emailId=".$emailId;
	if($password != $confirm_password){
	    $_SESSION['error'] = 'Password and confirm password could not be match.Please try again.';
	    header('location:change_password.php?'.$returnUrl);return;
	}
	
	$sql = "select * from users where emailId='".$emailId."'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)){
    	$row=mysqli_fetch_assoc($result);
    	$password = MD5($_POST['password']);
    	$name = $row['name'];
    	//$emailId='patil.dilipmg@gmail.com';
    	
    	
    	
    	
    	//if(sendMail($name,$emailId,$password)){
    	    
            $sqlUpdate = "UPDATE users SET password = '".$password."' 
		       where emailId = '".$emailId."'";
		        if ($conn->query($sqlUpdate) === TRUE) {
		        	$_SESSION['success'] = 'Password has been reset successfully.';
		            header('location: index.php');
		        }else{
		        	$_SESSION['error'] = 'Password could not be reset.Please try again.';
	            	header('location:change_password.php?'.$returnUrl);return;
		        }

    	    
    	    
    // 	}else{
    // 	    $_SESSION['error'] = 'Password could not be send.Please try again.';
		  //  header('location: forgot.php');
    // 	}
    
	}else{
		$_SESSION['error'] = 'Invalid email Id.Please try again.';
		header('location: forgot.php');
	}

}else{
	$_SESSION['error'] = 'Invalid Email Id.Please try again.';
	header('location: forgot.php');
}


function sendMail($name,$emailId,$password){
   
    $mail = new PHPMailer;
    
      $mail->From = 'info@canaryforest.com';
      $mail->FromName = 'Car Bidding';
      $mail->addAddress($emailId, $name);     // Add a recipient
      $mail->WordWrap = 150;                                 // Set word wrap to 50 characters
      $mail->isHTML(true);                                  // Set email format to HTML

      $body = 
      "
      Name : $name<br>

      ";
      
       

      $mail->Subject = "Car Bidding Change Password";
      $mail->Body    = '<html>
                              <head>
                              <title>WELCOME ABOARD!</title>
                              </head>
                              <body>
                              <p>Dear '.$name.',</p>
                              <br /><br />
                                        Click on following link to change your password<br/>
                                                <a href="http://sourcekode.com/car-bidding/change_password.php?emailId='.$emailId.'">Change Password</a>
                                                
                                                <br/><br/>

                                            
                                        <p>With best regards <br><strong>Team Car Bidding.</strong><br><small>[This is an auto-generated mail. Please do not reply back.]</small></p>
                                        
    
                                         
                              
                              </body>
                              </html>';
                              

        if(!$mail->Send()) {
           // echo "Mailer Error: " . $mail->ErrorInfo;
           return 0;
        }else{
            return 1;
        }
}
?>
