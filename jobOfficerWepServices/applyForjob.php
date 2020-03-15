<?php
  include 'config.inc.php';
  if($_SERVER['REQUEST_METHOD'] == "POST") {
		  	$jobId = $_POST['job_id'];
		  	$applyerId = $_POST['applyer_id'];
		  	$applyerMessage = $_POST['applyer_msg'];
		  	$applyDate = date("Y-m-d H:i a");

		  	
            try {
		  		$stmt2 = $cont->prepare("SELECT 1
		  			FROM applyforjobs 
		  			where 
		  			job_id = :j_id
                    AND  
                    applier_id =:a_id
		  			");
		  		$stmt4 = $cont->prepare("SELECT 1 FROM  jobs
				          WHERE
				           job_id = :cur_job
				           AND
				           job_chance_number = job_chance_number_validate
				        ");
				$stmt4->bindParam(':cur_job'  ,  $jobId);
				$stmt4->execute();

             	$stmt2->bindParam(':j_id'  ,  $jobId);
             	$stmt2->bindParam(':a_id'  ,  $applyerId);
		  	    $stmt2->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "1خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}

	             $row = $stmt2->fetch();
	             $row4 = $stmt4->fetch();
			  	   if ($row) { 
	                   $response['success'] = 0;
				  	   $response['message'] = "لقد تقدمت لهذه الوظيفة من قبل";
				  	   die(json_encode($response));
			  	    }elseif ($row4) {
			  	    	 $response['success'] = 0;
				  	   $response['message'] = "لا توجد فرصة ممكنة إنتهت الفرص";
				  	   die(json_encode($response));
			  	    } else {
			  	    	try {
				  		$stmt = $cont->prepare("INSERT INTO applyforjobs
				          (job_id , applier_id ,apply_date , applier_message ) 
				          VALUES 
				          (:job_id  ,:applier_id , :apply_date  ,:applier_msg)
				        ");
				        $stmt->bindParam(':job_id'  ,  $jobId);
				  	    $stmt->bindParam( ':applier_id' , $applyerId);
				  	    $stmt->bindParam( ':apply_date' , $applyDate);
				  	    $stmt->bindParam( ':applier_msg' , $applyerMessage);
				  	    $stmt->execute();
				  	    $stmt3 = $cont->prepare("UPDATE  jobs
				          SET job_chance_number_validate = job_chance_number_validate + 1
				          WHERE
				           job_id = :curent_job
				           AND
				           job_chance_number <> job_chance_number_validate
				        ");
				        $stmt3->bindParam(':curent_job'  ,  $jobId);
				        $stmt3->execute();
					  	} catch (Exception $e) {
					  		$response['success'] = 0;
					  		$response['message'] = "2خطأ في الٌاعدة ; أعد المحاولة";
					  		die(json_encode($response));
					  	}
	              
		              $response['success'] = 1;
				  	  $response['message'] = "تمت عملية التقدم بنجاح";
				      die(json_encode($response)); 
			  	    }
			  	    
             


 } 	