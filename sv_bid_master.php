<?php
session_start();
include 'config.php';
include 'PHPMailerAutoload.php';


//print_r($_POST);exit;
if (isset($_POST['submit'])) {
    
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    
    $adsHiddenId = $_POST['adsHiddenId'];
	
	$returnUrl="id=".base64_encode($adsHiddenId);
    
     $sqlUpdate = "UPDATE ads SET startDate = '".$startDate."', endDate = '".$endDate."' 
       where id = '".$adsHiddenId."' ";
        if ($conn->query($sqlUpdate) === TRUE) {
        	$_SESSION['success'] = 'Bid date set successfully';
            header('location: bid_master.php');
        }else{
        	$_SESSION['error'] = 'Bid date could not be set';
        	header('location:set_bid.php?'.$returnUrl);return;
        }
    
    
}else if(!empty($_GET['id']) && $_GET['action']=='isConfirm'){

	            
	$id = $_GET['id'];
	$status = $_GET['status'];
	
	if($status==1){
	    $message= 'Ads Active';
	    
	}else{
	    $message= 'Ads Inactive';
	}
	
         $sqlUpdate = "UPDATE ads SET status = '".$status."' 
	       where id = '".$id."' ";
	        if ($conn->query($sqlUpdate) === TRUE) {
	        	$_SESSION['success'] = $message;
	            header('location: bid_master.php');
	        }else{
	            
	            if($status==1){
            	    $message= 'Ads could not be Active';
            	    
            	}else{
            	    $message= 'Ads could not be Inactive';
            	}
	        	$_SESSION['error'] = $message;
            	header('location: bid_master.php');
	        }

    	    

}else{
	$_SESSION['error'] = 'Something went wrong';
    header('location: bid_master.php');
}

?>
