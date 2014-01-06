<?php

require_once 'database.php';

$removeId = mysqli_real_escape_string($db_connect,$_POST['id']);

$query = "DELETE FROM project WHERE id = '$removeId'";

if(mysqli_query($db_connect,$query)){
	echo TRUE;
}