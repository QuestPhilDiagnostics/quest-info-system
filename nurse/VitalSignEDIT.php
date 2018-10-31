<?php
include_once('../connection.php');
include_once('../classes/vital.php');
include_once('../classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$vit = $vital->fetch_data($id,$tid);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UPDATE Medical History</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		margin-top: 0px;
		padding-left: 0px;
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
</style>

<body >
<?php
include_once('nursesidebar.php');
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
           	<form action="VitalSignsUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $vit['TransactionID'] ?>">
						<b><?php echo $vit['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Name:</label><br>
						<input type="hidden" name="lasnam" value="<?php echo $data['LastName'] ?>">
						<input type="hidden" name="firnam" value="<?php echo $data['FirstName'] ?>">
						<input type="hidden" name="midnam" value="<?php echo $data['MiddleName'] ?>">
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Company Name: </label><br>
						<input type="hidden" name="comnam" value="<?php echo $data['CompanyName'] ?>">
						<p><b><?php echo $data['CompanyName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Gender:</label><br>
						<p><b><?php echo $data['Gender'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Vital Signs</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col-1">
						<label>Height:</label>
					</div>
					<div class="col-3">
						<input type="text" name="height" class="form-control" value="<?php echo $vit['height']?>">
					</div>
					<div class="col-1">
						<label>Weight:</label>
					</div>
					<div class="col-3">
						<input type="text" name="weight" class="form-control" value="<?php echo $vit['weight']?>">
					</div>
					<div class="col-1">
						<label>BMI:</label>
					</div>
					<div class="col-3">
						<input type="text" name="bmi" class="form-control" value="<?php echo $vit['bmi']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-1">
						<label>BP:</label>
					</div>
					<div class="col-3">
						<input type="text" name="bp" class="form-control" value="<?php echo $vit['bp']?>">
					</div>
					<div class="col-1">
						<label>PR:</label>
					</div>
					<div class="col-3">
						<input type="text" name="pr" class="form-control" value="<?php echo $vit['pr']?>">
					</div>
					<div class="col-1">
						<label>RR:</label>
					</div>
					<div class="col-3">
						<input type="text" name="rr" class="form-control" value="<?php echo $vit['rr']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-center" ><b>VISUAL ACUITY</b></label>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label><b>Uncorrected</b></label>
					</div>
					<div class="col-1">
						<label>OD:</label>
					</div>
					<div class="col-3">
						<input type="text" name="uod" class="form-control" value="<?php echo $vit['uod']?>">
					</div>
					<div class="col-1">
						<label>OS:</label>
					</div>
					<div class="col-3">
						<input type="text" name="uos" class="form-control" value="<?php echo $vit['uos']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label><b>Corrected</b></label>
					</div>
					<div class="col-1">
						<label>OD:</label>
					</div>
					<div class="col-3">
						<input type="text" name="cod" class="form-control" value="<?php echo $vit['cod']?>">
					</div>
					<div class="col-1">
						<label>OS:</label>
					</div>
					<div class="col-3">
						<input type="text" name="cos" class="form-control" value="<?php echo $vit['cos']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<input type="text" name="cv" class="form-control" value="<?php echo $vit['cv']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<input type="text" name="hearing" class="form-control" value="<?php echo $vit['hearing']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<input type="text" name="hosp" class="form-control" value="<?php echo $vit['hosp']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<input type="text" name="opr" class="form-control" value="<?php echo $vit['opr']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Medications:</label>
					</div>
					<div class="col-8">
						<input type="text" name="pm" class="form-control" value="<?php echo $vit['pm']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker:</label>
					</div>
					<div class="col-8">
						<input type="text" name="smoker" class="form-control" value="<?php echo $vit['smoker']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic:</label>
					</div>
					<div class="col-8">
						<input type="text" name="ad" class="form-control" value="<?php echo $vit['ad']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual:</label>
					</div>
					<div class="col-8">
						<input type="text" name="lmp" class="form-control" value="<?php echo $vit['lmp']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<input type="text" name="notes" class="form-control" value="<?php echo $vit['Notes']?>">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<center><input type="submit" class="btn btn-primary" value="SUBMIT"></center>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>




</form>
<?php }} ?>
</div>
</body>
</html>