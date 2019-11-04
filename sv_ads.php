<?php
session_start();
include 'config.php';
include 'PHPMailerAutoload.php';


//print_r($_POST);exit;
if(!empty($_GET['id']) && $_GET['action']=='isConfirm'){

	            
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
	            header('location: ads_master.php');
	        }else{
	            
	            if($status==1){
            	    $message= 'Ads could not be Active';
            	    
            	}else{
            	    $message= 'Ads could not be Inactive';
            	}
	        	$_SESSION['error'] = $message;
            	header('location: ads_master.php');
	        }

    	    

}else if(isset($_POST['submit']) && isset($_POST['hiddenId'])){

	//print_r($_POST);exit;
	$id = $_POST['hiddenId'];
	$ownerName = $_POST['ownerName'];
	$ownerContactNumber = $_POST['ownerContactNumber'];
	$carCompany = $_POST['carCompany'];
	$carModel = $_POST['carModel'];
	$basePrice = $_POST['basePrice'];
	$esp = $_POST['esp'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];

	 $sqlUpdate = "UPDATE ads SET ownerName = '".$ownerName."',
	ownerContactNumber = '".$ownerContactNumber."',
	carCompany = '".$carCompany."',
	carModel = '".$carModel."',
	basePrice = '".$basePrice."',
	basePrice = '".$esp."',
	startDate = '".$startDate."',
	endDate = '".$endDate."' 
	       where id = '".$id."' ";
    if ($conn->query($sqlUpdate) === TRUE) {
    	$_SESSION['success'] = 'Ads updated successfully';
        header('location: ads_master.php');
    }else{
    	$_SESSION['error'] = 'Something went wrong';
    	header('location: ads_master.php');

    }

}else{
	$_SESSION['error'] = 'Something went wrong';
    header('location: ads_master.php');
}

?>
