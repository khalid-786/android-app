<?php


  if ($_SERVER['REQUEST_METHOD'] == "POST") {
  	include 'config.inc.php';
		  	$UserName = $_POST['user_name'];
		  	$Password = $_POST['user_password'];
		  	//check if user exist in Database
		  	try {
		  		$stmt = $cont->prepare("SELECT 
		          
		          username ,
		          password 
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

	             	  if ($Password == $row['password']) {
                            $stmt2 = $cont->prepare("SELECT * 
					       FROM 
					          users 
					       WHERE 
					          username = :username 
					          AND
					          password = :password
					       LIMIT 1");
					  	$stmt2->bindParam(':username' , $UserName);
					  	$stmt2->bindParam(':password' , $Password);
					  	//$stmt->bindParam($Password);
					  	$stmt2->execute();
					  	$row2 = $stmt2->fetch();
	             	  	    $response['success'] = 1;
					  		$response['message'] = "تم تسجيل الدخول بنجاح";
					  		$response['user_id'] = $row2['user_id'];
					  		$response['user_name'] = $row2['username'];
					  		$response['user_type'] = $row2['account_type'];
					  		die(json_encode($response));

	             	  } else {
	             	  	
                             $response['success'] = 0;
					  		 $response['message'] = "كلمة السر غير مطابقة";
					  		 die(json_encode($response));

	             	  }
             	  
             } else {
             	
                     $response['success'] = 0;
			  		 $response['message'] = "هذا المستخدم غير موجود";
			  		 die(json_encode($response));

             }
             



 } 	

 