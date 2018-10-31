<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	date_default_timezone_set("Asia/Kuala_Lumpur");
  	$id=$_GET['id'];
  	$totalprice=$_GET['totalprice'];
	$trans_type=$_GET['transtype'];
	$date=date("Y-m-d H:i:s");
	$sql = "UPDATE qpd_trans SET trans_type ='$trans_type', date = '$date' WHERE id = '$id'";
	if ($conn->query($sql) === TRUE) 
		  {
		  	if ($trans_type == "CASH") 
		  	{
		  		echo "<script>window.open('Trans.php?id=$id','_self')</script>";
		  	} 
		  	else if ($trans_type == "ACCOUNT") 
		  	{
		  		$sql1 = "UPDATE qpd_trans SET totalprice ='$totalprice' WHERE id = '$id'";
		  		if ($conn->query($sql1) === TRUE) 
		  		{
		  			echo "<script>window.open('ForPrintAccount.php?id=$id','_self')</script>";
		  		}
		  		
		  	}
		  	    		
		  } 
	else
		  {
		    echo "Error updating record: " . $conn->error;
		  }
$conn->close();
?>