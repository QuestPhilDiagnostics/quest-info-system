<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set('Asia/Manila');
$id=$_POST['id'];
$tid=$_POST['tid'];
$com=$_POST['com'];
$imp=$_POST['imp'];
$rad=$_POST['rad'];
$qa=$_POST['qa'];
$date=date("Y-m-d H:i:s");


$sql = "SELECT * FROM qpd_xray WHERE PatientID ='$id' AND TransactionID = '$tid'";
$result=mysqli_query($conn,$sql);
if($rowcount=mysqli_num_rows($result) == 0) 
{

$sqlinsert = "INSERT INTO qpd_xray(PatientID, TransactionID, Comment, Impression, Radiologist, QA, CreationDate) VALUES('$id', '$tid', '$com','$imp', '$rad','$qa', '$date')"; 

  if ($conn->query($sqlinsert) === TRUE) 
  {
  echo "<script> alert('Record Added Successfully') </script>";
  echo "<script>window.open('XRay.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
} 
else 
{
  // do other stuff...
  echo "Patient's Record Exist. Please use update instead";
}


$conn->close();



?>
