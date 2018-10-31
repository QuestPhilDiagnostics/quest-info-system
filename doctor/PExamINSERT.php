<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_POST['id'];
$result = $conn->query("SELECT * FROM qpd_pe WHERE id ='".$id."'");
if($result->num_rows == 0) 
{
$comnam=$_POST['comnam'];
$firnam=$_POST['firnam'];
$midnam=$_POST['midnam'];
$lasnam=$_POST['lasnam'];
$skin=$_POST['skin'];
$hn=$_POST['hn'];
$cbl=$_POST['cbl'];
$ch=$_POST['ch'];
$abdo=$_POST['abdo'];
$extre=$_POST['extre'];
$ot=$_POST['ot'];
$find=$_POST['find'];
$doc=$_POST['doc'];
$lic=$_POST['lic'];
$date=date("Y-m-d H:i:s");

$sqlinsert="INSERT INTO qpd_pe (id, comnam, firnam, midnam, lasnam, skin, hn, cbl, ch, abdo, extre, ot, find,doc,lic, date) values ('$id', '$comnam', '$firnam', '$midnam', '$lasnam', '$skin', '$hn', '$cbl', '$ch', '$abdo', '$extre', '$ot', '$find' , '$doc', '$lic','$date')";

  if ($conn->query($sqlinsert) === TRUE) 
  {
	echo "<script> alert('Record Added Successfully') </script>";
	echo "<script>window.open('PExam.php','_self')</script>";
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




















