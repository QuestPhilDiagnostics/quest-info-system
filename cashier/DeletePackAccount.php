<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_GET['id'];
$sql = "DELETE FROM qpd_items WHERE ItemID = '$id' ";
if ($conn->query($sql) === TRUE) 
  {
     echo "<script>alert('Item Deleted Successfully')</script>";
     echo "<script>window.open('AccountItems.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
?>