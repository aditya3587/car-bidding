<?php
session_start();
include 'config.php';
include 'PHPMailerAutoload.php';


//print_r($_POST);exit;
if(isset($_POST['submit'])){

	$espPrice = $_POST['espPrice'];
	$adsHiddenId = $_POST['adsHiddenId'];
	
	$returnUrl="id=".base64_encode($adsHiddenId);
    	    
         $sqlUpdate = "UPDATE ads SET esp = '".$espPrice."' 
	       where id = '".$adsHiddenId."' ";
	        if ($conn->query($sqlUpdate) === TRUE) {
	        	$_SESSION['success'] = 'Estimated selling price set successfully.';
	            header('location: ads_master.php');
	        }else{
	        	$_SESSION['error'] = 'Estimated selling price could not be set.';
            	header('location:set_base_price.php?'.$returnUrl);return;
	        }

    	    

}else{
	$_SESSION['error'] = 'Estimated selling price could not be set.';
	header('location:set_base_price.php?'.$returnUrl);return;
}

?>
