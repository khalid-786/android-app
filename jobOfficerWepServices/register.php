<?php
  include 'config.inc.php';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
		  	$UserName = $_POST['user_name'];
		  	$Password = $_POST['user_password'];
		  	$email = $_POST['user_email'];
		  	$usertype = $_POST['user_type'];
		  	//check if user exist in Database
		  	try {
		  		$stmt = $cont->prepare("SELECT 
		          
		          1
		       FROM 
		          users 
		       WHERE 
		          username = :username 
		       LIMIT 1");
		      $stmt->bindParam(':username' , $UserName);
		  	  //$stmt->bindParam($Password);
		  	  $stmt->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
            
             $row = $stmt->fetch();
             if ($row) {

	            $response['success'] = 0;
		  		$response['message'] = "هذا المستخدم موجود مسبقا";
		  		die(json_encode($response));
             	  
             } 

             try {
		  		$stmt = $cont->prepare("INSERT INTO users 
		          (username , password ,email , account_type) 
		          VALUES 
		          (:username  ,:password ,:email , :usertype)
		        ");
		      $stmt->bindParam(':username' , $UserName);
		  	  $stmt->bindParam( ':password',$Password);
		  	  $stmt->bindParam( ':email',$email);
		  	  $stmt->bindParam( ':usertype',$usertype);
		  	  $stmt->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
              
            $response['success'] = 1;
		  	$response['message'] = "تم تسجيل الإشتراك بنجاح";
		    die(json_encode($response));  



 } 	