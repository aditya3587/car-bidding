<?php
	session_start();
	include 'config.php';
	
	//print_r($_POST);exit;
	if (isset($_POST['submit'])) {
		$email = $_POST['username'];
		//$password = MD5($_POST['password']);
		//$password = $_POST['password'];
		$password = MD5($_POST['password']);

		if (empty($email) || empty($password)) {
			$_SESSION['error'] = 'Please enter login details';
			header('location:index.php');
		}

		 $sql = "select * from users where emailId = '".$email."' and password = '".$password."' and (userType = 'admin' or userType = 'sub_admin') and status='1' "; 

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)>0) {
			$row=mysqli_fetch_assoc($result);
			$_SESSION['id']=$row['id'];
			$_SESSION['userType']=$row['userType'];
			$_SESSION['userName']=$row['name'];
			$_SESSION['emailId']=$email;
			if($row['userType']=='admin'){
			    header('location: dashboard.php');return;
			}else if($row['userType']=='sub_admin'){
			    header('location: dashboard2.php');return;
			}
		   
			
		}
		else{
			$_SESSION['error'] = 'Invalid credentials.Please try again.';
			header('location: index.php');
		}
	}

?>