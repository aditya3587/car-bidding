 <?php
 
   $request_method=$_SERVER["REQUEST_METHOD"];

 	switch($request_method)
	{
		case 'GET':
			// Retrive Products
				 //echo get_ads();
			break;
		case 'POST':
			// Insert Product
			//echo resetPassword();
			echo checkPin();
			break;
		case 'PUT':
			// Update Product
			//$product_id=intval($_GET["product_id"]);
			//echo resetPassword();
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
 
 function checkPin(){
     
      include '../config.php';
     $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
     
      $token =  $headers['token'];
      
    //  return json_encode($token);
      
      $getCustomerData = checkAuthenticateCustomer($token);
     
    $customerId = json_encode($getCustomerData['id']);
    
    if($customerId){

      header('Content-Type: application/json');
      $fields = file_get_contents('php://input'); 
      
       $data = json_decode($fields);

       $pin = $data->pin;
       
       $sql = "select * from users where token = '".$token."' and pin='".$pin."' and status='1' "; 

      $result = mysqli_query($conn, $sql);
      
        if (mysqli_num_rows($result)>0) {
            
            $message = ["error_code"=>1,"message"=>'Pin verify successfully','data'=>[]];
            return json_encode($message); 

        }else{
            $message = ["error_code"=>0,"message"=>'Wrong pin','data'=>[]];
            return json_encode($message);
        }

      }else{
        $message = ["error_code"=>0,"message"=>'Please login again','data'=>[]];
        return json_encode($message);
    }

     
     
 }
 
 //check customer authenticate
 
 function checkAuthenticateCustomer($token){
     include '../config.php';
     $sqlCheckToken = "select * from users where token = '".$token."' ";
     
     $resultCheckToken = mysqli_query($conn, $sqlCheckToken);
		
		if (mysqli_num_rows($resultCheckToken)>0) {
		    return $rowCheckToken=mysqli_fetch_assoc($resultCheckToken);
		}else{
		    return $rowCheckToken=[];
		}
     
     
 }
 

 

?>