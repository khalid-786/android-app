<?php
  include 'config.inc.php';
  if($_SERVER['REQUEST_METHOD'] == "POST") {
		  	$jobTitle = $_POST['job_title'];
		  	$jobInfo = $_POST['job_info'];
		  	$category_id =$_POST['category_id']; 
		  	$jobBubliher = $_POST['job_publisher'];
		  	$jobApplyNumber = $_POST['job_applynumber'];
		  	$jobImg = $_POST['job_img'];
		  	$jobDate = date("Y/m/d");
		  	$jobTime = date("h:i:as");

		  	$dt = date("ymd");
		  	$tm = date("his");
		  	$randnumber = rand(0 , 100);
		  	$imgname = "img_".$dt.$tm.$randnumber.".jpg";

		  	$decodeimg = base64_decode("$jobImg");
		  	file_put_contents("jobimages/".$imgname, $decodeimg);

		  	

             try {
             	$stmt2 = $cont->prepare("SELECT * FROM job_category where category_title = :c_title");
             	$stmt2->bindParam(':c_title'  ,  $category_id);
		  	    $stmt2->execute();
		  	    $row = $stmt2->fetch();
		  	    $cat_id = $row['category_id'];
		  		$stmt = $cont->prepare("INSERT INTO jobs 
		          (job_title , job_info , category_id,job_img ,job_publisher ,job_chance_number ,job_chance_number_validate ,job_publish_date) 
		          VALUES 
		          (:j_title  ,:j_info , :j_category ,:j_img ,:j_publisher , :j_applynumber , 0 ,:j_date)
		        ");
		      $stmt->bindParam(':j_title'  ,  $jobTitle);
		  	  $stmt->bindParam( ':j_info' , $jobInfo);
		  	  $stmt->bindParam( ':j_category',   $cat_id);
		  	  $stmt->bindParam( ':j_img',   $imgname);
		  	  $stmt->bindParam(':j_publisher'  ,  $jobBubliher);
		  	  $stmt->bindParam( ':j_applynumber' , $jobApplyNumber);
		  	  $stmt->bindParam( ':j_date',   $jobDate);
		  	  $stmt->execute();
		  	} catch (Exception $e) {
		  		$response['success'] = 0;
		  		$response['message'] = "خطأ في الٌاعدة ; أعد المحاولة";
		  		die(json_encode($response));
		  	}
              
            $response['success'] = 1;
		  	$response['message'] = "تم نشر الوظيفة بنجاح";
		    die(json_encode($response));  



 } 	