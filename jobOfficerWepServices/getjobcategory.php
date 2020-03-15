<?php
  include 'config.inc.php';
		
		  	try {
		  		$stmt = $cont->prepare("SELECT * FROM job_category ");
		  	    $stmt->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
            
             $row = $stmt->fetchAll();
             if ($row) {


	             	  	    $response['success'] = 1;
					  		$response['message'] = "تم جلب الأقسام";
					  		$response['posts']  = array();
					  		foreach ($row as $rows) {
					  			$post                = array();
					  			$post['category_id']     = $rows['category_id'];
					  			$post['category_title']  = $rows['category_title'];
					  			$post['category_info']   = $rows['category_info'];
					  			array_push($response['posts'], $post);
					  		}

	             	  
             	       die(json_encode($response));
             } else {
             	
                     $response['success'] = 0;
			  		 $response['message'] = "لا يوجد أي قسم";
			  		 die(json_encode($response));

             }
             



 