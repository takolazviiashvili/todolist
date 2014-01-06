
<?php
require_once ('database.php');

$query = "SELECT * FROM PROJECT"; 

$result = mysqli_query($db_connect,$query);

$data = array();

while($row = mysqli_fetch_object($result)) {
  $data[] = $row;
}
