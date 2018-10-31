<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

date_default_timezone_set("Asia/Kuala_Lumpur");
$id=$_POST['id'];
$sql = "SELECT * FROM qpd_labresult WHERE id ='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) 
{
  
  $FBS=$_POST['FBS'];
  $FBScon=$_POST['FBScon'];
  $BUA=$_POST['BUA'];
  $BUAcon=$_POST['BUAcon'];
  $BUN=$_POST['BUN'];
  $BUNcon=$_POST['BUNcon'];
  $CREA=$_POST['CREA'];
  $CREAcon=$_POST['CREAcon'];
  $CHOL=$_POST['CHOL'];
  $CHOLcon=$_POST['CHOLcon'];
  $TRIG=$_POST['TRIG'];
  $TRIGcon=$_POST['TRIGcon'];
  $HDL=$_POST['HDL'];
  $HDLcon=$_POST['HDLcon'];
  $LDL=$_POST['LDL'];
  $LDLcon=$_POST['LDLcon'];
  $CH=$_POST['CH'];
  $VLDL=$_POST['VLDL'];
  $Na=$_POST['Na'];
  $K=$_POST['K'];
  $Cl=$_POST['Cl'];
  $ALT=$_POST['ALT'];
  $AST=$_POST['AST'];
  $HB=$_POST['HB'];
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $Received=$_POST['Received'];
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  $RMTLIC=$_POST['RMTLIC'];
  $qc=$_POST['qc'];
  $QCLIC=$_POST['QCLIC'];

  $sqlUPDATE= "UPDATE qpd_labresult SET FBS='$FBS' , FBScon='$FBScon' , BUA='$BUA' , BUAcon='$BUAcon' , BUN='$BUN' , BUNcon='$BUNcon' , CREA='$CREA' , CREAcon='$CREAcon' , CHOL= '$CHOL', CHOLcon='$CHOLcon' , TRIG= '$TRIG', TRIGcon='$TRIGcon' , HDL='$HDL' , HDLcon='$HDLcon' , LDL= '$LDL', LDLcon='$LDLcon' , CH='$CH' , VLDL='$VLDL' , Na='$Na' , K='$K' , Cl='$Cl' , ALT='$ALT' , AST='$AST' , HB='$HB' , Clinician= '$Clinician', date='$date' , Received='$Received' , PATHLIC='$PATHLIC' , Printed='$Printed' , RMTLIC='$RMTLIC'  WHERE id = '$id'";
  $sqlUPDATE1= "UPDATE qpd_class SET qc = '$qc', QCLIC = '$QCLIC', date='$date' WHERE id= '$id'";
    if ($conn->query($sqlUPDATE) == TRUE && $conn->query($sqlUPDATE1) == TRUE) 
    {
      echo "<script> alert('RECORD UPDATED!') </script>";
      echo "<script>window.open('LabChem.php','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }
}
else
  $firnam=$_POST['firnam'];
  $midnam=$_POST['midnam'];
  $lasnam=$_POST['lasnam'];
  $comnam=$_POST['comnam'];
  $FBS=$_POST['FBS'];
  $FBScon=$_POST['FBScon'];
  $BUA=$_POST['BUA'];
  $BUAcon=$_POST['BUAcon'];
  $BUN=$_POST['BUN'];
  $BUNcon=$_POST['BUNcon'];
  $CREA=$_POST['CREA'];
  $CREAcon=$_POST['CREAcon'];
  $CHOL=$_POST['CHOL'];
  $CHOLcon=$_POST['CHOLcon'];
  $TRIG=$_POST['TRIG'];
  $TRIGcon=$_POST['TRIGcon'];
  $HDL=$_POST['HDL'];
  $HDLcon=$_POST['HDLcon'];
  $LDL=$_POST['LDL'];
  $LDLcon=$_POST['LDLcon'];
  $CH=$_POST['CH'];
  $VLDL=$_POST['VLDL'];
  $Na=$_POST['Na'];
  $K=$_POST['K'];
  $Cl=$_POST['Cl'];
  $ALT=$_POST['ALT'];
  $AST=$_POST['AST'];
  $HB=$_POST['HB'];
  $Clinician=$_POST['Clinician'];
  $date=date("Y-m-d H:i:s");
  $Received=$_POST['Received'];
  $PATHLIC=$_POST['PATHLIC'];
  $Printed=$_POST['Printed'];
  $RMTLIC=$_POST['RMTLIC'];
  $qc=$_POST['qc'];
  $QCLIC=$_POST['QCLIC'];

$sqlinsert= "INSERT INTO qpd_labresult (id, firnam, midnam, lasnam, comnam, FBS, FBScon, BUA, BUAcon, BUN, BUNcon, CREA, CREAcon, CHOL, CHOLcon, TRIG, TRIGcon, HDL, HDLcon, LDL, LDLcon, CH, VLDL, Na, K, Cl, ALT, AST, HB , Clinician, date, Received, PATHLIC, Printed, RMTLIC) 

  VALUES ('$id','$firnam','$midnam','$lasnam','$comnam','$FBS','$FBScon','$BUA','$BUAcon','$BUN','$BUNcon','$CREA','$CREAcon','$CHOL','$CHOLcon','$TRIG','$TRIGcon','$HDL','$HDLcon','$LDL','$LDLcon','$CH','$VLDL','$Na','$K','$Cl','$ALT','$AST','$HB','$Clinician','$date','$Received','$PATHLIC','$Printed','$RMTLIC')";

  $sqlinsert1= "INSERT INTO qpd_class(id, firnam, midnam, lasnam, comnam, qc, QCLIC, date) VALUES ('$id', '$firnam', '$midnam', '$lasnam', '$comnam' ,'$qc' ,'$QCLIC', '$date')";
    if ($conn->query($sqlinsert) === TRUE && $conn->query($sqlinsert1) === TRUE) 
    {
    	echo "<script> alert('Record Added Successfully') </script>";
    	echo "<script>window.open('LabChemVIEW.php?id=$id','_self')</script>";
    } 
    else
    {
      echo "Error updating record: " . $conn->error;
    }

$conn->close();



?>



















