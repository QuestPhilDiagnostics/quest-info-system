<?php
include_once('../connection.php');
include_once('../classes/transVal.php');
include_once('../classes/patient.php');
include_once('../classes/qc.php');
include_once('../classes/lab.php');
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$lab = $lab->fetch_data($id);

$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qc = $qc->fetch_data($id);


$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);

$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$trans = $trans->fetch_data($id);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Chemistry</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
<script>
    function FBSCalc() 
    {
		var myBox1 = document.getElementById('FBS').value;	
		var myBox2 = 0.055;
		var result = document.getElementById('FBScon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(1);
		result.value = myResult;
    }
    function BUACalc() 
    {
		var myBox1 = document.getElementById('BUA').value;	
		var myBox2 = 59.48;
		var result = document.getElementById('BUAcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(1);
		result.value = myResult;
    }
    function BUNCalc() 
    {
		var myBox1 = document.getElementById('BUN').value;	
		var myBox2 = 0.357;
		var result = document.getElementById('BUNcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(1);
		result.value = myResult;
    }
    function CREACalc() 
    {
		var myBox1 = document.getElementById('CREA').value;	
		var myBox2 = 88.4;
		var result = document.getElementById('CREAcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function CHOLCalc() 
    {
		var myBox1 = document.getElementById('CHOL').value;	
		var myBox2 = 0.0259;
		var result = document.getElementById('CHOLcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function TRIGCalc() 
    {
		var myBox1 = document.getElementById('TRIG').value;	
		var myBox2 = 0.0113;
		var result = document.getElementById('TRIGcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function HDLCalc() 
    {
		var myBox1 = document.getElementById('HDL').value;	
		var myBox2 = 0.0259;
		var result = document.getElementById('HDLcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function LDLCalc() 
    {
		var myBox1 = parseFloat(document.getElementById("HDL").value);
		var myBox2 = 2.175;
		var myBox3 = parseFloat(document.getElementById("TRIG").value);
		var myBox4 = parseFloat(document.getElementById("CHOL").value);		
		var result = document.getElementById('LDL');
		var myResult = myBox4 - ( myBox1 +  (myBox3 / myBox2) );
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function LDLconCalc() 
    {
    	var myBox1 = document.getElementById('LDL').value;	
		var myBox2 = 0.0259;
		var result = document.getElementById('LDLcon');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function CHCalc() 
    {
    	var myBox1 = document.getElementById('CHOL').value;	
		var myBox2 = document.getElementById('HDL').value;
		var result = document.getElementById('CH');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
    function VLDLCalc() 
    {
    	var myBox1 = document.getElementById('TRIG').value;	
		var myBox2 = 2.175;
		var result = document.getElementById('VLDL');	
		var myResult = myBox1 / myBox2;
        myResult= myResult.toFixed(2);
		result.value = myResult;
    }
</script>
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
		font-size: 14px;
		font-weight: bold;
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
	.col-3, .col-4
	{
		padding-top: 7px;
	}
</style>

<body >
<?php
include_once('medsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Laboratory Chemistry Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabChemINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="id" value="<?php echo $trans['No'] ?>">
						<b><?php echo $trans['id'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<input type="hidden" name="lasnam" value="<?php echo $data['lasnam'] ?>">
						<input type="hidden" name="firnam" value="<?php echo $data['firnam'] ?>">
						<input type="hidden" name="midnam" value="<?php echo $data['midnam'] ?>">
						<p><b><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<input type="hidden" name="comnam" value="<?php echo $data['comnam'] ?>">
						<p><b><?php echo $data['comnam'] ?></b></p>
					</div>
					<div class="col col-lg-2">
						<label>Gender:</label><br>
						<p><b><?php echo $data['gen'] ?></b></p>
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

            <div class="row">
	            <div class="col-3">
	            	<b>TEST</b>
	            </div>
	            <div class="col-2">
	            	<b>RESULTS</b>
	            </div>
	            <div class="col-7">
	            	<CENTER><b>REFERENCE RANGES/COMMENTS</b></CENTER>
	            </div>
			</div>

			<div class="row">
	            <div class="col-3">
	            	<b>Chemistry</b>
	            </div>
	            <div class="col-2">
	            	<b></b>
	            </div>
	            <div class="col-3">
	            	<b>SI Units</b>
	            </div>
	            <div class="col-1">
	            	<CENTER><b></b></CENTER>
	            </div>
	            <div class="col-3">
	            	<b>Conventional Units</b>
	            </div>
			</div>

			<div class="form-group row">
	            <label for="FBS" class="col-3 col-form-label">Fasting Blood Sugar :</label>
	            <div class="col-2">
	            	<input type="text" name="FBS"  class="form-control" id="FBS" value="<?php echo $lab['FBS'] ?>" onchange="FBSCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 4.1-5.9
	            </div>
	            <div class="col-1">
	            	<input type="text" name="FBScon" class="form-control" id="FBScon" value="<?php echo $lab['FBScon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 75 -107
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUA" class="col-3 col-form-label">Uric Acid :</label>
	            <div class="col-2">
	            	<input type="text" name="BUA"  class="form-control" id="BUA" value="<?php echo $lab['BUA'] ?>" onchange="BUACalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 155 - 428
	            </div>
	            <div class="col-1">
	            	<input type="text" name="BUAcon" class="form-control" id="BUAcon" value="<?php echo $lab['BUAcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 3 - 7.1
	            </div>
			</div>
			<div class="form-group row">
	            <label for="BUN" class="col-3 col-form-label">Blood Urea Nitrogen :</label>
	            <div class="col-2">
	            	<input type="text" name="BUN"  class="form-control" id="BUN" value="<?php echo $lab['BUN'] ?>" onchange="BUNCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5 - 7.5
	            </div>
	            <div class="col-1">
	            	<input type="text" name="BUNcon" class="form-control" id="BUNcon" value="<?php echo $lab['BUNcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 7 - 21
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CREA" class="col-3 col-form-label">Creatinine :</label>
	            <div class="col-2">
	            	<input type="text" name="CREA"  class="form-control" id="CREA" value="<?php echo $lab['CREA'] ?>" onchange="CREACalc()">
	            </div>
	            <div class="col-3">
	            	umol/L Female: 53 - 106
	            </div>
	            <div class="col-1">
	            	<input type="text" name="CREAcon" class="form-control" id="CREAcon" value="<?php echo $lab['CREAcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl Female: 0.60 - 1.20
	            </div>
			</div>
			<div class="form-group row">
				<div class="col-3"></div>
	            <div class="col-2"></div>
	            <div class="col-3" style="padding-top: 0px;">
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 71 - 115
	            </div>
	            <div class="col-1"></div>
	            <div class="col-3" style="padding-top: 0px;">
	            	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 0.80 - 1.30
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>LIPID PROFILE</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CHOL" class="col-3 col-form-label">Cholesterol :</label>
	            <div class="col-2">
	            	<input type="text" name="CHOL"  class="form-control" id="CHOL" value="<?php echo $lab['CHOL'] ?>" onchange="CHOLCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L < 5.17
	            </div>
	            <div class="col-1">
	            	<input type="text" name="CHOLcon" class="form-control" id="CHOLcon" value="<?php echo $lab['CHOLcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl < 200
	            </div>
			</div>
			<div class="form-group row">
	            <label for="TRIG" class="col-3 col-form-label">Triglycerides :</label>
	            <div class="col-2">
	            	<input type="text" name="TRIG"  class="form-control" id="TRIG" value="<?php echo $lab['TRIG'] ?>" onchange="TRIGCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 0.3-1.7
	            </div>
	            <div class="col-1">
	            	<input type="text" name="TRIGcon" class="form-control" id="TRIGcon" value="<?php echo $lab['TRIGcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 27-150
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HDL" class="col-3 col-form-label">HDL :</label>
	            <div class="col-2">
	            	<input type="text" name="HDL"  class="form-control" id="HDL" value="<?php echo $lab['HDL'] ?>" onchange="HDLCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 0.9-2.21
	            </div>
	            <div class="col-1">
	            	<input type="text" name="HDLcon" class="form-control" id="HDLcon" value="<?php echo $lab['HDLcon'] ?>">
	            </div>
	            <div class="col-3">
	            	mg/dl 35-85.32
	            </div>
			</div>
			<div class="form-group row">
	            <label for="LDL" class="col-3 col-form-label">LDL :</label>
	            <div class="col-2">
	            	<input type="text" name="LDL"  class="form-control" id="LDL" value="<?php echo $lab['LDL'] ?>" onclick="LDLCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 2.5-4.1
	            </div>
	            <div class="col-1">
	            	<input type="text" name="LDLcon" class="form-control" id="LDLcon" value="<?php echo $lab['LDLcon'] ?>" onclick="LDLconCalc()">
	            </div>
	            <div class="col-3">
	            	mg/dl 96.52-158.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="CH" class="col-3 col-form-label"> CHOLESTEROL/HDL.RATIO :</label>
	            <div class="col-2">
	            	<input type="text" name="CH"  class="form-control" id="CH" value="<?php echo $lab['CH'] ?>" onclick ="CHCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L < 4.40 
	            </div>
			</div>
			<div class="form-group row">
	            <label for="VLDL" class="col-3 col-form-label">VLDL :</label>
	            <div class="col-2">
	            	<input type="text" name="VLDL"  class="form-control" id="VLDL" value="<?php echo $lab['VLDL'] ?>" onclick="VLDLCalc()">
	            </div>
	            <div class="col-3">
	            	mmol/L 0.050-1.04
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>ELECTROLYTES</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Na" class="col-3 col-form-label">Sodium:</label>
	            <div class="col-2">
	            	<input type="text" name="Na"  class="form-control" id="Na" value="<?php echo $lab['Na'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 135 - 153
	            </div>
			</div>
			<div class="form-group row">
	            <label for="K" class="col-3 col-form-label">Potassium :</label>
	            <div class="col-2">
	            	<input type="text" name="K"  class="form-control" id="K" value="<?php echo $lab['K'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 3.50 - 5.30
	            </div>
			</div>
			<div class="form-group row">
	            <label for="Cl" class="col-3 col-form-label">Chloride :</label>
	            <div class="col-2">
	            	<input type="text" name="Cl"  class="form-control" id="Cl" value="<?php echo $lab['Cl'] ?>">
	            </div>
	            <div class="col-3">
	            	mmol/L 98-107
	            </div>
			</div>
			<div class="row">
	            <div class="col">
	            	<b>ENZYMES</b>
	            </div>
			</div>
			<div class="form-group row">
	            <label for="ALT" class="col-3 col-form-label">SGPT/ALT :</label>
	            <div class="col-2">
	            	<input type="text" name="ALT"  class="form-control" id="ALT" value="<?php echo $lab['ALT'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L Female: 5 - 31  Male: 10 - 41
	            </div>
			</div>
			<div class="form-group row">
	            <label for="AST" class="col-3 col-form-label">SGOT/AST :</label>
	            <div class="col-2">
	            	<input type="text" name="AST"  class="form-control" id="AST" value="<?php echo $lab['AST'] ?>">
	            </div>
	            <div class="col-4">
	            	U/L 0 - 40
	            </div>
			</div>
			<div class="form-group row">
	            <label for="HB" class="col-3 col-form-label"><b>HBA1C :</b></label>
	            <div class="col-2">
	            	<input type="text" name="HB"  class="form-control" id="HB" value="<?php echo $lab['HB'] ?>">
	            </div>
	            <div class="col-4">
	            	% 4.3 - 6.3
	            </div>
			</div>

			<div class="form-group row">
				<div class="col">
	            	<input type="text" name="Clinician" class="form-control" placeholder="Clinician/Walk-In" value="<?php echo $lab['Clinician'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="Received" class="form-control"  placeholder=" Medical Technologist" value="<?php echo $lab['Received'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="qc" class="form-control"  placeholder=" Quality Control" value="<?php echo $qc['qc'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="Printed" class="form-control" value="<?php echo $lab['Printed'] ?>">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	
	            </div>
	            <div class="col">
	            	<input type="text" name="RMTLIC" class="form-control" placeholder=" Medical Technologist License" value="<?php echo $lab['RMTLIC'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="QCLIC" class="form-control"  placeholder="Quality Control License" value="<?php echo $qc['QCLIC'] ?>">
	            </div>
	            <div class="col">
	            	<input type="text" name="PATHLIC" class="form-control" placeholder="Pathologist License" value="<?php echo $lab['PATHLIC'] ?>">
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