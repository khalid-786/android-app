<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
	 include 'config.inc.php';
		  	$applyerId = $_GET['applyer_id'];
		
		  	try {
		  		$stmt = $cont->prepare("SELECT jobs.job_id , jobs.job_title ,jobs.job_info  ,       applyforjobs.apply_date ,applyforjobs.id
					FROM `applyforjobs` 
					 JOIN jobs
					 ON applyforjobs.job_id = jobs.job_id
					 JOIN users 
					 ON applyforjobs.applier_id = users.user_id

					WHERE users.user_id =:applyerID");
		  		$stmt->bindParam(":applyerID" , $applyerId);
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
					  		$response['jobsbyapplyer']  = array();
					  		foreach ($row as $rows) {
					  			$job                = array();
					  			$job['jobapply_id']     = $rows['id'];
					  			$job['job_title']  = $rows['job_title'];
					  			$job['job_info']   = $rows['job_info'];
					  			$job['job_apply_date']   = $rows['apply_date'];
					  			array_push($response['jobsbyapplyer'], $job);
					  		}

	             	  
             	       die(json_encode($response));
             } else {
             	
                     $response['success'] = 0;
			  		 $response['message'] = "لا يوجد أي قسم";
			  		 die(json_encode($response));

             }
             
}


 