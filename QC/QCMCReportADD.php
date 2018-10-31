<?php
include_once('../connection.php');
include_once('../classes/qc.php');
include_once('../classes/rad.php');
include_once('../classes/lab.php');
include_once('../classes/patient.php');
include_once('../classes/pe.php');
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$pe = $pe->fetch_data($id);
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$res = $lab->fetch_data($id);

$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$rad = $rad->fetch_data($id);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qc = $qc->fetch_data($id);
$printdate = date("m-d-Y");

if ($qc['Patclass'] == "CLASS A - Physically Fit")
{
	$patclass1 = "Class A - FIT TO WORK";
}
else if ($qc['Patclass'] == "CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency")
{
	$patclass1 = "Class B - FIT TO WORK";
}
else if ($qc['Patclass'] == "CLASS C - With abnormal findings generally not accepted for employment.")
{
	$patclass1 = "CLASS C - With abnormal findings generally not accepted for employment.";
}
else if ($qc['Patclass'] == "CLASS D - Unemployable")
{
	$patclass1 = "Class C - UNEMPLOYABLE";
}
else
{
	$patclass1 = "PENDING";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Medical Examination Report</title>
	<link rel="stylesheet" media="all" href="../assets/bootstrap.min.css">	
</head>
<style type="text/css" media="all">
body {
  visibility: visible;
  min-width: 850px;
  min-height: 1100px;
}
div .header-line
{
	background-color: #2980b9;
	width: 100%;
	height: 5%;
}
.header-line h3
{
	font-family: "Times New Roman";
	color: white;
}
div .header-line1
{
	background-color: #2980b9;
	width: 100%;
	height: 5%;
	padding-top: 0px;
}
.header-line1 h3
{
	font-family: "Lucida Calligraphy";
	color: white;
}
p
{
	font-family: Arial;
	size: 4px;
	color: black;
	line-height: 10px;
	margin: 3px;

}
.hr1
{
	border-top: 1px dashed #8c8b8b;
	margin: 0px;
}
.hr2
{
	border-bottom: 1px solid #8c8b8b;
	margin: 0px;
}

.para
{
	font-family: "Garamond";
	font-size: 9px;
	color: #104E8B;
	line-height: 1px;
	margin-top: 0px;
	margin-bottom: 10px;
}
.data
{
	font-family: "Garamond";
	font-size: 16px;
	font-weight: bolder;
	line-height: 10px;
	display: table;

}

.label
{
	font-family: "Garamond";
	font-size: 14px;
	color: #325C74;
	font-weight: bold;
	line-height: 10px;
}
.label1
{
	font-family: "Garamond";
	font-size: 16px;
	color: #104E8B;
	font-weight: bold;
	margin: 0px;
	line-height: 10px;
}
.label2
{
	font-family: "Garamond";
	font-size: 12px;
	color: #104E8B;
	font-weight: bold;
	margin: 0px;
	line-height: 10px;
}
.label3
{
	font-family: "Garamond";
	font-size: 14px;
	color: black;
	font-weight: bold;
	margin: 5px;
	line-height: 10px;
}
.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	border-bottom: 1px solid black;
}
.line1
{
	font-family: "Garamond";
	display: table-cell;
	width: 1000px;
	border-bottom: 1px solid black;
}
.box
{
	border: 2px solid black;

}
.classAB
{
	display: inline-block;
	font-family: "Garamond";
	font-size: 16px;
	color: #104E8B;
	font-weight: bolder;
	margin: 3px;
	line-height: 10px;

}
p small
{
	font-family: "Garamond";
	font-size: xx-small;
	color: #104E8B;
	line-height: 1px;
	margin: 3px;
}
.classCD
{
	display: inline-block;
	font-family: "Garamond";
	font-size: 12px;
	font-weight: bold;
	color: #104E8B;
	margin: 3px;
	line-height: 10px;

}
.labres
{
	font-family: "Garamond";
	font-size: 14px;
	color: black;
	font-weight: bold;
	margin-top: 1px;
}
.labres1
{
	font-family: "Garamond";
	font-size: 14px;
	color: #104E8B;
	font-weight: bolder;
	margin-top: 1px;
}
.data1
{
	font-family: "Garamond";
	font-size: 14px;
	font-weight: bolder;
	display: table;
	margin-top: 1px;
}
.cert
{
	font-family: "Garamond";
	font-size: 22px;
	color: #104E8B;
	font-weight: bolder;
	line-height: 22px;
}

.cert u
{
	color: black;
}
@media print
{
	body
	{
		visibility: visible;
		display: ruby-base;
	}
}
</style>

<body>
<div class="container">
<div class="col-sm-12" style="padding:0px;">
	<div class="col-sm-12"  style="padding-left: 10px; padding-right: 10px; border:3px solid #2980b9;">
		<div class="header-line1"><center><h3>MEDICAL CERTIFICATE</h3></center></div><center>
		<center><p class="para"><b>Medical Examination Rating System</b> (DOH, Bureau of Licensing and Regulation; Administrative Code no. 85-A series 1990)</p></center>
		<p class="cert">I certify that I have examined <u><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></u> and found applicant of <u><?php echo $data['comnam'] ?></u> with a classification of <u><?php echo $patclass1 ?></u>.</p><br></center>
		<div class="col-sm-12">
	<div class="col-sm-5" style="padding-left: 5px"><p class="label3"></p></div>
	</div>
	<div class="col-sm-12"><p class="data"></p></div>
	<div class="col-sm-12">
		<div class="col-sm-2" style="padding-left: 10px"><p class="label1">Others/Notes:</p></div>
		<div class="col-sm-4" style="padding-left: 0px"><p class="data"><?php echo $qc['ot'] ?></p></div>
		<div class="col-sm-6"><p class="data">Physician: <?php echo $pe['doc'] ?></p></div>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-2"><p class="label1"></p></div>
		<div class="col-sm-4" style="padding-left: 0px"><p class="data"><span class="line1"></span></p></div>
		<div class="col-sm-6" style="padding-left: 85px"><p class="data"><span class="line1"></span></p></div>
	</div>
	<div class="col-sm-12">
		<div class="col-sm-2"><p class="label1"></p></div>
		<div class="col-sm-4" style="padding-left: 0px"><p class="data"></p></div>
		<div class="col-sm-6" style="padding-left: 15px"><p class="data">License No.: <?php echo $pe['lic'] ?></p></div>
	</div>
</div>
	
</div>
<div class="col-sm-12"><div class="header-line"><center><h3>LABORATORY SCIENCES RESULT</h3></center></div></div>
<div class="col-sm-12">
	<div class="col-sm-6">
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">HEMATOLOGY</p></div>
		<div class="col-sm-7" style="padding-left: 0px"><p class="labres1">Complete Blood Count</p></div>
		<div class="col-sm-5" style="padding-left: 20px"><p class="labres1">Normal Range</p></div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">White Blood</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['WhiteBlood'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">x10^9/L</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1">4.23-11.07</p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">Hemoglobin</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Hemoglobin'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">g/L</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1"><?php echo $res['HemoNR'] ?></p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">Hematocrit</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Hematocrit'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">VF</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1"><?php echo $res['HemaNR'] ?></p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">Differential Count</p></div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">Neutrophils</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Neutrophils'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">%</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1">34-71</p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">Lymphocytes</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Lymphocytes'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">%</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1">22-53</p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-4" style="padding-left: 0px"><p class="labres">Monocytes</p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Monocytes'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 0px"><p class="labres1">%</p></div>
			<div class="col-sm-4" style="padding-left: 20px"><p class="labres1">5-12<br></p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1"><br>SEROLOGY</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">HBsAg</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['HBsAg'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Pregnancy Test</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['PregTest'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">OTHERS/NOTES:</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['SeroOt'] ?></span></p><br></div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">DRUG TESTING</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Methamphethamine</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Meth'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Tetrahydrocanabinol</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Tetra'] ?></b></span></p><br></div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">FECALYSIS</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Color</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['FecColor'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Consistency</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['FecCon'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Microscopic Findings</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['FecMicro'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">OTHERS/NOTES</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['FecOt'] ?></b></span></p></div>
	</div>
	<div class="col-sm-6">
		
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">CLINICAL MICROSCOPY</p></div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">Complete Urinalysis</p></div>
		<div class="col-sm-12" style="padding-left: 0px"><p class="labres1">Physical/Chemical</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Color</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriColor'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Transparency</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriTrans'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">pH</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriPh'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Sp.Gravity</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriSp'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Protein</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriPro'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Glucose</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriGlu'] ?></b></span></p><br></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres1">Microscopic</p></div>
		<div class="col-sm-6" style="padding-left: 80px"><p class="labres1">Normal Range</p></div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-6" style="padding-left: 0px"><p class="labres">RBC</p></div>
			<div class="col-sm-1" style="padding-left: 10px"><p class="data1"><span class="line1"><b><?php echo $res['RBC'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 20px"><p class="labres1"> /hpf</p></div>
			<div class="col-sm-3" style="padding-left: 30px"><p class="labres1">0-3</p></div>
		</div>
		<div class="col-sm-12" style="padding-left: 0px">
			<div class="col-sm-6" style="padding-left: 0px"><p class="labres">WBC</p></div>
			<div class="col-sm-1" style="padding-left: 10px"><p class="data1"><span class="line1"><b><?php echo $res['WBC'] ?></b></span></p></div>
			<div class="col-sm-2" style="padding-left: 20px"><p class="labres1"> /hpf</p><br></div>
			<div class="col-sm-3" style="padding-left: 30px"><p class="labres1">0-5</p></div>
		</div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">E.Cells</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['ECells'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">M.Threads</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['MThreads'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Amorphous</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Amorph'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">Bacteria</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['Bac'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">CaOx</p></div>
		<div class="col-sm-2" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['CoAx'] ?></b></span></p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="labres">OTHERS/NOTES:</p></div>
		<div class="col-sm-6" style="padding-left: 0px"><p class="data1"><span class="line1"><b><?php echo $res['UriOt'] ?></b></span></p></div>
	</div>
</div>
<form action="QCADD.php" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="col-sm-12">
	<div class="col-sm-4" style="padding-left: 0px"><center><span class="line1"><br><b><?php echo $res['Received'] ?></b></span></center></div>
	<div class="col-sm-4" style="padding-left: 0px;"><center><input type="text" name="qc" placeholder="Quality Control" value="<?php echo $qc['qc'] ?>"></center></div>
	<div class="col-sm-4" style="padding-left: 0px"><center><span class="line1"><br><b><?php echo $res['Printed'] ?></b></span></center></div>
</div>
<div class="col-sm-12">
	<div class="col-sm-4"><center><p class="label2">Registered Medical Technologist</p></center></div>
	<div class="col-sm-4"><center><p class="label2">Quality Control</p></center></div>
	<div class="col-sm-4"><center><p class="label2">Pathologist</p></center></div>		
</div>
<div class="col-sm-12"><div class="header-line"><center><h3>RADIOLOGY REPORT</h3></center></div></div>
<font face="Arial" size="2px" color="black">
<div class="col-sm-12" style="padding-left: 50px; padding-right: 50px"><?php echo $rad['com'] ?></div>
<div class="col-sm-12" style="padding-left: 50px; padding-right: 50px">IMPRESSION:</div>
<div class="col-sm-12" style="padding-left: 150px; padding-right: 50px"><?php echo $rad['imp'] ?></div>
<div class="col-sm-12"><p class="data"></p></div>
<div class="col-sm-12"><p class="data"></p></div>
<div class="col-sm-12"><p class="data"></p></div>
<div class="col-sm-12"><p class="data"></p></div>

<input type="hidden" name="Code" value="<?php echo $data['Code'] ?>">
<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="hidden" name="comnam" value="<?php echo $data['comnam'] ?>">
<input type="hidden" name="firnam" value="<?php echo $data['firnam'] ?>">
<input type="hidden" name="midnam" value="<?php echo $data['midnam'] ?>">
<input type="hidden" name="lasnam" value="<?php echo $data['lasnam'] ?>">
</font>
<div class="col-sm-12">
	<div class="col-sm-6" style="padding-left: 0px"><center><span class="line1"><?php echo $rad['qa'] ?></span></center></div>
	<div class="col-sm-6" style="padding-left: 0px"><center><span class="line1"><?php echo $rad['rad'] ?></span></center></div>
</div>
<div class="col-sm-12">
	<div class="col-sm-6"><center><p class="label2">Quality Assurance</p></center></div>
	<div class="col-sm-6"><center><p class="label2">Radiologist</p></center></div>
</div>



<center><input type="submit" class="btn btn-success" value="SUBMIT"></center>
</form>
</div>
<?php }}}}}?>

</body>
</html>
