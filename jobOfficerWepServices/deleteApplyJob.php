<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
	 include 'config.inc.php';
		  	$applyJobId = $_GET['apply_job_id'];
		
		  	try {
		  		$stmt = $cont->prepare("DELETE FROM applyforjobs

					WHERE id =:applyID");
		  		$stmt->bindParam(":applyID" , $applyJobId);
		  	    $stmt->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
 	  	    $response['success'] = 1;
	  		$response['message'] = "تم إلاغاء عملية التقدم بنجا";
	       die(json_encode($response));
}


 