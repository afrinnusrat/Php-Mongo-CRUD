<?php require_once('jobs.php');
$session_job = new jobs();
$session_job->session_check_admin();
 ?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>User Details</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="" />
 <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
 <link href="css/style.css" rel='stylesheet' type='text/css' />
 <link href="css/style2.css" rel='stylesheet' type='text/css' />
 <link href="css/font-awesome.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>


  <script>
  
function callCrudAction(action,id) {
	var queryString;
	switch(action) {
        case "edit_user":
	   
			queryString = 'action='+action+'&user_id='+ id;
		break;
                
		case "change_password":
			queryString = 'action='+action+'&emp_change_id='+ id;
		break;
                
		case "submit_user_details":
		  $("#myview").modal("hide");
		   var user_name=$("#user_name_id").val();
           var user_role=$("#user_type_id option:selected").val();
           queryString = 'action='+action+'&user_id='+ id+'&user_name='+ user_name+'&user_role_id='+ user_role;
		break;
                
		case "user_update_pass":
		 $("#deleteview").modal("hide");
		     var user_pass_val=$("#user_pass_value").val();
             queryString = 'action='+action+'&user_update_pass_id='+ id+'&user_pass_val='+ user_pass_val;
		break;
                
		case "delete_user":
			queryString = 'action='+action+'&delete_id='+ id;
		break;
                
        case "con_delete":
                $("#deleteview").modal("hide");
			queryString = 'action='+action+'&con_delete_id='+ id;
		break;
    }	 
	
	jQuery.ajax({
	url: "crud_edit_user.php",
	data:queryString,
	type: "POST",
	success:function(data){
		switch(action) {
			case "edit_user":
			$("#view_id").html(data);
			$("#myview").modal();
			break;
			case "change_password":
			    $("#delete_id").html(data);
				$("#deleteview").modal();
			break;

			case "user_update_pass":
			    $("#deletesuccess_id").html(data);
				$("#deletesuccess").modal();
				$("#btn_delete").click(function(){
           		$("#deletesuccess").modal("hide"); 
		   			location.reload();
				});
			break;
			
			case "emp_update_pass":
			    $("#deletesuccess_id").html(data);
				$("#deletesuccess").modal();
				$("#btn_delete").click(function(){
           			$("#deletesuccess").modal("hide"); 
		  		});
			break;

			case "submit_user_details":
			    $("#deletesuccess_id").html(data);
				$("#deletesuccess").modal();
				$("#btn_delete").click(function(){
           		$("#deletesuccess").modal("hide"); 
		   			location.reload();
				});
			break;

			case "delete_user":
			    $("#delete_id").html(data);
				$("#deleteview").modal();
			break;

			case "con_delete":
				$("#deletesuccess_id").html(data);
				$('#con_'+id).fadeOut();
				$("#deletesuccess").modal();
				$("#btn_delete").click(function(){
           		$("#deletesuccess").modal("hide"); 
           			location.reload();  
				});
			break;
		}
		$("#txtmessage").val('');
		$("#edit-message").val('');
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
 </head>
 <body>
 <?php include 'include/nav-header_admin.php' ?>
 <div id="page-wrapper">
   <div class="graphs">
     <div class="row">
       <div class="edit-employee-heading" id="demo">
         <h2 class="page-header">Users list</h2>
         
         <div class="col-md-12">
    
        <div class="panel panel-default panel-table ">
          <div class="panel-heading">
            <div class="row">
             <div class="col-md-12">
                <h3 class="panel-title">User Details</h3>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <table class="table table-striped table-bordered table-list">
              <thead>
                <tr>
                  <th class="hidden-xs">No.</th>
                  <th class="hidden-xs">User ID</th>
                  <th>Name</th>
                  <th>User Type</th>
                  <th><em class="fa fa-cog"></em></th>
                </tr>
              </thead>
              <tbody>
               <?php 
                  $obj_job = new jobs();
				  $job_id = $obj_job->get_total_users($dbcon);
				  $var = count($job_id);
				  $i=0;
				  while($var>$i){					  
				?>
				<tr id="con_<?php echo $job_id[$i]['user_id'] ?>">
                  <td class="hidden-xs"><?php echo $i+1 ?></td>
                  <td><?php echo $job_id[$i]['user_id'] ?></td>
                  <td><?php echo $job_id[$i]['name'] ?></td>
                     <?php if($job_id[$i]['user_type']==101){
						 echo '<td>Admin</td>';
						 } 
						elseif($job_id[$i]['user_type']==201)
						{
						 echo '<td>HR</td>';
						 }
						
						else{
						echo '<td>Employee</td>';
							}
						 ?>
				<td align="center">
				<a class="btn btn-default" title="Edit User" onClick="callCrudAction('edit_user',<?php echo "'".$job_id[$i]['user_id']."'" ?>)"><em class="fa fa-pencil"></em></a> 
				<a class="btn btn-danger" title="Delete User" onClick="callCrudAction('delete_user',<?php echo "'".$job_id[$i]['user_id']."'" ?>)"><em class="fa fa-trash-o"></em></a> 
				<a class="btn  btn-default" title="Change Password" onClick="callCrudAction('change_password',<?php echo "'".$job_id[$i]['user_id']."'" ?>)"><em class="fa fa-key"></em></a>
				</td>
                </tr>
                <?php
			 		$i++; }
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

        
         <div class="clearfix"></div>
         <br>
       </div>
       <br>
       <div class="copy_layout">
         <p> Developed by <a href="https://in.linkedin.com/in/avnish-alok-84796580" target="_blank">Avnish alok</a> </p>
       </div>
     </div>
   </div>
 </div>
 </div>
 <!-- /#wrapper--> 
<!--modal-->
<div class="modal fade" id="myview" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

      <div class="modal-dialog" id="view_id">
    
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
<!--modal end -->
<!--modal-->
<div class="modal fade" id="deleteview" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

      <div class="modal-dialog" id="delete_id">
   
      <!-- /.modal-dialog --> 
    </div>
    </div>
<!--modal end -->
<!--modal-->
<div class="modal fade" id="deletesuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

      <div class="modal-dialog" >
    
    <div class="modal-content">
    
    <div class="modal-body" id="deletesuccess_id">
    </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-success" id="btn_delete"><span class="glyphicon glyphicon-ok-sign"></span> OK</button>
        
      </div>    
  </div>
      <!-- /.modal-dialog --> 
    </div>
    </div>
<!--modal end -->
 <!-- Nav CSS -->
 <link href="css/custom.css" rel="stylesheet">
 <script type="text/javascript">
	jQuery(document).ready(function($) {
		 $(".alert").delay(10000).slideUp(200, function() {
			$(this).alert('close');
		});
		
	});
</script> 

 <script src="js/custom.js"></script>
</body>
</html>
