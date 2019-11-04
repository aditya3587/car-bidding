 <?php
 
include '../PHPMailerAutoload.php';
 
   $request_method=$_SERVER["REQUEST_METHOD"];

    
 	
 	switch($request_method)
	{
		case 'GET':
			// Retrive Products
				 //echo get_coupons();
			break;
		case 'POST':
			// Insert Product
			//echo resetPassword();
			echo forgot_password();
			break;
		case 'PUT':
			// Update Product
			//$product_id=intval($_GET["product_id"]);
			echo resetPassword();
			break;
		case 'DELETE':
			// Delete Product
			//$product_id=intval($_GET["product_id"]);
			//delete_product($product_id);
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

 
 function forgot_password(){
      include '../config.php';

    header('Content-Type: application/json');
    $fields = file_get_contents('php://input'); 
    
    $data = json_decode($fields);
    //echo json_encode($data);return;
    
     $email = $data->username;
     
    $sqlMerchantsList = "select * from users where emailId='".$email."' and status='1' and userType='evaluators' ";
    
    //echo json_encode($sqlMerchantsList);return;
    
	$resultMerchantsList = mysqli_query($conn, $sqlMerchantsList);
	if(mysqli_num_rows($resultMerchantsList)){
    	$rowMerchantsList=mysqli_fetch_assoc($resultMerchantsList);
    	$password = $rowMerchantsList['password'];
    	$name = $rowMerchantsList['name'];
    	if(sendMail($name,$email,$password)){
            $message = ["error_code"=>1];
            return json_encode($message); 
    	}else{
            $message = ["error_code"=>0];
            return json_encode($message); 
    	}
    
	}else{
        $message = ["error_code"=>0];
        return json_encode($message); 
	}
     
 }
 
 function resetPassword(){
      include '../config.php';

    header('Content-Type: application/json');
    $fields = file_get_contents('php://input'); 
    
    $data = json_decode($fields);
   
     $email = $data->username;
     $password = $data->password;
     $newPassword = $data->newPassword;
     
     //$password = $password;
     
    $sqlMerchantsList = "select * from users where emailId='".$email."' and password= '".$password."' and userType='evaluators'";
    
    
     //echo json_encode($sqlMerchantsList);return;
	$resultMerchantsList = mysqli_query($conn, $sqlMerchantsList);
	if(mysqli_num_rows($resultMerchantsList)){
    	$rowMerchantsList=mysqli_fetch_assoc($resultMerchantsList);
    	//$password = $rowMerchantsList['password'];
    	$name = $rowMerchantsList['name'];
    	if(sendMail($name,$email,$newPassword)){
    	    
    	   $sqlUpdate = "UPDATE users SET 
	       password = '".$newPassword."' 
	       where emailId = '".$email."'";

	        if ($conn->query($sqlUpdate) === TRUE) {
	            $message = ["error"=>1];
    	        return json_encode($message); 
	        }else{
	            $message = ["error"=>0];
    	        return json_encode($message); 
	        }
    	    
    	}else{
            $message = ["error"=>0];
            return json_encode($message); 
    	}
    
	}else{
        $message = ["error"=>0];
        return json_encode($message); 
	}
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

      $mail->Subject = "Car Bidding Forgot Password";
      $mail->Body    = '<html>
                              <head>
                              <title>WELCOME ABOARD!</title>
                              </head>
                              <body>
                              <p>Dear '.$name.',</p>
                              <br /><br />
                                        Click on following link to change your password<br/>
                                                <a href="http://sourcekode.com/car-bidding/change_password_api.php?emailId='.$emailId.'">Change Password</a>
                                                
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