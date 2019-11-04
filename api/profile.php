 <?php
 
   $request_method=$_SERVER["REQUEST_METHOD"];

    
 	
 	switch($request_method)
	{
		case 'GET':
			// Retrive Products
				 echo get_profile();
			break;
		case 'POST':
			// Insert Product
			//echo resetPassword();
			//echo setPin();
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
	

 function get_profile(){
    
    include '../config.php';
  
     $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
     $token =  $headers['token'];
     
     $getCustomerData = checkAuthenticateCustomer($token);
 
     $evaluatorId = json_encode($getCustomerData['id']);
     if($evaluatorId!='null' && $evaluatorId!=''  && $token!=''){
        $dataArray =[];
        $sqlInactive = "select count(*) as cnt from ads where userId=".$evaluatorId." and status=0 order by id desc";
                    
        $resultInactive = mysqli_query($conn, $sqlInactive);
        $rowInactive=mysqli_fetch_assoc($resultInactive);
        $inactiveCnt = $rowInactive['cnt'];     

         $sqlActive = "select count(*) as cnt from ads where userId=".$evaluatorId." and status=1 order by id desc";
                    
        $resultActive = mysqli_query($conn, $sqlActive);
        $rowActive=mysqli_fetch_assoc($resultActive);
        $activeCnt = $rowActive['cnt'];

        $sqlTotalAds = "select count(*) as cnt from ads where userId=".$evaluatorId."  order by id desc";
                    
        $resultTotalAds = mysqli_query($conn, $sqlTotalAds);
        $rowTotalAds=mysqli_fetch_assoc($resultTotalAds);
        $totalAdsCnt = $rowTotalAds['cnt']; 

        $dataArray['totalAdsCnt'] = $totalAdsCnt;
        $dataArray['activeCnt'] = $activeCnt;
        $dataArray['inactiveCnt'] = $inactiveCnt;
                       
        $message = ["error_code"=>1,"message"=>'Data fetched successfully','data'=>$dataArray];
        return json_encode($message);
        
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