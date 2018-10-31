<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set("Asia/Kuala_Lumpur");
$id=$_POST['id'];
$cust_cash=$_POST['cust_cash'];
$totalprice=$_POST['totalprice'];
$cust_change = $cust_cash - $totalprice;
$date=date("Y-m-d H:i:s");

$sql = "UPDATE qpd_trans SET cust_cash='$cust_cash', totalprice='$totalprice', cust_change='$cust_change', date = '$date' WHERE id='$id'";

	if ($conn->query($sql) == TRUE) 
		{
		    echo "<script>window.open('ForPrintCash.php?id=$id','_self')</script>";
		} 
	else 
		{
		    echo "Error updating record: " . $conn->error;
		}
//$conn->close();
?>