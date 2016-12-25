<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">DASHBOARD</a>
            </div>
            
        
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <strong><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></strong></p>
                                        <p class="text-left small"><?php if(isset($_SESSION['empid'])) echo $_SESSION['empid']; ?></p>
                                        <!--<p class="text-left">
																																								<button type="button" class="btn btn-primary btn-lg btn2"><a href="#">Submit</a></button>
                                         </p>-->
																																									 <br>
                                    </div>
                                </div>
                            </div>
                        </li>
                       
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="exituser.php" class="btn btn-danger btn-block btn-danger.active">Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
            
   
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="create_users.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        
                         
                        
                        
                        
                         
                        
                        <li>
                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            	<li>
                                    <a href="create_users.php"><i class="glyphicon glyphicon-th-large nav_icon"></i>Create Users</a>
                                </li>
                                <li>
                                    <a href="users.php"><i class="glyphicon glyphicon-th-large nav_icon"></i>Show Users</a>
                                </li>
                               
                            </ul>
                        </li>
       
                        
                      </ul>
                 </div>
            </div>
      </nav>
    </div>