<?php require_once('jobs.php');
$session_job = new jobs();
$session_job->session_check_admin();
 ?>

<!DOCTYPE HTML>
<html>
 <head>
 <title>Create Users</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="" />
 <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
 <link href="css/style.css" rel='stylesheet' type='text/css' />
 <link href="css/style2.css" rel='stylesheet' type='text/css' />
 <!--<link href="css/ionicons.min.css" rel='stylesheet' type='text/css' />-->

 <link href="css/font-awesome.css" rel="stylesheet">
 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>

 <!--------------Calender Start-------------->
 <script src="js/jquery-ui.js"></script>
 <link href="css/jquery-ui.css" rel="stylesheet">
 <script>
   $(function() {
      $( "#datepicker,#datepicker1" ).datepicker();
	  $( "#datepicker,#datepicker2" ).datepicker();
	   });
 </script>
 <!--------------Calender End-------------->

 </head>
 <body>
<?php include 'include/nav-header_admin.php' ?>
<div id="page-wrapper">
<div class="graphs">
   <div class="row">
    <div class="page-header">Create Users</div>
    <div class="add-employee-heading" id="demo">
       <h2 class="page-header">Required Details</h2>
       <?php 
		
			if(isset($_GET['error']) && !empty($_GET['error']) )
			{
				
			?>
       <div class="alert" >
        <p style="color:#0C4C8F; font-size: 16px; font-weight: bold;" >
           <?= $_GET['error'] ?>
         </p>
      </div>
       <?php }
								if(isset($_GET['msg']) && !empty($_GET['msg']) ) {
								?>
       <div class="alert" >
        <p style="color:#0C4C8F; font-size: 16px; font-weight: bold;">
           <?= $_GET['msg'] ?>
         </p>
      </div>
       <?php }
								if(isset($_GET['servererror']) && !empty($_GET['servererror']) ) {
								?>
       <div class="alert" >
        <p style="color:#0C4C8F; font-size: 16px; font-weight: bold;">
           <?= $_GET['servererror'] ?>
         </p>
      </div>
       <?php  			   
	          }
	
	            ?>
       <form action="create_users_process.php" class="form-horizontal" method="post" autocomplete="off">
        <div class="col-md-12">
           <div class="form-group">
            <label for="inputName" class="col-md-4">User Name : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">
               <input type="text" name="user_name" class="form-control"  placeholder="User Name" required>
             </div>
          </div>
          
           <div class="form-group">
            <label for="inputName" class="col-md-4">Password : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">
               <input class="form-control" name="user_pass" placeholder="Password" type="password" required>
             </div>
          </div>
          
          <div class="form-group">
            <label for="inputName" class="col-md-4">Type : <span style="color: #ff0000">*</span> </label>
            <div class="col-md-8">
               <select class="form-control" name="user_type" required>
               	   <option value="">Select Type</option>
                   <option value="101">Admin</option>
                   <option value="201">HR</option>
		   <option value="301">Employee</option>
               </select>
             </div>
          </div>
           
                          
        <div class="form-group">
           <div class="col-md-offset-4 col-md-8">
            <button type="submit" class="btn btn-primary btn-md btn-block" name="sub">Create</button>
          </div>
         </div>
        </div> 
      </form>
       <div class="clearfix"></div>
      </div> 
       <div class="copy_layout">
         <p> Developed by <a href="https://in.linkedin.com/in/avnish-alok-84796580" target="_blank">Avnish alok</a> </p>
       </div>
     </div>
  </div>
 </div>
<!-- /#wrapper--> 

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
