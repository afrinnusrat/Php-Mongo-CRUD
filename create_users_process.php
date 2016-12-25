<?php require_once('jobs.php');
$obj_job = new jobs();
$obj_job->session_check_admin();
 

if(isset($_POST['sub'])){
  $job = array();
      
  $job['user_name'] = $obj_job->test_input($_POST['user_name']);
  $job['login_pass'] = $obj_job->test_input($_POST['user_pass']);
  $job['user_type'] = $obj_job->test_input($_POST['user_type']);
  $tmp = substr($_POST['user_name'],0,3); 
  $myid = 'dsk'.$tmp.substr(md5(time()),0,5);
  $job['user_id']=$myid; 
  $obj_job_data = new jobs($job);
  $job_id = $obj_job_data->create_users($dbcon);
  
  if($job_id)
  {
	$message = 'You have created a new user';
	header("location:create_users.php?error=$message");exit; 
  }
  else{
	    $message = 'Database problem during user creation';
		header("location:create_users.php.php?error=$message");exit; 
	  
	  }
  
}


?>
  
