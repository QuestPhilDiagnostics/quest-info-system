<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_POST['id'];
$tid=$_POST['tid'];
$Patclass=$_POST['Patclass'];
$ot=$_POST['ot'];
$date=date("Y-m-d");
$result = $conn->query("SELECT * FROM qpd_class WHERE PatientID ='$id' AND TransactionID = '$tid'");
if($result->num_rows == 0) 
{

$sqlinsert = "INSERT INTO qpd_class(TransactionID, PatientID, MedicalClass, Notes, CreationDate) VALUES('$tid', '$id', '$Patclass', '$ot', '$date')";

    if ($conn->query($sqlinsert) === TRUE) 
    {
	  echo "<script> alert('Recorded Successfully') </script>";
    echo "<script>window.open('ClassificationList.php','_self')</script>";
    }
  	else
  	{
      echo "Error updating record: " . $conn->error;
  	}
}
else 
{

  $sqlupdate="UPDATE qpd_class SET MedicalClass='$Patclass', Notes='$ot', CreationDate='$date'  WHERE PatientID ='$id' AND TransactionID = '$tid' ";

  if ($conn->query($sqlupdate) === TRUE) 
    {
    echo "<script> alert('Updated Successfully') </script>";
    echo "<script>window.open('ClassificationList.php','_self')</script>";
    }
    else
    {
      echo "Error updating record: " . $conn->error;
    }

}


$conn->close();

?>



















