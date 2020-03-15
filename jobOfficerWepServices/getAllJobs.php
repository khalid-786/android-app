<?php
  include 'config.inc.php';
		
		  	try {
		  		$stmt = $cont->prepare("SELECT * FROM jobs 
                    JOIN users 
                    ON jobs.job_publisher = users.user_id
                    JOIN job_category
                    ON jobs.category_id = job_category.category_id
		  			where job_chance_number != job_chance_number_validate");
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
					  		$response['jobs']  = array();
					  		foreach ($row as $rows) {
					  			$job                = array();
					  			$job['job_id']     = $rows['job_id'];
					  			$job['job_title']  = $rows['job_title'];
					  			$job['job_info']   = $rows['job_info'];
					  			$job['job_img']     = $rows['job_img'];
					  			$job['job_publisher']  = $rows['job_publisher'];
					  			$job['job_chance_number']   = $rows['job_chance_number'];
					  			$job['job_publish_date']   = $rows['job_publish_date'];
					  			$job['user_name']   = $rows['username'];
					  			$job['category_title']   = $rows['category_title'];
					  			array_push($response['jobs'], $job);
					  		}

	             	  
             	       die(json_encode($response));
             } else {
             	
                     $response['success'] = 0;
			  		 $response['message'] = "لا يوجد أي قسم";
			  		 die(json_encode($response));

             }
             



 