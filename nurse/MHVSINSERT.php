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
    $asth=$_POST['asth'];
    $tb=$_POST['tb'];
    $dia=$_POST['dia'];
    $hb=$_POST['hb'];
    $hp=$_POST['hp'];
    $kp=$_POST['kp'];
    $ab=$_POST['ab'];
    $jbs=$_POST['jbs'];
    $pp=$_POST['pp'];
    $mh=$_POST['mh'];
    $fs=$_POST['fs'];
    $alle=$_POST['alle'];
    $ct=$_POST['ct'];
    $hep=$_POST['hep'];
    $std=$_POST['std'];

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

$sql = "SELECT * FROM qpd_medhis WHERE PatientID ='$id' AND TransactionID = '$tid'";
$result=mysqli_query($conn,$sql);
if($rowcount=mysqli_num_rows($result) == 0) 
{
    $sqlinsert1 = "INSERT INTO qpd_medhis (PatientID, TransactionID,  asth, tb, dia, hb, hp, kp, ab, jbs, pp, mh, fs, alle, ct, hep, std, CreationDate) VALUES ('$id','$tid','$asth', '$tb', '$dia', '$hb', '$hp', '$kp', '$ab', '$jbs', '$pp', '$mh', '$fs', '$alle', '$ct', '$hep', '$std', '$date') ";
    $sqlinsert2= "INSERT INTO qpd_vital(PatientID, TransactionID, height, weight, bmi, bp, pr, rr, uod, uos, cod, cos, cv, hearing, hosp, opr, pm, smoker, ad, lmp, notes, CreationDate) VALUES('$id', '$tid','$height', '$weight', '$bmi', '$bp', '$pr', '$rr', '$uod', '$uos', '$cod', '$cos', '$cv', '$hearing', '$hosp', '$opr', '$pm', '$smoker', '$ad', '$lmp', '$notes', '$date')";
    $sqlinsert3="INSERT INTO qpd_pe (PatientID, TransactionID, skin, hn, cbl, ch, abdo, extre, ot, find,Doctor,License, CreationDate) values ('$id', '$tid', '$skin', '$hn', '$cbl', '$ch', '$abdo', '$extre', '$ot', '$find' , '$doc', '$lic','$date')";

    if ($conn->query($sqlinsert1) === TRUE && $conn->query($sqlinsert2) === TRUE && $conn->query($sqlinsert3) === TRUE) 
    {
       echo "<script>alert('Record Added Successfully')</script>";
       echo "<script>window.open('MHVS.php','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
  
} 
else 
{
    $sqlinsert1 = "UPDATE qpd_medhis SET asth = '$asth', tb = '$tb', dia = '$dia', hb = '$hb', hp = '$hp', kp = '$kp', ab = '$ab', jbs = '$jbs', pp = '$pp', mh = '$mh', fs = '$fs', alle = '$alle', ct = '$ct', hep = '$hep', std = '$std', DateUpdate = '$date' WHERE PatientID = '$id' AND TransactionID = '$tid'";

    $sqlinsert2= "UPDATE qpd_vital SET height='$height', weight='$weight', bmi='$bmi', bp='$bp', pr='$pr', rr='$rr', uod='$uod', uos='$uos', cod='$cod', cos='$cos', cv='$cv', hearing='$hearing', hosp='$hosp', opr='$opr', pm='$pm', smoker='$smoker', ad='$ad', lmp='$lmp', Notes='$notes', DateUpdate='$date'WHERE PatientID='$id' AND TransactionID = '$tid'";

    $sqlinsert3="UPDATE qpd_pe SET skin='$skin', hn='$hn', cbl='$cbl', ch='$ch', abdo='$abdo', extre='$extre', ot='$ot', find='$find',Doctor='$doc',License='$lic', DateUpdate='$date' WHERE PatientID = '$id' AND TransactionID = '$tid'";

    if ($conn->query($sqlinsert1) === TRUE && $conn->query($sqlinsert2) === TRUE && $conn->query($sqlinsert3) === TRUE) 
    {
       echo "<script>alert('Record Added Successfully')</script>";
       echo "<script>window.open('MHVS.php','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }











  // do other stuff...
  //echo "Patient's Record Exist. Please use update instead";
}


$conn->close();



?>
