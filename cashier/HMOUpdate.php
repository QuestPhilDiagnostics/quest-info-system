<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");

$id=$_POST['id'];
$tid=$_POST['tid'];
$comnam=$_POST['comnam'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$reff=$_POST['reff'];
$connum=$_POST['cn'];
$billto=$_POST['billto'];
$LOE=$_POST['LOE'];
$AN=$_POST['AN'];
$AC=$_POST['AC'];
$SID=$_POST['SID'];
$comment=$_POST['comment'];
$date=$_POST['date'];
$PackName = $_POST['PackName'];
$PackList = $_POST['PackList'];
$PackPrice = $_POST['PackPrice'];

	$sql = "UPDATE qpd_patient SET CompanyName = '$comnam', FirstName = '$firnam', MiddleName = '$midnam', LastName = '$lasnam', Birthdate = '$birdat', Age = '$age', Gender = '$gen',ContactNo = '$connum', DateUpdate = '$date' WHERE PatientID='$id'";
	$sqli = "UPDATE qpd_trans SET Referral = '$reff', ItemName = '$PackName', ItemDescription = '$PackList', ItemPrice = '$PackPrice', Biller = '$billto', LOE = '$LOE', AN = '$AN', AC = '$AC', Notes = '$comment', TotalPrice = '$PackPrice', GrandTotal = '$PackPrice', SID = '$SID' WHERE PatientID='$id' AND TransactionID = '$tid'";
		
		if ($conn->query($sql) === TRUE && $conn->query($sqli) === TRUE) 
		{
		echo "<script> alert('Record updated successfully') </script>";
	    echo "<script>window.open('ForREPrintAccount.php?id=$id&tid=$tid' ,'_self')</script>";
		} 
		else 
		{
		    echo "Error updating record: " . $conn->error;
		}

$conn->close();
?>

