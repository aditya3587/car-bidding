<?php
	session_start();
	include 'config.php';
	include 'PHPMailerAutoload.php';
	
	
	//print_r($_POST);exit;

	if (isset($_POST['submit'])) {
		$uniqid = uniqid();
		if(isset($_POST['hiddenId'])){

			$id=$_POST['hiddenId'];
			$name = $_POST['name'];
			$contactNo = $_POST['contactNo'];
		
	      	$returnUrl="edit=true&id=".$id;
	      	if (empty($name) || empty($contactNo)) {
				$_SESSION['error'] = 'All fields are required.';
				header('location:edit_approver.php?'.$returnUrl);return;
			}

			$sqlUpdate = "UPDATE users SET name = '".$name."',
	       contactNo = '".$contactNo."' 
	       where id = '".$id."'";
	        if ($conn->query($sqlUpdate) === TRUE) {
	        	$_SESSION['success'] = 'Approver updated.';
             	header('location:view_approvers.php');return;
	        }else{
	        	$_SESSION['error'] = 'Approver could not be updated.';
            	header('location:edit_approver.php?'.$returnUrl);return;
	        }
	        

		}else{ //insert
			$name = $_POST['name'];
			$emailId = $_POST['emailId'];
			$contactNo = $_POST['contactNo'];
			$password = generatePassword();


			if (empty($name) || empty($emailId) || empty($contactNo)) {
				$_SESSION['error'] = 'All fields are required.';
				header('location:add_approver.php');return;
			}

			$sqlCheck = "select * from users where emailId = '".$emailId."' "; 

			$resultCheck = mysqli_query($conn, $sqlCheck);

			if (mysqli_num_rows($resultCheck)>0) {
				$_SESSION['error'] = 'Email Id already exist.';
				header('location:add_approver.php');return;
			}

		
            	//Insert code here
                
                if(sendMail($name,$emailId,$password)){
                    
                    $password = md5($password);
                    
                	$sql = "INSERT INTO users(name,contactNo,emailId,password,userType,status) VALUES ('".$name."','".$contactNo."','".$emailId."','".$password."','sub_admin',1)";
                    if(mysqli_query($conn, $sql)){

                    	$_SESSION['success'] = 'Approver created successfully.';
          				header('location: view_approvers.php');return;

                    }else{

                      $_SESSION['error'] = 'Approver could not be created.';
                      header('location: add_approver.php');return;

                    }//insert end
                
                }else{
                    $_SESSION['error'] = 'Approver could not be created.';
                  header('location: add_approver.php');return;
                    
                }

	                
	    }
		
	}else if(!empty($_GET['id']) && $_GET['action']=='delete'){
    	$id = $_GET['id'];

    	 $sql = "delete from users where id='".$id."'";
	      if(mysqli_query($conn, $sql)){
	      	$_SESSION['success'] = 'Approver deleted successfully.';
            header('location: view_approvers.php');return;
	      }else{
	      	$_SESSION['error'] = 'Approver could not be deleted.';
            header('location: view_approvers.php');return;

	      }

	}

	function generatePassword() { 
		$n=6; 
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    $randomString = ''; 
	  
	    for ($i = 0; $i < $n; $i++) { 
	        $index = rand(0, strlen($characters) - 1); 
	        $randomString .= $characters[$index]; 
	    } 
	  
	    return $randomString; 
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

      $mail->Subject = "Car Bidding Registration";
      $mail->Body    = '<html>
                              <head>
                              <title>WELCOME ABOARD!</title>
                              </head>
                              <body>
                              <p>Dear '.$name.',</p>
                                        <p>Your account has been created with Car Bidding.<br/><br/>

                                        Please login into your account using following emailId and password<br/>
                                        Username : '.$emailId.'<br/>
                                        Password : '.$password.'
                                        
                                            
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
