 <?php
 
   $request_method=$_SERVER["REQUEST_METHOD"];

    
    
    switch($request_method)
    {
        case 'GET':
            // Retrive Products
                 echo get_ads();
            break;
        case 'POST':
            // Insert Product
            //echo resetPassword();
            echo create_ads();
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
    
    
function get_ads(){
    
    include '../config.php';
    
    
     $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
     $token =  $headers['token'];
     
     $getCustomerData = checkAuthenticateCustomer($token);
 
     $evaluatorId = json_encode($getCustomerData['id']);
     if($evaluatorId!='null' && $evaluatorId!=''  && $token!=''){

        $sql = "select * from ads where userId=".$evaluatorId." order by id desc";
                    
        $result = mysqli_query($conn, $sql);
        $couponArray = [];  
                
        while($row=mysqli_fetch_assoc($result)){
                $valueArr=[];
                
                $adsId = $row["id"];
        
                $valueArr["id"] = $row["id"];  
                $valueArr["ownerName"] = $row["ownerName"];  
                $valueArr["ownerContactNumber"] = $row["ownerContactNumber"];  
                $valueArr["carModel"] = $row["carModel"];  
                $valueArr["carCompany"] = $row["carCompany"];  
                $valueArr["year"] = $row["year"];  
                $valueArr["kmsDriven"] = $row["kmsDriven"];  
                $valueArr["fuelType"] = $row["fuelType"];  
                $valueArr["transmission"] = $row["transmission"];  
                $valueArr["mileage"] = $row['mileage'];

                $valueArr["engine"] = $row['engine'];
                $valueArr["maxPower"] = $row['maxPower'];
                $valueArr["torque"] = $row['torque'];
                $valueArr["color"] = $row['color'];
                $valueArr["fuelSupplySystem"] = $row['fuelSupplySystem'];
                $valueArr["compressionRation"] = $row['compressionRation'];
                $valueArr["turboCharger"] = $row['turboCharger'];
                
                $valueArr["superCharger"] = $row['superCharger'];
                
                $valueArr["gearBox"] = $row['gearBox'];
                $valueArr["seatingCapacity"] = $row['seatingCapacity'];
                
                $valueArr["synchroniser"] = $row['synchroniser'];
                $valueArr["stearingType"] = $row['stearingType'];
                $valueArr["turningRadius"] = $row['turningRadius'];
                $valueArr["frontBreakType"] = $row['frontBreakType'];
                
                $valueArr["rearBreakType"] = $row['rearBreakType'];
                $valueArr["topSpeed"] = $row['topSpeed'];
                $valueArr["acceleration"] = $row['acceleration'];
                $valueArr["tyreTypes"] = $row['tyreTypes'];
                $valueArr["alloyWheelSize"] = $row['alloyWheelSize'];
                
                $valueArr["noOfDoors"] = $row['noOfDoors'];
                $valueArr["cargoVolume"] = $row['cargoVolume'];
                $valueArr["engineType"] = $row['engineType'];
                $valueArr["displacement"] = $row['displacement'];
                $valueArr["maxTorque"] = $row['maxTorque'];
                
                $valueArr["noOfCylinder"] = $row['noOfCylinder'];
                $valueArr["valvesPerCylinder"] = $row['valvesPerCylinder'];
                $valueArr["valveConfiguration"] = $row['valveConfiguration'];
                $valueArr["borexTorque"] = $row['borexTorque'];
                
                
                //$valueArr["airConditioner"] = $row['airConditioner'];
                //$valueArr["heater"] = $row['heater'];
                //$valueArr["adjustableSteering"] = $row['adjustableSteering'];
                //$valueArr["digitalClock"] = $row['digitalClock'];
                //$valueArr["rearWashWiper"] = $row['rearWashWiper'];
                $valueArr["numberPlate"] = $row['numberPlate'];
                $valueArr["insuranceType"] = $row['insuranceType'];
                $valueArr["anyAccidentDamage"] = $row['anyAccidentDamage'];
                $valueArr["isActive"] = $row['status'];

                $valueArr["vehicleLocation"] = $row['vehicleLocation'];
                
                $sqlAdsImages = "select * from adsCarImages where adsId=".$adsId." order by id desc";
                $resultAdsImages = mysqli_query($conn, $sqlAdsImages);
                $adsImagesArr1=[];
                while($rowAdsImages=mysqli_fetch_assoc($resultAdsImages)){
                     $adsImagesArr=[];
                     $adsImagesArr["carImage"] = $rowAdsImages["imagePath"];  
                     
                     $adsImagesArr1[] = $adsImagesArr;
                    
                }
                
                 $valueArr["carImage"] = $adsImagesArr1;  
               
                $couponArray[] = $valueArr;
            
            }
    
       // return json_encode($couponArray); 
        
        $message = ["error_code"=>1,"message"=>'Data fetched successfully','data'=>$couponArray];
        return json_encode($message);
        
     }else{
        $message = ["error_code"=>0,"message"=>'Please login again','data'=>[]];
        return json_encode($message);
     }
    
}

 
 function create_ads(){
     
      include '../config.php';
     $headers=array(); foreach (getallheaders() as $name => $value) { $headers[$name] = $value; }
     
    $token =  $headers['token'];
    
    //return $token;
    $getCustomerData = checkAuthenticateCustomer($token);
     
     $userId = json_encode($getCustomerData['id']);
     if($userId!='null' && $userId!=''  && $token!=''){
        
            
            $ownerName = $_POST['ownerName']; 
            $ownerContactNumber = $_POST['ownerContactNumber']; 
            $carModel = $_POST['carModel']; 
            $carCompany = $_POST['carCompany'];
            $year = $_POST['year'];
            $kmsDriven = $_POST['kmsDriven'];
            $fuelType = $_POST['fuelType'];
            $transmission = $_POST['transmission'];
            $mileage = $_POST['mileage'];
            
            
            $engine = $_POST['engine'];
            $maxPower = $_POST['maxPower'];
            $torque = $_POST['torque'];
            $color = $_POST['color'];
            $fuelSupplySystem = $_POST['fuelSupplySystem'];
            $compressionRation = $_POST['compressionRation'];
            $turboCharger = $_POST['turboCharger'];
            
            $superCharger = $_POST['superCharger'];
            //$airConditioner = $_POST['airConditioner'];
            //$heater = $_POST['heater'];
            
            //$adjustableSteering = $_POST['adjustableSteering'];
            //$digitalClock = $_POST['digitalClock'];
            
            $gearBox = $_POST['gearBox'];
            $seatingCapacity = $_POST['seatingCapacity'];
            
            $synchroniser = $_POST['synchroniser'];
            $stearingType = $_POST['stearingType'];
            $turningRadius = $_POST['turningRadius'];
            $frontBreakType = $_POST['frontBreakType'];
            
            $rearBreakType = $_POST['rearBreakType'];
            $topSpeed = $_POST['topSpeed'];
            $acceleration = $_POST['acceleration'];
            $tyreTypes = $_POST['tyreTypes'];
            $alloyWheelSize = $_POST['alloyWheelSize'];
            
            $noOfDoors = $_POST['noOfDoors'];
            $cargoVolume = $_POST['cargoVolume'];
            $engineType = $_POST['engineType'];
            $displacement = $_POST['displacement'];
            $maxTorque = $_POST['maxTorque'];
            
            $noOfCylinder = $_POST['noOfCylinder'];
            $valvesPerCylinder = $_POST['valvesPerCylinder'];
            $valveConfiguration = $_POST['valveConfiguration'];
            $borexTorque = $_POST['borexTorque'];
            
            
            $rearWashWiper = $_POST['rearWashWiper'];
            $numberPlate = $_POST['numberPlate'];
            $insuranceType = $_POST['insuranceType'];
            $anyAccidentDamage = $_POST['anyAccidentDamage'];
            
            
            
            //Specification Parameters
            
            
            $adjustableSteering=$_POST['adjustableSteering'];
            $digitalClock=$_POST['digitalClock'];
            $rearWashWiper=$_POST['rearWashWiper'];
            $heater=$_POST['heater'];
            $airConditioner=$_POST['airConditioner'];
            $powerSteering=$_POST['powerSteering'];
            $powerWindowsFront=$_POST['powerWindowsFront'];
            $powerWindowsRear=$_POST['powerWindowsRear'];
            $remoteTrunkOpener=$_POST['remoteTrunkOpener'];
            $remoteFuelLidOpener=$_POST['remoteFuelLidOpener'];
            $lowFuelWarningLight=$_POST['lowFuelWarningLight'];
            $vanityMirror=$_POST['vanityMirror'];
            $rearSeatHeadrest=$_POST['rearSeatHeadrest'];
            $heightAdjustableFrontSeatBelts=$_POST['heightAdjustableFrontSeatBelts'];
            $cupHoldersFront=$_POST['cupHoldersFront'];
            $cupHoldersRear=$_POST['cupHoldersRear'];
            $antiLockBrakingSystem=$_POST['antiLockBrakingSystem'];
            $centralLocking=$_POST['centralLocking'];
            $powerDoorLocks=$_POST['powerDoorLocks'];
            $childSafetyLock=$_POST['childSafetyLock'];
            $antiTheftAlarm=$_POST['antiTheftAlarm'];
            $driverAirbags=$_POST['driverAirbags'];
            $passengerAirbag=$_POST['passengerAirbag'];
            $rearSeatBelts=$_POST['rearSeatBelts'];
            $seatBeltWarning=$_POST['seatBeltWarning'];
            $adjustableSeats=$_POST['adjustableSeats'];
            $keylessEntry=$_POST['keylessEntry'];
            $adjustableheadLights=$_POST['adjustableheadLights'];
            $manuallyAdjustableExteriorRearViewMirror=$_POST['manuallyAdjustableExteriorRearViewMirror'];
            $rearWindowWiper=$_POST['rearWindowWiper'];
            $alloyWheels=$_POST['alloyWheels'];
            $tintedGlass=$_POST['tintedGlass'];
            $frontFogLights=$_POST['frontFogLights'];
            $rearWindowDefogger=$_POST['rearWindowDefogger'];
            $vehicleLocation=$_POST['vehicleLocation'];
            
            //End Specification parameters
            
            
            // File upload configuration
            $targetDir = "adsImages1/";
            $allowTypes = array('jpg','png','jpeg','gif');
               
            if(!empty(array_filter($_FILES['imagePath']['name']))){
                
            $sql = "INSERT INTO ads(userId,ownerName,ownerContactNumber,carModel,carCompany,year,kmsDriven,fuelType,transmission,mileage,engine,maxPower,torque,color,fuelSupplySystem
            ,compressionRation,turboCharger,superCharger,gearBox,seatingCapacity,synchroniser,stearingType,turningRadius,frontBreakType,rearBreakType,topSpeed,
            acceleration,tyreTypes,alloyWheelSize,noOfDoors,cargoVolume,engineType,displacement,maxTorque,noOfCylinder,valvesPerCylinder,valveConfiguration,borexTorque,numberPlate,insuranceType,anyAccidentDamage,vehicleLocation) VALUES 
            (".$userId.",'".$ownerName."','".$ownerContactNumber."','".$carModel."','".$carCompany."','".$year."','".$kmsDriven."','".$fuelType."','".$transmission."','".$mileage."','".$engine."','".$maxPower."','".$torque."',
            '".$color."','".$fuelSupplySystem."','".$compressionRation."','".$turboCharger."','".$superCharger."','".$gearBox."','".$seatingCapacity."',
            '".$synchroniser."','".$stearingType."','".$turningRadius."', '".$frontBreakType."','".$rearBreakType."', '".$topSpeed."', '".$acceleration."', '".$tyreTypes."',
             '".$alloyWheelSize."', '".$noOfDoors."', '".$cargoVolume."', '".$engineType."', '".$displacement."','".$maxTorque."', '".$noOfCylinder."', '".$valvesPerCylinder."',
             '".$valveConfiguration."', '".$borexTorque."','".$numberPlate."','".$insuranceType."','".$anyAccidentDamage."', '".$vehicleLocation."')";
            
            
            if(mysqli_query($conn, $sql)){
                
                $insertedId = $conn->insert_id;
                
                
                $sql = "INSERT INTO ads_specifications(adsId,adjustableSteering,digitalClock,rearWashWiper,heater,airConditioner,powerSteering,powerWindowsFront,powerWindowsRear,remoteTrunkOpener,remoteFuelLidOpener,lowFuelWarningLight,vanityMirror,rearSeatHeadrest,heightAdjustableFrontSeatBelts,cupHoldersFront,cupHoldersRear,antiLockBrakingSystem,centralLocking,powerDoorLocks,childSafetyLock,antiTheftAlarm,driverAirbags,passengerAirbag,rearSeatBelts,seatBeltWarning,adjustableSeats,keylessEntry,adjustableheadLights,manuallyAdjustableExteriorRearViewMirror,rearWindowWiper,alloyWheels,tintedGlass,frontFogLights,rearWindowDefogger) VALUES(".$insertedId.",'".$adjustableSteering."','".$digitalClock."','".$rearWashWiper."','".$heater."','".$airConditioner."','".$powerSteering."','".$powerWindowsFront."','".$powerWindowsRear."','".$remoteTrunkOpener."','".$remoteFuelLidOpener."','".$lowFuelWarningLight."','".$vanityMirror."','".$rearSeatHeadrest."','".$heightAdjustableFrontSeatBelts."','".$cupHoldersFront."','".$cupHoldersRear."','".$antiLockBrakingSystem."','".$centralLocking."','".$powerDoorLocks."','".$childSafetyLock."','".$antiTheftAlarm."','".$driverAirbags."','".$passengerAirbag."','".$rearSeatBelts."','".$seatBeltWarning."','".$adjustableSeats."','".$keylessEntry."','".$adjustableheadLights."','".$manuallyAdjustableExteriorRearViewMirror."','".$rearWindowWiper."','".$alloyWheels."','".$tintedGlass."','".$frontFogLights."','".$rearWindowDefogger."')";

                //return json_encode($sql);
                if(mysqli_query($conn, $sql)){
                
                    foreach($_FILES['imagePath']['name'] as $key=>$val){
                        // File upload path
                        $fileNameOrg = basename($_FILES['imagePath']['name'][$key]);
                        $uniqid = uniqid();
                        
                        $fileName = $uniqid.'__'.$fileNameOrg;
                        
                        $targetFilePath = $targetDir . $fileName;
                        
                        // Check whether file type is valid
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        
                        //return $fileType;
                        if(in_array($fileType, $allowTypes)){
                            
                            // Upload file to server
                            if(move_uploaded_file($_FILES["imagePath"]["tmp_name"][$key], $targetFilePath)){
                                // Image db insert sql
                                
                                $sqlAdsImages = "INSERT INTO adsCarImages(adsId,imagePath) VALUES 
                                    ('".$insertedId."','".$targetFilePath."')";
                                    
                                    if(mysqli_query($conn, $sqlAdsImages)){
                                        
                                        
                                    }else{
                                        //error
                                        
                                            $sqlAds = "delete from ads where id='".$insertedId."'";
                                            if(mysqli_query($conn, $sqlAds)){
                                                $sqlAdsImg = "delete from adsCarImages where adsId='".$insertedId."'";
                                                if(mysqli_query($conn, $sqlAdsImg)){
                                                    $message = ["error_code"=>0,"message"=>'Ads could not be created','data'=>[]];
                                                    return json_encode($message);  
                                                }else{
                                                    
                                                }
                                            }else{
                                                
                                            }

                                    }
                            
                            }else{
                                //Image not upload then delete entry
                                $sqlAds = "delete from ads where id='".$insertedId."'";
                                if(mysqli_query($conn, $sqlAds)){
                                    $sqlAdsImg = "delete from adsCarImages where adsId='".$insertedId."'";
                                    if(mysqli_query($conn, $sqlAdsImg)){
                                        $message = ["error_code"=>0,"message"=>'Ads could not be created','data'=>[]];
                                        return json_encode($message);  
                                    }else{
                                        
                                    }
                                }else{
                                    
                                }
                            }
                        }else{
                            //Image not upload then delete entry in aaray
                            $sqlAds = "delete from ads where id='".$insertedId."'";
                            if(mysqli_query($conn, $sqlAds)){
                                $sqlAdsImg = "delete from adsCarImages where adsId='".$insertedId."'";
                                if(mysqli_query($conn, $sqlAdsImg)){
                                    $message = ["error_code"=>0,"message"=>'Ads could not be created','data'=>[]];
                                    return json_encode($message);  
                                }else{
                                    
                                }
                            }else{
                                
                            }
                        }
                    }
                
                $message = ["error_code"=>1,"message"=>'Ads created successfully','data'=>[]];
                return json_encode($message); 
                
                
                
                //
                
                
                }else{
                    $message = ["error_code"=>0,"message"=>'Ads could not be created','data'=>[]];
                    return json_encode($message);  //Specification create
                }

            }else{
                $message = ["error_code"=>0,"message"=>'Ads could not be created','data'=>[]];
                return json_encode($message);  
            }
            
        }else{
            $message = ["error_code"=>0,"message"=>'Atleast one image required','data'=>[]];
            return json_encode($message);  
        }
            
    
     }else{
         $message = ["error_code"=>0,"message"=>'Invalid User','data'=>[]];
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