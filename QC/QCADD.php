<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_POST['id'];
$result = $conn->query("SELECT * FROM qpd_class WHERE id ='".$id."'");
if($result->num_rows == 0) 
{
$comnam=$_POST['comnam'];
$firnam=$_POST['firnam'];
$midnam=$_POST['midnam'];
$lasnam=$_POST['lasnam'];
$qc=$_POST['qc'];
$date=date("Y-m-d H:i:s");

$sqlinsert = "INSERT INTO qpd_class(id, comnam, firnam, midnam, lasnam, qc, date) VALUES('$id', '$comnam', '$firnam', '$midnam', '$lasnam', '$qc', '$date')";

  if ($conn->query($sqlinsert) === TRUE) 
  {
	echo "<script> alert('Record Added Successfully') </script>";
	echo "<script>window.open('QCMCList.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
} 
else 
{
  // do other stuff...
  $qc=$_POST['qc'];
  $date=date("Y-m-d H:i:s");


  $sqlupdate="UPDATE qpd_class SET qc='$qc', date='$date'  WHERE id ='$id' ";

      if ($conn->query($sqlupdate) === TRUE) 
      {
      echo "<script> alert('Record Updated Successfully') </script>";
      echo "<script>window.open('QCMCList.php','_self')</script>";
      }
      else
      {
        echo "Error updating record: " . $conn->error;
      }

}


$conn->close();



?>
