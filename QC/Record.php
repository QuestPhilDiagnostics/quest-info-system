<?php
include_once('../connection.php');
include_once('../classes/transval.php');
include_once('../classes/qc.php');
include_once('../classes/rad.php');
include_once('../classes/lab.php');
include_once('../classes/pe.php');
include_once('../classes/vital.php');
include_once('../classes/medhis.php');
include_once('../classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$his = $His->fetch_data($id);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$vit = $vital->fetch_data($id);
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$pe = $pe->fetch_data($id);
$lab = new lab;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$lab = $lab->fetch_data($id);
$rad = new rad;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$rad = $rad->fetch_data($id);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$qc = $qc->fetch_data($id);
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$trans = $trans->fetch_data($id);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Patient Records Summary</title>
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
	.card-block
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
		.col-2
	{
		align-self: center;
	}
</style>

<body >
<?php
include_once('qcsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Patient Summary Records</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px; margin-bottom: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Personal Information</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['comnam'] ?></b></p>
						<label>Applied Position: </label><br>
						<p><b><?php echo $data['apppos'] ?></b></p>
						<label>Name:</label><br>
						<p><b><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b></p>
						<label>Address: </label><br>
						<p><b><?php echo $data['address'] ?></b></p>
					</div>
					<div class="col">
						<label>Birthdate: </label><br>
						<p><b><?php echo $data['birdat'] ?></b></p>
						<label>Age: </label><br>
						<p><b><?php echo $data['age'] ?></b></p>
						<label>Gender: </label><br>
						<p><b><?php echo $data['gen'] ?></b></p>
						<label>Contact No.: </label><br>
						<p><b><?php echo $data['connum'] ?></b></p>
						<label>Email Address: </label><br>
						<p><b><?php echo $data['emaadd'] ?></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Transaction</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<p><b><?php echo $trans['id'] ?></b></p>
					</div>
					<div class="col col-md-auto	">
						<label>Availed: </label><br>
						<p><b><?php echo $trans['PackName'] ?></b></p>
					</div>
					<div class="col">
						<label>Description: </label><br>
						<p><b><?php echo $trans['PackList'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Type: </label><br>
						<p><b><?php echo $trans['trans_type'] ?></b></p>
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
					<div class="col">
						<label class="col-12 text-right">Asthma:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['asth']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Tuberculosis:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['tb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Diabetes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['dia']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">High Blood Pressure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Heart Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Kidney Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['kp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdominal/Hernia:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ab']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Joint/Back/Scoliosis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['jbs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Psychiatric Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['pp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Migraine/Headache:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['mh']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Fainting/Seizure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['fs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Allergies:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['alle']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cancer/Tumor:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['ct']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Hepatitis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['hep']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">STD:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $his['std']?></b></p>
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
					<div class="col">
						<label>Height:</label>
						<b><?php echo $vit['height']?></b>
					</div>
					<div class="col">
						<label>Weight:</label>
						<b><?php echo $vit['weight']?></b>
					</div>
					<div class="col">
						<label>BMI:</label>
						<b><?php echo $vit['bmi']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>BP:</label>
						<b><?php echo $vit['bp']?></b>
					</div>
					<div class="col">
						<label>PR:</label>
						<b><?php echo $vit['pr']?></b>
					</div>
					<div class="col">
						<label>RR:</label>
						<b><?php echo $vit['rr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 col-form-label text-center" ><b>VISUAL ACUITY</b></label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Uncorrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['uod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['uos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Corrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $vit['cod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $vit['cos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['cv']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hearing']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['hosp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['opr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Present Medications:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['pm']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker(sticks/packs/years):</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['smoker']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic Drinker:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['ad']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual Period:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['lmp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<b><?php echo $vit['notes']?></b>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Physical Examinations</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>NORMAL</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
					</div>
					<div class="col">
						<label>YES/NO</label>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Skin:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['skin']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Head and Neck:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['hn']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Chest/Breast/Lungs:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['cbl']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cardiac/Heart:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ch']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdomen:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['abdo']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Extremities:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['extre']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Others/Notes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['ot']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Findings:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['find']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Physican:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['doc']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">License:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $pe['lic']?><br></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Physical Examinations</b></center></div>
            <div class="card-block">
            	<!-- CBC -->
            	<div class="row">
	            	<div class="col">
	            		<b>HEMATOLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3">
	            		<b>Complete Blood Count</b>
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2">
	            		
	            	</div>
	            	<div class="col-2 ">
	            		<b>Normal Range</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="WhiteBlood" class="col-3 col-form-label text-right">White Blood Cells :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['WhiteBlood'] ?></b>
	            	</div>
	            	<label for="WhiteBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="WhiteBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Hemoglobin'] ?></b>
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HemoNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Hematocrit'] ?></b>
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HemaNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>Differential Count</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Neutrophils" class="col-3 col-form-label text-right">Neutrophils :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Neutrophils'] ?></b>
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Lymphocytes'] ?></b>
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Monocytes'] ?></b>
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div>
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['CBCOt'] ?></b>
	            	</div>
				</div>
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
	            		<b><?php echo $lab['UriColor'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $lab['RBC'] ?></b>
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriTrans'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<b><?php echo $lab['WBC'] ?></b>
	            	</div>
	            	<label for="WBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="WBC" class="col-2 col-form-label">0-5</label>
				</div>
				<div class="form-group row">
	            	<label for="UriPh" class="col-3 col-form-label text-right">pH :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriPh'] ?></b>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['ECells'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriSp'] ?></b>
	            	</div>
	            	<label for="Mthreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['MThreads'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriPro'] ?></b>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Bac'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriGlu'] ?></b>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Amorph'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['UriOt'] ?></b>
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['CoAx'] ?></b>
	            	</div>
				</div>


<!-- Drug Test -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>DRUG SCREENING</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Meth" class="col-3 col-form-label text-right">METHAMPHETHAMINE:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Meth'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['Tetra'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['DT'] ?></b>
	            	</div>
				</div>
<!-- Serology -->
				<div class="form-group row">
	            	<div class="col-3 ">
	            		<b>SEROLOGY</b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="HBsAg" class="col-3 col-form-label text-right">HBsAg:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['HBsAg'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['PregTest'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['SeroOt'] ?></b>
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
	            	<div class="col-2">
	            		<b><?php echo $lab['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $lab['FecOt'] ?></b>
	            	</div>
				</div>
				<div class="form-group row"><hr></div>

				<div class="form-group row">
	            	<div class="col">
	            		<center><b><?php echo $lab['Received'] ?></b></center>
	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $qc['qc'] ?></b></center>

	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $lab['Printed'] ?></b></center>
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col">
	            		<center>Medical Technologist</center>
	            	</div>
	            	<div class="col">
	            		<center>Quality Control</center>
	            	</div>
	            	<div class="col">
	            		<center>Pathologist</center>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Radiology Report</b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col">
						<label class="col-1">Comment:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $rad['com']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-1">Impressions:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $rad['imp']?><br></b></p>
					</div>
				</div>
				<div class="row">
	            	<div class="col">
	            		<center><b><?php echo $rad['qa'] ?></b></center>
	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $rad['rad'] ?></b></center>
	            	</div>
				</div>
				<div class="row">
	            	<div class="col">
	            		<center>Quality Assurance</center>
	            	</div>
	            	<div class="col">
	            		<center>Radiologist</center>
	            	</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Classification</b></center></div>
            <div class="card-block">
				<div class="row">
					<div class="col">
						<label class="col-1">Class:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $qc['Patclass']?><br></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-1">Notes:</label><br>
					</div>
					<div class="col-10">
						<p style="padding-left: 20px;"><b><?php echo $qc['ot']?><br></b></p>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<center><button type="button" class="btn btn-primary" onclick="document.location = 'ListOfPatients.php';">BACK</button></center>
</div>
<?php }}}}}}}}?>
</body>
</html>