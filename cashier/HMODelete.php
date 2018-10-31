<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$id=$_POST['id'];

$sql = "DELETE * FROM qpd_trans WHERE id='$id'";
		
		if ($conn->query($sql) === TRUE) 
		{
		echo "<script> alert('Record deleted successfully') </script>";
	    echo "<script>window.open('HMO.php' ,'_self')</script>";
		} 
		else 
		{
		    echo "Error updating record: " . $conn->error;
		}

$conn->close();
?>