<?php require_once('jobs.php');
 

if(isset($_POST['sub'])){

  $job = array();
  
  $job['user_id'] = $_POST['user_id'];
  $job['login_pass'] = $_POST['login_password'];
  $job['user_type'] = $_POST['user_type'];
    

  $obj_job = new jobs($job);
  $job_id = $obj_job->validate_login(); 
  	
  if($job_id)
  {
	  $sessvar=$obj_job->set_sessionId($job_id[0]['user_id'],$job_id[0]['user_type'],$job_id[0]['name']);
	  if($job_id[0]['user_type'] == 101 || $job_id[0]['user_type'] == 201 || $job_id[0]['user_type'] == 301){
              header("location:create_users.php");exit;	
          }
         
          
  }
  else{
     $message = 'Invalid Credentials !!!.';
     header("location:index.php?error=$message");exit;
     }
	
}
  
