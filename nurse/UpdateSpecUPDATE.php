<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d H:i:s");
$id=$_POST['id'];
$urispec=isset($_POST['urispec']) ? $_POST['urispec'] : "NONE" ;
$fecaspec=isset($_POST['fecaspec']) ? $_POST['fecaspec'] : "NONE" ;
$bloodspec=isset($_POST['bloodspec']) ? $_POST['bloodspec'] : "NONE" ;
$sql = "UPDATE qpd_form SET urispec='$urispec', fecaspec='$fecaspec', bloodspec='$bloodspec', DateUpdate='$date' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script> alert('Record updated successfully') </script>";
    echo "<script>window.open('LOPSpecs.php','_self')</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
