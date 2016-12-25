<?php
require_once('jobs.php');
$action = $_POST["action"];
if(!empty($action)) {
	switch($action) {
            case "edit_user":
            if(!empty($_POST["user_id"])) {
                    $view_id=$_POST["user_id"];
                    $obj_job = new jobs();
                    $job_id = $obj_job->get_user_details_id($view_id);
                    $var = count($job_id);
                    $i=0;
                    while($var>$i){
		  
		 $tempecho='
		 <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit User Details</h4>
      </div>
           <div class="modal-body">
          <form  class="form-horizontal" >
           <div class="form-group">
            <label for="inputName" class="col-md-3 control-label">User ID : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">
               <input type="text" name="user_id" value="'.$job_id[$i]['user_id'].'" class="form-control" placeholder="Your Name" id="user_ids" readonly>
             </div>
          </div>
		  <div class="form-group">
            <label for="inputName" class="col-md-3 control-label">User Name : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">
      <input type="text" name="user_name" id="user_name_id" value="'.$job_id[$i]['name'].'" class="form-control" placeholder="Your Name" required >
             </div>
          </div>
           <div class="form-group">
            <label for="inputName" class="col-md-3 control-label">User Type  : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">';
           
			 if($job_id[$i]['user_type']==101){
			  $tempecho.='<select class="form-control" name="user_type" id="user_type_id">
                        <option value="101" selected>Admin</option>
                        <option value="201">HR</option>
                        <option value="301">Employee</option>
                 </select>';
                }
		    elseif($job_id[$i]['user_type']==201){
	$tempecho.='<select class="form-control" name="user_type" id="user_type_id">
                        <option value="101">Admin</option>
                        <option value="201" selected>HR</option>
                        <option value="301">Employee</option>
                 </select>';
			}
				
				else{
		$tempecho.='<select class="form-control" name="user_type" id="user_type_id">
					<option value="" >Select User</option>
                        <option value="101">Admin</option>
                        <option value="201" selected>HR</option>
                        <option value="301">Employee</option>
                 </select>';
					} 
               
             $tempecho.='</div>
                      </div>
		
        <div class="form-group">
           <div class="col-md-offset-4 col-md-8">
       <button type="button" class="btn btn-success" onClick="callCrudAction(\'submit_user_details\',\'' . $job_id[$i]['user_id']. '\')"><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
          </div>
         </div>
      </form>
      </div>
         
        </div>
		 ';
        echo $tempecho; 
	  $i++; 
          } //close of while
			
	} //close of if
			break;

			case "change_password":
			
			if(!empty($_POST["emp_change_id"])) {
				$view_id=$_POST["emp_change_id"];	  
	   			$obj_job = new jobs();
    			$job_id = $obj_job->get_user_details_id($view_id);
	  			if($job_id){
		  		$tempecho='
		 
	<div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
<h4 class="modal-title custom_align" id="Heading">Change Password :&nbsp;'.$job_id[0]['name'].'&nbsp;('.$job_id[0]['user_id'].') </h4>
      </div>
           <div class="modal-body">
          <form  class="form-horizontal" >
       
           <div class="form-group">
            <label for="inputName" class="col-md-3 control-label">Change  Password :</label>
            <div class="col-md-7">
   <input type="text" name="emp_password" id="user_pass_value" class="form-control" placeholder="Type New Password" style="height:35px;font-size:14px" >
             </div>
          </div>
          
        <div class="form-group">
           <div class="col-md-offset-4 col-md-8">
   <button type="button" class="btn btn-success" onClick="callCrudAction(\'user_update_pass\',\'' . $job_id[0]['user_id']. '\')"><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
          </div>
         </div>
       
      </form>
      </div>
         
        </div>
		 ';
       echo $tempecho;
		
	  }
			
			}
			break;

		case "submit_user_details":
				if(!empty($_POST["user_id"])) {
				$user_id=$_POST["user_id"];
				$user_name=$_POST["user_name"];
				$user_role=$_POST["user_role_id"];
				  $obj_job = new jobs();
      $job_id = $obj_job->update_user_details($user_id,$user_name,$user_role);
	
	  if($job_id){ 
         echo'
		<h4>Data Successfully Updated.</h4>
		 
		';
	  }
	else{
		echo '<h4>Data  not Updated</h4>';
	}
			
			}
			break;	

		case "user_update_pass":
				if(!empty($_POST["user_update_pass_id"])) {
				$user_id=$_POST["user_update_pass_id"];
				$new_pass = $_POST["user_pass_val"];
				  $obj_job = new jobs();
      $job_id = $obj_job->update_user_password($user_id,$new_pass);
	  if($job_id){ 
         echo'
		<h4>Password Updated.</h4>
		 
		';
	  }
	  else{
	  	echo 'Password not updated.';
	  }
			
			}
			break;			
			
			
		case "con_delete":
				if(!empty($_POST["con_delete_id"])) {
				$con_deletedata_id=$_POST["con_delete_id"];
				  $obj_job = new jobs();
      $job_id = $obj_job->delete_user($con_deletedata_id);
	  if($job_id){ 
         echo'
		<h4>Your Data Successfully Deleted</h4>
		 
		';
	  }
	  else{
	  	echo 'Data not deleted.';
	  }
			
			}
			break;			
		
		case "delete_user": 
			
			if(!empty($_POST["delete_id"])) {
				$data_id=$_POST["delete_id"];
				  $obj_job_del = new jobs();
      $job_id = $obj_job_del->get_user_details_id($data_id);
	  if($job_id){ 
         echo'
		 <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Do You Want To Delete This User?</h4>
      </div>
           <div class="modal-body">
		   <div class="profile-userpic">
			
				<p class="well">' . $job_id[0]['name']. ' ( ' . $job_id[0]['user_id']. ')</p>
				
				</div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-success" onClick="callCrudAction(\'con_delete\',\'' . $job_id[0]['user_id']. '\')"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>';
	  }
	  else{
	  	echo 'Data not deleted';
	  }
			
			}
			
			break;
	}
}
?>
