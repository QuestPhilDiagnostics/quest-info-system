<?php
$conn=mysqli_connect("localhost","root","","dbqis");
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
$type = $_POST['type'];
$sqlinsert = "INSERT INTO qpd_items (ItemName, ItemPrice, ItemDescription, CreationDate, ItemType) VALUES ('$PackName','$PackPrice','$string','$date', '$type') ";
if ($conn->query($sqlinsert) === TRUE) 
  {
     echo "<script>alert('Package Created Successfully')</script>";
     echo "<script>window.open('AccountItems.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
?>