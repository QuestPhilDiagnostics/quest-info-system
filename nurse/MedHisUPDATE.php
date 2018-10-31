<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d H:i:s");
$id=$_POST['id'];
$tid=$_POST['tid'];
$asth=isset($_POST['asth']) ? $_POST['asth'] : "NO";
$tb=isset($_POST['tb']) ? $_POST['tb'] : "NO";
$dia=isset($_POST['dia']) ? $_POST['dia'] : "NO";
$hb=isset($_POST['hb']) ? $_POST['hb'] : "NO";
$hp=isset($_POST['hp']) ? $_POST['hp'] : "NO";
$kp=isset($_POST['kp']) ? $_POST['kp'] : "NO";
$ab=isset($_POST['ab']) ? $_POST['ab'] : "NO";
$jbs=isset($_POST['jbs']) ? $_POST['jbs'] : "NO";
$pp=isset($_POST['pp']) ? $_POST['pp'] : "NO";
$mh=isset($_POST['mh']) ? $_POST['mh'] : "NO";
$fs=isset($_POST['fs']) ? $_POST['fs'] : "NO";
$alle=isset($_POST['alle']) ? $_POST['alle'] : "NO";
$ct=isset($_POST['ct']) ? $_POST['ct'] : "NO";
$hep=isset($_POST['hep']) ? $_POST['hep'] : "NO";
$std=isset($_POST['std']) ? $_POST['std'] : "NO";

    $sqlupdate="UPDATE qpd_medhis SET asth='$asth', tb='$tb', dia='$dia', hb='$hb', hp='$hp', kp='$kp', ab='$ab', jbs='$jbs', pp='$pp', mh='$mh', fs='$fs', alle='$alle', ct='$ct', hep='$hep', std='$std', DateUpdate='$date'  WHERE PatientID ='$id' AND TransactionID = '$tid' ";

    if ($conn->query($sqlupdate) === TRUE) 
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
