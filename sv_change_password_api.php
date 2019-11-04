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
	    header('location:change_password_api.php?'.$returnUrl);return;
	}
	
	$sql = "select * from users where emailId='".$emailId."' and userType='evaluators'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)){
    	$row=mysqli_fetch_assoc($result);
    	$password = MD5($_POST['password']);
    	$name = $row['name'];
    	//$emailId='patil.dilipmg@gmail.com';
    	
    	//if(sendMail($name,$emailId,$password)){
    	    
            $sqlUpdate = "UPDATE users SET password = '".$password."' 
		       where emailId = '".$emailId."' and userType='evaluators'";
		        if ($conn->query($sqlUpdate) === TRUE) {
		        	$_SESSION['success'] = 'Password has been reset successfully.';
		            header('location: reset_password_api_successful.php');
		        }else{
		        	$_SESSION['error'] = 'Password could not be reset.Please try again.';
	            	header('location:change_password_api.php?'.$returnUrl);return;
		        }

    	    
    	    
    // 	}else{
    // 	    $_SESSION['error'] = 'Password could not be send.Please try again.';
		  //  header('location: forgot.php');
    // 	}
    
	}else{
		$_SESSION['error'] = 'Invalid email Id.Please try again.';
		header('location: change_password_api.php');
	}

}else{
	$_SESSION['error'] = 'Invalid Email Id.Please try again.';
	header('location: change_password_api.php');
}

?>
