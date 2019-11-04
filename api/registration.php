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
			echo create_customer();
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
	
	


 
 function create_customer(){
     
      include '../config.php';
     $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
     
    //$token =  $headers['token'];
    
        $uniqid = uniqid();
        $custType=$_POST['custType'];
        $fullName=$_POST['fullName'];
        $contactNo=$_POST['contactNo'];
        $emailId=$_POST['emailId'];
        $password=$_POST['password'];
        
        $password = md5($password);

        //$idProof=$_POST['idProof'];

        $idProof = $_FILES['idProof']['name'];
        $addressProof = $_FILES['addressProof']['name'];
        
        
         $sqlExist = "select * from customers where emailId = '".$emailId."' "; 
     
     
//return json_encode($sql);
      
		$resultExist = mysqli_query($conn, $sqlExist);
		
		if (mysqli_num_rows($resultExist)>0) {
		    
		    $message = ["error_code"=>0,"message"=>'Email already exist','data'=>[]];
              return json_encode($message);
		}
        
        
        if($idProof){
            
            $idProofName = $uniqid.'__'.$idProof;
            $target = "idProof/".basename($idProofName);      
            
            if (move_uploaded_file($_FILES['idProof']['tmp_name'], $target)) {
              
            }else{
              $message = ["error_code"=>0,"message"=>'Registration failed','data'=>[]];
              return json_encode($message);  
            }
        }
        
        
        if($addressProof){
            
            $addressProofName = $uniqid.'__'.$addressProof;
            $targetAddressProof = "addressProof/".basename($addressProofName);      
            
            if (move_uploaded_file($_FILES['addressProof']['tmp_name'], $targetAddressProof)) {
              
            }else{
              $message = ["error_code"=>0,"message"=>'Registration failed','data'=>[]];
              return json_encode($message);  
            }
        }
        
        
        
        $sql = "INSERT INTO customers(fullName,contactNo,emailId,password,idProof,addressProof) VALUES('".$fullName."','".$contactNo."','".$emailId."','".$password."','".$target."','".$targetAddressProof."')";

       //return json_encode($sql);
            if(mysqli_query($conn, $sql)){
                
                $message = ["error_code"=>1,"message"=>'Registration successfully','data'=>[]];
                return json_encode($message);
            }else{
                
                $message = ["error_code"=>0,"message"=>'Registration failed','data'=>[]];
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