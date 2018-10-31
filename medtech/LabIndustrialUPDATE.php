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
$WhiteBlood=$_POST['WhiteBlood'] ? $_POST['WhiteBlood'] : "N/A";
$Hemoglobin=$_POST['Hemoglobin'] ? $_POST['Hemoglobin'] : "N/A";
$HemoNR=$_POST['HemoNR'] ? $_POST['HemoNR'] : "N/A";
$Hematocrit=$_POST['Hematocrit'] ? $_POST['Hematocrit'] : "N/A";
$HemaNR=$_POST['HemaNR'] ? $_POST['HemaNR'] : "N/A";
$Neutrophils=$_POST['Neutrophils'] ? $_POST['Neutrophils'] : "N/A";
$Lymphocytes=$_POST['Lymphocytes'] ? $_POST['Lymphocytes'] : "N/A";
$Monocytes=$_POST['Monocytes'] ? $_POST['Monocytes'] : "N/A";
$CBCOt=$_POST['CBCOt'] ? $_POST['CBCOt'] : "N/A";
$Meth=$_POST['Meth'] ;
$Tetra=$_POST['Tetra'] ;
$DT=$_POST['DT'] ;
$HBsAg=$_POST['HBsAg'] ;
$PregTest=$_POST['PregTest'] ;
$SeroOt=$_POST['SeroOt'] ;
$FecColor=$_POST['FecColor'] ;
$FecCon=$_POST['FecCon'] ;
$FecMicro=$_POST['FecMicro'] ;
$FecOt=$_POST['FecOt'] ;
$UriColor=$_POST['UriColor'] ;
$UriTrans=$_POST['UriTrans'] ;
$UriPh=$_POST['UriPh'] ;
$UriSp=$_POST['UriSp'] ;
$UriPro=$_POST['UriPro'] ;
$UriGlu=$_POST['UriGlu'] ;
$RBC=$_POST['RBC'] ? $_POST['RBC'] : "N/A";
$WBC=$_POST['WBC'] ? $_POST['WBC'] : "N/A";
$ECells=$_POST['ECells'] ;
$MThreads=$_POST['MThreads'] ;
$Bac=$_POST['Bac'];
$Amorph=$_POST['Amorph'];
$CoAx=$_POST['CoAx'];
$UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
$Received=$_POST['Received'];
$Printed=$_POST['Printed'];
$date=date("Y-m-d H:i:s");
$qc=$_POST['qc'];


$sqlupdate="UPDATE qpd_labresult SET WhiteBlood='$WhiteBlood', Hemoglobin='$Hemoglobin',HemoNR='$HemoNR', Hematocrit='$Hematocrit',HemaNR='$HemaNR', Neutrophils='$Neutrophils', Lymphocytes='$Lymphocytes', Monocytes='$Monocytes', CBCOt='$CBCOt',Meth='$Meth', Tetra='$Tetra', DT='$DT', HBsAg='$HBsAg', PregTest='$PregTest', SeroOt='$SeroOt', FecColor='$FecColor', FecCon='$FecCon', FecMicro='$FecMicro', FecOt='$FecOt', UriColor='$UriColor', UriTrans='$UriTrans', UriPh='$UriPh', UriSp='$UriSp', UriPro='$UriPro', UriGlu='$UriGlu', RBC='$RBC', WBC='$WBC', ECells='$ECells', MThreads='$MThreads', Bac='$Bac', Amorph='$Amorph', CoAx='$CoAx',UriOt='$UriOt', Received='$Received', Printed='$Printed', DateUpdate='$date'  WHERE PatientID ='$id' AND TransactionID = '$tid' ";
$sqlinsert1= "UPDATE qpd_class SET QC='$qc', DateUpdate='$date'  WHERE PatientID ='$id' AND TransactionID = '$tid' ";

    if ($conn->query($sqlupdate) === TRUE) 
    {
	  echo "<script> alert('Record Updated Successfully') </script>";
    echo "<script>window.open('LabIndustrialView.php?id=$id&tid=$tid','_self')</script>";
    }
  	else
  	{
      echo "Error updating record: " . $conn->error;
  	}

$conn->close();



















