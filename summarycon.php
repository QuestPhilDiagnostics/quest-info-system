<?php 

if (!ini_get('display_errors')) {
  ini_set('display_errors', '1');
}

$con = mysqli_connect("localhost","root","","dbqis");

if (mysqli_connect_errno())
	echo "Failed to connect to MySQL". mysqli_connect_errno();

if (!$con) {    
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}
?>