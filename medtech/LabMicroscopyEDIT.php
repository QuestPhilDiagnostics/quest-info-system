<?php
include_once('../connection.php');
include_once('../classes/transVal.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
include_once('../classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data2 = $patient->fetch_data($id);
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
		font-family: "Calibri";
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
	}
</style>

<body >
<?php
include_once('medsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabMicroscopyINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $trans['id'] ?></b>
						<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
					</div>
					<div class="col">
						<label>Name:</label><br>
						<p><b><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['comnam'] ?></b></p>
					</div>
					<div class="col col-lg-2">
						<label>Gender:</label><br>
						<p><b><?php echo $data2['gen'] ?></b></p>
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
				 	 	<input type="text" name="UriColor" class="form-control" id="UriColor" value="<?php echo $data['UriColor'] ?>">
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="RBC" class="form-control" id="RBC" value="<?php echo $data['RBC'] ?>">
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriTrans" class="form-control" id="UriTrans" value="<?php echo $data['UriTrans'] ?>">
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="WBC" class="form-control" id="WBC" value="<?php echo $data['WBC'] ?>">
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
				 	 	<input type="text" name="UriPh" class="form-control" id="UriPh" value="<?php echo $data['UriPh'] ?>">
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="ECells" class="form-control" id="ECells" value="<?php echo $data['ECells'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriSp" class="form-control" id="UriSp" value="<?php echo $data['UriSp'] ?>">
	            	</div>
	            	<label for="MThreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="MThreads" class="form-control" id="MThreads" value="<?php echo $data['MThreads'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
				 	 	<input type="text" name="UriPro" class="form-control" id="UriPro" value="<?php echo $data['UriPro'] ?>">
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
				 	 	<input type="text" name="Bac" class="form-control" id="Bac" value="<?php echo $data['Bac'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriGlu" class="form-control" id="UriGlu" value="<?php echo $data['UriGlu'] ?>">
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<input type="text" name="Amorph" class="form-control" id="Amorph" value="<?php echo $data['Amorph'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="LE" class="col-3 col-form-label text-right">Leukocyte Esterase:</label>
	            	<div class="col-2">
	            		<input type="text" name="LE" class="form-control" id="LE" value="<?php echo $data['LE'] ?>">
	            	</div>
	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<input type="text" name="CoAx" class="form-control" id="CoAx" value="<?php echo $data['CoAx'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="NIT" class="col-3 col-form-label text-right">Nitrite:</label>
	            	<div class="col-2">
	            		<input type="text" name="NIT" class="form-control" id="NIT"  value="<?php echo $data['NIT'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="URO" class="col-3 col-form-label text-right">Urobilinogen:</label>
	            	<div class="col-2">
	            		<input type="text" name="URO" class="form-control" id="URO" value="<?php echo $data['URO'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BLD" class="col-3 col-form-label text-right">Blood:</label>
	            	<div class="col-2">
	            		<input type="text" name="BLD" class="form-control" id="BLD" value="<?php echo $data['BLD'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="KET" class="col-3 col-form-label text-right">Ketone:</label>
	            	<div class="col-2">
	            		<input type="text" name="KET" class="form-control" id="KET" value="<?php echo $data['KET'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BIL" class="col-3 col-form-label text-right">Bilirubin:</label>
	            	<div class="col-2">
	            		<input type="text" name="BIL" class="form-control" id="BIL" value="<?php echo $data['BIL'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriOt" class="form-control" id="UriOt" value="<?php echo $data['UriOt'] ?>">
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
	            		<input type="text" name="FecColor" class="form-control" id="FecColor" value="<?php echo $data['FecColor'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-4">
	            		<input type="text" name="FecCon" class="form-control" id="FecCon" value="<?php echo $data['FecCon'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-4">
	            		<input type="text" name="FecMicro" class="form-control" id="FecMicro" value="<?php echo $data['FecMicro'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<input type="text" name="FecOt" class="form-control" id="FecOt" placeholder="Presence of:" value="<?php echo $data['FecOt'] ?>">
	            	</div>
				</div>
				<div class="form-group row">
					<div class="col">
		            	<input type="text" name="Clinician" class="form-control" placeholder="Clinician/Walk-In" value="<?php echo $data['Clinician'] ?>">
		            </div>
	            	<div class="col">
	            		<input type="text" name="Received" class="form-control" placeholder=" Medical Technologist" value="<?php echo $data['Received'] ?>">
	            	</div>
	            	<div class="col">
	            		<input type="text" name="qc" class="form-control" placeholder=" Quality Control" value="<?php echo $data1['qc'] ?>">
	            	</div>
	            	<div class="col">
	            		<input type="text" name="Printed" class="form-control" value="<?php echo $data['Printed'] ?>" >
	            	</div>
				</div>
				<div class="form-group row">
				<div class="col">
	            	
	         </div>
	            <div class="col">
	            	<input type="text" name="RMTLIC" class="form-control" placeholder=" Medical Technologist License" value="<?php echo $data['RMTLIC'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="QCLIC" class="form-control"  placeholder="Quality Control License" value="<?php echo $data1['QCLIC'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="PATHLIC" class="form-control" placeholder="Pathologist License" value="<?php echo $data['PATHLIC'] ?>">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col" style="font-weight: bold; padding-top: 0px;"><center>Clinician/Walk-In</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Medical Technologist</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Quality Control</center></div>
	            <div class="col" style="font-weight: bold; padding-top: 0px;"><center>Pathologist</center></div>
			</div>

				<center><input type="submit" class="btn btn-primary" value="SUBMIT" ></center>

				</form>

            </div>
        </div>
    </div>	
</div>
	
</div>
<?php }}}} ?>
</body>
</html>