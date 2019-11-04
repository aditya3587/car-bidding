<?php
	
	
	if(1==1){
	   $servername = "localhost";
    	$username = "root";
    	$password = "";
    	$dbname = "sourcpxn_car_bidding";
    
	    
	}else{
	    //server
	    $servername = "localhost";
    	$username = "sourcpxn_carbidd";
    	$password = "car@1q2w3e";
    	$dbname = "sourcpxn_car_bidding";
	    
	}

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    //die("Connection failed: " . mysqli_connect_error());
	    
	    $message = ["error_code"=>0,"message"=>mysqli_connect_error(),'data'=>[]];
                 return json_encode($message);
	}else{
	    $message = ["error_code"=>0,"message"=>'success','data'=>[]];
                 return json_encode($message);
	}
	//echo "Connected successfully";
?>