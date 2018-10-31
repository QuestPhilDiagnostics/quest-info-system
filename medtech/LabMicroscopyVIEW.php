<?php
include_once('../connection.php');
include_once('../classes/patient.php');
include_once('../classes/transVal.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $lab->fetch_data($id);

$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data1 = $qc->fetch_data($id);

$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$trans = $trans->fetch_data($id);

$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$pat = $patient->fetch_data($id)
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Sciences Result</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
</head>
<style type="text/css" media="all">

	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Century Gothic";
		font-size: 24px;
	}
	.card-block, .checkbox
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block input
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
		font-weight: bolder;
	}
	.col-2 p
	{
		font-weight: bolder;
	}
	.col-1 p
	{
		font-weight: bolder;
	}
	.col-2
	{
		align-self: center;
	}

</style>

<body >
<?php
include_once('medsidebar.php');
?>
<center><p style="font-size: 36px; font-family: 'Century Gothic';">View Laboratory Results</p></center>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $trans['id'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<p><b><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['comnam'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT PACKAGE</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col col-md-auto">
            			Package: <p><b><?php echo $trans['PackName'] ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Description: <p><b><?php echo $trans['PackList'] ?></b></p>
            		</div>
            		<div class="col col-lg-2">
            			Transaction: <p><b><?php echo $trans['trans_type'] ?></b></p>
            		</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>LABORATORY SCIENCES RESULTS</b></center></div>
            <div class="card-block">
            <div class="form-group row">
				<div class="col"><center>Clinician/Walk-In</center></div>
	            <div class="col"><center>Date Received</center></div>
	            <div class="col"><center>Date Reported</center></div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	<center><p><?php echo $data['Clinician'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $pat['date'] ?></p></center>
	            </div>
	            <div class="col">
	            	<center><p><?php echo $data['date'] ?></p></center>
	            </div>
			</div>
			<hr>
<!-- U/A -->	
				<div class="row">
	            	<div class="col-3 ">
	            		<b>CLINICAL MICROSCOPY</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Complete Urinalysis</b>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Physical/Chemical</b>
	            	</div>
	            	<div class="col-3 "></div>
	            	<div class="col-2 ">
	            		<b>Microscopic</b>
	            	</div>
	            	<div class="col-2 "></div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriColor" class="col-3 col-form-label text-right">Color :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriColor'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $data['RBC'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriTrans'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $data['WBC'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="row">
	            	<div class="col-3 ">
	            		<b>Urine Chemical</b>
	            	</div>
	            	<div class="col-3 "></div>
	            	<div class="col-2 ">
	            		<b></b>
	            	</div>
	            	<div class="col-2 "></div>
	            	<div class="col-2 ">
	            		<b></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriPh'] ?></b>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['ECells'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriSp'] ?></b>
	            	</div>
	            	<label for="Mthreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['MThreads'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriPro'] ?></b>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Bac'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriGlu'] ?></b>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Amorph'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="LE" class="col-3 col-form-label text-right">Leukocyte Esterase:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['LE'] ?></b>
	            	</div>
	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['CoAx'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="NIT" class="col-3 col-form-label text-right">Nitrite:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['NIT'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="URO" class="col-3 col-form-label text-right">Urobilinogen:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['URO'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BLD" class="col-3 col-form-label text-right">Blood:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['BLD'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="KET" class="col-3 col-form-label text-right">Ketone:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['KET'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BIL" class="col-3 col-form-label text-right">Bilirubin:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['BIL'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriOt'] ?></b>
	            	</div>
				</div>

<!-- FECALYSIS -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>FECALYSIS</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecColor" class="col-3 col-form-label text-right">Color:</label>
	            	<div class="col-4">
	            		<b><?php echo $data['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-4">
	            		<b><?php echo $data['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-4">
	            		<b><?php echo $data['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<b><?php echo $data['FecOt'] ?></b>
	            	</div>
				</div>
<!-- NAMES -->
		<hr>
			<div class="form-group row">
				<div class="col-3">Medical Technologist:</div>
				<div class="col">
	            	<p><?php echo $data['Received'] ?> / <?php echo $data['RMTLIC'] ?></p>
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3">Quality Control:</div>
	            <div class="col">
	            	<p><?php echo $data1['qc'] ?> / <?php echo $data1['QCLIC'] ?></p>
	            </div>
			</div>
			<div class="form-group row">
	            <div class="col-3">Pathologist:</div>
	            <div class="col">
	            	<p><?php echo $data['Printed'] ?> / <?php echo $data['PATHLIC'] ?></p>
	            </div>
			</div>
		<hr>
				<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabMicroscopyEDIT.php?id=<?php echo $data['id']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
    </div>	
</div>
	
</div>
<?php }}}} ?>
</body>
</html>