<?php
include_once('../connection.php');
include_once('../classes/mhvs.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$data = $trans->fetch_data($id, $tid);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medical datatory & dataal Signs</title>
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
	.card-block input, 
	{
		font-family: "Century Gothic";
		font-size: 18px;
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
            	<div class="row">
            		<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date: </label><br>
						<b><?php echo $data['TransactionDate'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Name:</label><br>
						<p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
					</div>
					<div class="col col-md-auto">
						<label>Company Name: </label><br>
						<p><b><?php echo $data['CompanyName'] ?></b></p>
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
						<p style="padding-left: 20px;"><b><?php echo $data['asth']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Tuberculosis:</label>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['tb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Diabetes:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['dia']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">High Blood Pressure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['hb']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Heart Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['hp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Kidney Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['kp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Abdominal/Hernia:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['ab']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Joint/Back/Scoliosis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['jbs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Psychiatric Problem:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['pp']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Migraine/Headache:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['mh']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Fainting/Seizure:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['fs']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Allergies:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['alle']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Cancer/Tumor:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['ct']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">Hepatitis:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['hep']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="col-12 text-right">STD:</label><br>
					</div>
					<div class="col">
						<p style="padding-left: 20px;"><b><?php echo $data['std']?></b></p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<center><button type="button" class="btn btn-primary" onclick="document.location = 'MedhisEDIT.php?id=<?php echo $data['PatientID']?>&tid=<?php echo $data['TransactionID']?>';">UPDATE RECORD</button></center>
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
						<b><?php echo $data['height']?></b>
					</div>
					<div class="col">
						<label>Weight:</label>
						<b><?php echo $data['weight']?></b>
					</div>
					<div class="col">
						<label>BMI:</label>
						<b><?php echo $data['bmi']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>BP:</label>
						<b><?php echo $data['bp']?></b>
					</div>
					<div class="col">
						<label>PR:</label>
						<b><?php echo $data['pr']?></b>
					</div>
					<div class="col">
						<label>RR:</label>
						<b><?php echo $data['rr']?></b>
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
						<b><?php echo $data['uod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $data['uos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label><b>Corrected</b></label>
					</div>
					<div class="col">
						<label>OD:</label>
						<b><?php echo $data['cod']?></b>
					</div>
					<div class="col">
						<label>OS:</label>
						<b><?php echo $data['cos']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Ishihara Test:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['cv']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<label>Hearing:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['hearing']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Hospitalization:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['hosp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Operations:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['opr']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Present Medications:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['pm']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Smoker(sticks/packs/years):</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['smoker']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Alcoholic Drinker:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['ad']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Last Menstrual Period:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['lmp']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label>Others/Notes:</label>
					</div>
					<div class="col-8">
						<b><?php echo $data['Notes']?></b>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<center><button type="button" class="btn btn-primary" onclick="document.location = 'VitalSignEDIT.php?id=<?php echo $data['PatientID']?>&tid=<?php echo $data['TransactionID']?>';">UPDATE RECORD</button>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
 <div class="row">
	<div class="col-10 offset-sm-1">
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
                        <p style="padding-left: 20px;"><b><?php echo $data['skin']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Head and Neck:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['hn']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Chest/Breast/Lungs:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['cbl']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Cardiac/Heart:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['ch']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Abdomen:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['abdo']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Extremities:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['extre']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Others/Notes:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['ot']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Findings:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['find']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">Physican:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['Doctor']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">License:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $data['License']?><br></b></p>
                    </div>
                </div>
            <hr>
            <center><button type="button" class="btn btn-primary" onclick="document.location = 'PExamEDIT.php?id=<?php echo $data['PatientID']?>&tid=<?php echo $data['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
	</div>
</div>
<center><button type="button" class="btn btn-primary" onclick="document.location = 'MHVS.php';">BACK</button></center>


</div>
</body>
</html>
<?php  }	?>	