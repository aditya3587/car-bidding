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
			echo updateFcmToken();
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



 function updateFcmToken(){
      include '../../config.php';
      
      $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
      $token =  $headers['token'];
      
      //return json_encode($token);
      
      $getCustomerData = checkAuthenticateCustomer($token);
      
      
      //return json_encode($getCustomerData);
     
    $customerId = json_encode($getCustomerData['id']);
    
    if($customerId){
      

    header('Content-Type: application/json');
    $fields = file_get_contents('php://input'); 
    
     $data = json_decode($fields);

     $fcmToken = $data->fcmToken;
     

     $sql = "select * from customers where token = '".$token."' "; // and status='1'

		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result)>0) {
		    
		    $sqlUpdate = "UPDATE customers SET 
	       fcmToken = '".$fcmToken."' 
	       where token = '".$token."'";
	        if ($conn->query($sqlUpdate) === TRUE) {
	             $message = ["error_code"=>1,"message"=>'Fcm token updated successfully','data'=>[]];
                return json_encode($message); 
	        }else{
	            
	            $message = ["error_code"=>0,"message"=>'Fcm token could not be updated','data'=>[]];
                return json_encode($message);
	            
	        }

		}else{
		    $message = ["error_code"=>0,"message"=>'User could not be authenticated','data'=>[]];
                return json_encode($message);

		}
    }else{
        $message = ["error_code"=>0,"message"=>'Please login again','data'=>[]];
        return json_encode($message);
    }
     
     
 }


function checkAuthenticateCustomer($token){
     include '../../config.php';
     $sqlCheckToken = "select * from customers where token = '".$token."' ";
     
     //return $sqlCheckToken;
     
     $resultCheckToken = mysqli_query($conn, $sqlCheckToken);
		
		if (mysqli_num_rows($resultCheckToken)>0) {
		    return $rowCheckToken=mysqli_fetch_assoc($resultCheckToken);
		}else{
		    return $rowCheckToken=[];
		}
     
     
 }
?>