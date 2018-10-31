<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbqis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d H:i:s");
$id=$_POST['id'];
$tid=$_POST['tid'];
$height=isset($_POST['height']) ? $_POST['height'] : "N/A";
$weight=isset($_POST['weight']) ? $_POST['weight'] : "N/A";
$bmi=isset($_POST['bmi']) ? $_POST['bmi'] : "N/A" ; 
$bp=isset($_POST['bp']) ? $_POST['bp'] : "N/A";
$pr=isset($_POST['pr']) ? $_POST['pr'] : "N/A";
$rr=isset($_POST['rr']) ? $_POST['rr'] : "N/A";
$uod=isset($_POST['uod']) ? $_POST['uod'] : "N/A";
$uos=isset($_POST['uos']) ? $_POST['uos'] : "N/A";
$cod=isset($_POST['cod']) ? $_POST['cod'] : "N/A";
$cos=isset($_POST['cos']) ? $_POST['cos'] : "N/A";
$cv=isset($_POST['cv']) ? $_POST['cv'] : "N/A";
$hearing=isset($_POST['hearing']) ? $_POST['hearing'] : "N/A";
$hosp=isset($_POST['hosp']) ? $_POST['hosp'] : "N/A";
$opr=isset($_POST['opr']) ? $_POST['opr'] : "N/A";
$pm=isset($_POST['pm']) ? $_POST['pm'] : "N/A";
$smoker=isset($_POST['smoker']) ? $_POST['smoker'] : "N/A";
$ad=isset($_POST['ad']) ? $_POST['ad'] : "N/A";
$lmp=isset($_POST['lmp']) ? $_POST['lmp'] : "N/A";
$notes=isset($_POST['notes']) ? $_POST['notes'] : "N/A";

$sql="UPDATE qpd_vital SET height='$height', weight='$weight', bmi='$bmi', bp='$bp', pr='$pr', rr='$rr', uod='$uod', uos='$uos', cod='$cod', cos='$cos', cv='$cv', hearing='$hearing', hosp='$hosp', opr='$opr', pm='$pm', smoker='$smoker', ad='$ad', lmp='$lmp', notes='$notes', DateUpdate='$date' WHERE PatientID ='$id' AND TransactionID = '$tid' ";

if ($conn->query($sql) === TRUE) 
{
	echo "<script> alert('Record Updated Successfully') </script>";
  echo "<script>window.open('MHVSView.php?id=$id&tid=$tid','_self')</script>";
}
else
{
  echo "Error updating record: " . $conn->error;
}

$conn->close();



?>
