<?php
include_once('../connection.php');
include_once('../classes/medhis.php');
include_once('../classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$his = $His->fetch_data($id, $tid);

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
           	<form action="MedHisUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $his['TransactionID'] ?>">
						<b><?php echo $his['TransactionID'] ?></b>
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
            <div class="card-header card-inverse card-info"><center><b>Medical History</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-right">Significant Past Illness</label>
					</div>
					<div class="col">
						<label class="col-12 col-form-label">YES / NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Asthma:</label>
					</div>
					<div class="col-1">
						<input type="text" name="asth" class="form-control" value="<?php echo $his['asth']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Tuberculosis:</label>
					</div>
					<div class="col-1">
						<input type="text" name="tb" class="form-control" value="<?php echo $his['tb']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Diabetes:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="dia" class="form-control" value="<?php echo $his['dia']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">High Blood Pressure:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="hb" class="form-control" value="<?php echo $his['hb']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Heart Problem:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="hp" class="form-control" value="<?php echo $his['hp']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Kidney Problem:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="kp" class="form-control" value="<?php echo $his['kp']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Abdominal/Hernia:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="ab" class="form-control" value="<?php echo $his['ab']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Joint/Back/Scoliosis:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="jbs" class="form-control" value="<?php echo $his['jbs']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Psychiatric Problem:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="pp" class="form-control" value="<?php echo $his['pp']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Migraine/Headache:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="mh" class="form-control" value="<?php echo $his['mh']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Fainting/Seizure:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="fs" class="form-control" value="<?php echo $his['fs']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Allergies:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="alle" class="form-control" value="<?php echo $his['alle']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Cancer/Tumor:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="ct" class="form-control" value="<?php echo $his['ct']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">Hepatitis:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="hep" class="form-control" value="<?php echo $his['hep']?>">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label class="col-12 text-right">STD:</label><br>
					</div>
					<div class="col-1">
						<input type="text" name="std" class="form-control" value="<?php echo $his['std']?>">
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