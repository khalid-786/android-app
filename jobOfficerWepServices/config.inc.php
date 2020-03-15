<?php
  
  $dsn = 'mysql:host=localhost;dbname=jobOficer';
  $user = 'root';
  $pass = '';
  $option  = array(PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET NAMES utf8' );


  try {
  	$cont = new PDO($dsn , $user ,$pass , $option);
  	$cont->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    //$cont->setAttribute(PDO::ATTR_DEFUALT_FETCH_MDOE ,PDO::FETCH_ASSOC);
  	//echo "You Are Connected To DataBase Cliprz";
  	
  } catch (PDOException $e) {
  	echo "Failed To Connect ".$e->getMessage();
  }

/*if (function_exists("get_magic_quotes_gpc") && get_magic_quotes_gpc()) {
  # code...
} else {
  # code...
}*/


