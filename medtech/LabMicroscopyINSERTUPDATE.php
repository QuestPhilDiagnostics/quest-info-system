<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");
$id=$_POST['id'];
$result = $conn->query("SELECT * FROM qpd_labresult WHERE id ='".$id."'");
if($result->num_rows == 0) 
{
  $firnam=$_POST['firnam'];
  $midnam=$_POST['midnam'];
  $lasnam=$_POST['lasnam'];
  $comnam=$_POST['comnam'];
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
  $LE=$_POST['LE'] ;
  $NIT=$_POST['NIT'] ;
  $URO=$_POST['URO'] ;
  $BLD=$_POST['BLD'] ;
  $KET=$_POST['KET'] ;
  $BIL=$_POST['BIL'] ;
  $RBC=$_POST['RBC'] ? $_POST['RBC'] : "N/A";
  $WBC=$_POST['WBC'] ? $_POST['WBC'] : "N/A";
  $ECells=$_POST['ECells'] ;
  $MThreads=$_POST['MThreads'] ;
  $Bac=$_POST['Bac'];
  $Amorph=$_POST['Amorph'];
  $CoAx=$_POST['CoAx'];
  $UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $Received=$_POST['Received'];
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  $RMTLIC=$_POST['RMTLIC'];
  $qc=$_POST['qc'];
  $QCLIC=$_POST['QCLIC'];

  $sqlinsert= "INSERT INTO qpd_labresult (id, firnam, midnam, lasnam, comnam, FecColor, FecCon, FecMicro, FecOt, UriColor, UriTrans, UriPh, UriSp, UriPro, UriGlu, LE, NIT, URO, BLD, KET, BIL, RBC, WBC, ECells, MThreads, Bac, Amorph, CoAx, UriOt, Clinician, date, Received, PATHLIC, Printed, RMTLIC) values ('$id', '$firnam', '$midnam', '$lasnam', '$comnam' ,'$FecColor', '$FecCon', '$FecMicro' , '$FecOt','$UriColor', '$UriTrans', '$UriPh', '$UriSp', '$UriPro', '$UriGlu','$LE', '$NIT','$URO','$BLD','$KET','$BIL','$RBC', '$WBC', '$ECells', '$MThreads', '$Bac', '$Amorph', '$CoAx', '$UriOt', '$Clinician', '$date', '$Received', '$PATHLIC', '$Printed', '$RMTLIC')";
  $sqlinsert1= "INSERT INTO qpd_class(id, firnam, midnam, lasnam, comnam,qc, QCLIC date) VALUES ('$id', '$firnam', '$midnam', '$lasnam', '$comnam' ,'$qc' ,'$QCLIC', '$date')";
    if ($conn->query($sqlinsert) === TRUE && $conn->query($sqlinsert1) === TRUE) 
    {
    	echo "<script> alert('Record Added Successfully') </script>";
    	echo "<script>window.open('LabMicroscopy.php','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }

}
else
{
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
  $LE=$_POST['LE'] ;
  $NIT=$_POST['NIT'] ;
  $URO=$_POST['URO'] ;
  $BLD=$_POST['BLD'] ;
  $KET=$_POST['KET'] ;
  $BIL=$_POST['BIL'] ;
  $RBC=$_POST['RBC'] ? $_POST['RBC'] : "N/A";
  $WBC=$_POST['WBC'] ? $_POST['WBC'] : "N/A";
  $ECells=$_POST['ECells'] ;
  $MThreads=$_POST['MThreads'] ;
  $Bac=$_POST['Bac'];
  $Amorph=$_POST['Amorph'];
  $CoAx=$_POST['CoAx'];
  $UriOt=$_POST['UriOt'] ? $_POST['UriOt'] : "N/A";
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $Received=$_POST['Received'];
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  $RMTLIC=$_POST['RMTLIC'];
  $qc=$_POST['qc'];
  $QCLIC=$_POST['QCLIC'];

  $sqlUPDATE= "UPDATE qpd_labresult SET FecColor = '$FecColor', FecCon='$FecCon', FecMicro='$FecMicro', FecOt='$FecOt', UriColor='$UriColor', UriTrans='$UriTrans', UriPh='$UriPh', UriSp='$UriSp', UriPro='$UriPro', UriGlu='$UriGlu', LE='$LE', NIT='$NIT', URO='$URO', BLD='$BLD', KET='$KET', BIL='$BIL', RBC='$RBC', WBC='$WBC', ECells='$ECells', MThreads='$MThreads', Bac='$Bac', Amorph='$Amorph', CoAx='$CoAx', UriOt='$UriOt', Clinician= '$Clinician', date='$date' , Received='$Received' , PATHLIC='$PATHLIC' , Printed='$Printed' , RMTLIC='$RMTLIC' WHERE id = '$id'";
  $sqlUPDATE1= "UPDATE qpd_class SET qc = '$qc', QCLIC = '$QCLIC', date='$date' WHERE id= '$id'";
    if ($conn->query($sqlUPDATE) === TRUE && $conn->query($sqlUPDATE1) === TRUE) 
    {
      echo "<script> alert('RECORD UPDATED!') </script>";
      echo "<script>window.open('LabMicroscopyVIEW.php?id=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
}


$conn->close();



?>



















