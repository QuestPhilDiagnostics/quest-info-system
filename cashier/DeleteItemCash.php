<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_GET['id'];
$ref=$_GET['reference'];

$sql = "DELETE FROM temp_trans WHERE TransactionRef = '$ref' AND ItemID = '$id' ";
if ($conn->query($sql) === TRUE) 
  {
     echo "<script>window.open('Cash.php?id=$ref','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
?>
