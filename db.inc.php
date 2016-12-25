<?php

require_once '../vendor/autoload.php';
$databasename = (new MongoDB\Client)->login_db; // or new MongoDB\Client("mongodb://localhost:27017")->example;
?>