<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_POST['id'];
$tid=$_POST['tid'];
$imp=$_POST['imp'];
$com=$_POST['com'];
$rad=$_POST['rad'];
$qa=$_POST['qa'];
$date=date("Y-m-d H:i:s");


$sqlupdate="UPDATE qpd_xray SET Impression='$imp', Comment='$com', Radiologist='$rad', QA='$qa', DateUpdate='$date'  WHERE PatientID ='$id' AND TransactionID = '$tid' ";

    if ($conn->query($sqlupdate) === TRUE) 
    {
	  echo "<script> alert('Record Updated Successfully') </script>";
    echo "<script>window.open('XRayView.php?id=$id&tid=$tid','_self')</script>";
    }
  	else
  	{
      echo "Error updating record: " . $conn->error;
  	}

$conn->close();



















