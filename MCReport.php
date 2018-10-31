<?php
include_once('connection.php');
include_once('classes/qc.php');
include_once('classes/rad.php');
include_once('classes/lab.php');
include_once('classes/patient.php');
include_once('classes/pe.php');
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$pe = $pe->fetch_data($id, $tid);
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$res = $lab->fetch_data($id,$tid);

$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$rad = $rad->fetch_data($id,$tid);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$qc = $qc->fetch_data($id,$tid);
$printdate = date("m-d-Y");

if ($qc['MedicalClass'] == "CLASS A - Physically Fit")
{
	$patclass1 = "Class A - FIT TO WORK";
}
else if ($qc['MedicalClass'] == "CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency")
{
	$patclass1 = "Class B - FIT TO WORK";
}
else if ($qc['MedicalClass'] == "CLASS C - With abnormal findings generally not accepted for employment.")
{
	$patclass1 = "CLASS C - With abnormal findings generally not accepted for employment.";
}
else if ($qc['MedicalClass'] == "CLASS D - Unemployable")
{
	$patclass1 = "Class D - UNEMPLOYABLE";
}
else
{
	$patclass1 = "PENDING";
}

$Notes = $qc['Notes'];
$HBSAG = $res['HBsAg'];
$PT = $res['PregTest'];
$METH = $res['Meth'];
$TETRA = $res['Tetra'];
$UriNotes = $res['UriOt'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Medical Examination Report</title>
	<link href="source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script type="text/javascript">
	window.onload = function() 
	{ 
		var x = "<?php echo $patclass1 ?>";
		if ( x == "Class D - UNEMPLOYABLE" || x == "CLASS C - With abnormal findings generally not accepted for employment.") 
		{
			document.getElementById("Class").style.color = "red";
		}
		var y = "<?php echo $Notes ?>";
		if ( y != "NORMAL" ) 
		{
			document.getElementById("Notes").style.color = "red";
		}
		var HBSAG = "<?php echo $HBSAG ?>";
		if ( HBSAG == "REACTIVE" ) 
		{
			document.getElementById("HBSAG").style.color = "red";
		}
		var PT = "<?php echo $PT ?>";
		if ( PT == "POSITIVE" ) 
		{
			document.getElementById("PT").style.color = "red";
		}
		var METH = "<?php echo $METH ?>";
		if ( METH == "POSITIVE" ) 
		{
			document.getElementById("DT1").style.color = "red";
		}
		var TETRA = "<?php echo $TETRA ?>";
		if ( TETRA == "POSITIVE" ) 
		{
			document.getElementById("DT2").style.color = "red";
		}
		var UriNotes = "<?php echo $UriNotes ?>";
		if ( UriNotes != "NORMAL") 
		{
			document.getElementById("UriNotes").style.color = "red";
		}
	}
	</script>
</head>
<style type="text/css" media="all">
.card-header
{
	font-family: "Times New Roman";
	font-size: 18px;
	color: white;
	background-color: #104E8B;
	padding: 0px;
	margin: 0px;
}

.card-block
{
	padding-top: 0px;
	padding-bottom: 0px;
}

.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 1000px;
	height: 24px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.lineRes
{
	font-family: "Garamond";
	display: table-cell;
	width: 50px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.lineRes1
{
	font-family: "Garamond";
	display: table-cell;
	width: 300px;
	height: 18px;
	line-height: 18px;
	font-size: 18px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}

.label
{
	font-family: "Garamond";
	font-size: 18px;
	color: #02005b;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:16px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 18px;
	text-transform: uppercase;
	color: #000000;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height: 18px;
}
.para
{
	font-family: "Garamond";
	font-size: 14px;
	color: #104E8B;
	line-height: 14px;
	padding: 0px;
	margin: 0px;
}
.Names
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:18px;
	color: #000000;
}
.lineNameSig
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	height: 16px;
	border-bottom: 1px solid black;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 1px;
	margin: 1px;
	line-height:3px;
	color: #000000;
	
}


.label1
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:0px;
	

}
.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
{
	padding-left: 0px;
	margin-left: 0px;
}

.col u
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	
}
.dashedhr
{
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
	line-height: 2px;

}
.cert
{
	font-family: "Garamond";
	font-size: 24px;
	color: #104E8B;
	font-weight: bolder;
	line-height: 24px;
}

.cert u
{
	color: black;
}
</style>
<body>
<div class="container-fluid">
<div class="row">
	<div class="col-sm-12" style="margin-top: 5px;">
		<img src="assets/QPDHeader.jpg" height="100px" width="100%">
	</div>
</div>
<div class="col-sm-12">
	<div class="card" style="border-radius: 0px; margin-top: 10px; border: 3px solid #104E8B;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS MEDICAL CERTIFICATE</b></center></div>
	<div class="card-block" style="height: 2in;">
		<center><p class="para">
			<b>Medical Examination Rating System</b> (DOH, Bureau of Licensing and Regulation; Administrative Code no. 85-A series 1990)
		</p></center><br>
		<div class="row">
			<div class="col">
				<center>
					<p class="cert">I certify that I have examined <u><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></u> and found applicant of <u><?php echo $data['CompanyName'] ?></u> with a classification of <u id="Class"><?php echo $patclass1 ?></u> as of <u><?php echo $qc['CreationDate'] ?></u>.</p>
				</center>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2"><p class="labelName">Others/Notes:</p></div>
			<div class="col-sm-4"><p class="line" id="Notes"><?php echo $qc['Notes']?></p></div>
			<div class="col-sm-2"><p class="labelName">Physician:</p></div>
			<div class="col-sm-4"><p class="line"><?php echo $pe['Doctor'] ?></p></div>
		</div>
		<div class="row">
			<div class="col-sm-2"><p class="labelName"></p></div>
			<div class="col-sm-4"><p class="lineName"></p></div>
			<div class="col-sm-2"><p class="labelName">License:</p></div>
			<div class="col-sm-4"><p class="lineName"><?php echo $pe['License'] ?></p></div>
		</div>				
	</div>
	</div>
</div>
	<div class="col-sm-12" >
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>LABORATORY SCIENCES RESULT</b></center></div>
		<div class="card-block" style="height: 6in;">
		<div class="row" style="padding-left: 13px;">
			<div class="col">
				<div class="row">
					<div class="col"><p class="labelName">HEMATOLOGY</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Complete Blood Count</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">White Blood</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['WhiteBlood'] ?></p></div>
					<div class="col-2"><p class="labelName">x10^9/L</p></div>
					<div class="col-3"><p class="labelName">4.23-11.07</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Hemoglobin</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Hemoglobin'] ?></p></div>
					<div class="col-2"><p class="labelName">g/L</p></div>
					<div class="col-3"><p class="labelName"><?php echo $res['HemoNR'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Hematocrit</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Hematocrit'] ?></p></div>
					<div class="col-2"><p class="labelName">VF</p></div>
					<div class="col-3"><p class="labelName"><?php echo $res['HemaNR'] ?></p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Differential Count</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Neutrophils</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Neutrophils'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">34-71</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Lymphocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Lymphocytes'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">22-53</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Monocytes</p></div>
					<div class="col-2"><p class="lineRes"><?php echo $res['Monocytes'] ?></p></div>
					<div class="col-2"><p class="labelName">%</p></div>
					<div class="col-3"><p class="labelName">5-12</p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">SEROLOGY</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">HBsAg</p></div>
					<div class="col"><p class="lineRes1" id="HBSAG"><?php echo $res['HBsAg'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Pregnancy Test</p></div>
					<div class="col"><p class="lineRes1" id="PT"><?php echo $res['PregTest'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['SeroOt'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">DRUG TESTING</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Methamphethamine</p></div>
					<div class="col"><p class="lineRes1" id="DT1"><?php echo $res['Meth'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Tetrahydrocanabinol</p></div>
					<div class="col"><p class="lineRes1" id="DT2"><?php echo $res['Tetra'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col"><p class="labelName">FECALYSIS</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecColor'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Consistency</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecCon'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Microscopic Findings</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecMicro'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col"><p class="lineRes1"><?php echo $res['FecOt'] ?></p></div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col"><p class="labelName">CLINICAL MICROSCOPY</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Complete Urinalysis</p></div>
				</div>
				<div class="row">
					<div class="col"><p class="labelName">Physical/Chemical</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Color</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriColor'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Transparency</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriTrans'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">pH</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriPh'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Sp.Gravity</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriSp'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Protein</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriPro'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Glucose</p></div>
					<div class="col-3"><p class="lineRes1"><?php echo $res['UriGlu'] ?></p></div>
				</div>
				<br>
				<div class="row">
					<div class="col-8"><p class="labelName">Microscopic</p></div>
					<div class="col-4"><p class="labelName">Normal Range</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">RBC</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['RBC'] ?></p></div>
					<div class="col-2"><p class="labelName">/hpf</p></div>
					<div class="col"><p class="labelName">0-3</p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">WBC</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['WBC'] ?></p></div>
					<div class="col-2"><p class="labelName">/hpf</p></div>
					<div class="col"><p class="labelName">0-5</p></div>
				</div>
				<br>
				<div class="row">
					<div class="col-5"><p class="labelName">E.Cells</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['ECells'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">M.Threads</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['MThreads'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Amorphous</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['Amorph'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Bacteria</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['Bac'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">CaOx</p></div>
					<div class="col-2"><p class="lineRes1"><?php echo $res['CoAx'] ?></p></div>
				</div>
				<div class="row">
					<div class="col-5"><p class="labelName">Others/Notes</p></div>
					<div class="col-2"><p class="lineRes1" id="UriNotes"><?php echo $res['UriOt'] ?></p></div>
				</div>
			</div>
		</div>
		<br><br>
			<div class="row">
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $res['Received'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $qc['QC'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $res['Printed'] ?></b></span></center></div>
			</div>
			<div class="row">
				<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
				<div class="col"><center><p class="labelName">Quality Control</p></center></div>
				<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
			</div>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-header"><center><b>RADIOLOGY REPORT</b></center></div>
	<div class="card-block" style="height: 2.1in;">
		<div class="row">
			<div class="col"><p class="lineName" style="padding-top: 10px;"><?php echo $rad['Comment'] ?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName" style="padding-top: 10px;">IMPRESSION:</p></div>
		</div>
		<div class="row">
			<div class="col-2"><p class="lineName" style="padding-top: 10px;"></p></div>
			<div class="col-10"><p class="lineName" style="padding-top: 10px;"><?php echo $rad['Impression'] ?></p></div>
		</div>
		<br>
		<div class="row">
			<div class="col-6" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $rad['QA'] ?></b></span></center></div>
			<div class="col-6" style="padding-left: 0px"><center><span class="lineNameSig"><br><b><?php echo $rad['Radiologist'] ?></b></span></center></div>
		</div>
		<div class="row">
			<div class="col-6" style="padding-top: 0px"><center><span class="labelName"><b>Quality Assurance</b></span></center></div>
			<div class="col-6" style="padding-top: 0px"><center><span class="labelName"><b>Radiologist</b></span></center></div>
		</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<img src="assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
</div>
<?php }}}}}?>
</body>
</html>
