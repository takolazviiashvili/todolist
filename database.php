<?php

$server_location = 'localhost';
$root = 'root' ;
$db_password = '';
$db_name = 'firstproject';

$db_connect = mysqli_connect($server_location,$root,$db_password,$db_name) or die('ERROR CONNECTING');