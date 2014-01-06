<?php

require_once 'database.php';

$list = mysqli_real_escape_string($db_connect,$_POST['task']);
$time = mysqli_real_escape_string($db_connect,$_POST['time']);

if(!empty($list) && !empty($time)){ 

$query = "INSERT INTO project(todo,date) VALUES('$list','$time')"; 

$result = mysqli_query($db_connect,$query);

$lastinserted = mysqli_insert_id($db_connect);

$query = "SELECT * FROM project WHERE id = '$lastinserted'";

$result = mysqli_query($db_connect,$query);

$data = array();

while($row = mysqli_fetch_assoc($result)){
	$data[] = $row;
}

echo json_encode($data);

}
