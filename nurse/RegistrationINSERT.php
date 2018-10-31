<?php
$host ="localhost";
$user="root";
$password="";
$dbname="dbtest";
$pdo= new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d H:i:s");
$comnam=$_POST['comnam'];
$apppos=$_POST['ap'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$address=$_POST['address'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$comment=$_POST['comment'];
$connum=$_POST['cn'];
$emaadd=isset($_POST['ea']) ? $_POST['ea'] : "NONE";
$class="Referral";
$cb=isset($_POST['cb']) ? $_POST['cb'] : "N/A";
$uri=isset($_POST['uri']) ? $_POST['uri'] : "N/A";
$feca=isset($_POST['feca']) ? $_POST['feca'] : "N/A";
$hb=isset($_POST['hb']) ? $_POST['hb'] : "N/A";
$anti=isset($_POST['anti']) ? $_POST['anti'] : "N/A";
$drug=isset($_POST['drug']) ? $_POST['drug'] : "N/A";
$xray=isset($_POST['xray']) ? $_POST['xray'] : "N/A";
$xraytype=isset($_POST['xraytype']) ? $_POST['xraytype'] : "N/A";
$pe=isset($_POST['pe']) ? $_POST['pe'] : "N/A";
$ot=isset($_POST['ot']) ? $_POST['ot'] : "N/A";
$se=isset($_POST['se']) ? $_POST['se'] : "N/A";
$ct=isset($_POST['ct']) ? $_POST['ct'] : "N/A";
$rst=isset($_POST['rst']) ? $_POST['rst'] : "N/A";
$urispec=isset($_POST['urispec']) ? $_POST['urispec'] : "NONE" ;
$fecaspec=isset($_POST['fecaspec']) ? $_POST['fecaspec'] : "NONE" ;
$bloodspec=isset($_POST['bloodspec']) ? $_POST['bloodspec'] : "NONE" ;

$query=$pdo->prepare("INSERT INTO qpd_form(comnam,apppos,firnam,midnam,lasnam,address,birdat,age,gen,comment,connum,emaadd,class,cb,uri,feca,hb,anti,drug,xray,xraytype,pe,ot,se,ct,rst,urispec,fecaspec,bloodspec,date) VALUES (:comnam,:apppos,:firnam,:midnam,:lasnam,:address,:birdat,:age,:gen,:comment,:connum,:emaadd,:class,:cb,:uri,:feca,:hb,:anti,:drug,:xray,:xraytype,:pe,:ot,:se,:ct,:rst,:urispec,:fecaspec,:bloodspec,:date)");

$query->bindParam(':comnam',$comnam);
$query->bindParam(':apppos',$apppos);
$query->bindParam(':firnam',$firnam);
$query->bindParam(':midnam',$midnam);
$query->bindParam(':lasnam',$lasnam);
$query->bindParam(':address',$address);
$query->bindParam(':date',$date);
$query->bindParam(':birdat',$birdat);
$query->bindParam(':age',$age);
$query->bindParam(':gen',$gen);
$query->bindParam(':comment',$comment);
$query->bindParam(':connum',$connum);
$query->bindParam(':emaadd',$emaadd);
$query->bindParam(':class',$class);
$query->bindParam(':cb',$cb);
$query->bindParam(':uri',$uri);
$query->bindParam(':feca',$feca);
$query->bindParam(':hb',$hb);
$query->bindParam(':anti',$anti);
$query->bindParam(':drug',$drug);
$query->bindParam(':xray',$xray);
$query->bindParam(':xraytype',$xraytype);
$query->bindParam(':pe',$pe);
$query->bindParam(':ot',$ot);
$query->bindParam(':se',$se);
$query->bindParam(':ct',$ct);
$query->bindParam(':rst',$rst);
$query->bindParam(':urispec',$urispec);
$query->bindParam(':fecaspec',$fecaspec);
$query->bindParam(':bloodspec',$bloodspec);
$query->execute();


?>

<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y-m-d H:i:s");
$comnam=$_POST['comnam'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$comment=$_POST['comment'];
$connum=$_POST['cn'];
$trans_type="CASH";


$sql1 = "INSERT INTO qpd_trans (cust_comnam, firnam, midnam, lasnam, cust_birdat, cust_age, cust_gen, connum, trans_type, date, comment) VALUES ('$comnam','$firnam','$midnam','$lasnam','$birdat','$age','$gen','$connum','$trans_type','$date', '$comment') ";

	if ($conn->query($sql1) === TRUE)
	{

			$lastid = mysqli_insert_id($conn);
			$sqlSELECT = "SELECT id FROM qpd_form ORDER BY id DESC LIMIT 1";
			$resultSELECT = mysqli_query($conn, $sqlSELECT);
			if (mysqli_num_rows($resultSELECT) > 0) 
			{
				while($rows = mysqli_fetch_assoc($resultSELECT)) 
				{
				    $idSELECT = $rows["id"];

				}

				$sqlUPDATE = "UPDATE qpd_trans SET No = $idSELECT WHERE id = $lastid ";
				$resultUPDATE= $conn->query($sqlUPDATE);
				if ($resultUPDATE === TRUE)
				{
					echo "<script> alert('Patient Registered Successfully') </script>";
					echo "<script>window.open('Registration.php','_self')</script>";
				}



				   
			}
	}
	else 
	{
	   echo "Error updating record: " . $conn->error; 
	}
$conn->close();
?>