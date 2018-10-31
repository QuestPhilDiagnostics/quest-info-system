<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");
$PackName = $_POST['PackName'];
$PackPrice = $_POST['PackPrice'];
$date=date("Y-m-d H:i:s");
$test = $_POST['test'];
$string = implode(", ", $test);
$sqlinsert = "INSERT INTO qpd_package (PackName, PackPrice, PackList, date) VALUES ('$PackName','$PackPrice','$string','$date') ";
if ($conn->query($sqlinsert) === TRUE) 
  {
     echo "<script>alert('Package Created Successfully')</script>";
     echo "<script>window.open('Package.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
?>