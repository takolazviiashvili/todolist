<?php

require_once 'database.php';

$updateId = mysqli_real_escape_string($db_connect,$_POST['id']);
$updateList = mysqli_real_escape_string($db_connect,$_POST['task']);
$updateTime = mysqli_real_escape_string($db_connect,$_POST['time']);

$query = "UPDATE project SET todo = '$updateList',date = '$updateTime' WHERE id = '$updateId'";

if(mysqli_query($db_connect,$query)){
	echo TRUE;
}

