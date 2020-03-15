<?php
  include 'config.inc.php';
  if($_SERVER['REQUEST_METHOD'] == "POST") {
		  	$categoryTitle = $_POST['category_title'];
		  	$categoryInfo = $_POST['category_info'];
		  	
            try {
		  		$stmt2 = $cont->prepare("SELECT 1 FROM job_category where category_title = :c_title");
             	$stmt2->bindParam(':c_title'  ,  $categoryTitle);
		  	    $stmt2->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "1خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
	             $row = $stmt2->fetch();
			  	   if ($row) { 
	                   $response['success'] = 0;
				  	   $response['message'] = "هذا القسم موجود مسبقا";
				  	   die(json_encode($response));
			  	    } else {
			  	    	try {
				  		$stmt = $cont->prepare("INSERT INTO job_category
				          (category_title , category_info ) 
				          VALUES 
				          (:c_title  ,:c_info )
				        ");
				        $stmt->bindParam(':c_title'  ,  $categoryTitle);
				  	    $stmt->bindParam( ':c_info' , $categoryInfo);
				  	    $stmt->execute();
					  	} catch (Exception $e) {
					  		$response['success'] = 0;
					  		$response['message'] = "2خطأ في الٌاعدة ; أعد المحاولة";
					  		die(json_encode($response));
					  	}
	              
		              $response['success'] = 1;
				  	  $response['message'] = "تمت إضافة القسم بنجاح";
				      die(json_encode($response)); 
			  	    }
			  	    
             


 } 	