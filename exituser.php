<?php
require_once('jobs.php');
 jobs::userexit_logout();
 
 header("location:index.php");
?>