<?php
include_once('../connection.php');
include_once('../classes/trans.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$data = $trans->fetch_data($id, $tid);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medical History and Vital Signs</title>
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
		font-size: 12px;
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
           	<form action="MHVSINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $data['TransactionID'] ?>">
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date.: </label><br>
						<input type="hidden" value="<?php echo $data['TransactionDate'] ?>">
						<b><?php echo $data['TransactionDate'] ?></b>
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
    <div class="col-md-5 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Add Medical History</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col-6 text-right">
						<label><b>SIGNIFICANT PAST ILLNESS</b></label><br>
					</div>
					<div class="col text-center">
						<label><b>YES / NO</b></label><br>
					</div>
            	</div>
            	<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Asthma</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="asth" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="asth" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Tuberculosis</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="tb" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="tb" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Diabetes Mellitus</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="dia" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="dia" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>High Blood Pressure</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="hb" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="hb" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Heart Problem</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="hp" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="hp" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Kidney Problem</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="kp" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="kp" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Abdominal/Hernia</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="ab" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="ab" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Joint/Back/Scoliosis</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="jbs" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="jbs" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Psychiatric Problem</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="pp" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="pp" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Migraine/Headache</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="mh" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="mh" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Fainting/Seizures</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="fs" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="fs" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Allergies</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="alle" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="alle" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Cancer/Tumor</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="ct" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="ct" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>Hepatitis</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="hep" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="hep" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
				<div class="row">
					<div class="col-6 text-right align-center">
						<label><b>STD</b></label><br>
					</div>
					<div class="col-3 text-right">
						<input type="checkbox" name="std" value="YES" style="height: 30px; width: 30px">
					</div>
					<div class="col">
						<input type="checkbox" name="std" value="NO" style="height: 30px; width: 30px">
					</div>
				</div>
            </div>
        </div>
    </div>
	<div class="col-md-5">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Add Vital Signs</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col-2 text-right">
						<label>Height:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control" name="height">
					</div>
					<div class="col-2 text-right">
						<label>Weight:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control" name="weight">
					</div>
					<div class="col-2 text-right">
						<label>BMI:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control"  name="bmi" id="bmi">
					</div>
				</div>
				<div class="row">
					<div class="col-2 text-right">
						<label>BP:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control"  name="bp">
					</div>
					<div class="col-2 text-right">
						<label>PR:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control"  name="pr">
					</div>
					<div class="col-2 text-right">
						<label>RR:</label>
					</div>
					<div class="col-2">
						<input type="text" class="form-control"  name="rr">
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
						<input type="text" class="form-control"  name="uod">
					</div>
					<div class="col-1">
						<label>OS:</label>
					</div>
					<div class="col-3">
						<input type="text" class="form-control"  name="uos">
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
						<input type="text" class="form-control"  name="cod">
					</div>
					<div class="col-1">
						<label>OS:</label>
					</div>
					<div class="col-3">
						<input type="text" class="form-control"  name="cos">
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="cv">
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="hearing">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="hosp">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="opr">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Medications:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="pm">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="smoker">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="ad">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="lmp">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<input type="text" class="form-control"  name="notes">
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Physical Examination</b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col-3">
						
					</div>
					<div class="col">
						<label><b>NORMAL</b></label><br>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label><b>AREA</b></label><br>
					</div>
					<div class="col">
						<label><b>YES / NO</b></label><br>
					</div>
				</div>
            	<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Skin:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="skin">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Head and Neck:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="hn">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Chest/Breast/Lungs:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="cbl">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Cardiac/Heart:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="ch">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Abdomen:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="abdo">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Extremities:</label><br>
					</div>
					<div class="col-2">
						<SELECT class="form-control" name="extre">
							<OPTION value="YES">YES</OPTION>
							<OPTION value="NO">NO</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Findings:</label><br>
					</div>
					<div class="col-6">
						<textarea name="find" cols="40" rows="5" class="form-control" ></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Others/Notes:</label><br>
					</div>
					<div class="col-6">
						<textarea name="ot" cols="40" rows="5" class="form-control" ></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Doctor:</label><br>
					</div>
					<div class="col-4">
						<SELECT class="form-control" name="doc">
							<OPTION value="FROILAN A. CANLAS, M.D.">FROILAN A. CANLAS, M.D.</OPTION>
							<OPTION value="JOHN TANGLAO, M.D.">JOHN TANGLAO, M.D.</OPTION>
							<OPTION value="MARIGOLD A. SIBAL, M.D.">MARIGOLD A. SIBAL, M.D.</OPTION>
						</SELECT>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>License No.:</label><br>
					</div>
					<div class="col-4">
						<SELECT class="form-control" name="lic">
							<OPTION value="82498">82498</OPTION>
							<OPTION value="79549">79549</OPTION>
							<OPTION value="104200">104200</OPTION>
						</SELECT>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<center><input type="submit" class="btn btn-primary" value="SUBMIT" style="margin: 10px;"></center>
</form>
</div>
</body>
</html>
<?php } ?>