 <?php
 
   $request_method=$_SERVER["REQUEST_METHOD"];

    
 	
 	switch($request_method)
	{
		case 'GET':
			// Retrive Products
				 //echo get_coupons();
			break;
		case 'POST':
			// Insert Product
			echo login();
			break;
		case 'PUT':
			// Update Product
			//$product_id=intval($_GET["product_id"]);
			//update_product($product_id);
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

 
 function login(){
      include '../config.php';
     
    //include 'http://cnmc.bsnl.co.in/config.php';
    
    
    //return;

    header('Content-Type: application/json');
    $fields = file_get_contents('php://input'); 
    
    $data = json_decode($fields);
   // echo json_encode($data);
    
     $email = $data->username;
     $password = $data->password;
     
     $passwordE = md5($password);
     
     //$sql = "select * from users where emailId = '".$email."' and password = '".MD5($password)."'  and status='1' and userType='evaluators' "; 
     $sql = "select * from users where emailId = '".$email."' and password = '".$passwordE."'  and status='1' and userType='evaluators' "; 
     
     
     
//return json_encode($sql);
      
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result)>0) {
	        
	            $token = bin2hex(openssl_random_pseudo_bytes(64));
	            
	            $sqlUpdate = "UPDATE users SET 
    	       token = '".$token."' 
    	       where emailId = '".$email."'";
    	        if ($conn->query($sqlUpdate) === TRUE) {
    	            
    	            $row=mysqli_fetch_assoc($result);
    	            $row['updatedToken']=$token;
    	            
    	            $row['error_code']=1;
    	            
    			    return json_encode($row); 
    			    
    	        }else{
	            $message = ["error_code"=>0,"message"=>'Please login again','data'=>[]];
                 return json_encode($message);
	            
	        }
	        

			

		}else{
		    $message = ["error_code"=>0,"message"=>'Please login again','data'=>[]];
            return json_encode($message);

		}
     
     
 }

?>