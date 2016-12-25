<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Codrops" />
   
          <script type="text/javascript" src="bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/style1.css" />
         <script type="text/javascript">
			jQuery(document).ready(function($) {
				 $(".alert").delay(10000).slideUp(200, function() {
    $(this).alert('close');
        });
				
			});
		</script>
    </head>
    <body>
    
     <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" style="color:#FFF;">Admin Login</div>
                     </div>     

                      <div style="padding-top:30px" class="panel-body" >
                      <div class="col-md-4"><img src="images/lock.png" alt=""></div>
                      <div class="col-md-8">
                       <?php 
		
			if(isset($_GET['error']) && !empty($_GET['error']) )
			{
				
			?>
				<div class="alert" >
                    
                    <p style="color:#1F60AD; font-size: 16px; font-weight: bold;" ><?= $_GET['error'] ?></p> 
                </div>
	                       <?php }
								if(isset($_GET['msg']) && !empty($_GET['msg']) ) {
								?> 
                       <div class="alert" >
                    <p style="color: #1F60AD; font-size: 16px; font-weight: bold;"><?= $_GET['msg'] ?></p> 
                </div>  
                <?php }
								if(isset($_GET['servererror']) && !empty($_GET['servererror']) ) {
								?> 
                       <div class="alert" >
                    <p style="color: #1F60AD; font-size: 16px; font-weight: bold;"><?= $_GET['servererror'] ?></p> 
                </div>  
             <?php  			   
	          }
	
	            ?>
 <form id="loginform" action="login_process.php" class="form-horizontal" role="form" method="post">
                               <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="user_id" value="" placeholder="User Id">                                        
                               </div>
                                
                                <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                   <input id="login-password" type="password" class="form-control" name="login_password" placeholder="Password">
                                </div>
                                
                                
                                 <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                                       <select class="form-control" name="user_type">
                                           <option value="101">Admin</option>
                                           <option value="201">HR</option>
                                           <option value="301">Employee</option>
                                       </select>
                                 </div>
                                    
                                    
                                <!-- <div class="input-group">
                                      <div class="checkbox">
                                        <label> <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me </label>
                                      </div>
                                 </div>-->


                                 <div style="margin-top:10px" class="form-group">
                                     <div class="col-sm-12 controls">
    <button type="submit" class="btn btn-primary btn-md btn-block" name="sub">Login</button>
                                  </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           <!--<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                             Forgot password
                                          </a>-->
                                        </div>
                                    </div>
                                </div>    
                            </form> 
                         </div>
                    </div>                     
                 </div>  
             </div>
          </div>
          
     </body>
</html>