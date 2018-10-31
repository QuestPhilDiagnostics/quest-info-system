<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set("Asia/Kuala_Lumpur");
$Code = rand(0,1000000000);
$comnam=$_POST['comnam'];
$apppos=$_POST['ap'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$address=$_POST['address'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$connum=$_POST['cn'];
$date=date("Y-m-d H:i:s");

$sqlinsert = "INSERT INTO qpd_form (Code, comnam, apppos, firnam, midnam, lasnam, address, birdat,age,gen,connum,date) VALUES ('$Code','$connum','$apppos','$firnam','$midnam','$lasnam','$address','$birdat','$age','$gen','$connum','$date') ";

$sqlinsert = "INSERT INTO qpd_trans (,date) VALUES (,'$date') ";

if ($conn->query($sqlinsert) === TRUE) 
  
     echo "<script>alert('Package Created Successfully')</script>";//insert here to print the receipt
     echo "<script>window.open('index.php','_self')</script>";
  } 
  else
  {
    echo "Error updating record: " . $conn->error;
  }
?>