<?php
include_once('../connection.php');
include_once('../classes/labindustrial.php');
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
	}
	.col-2
	{
		align-self: center;
	}

</style>

<body>
<?php
include_once('labsidebar.php');
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
						<label>Patient ID.: </label><br>
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<b><?php echo $data['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date: </label><br>
						<b><?php echo $data['CreationDate'] ?></b>
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
            <div class="card-header card-inverse card-info"><center><b>LABORATORY SCIENCES RESULTS</b></center></div>
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
	            		<b><?php echo $data['WhiteBlood'] ?></b>
	            	</div>
	            	<label for="WhiteBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="WhiteBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Hemoglobin'] ?></b>
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<b><?php echo $data['HemoNR'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Hematocrit'] ?></b>
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
	            		<b><?php echo $data['HemaNR'] ?></b>
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
	            		<b><?php echo $data['Neutrophils'] ?></b>
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Lymphocytes'] ?></b>
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Monocytes'] ?></b>
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div>
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['CBCOt'] ?></b>
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
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['UriOt'] ?></b>
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['CoAx'] ?></b>
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
	            		<b><?php echo $data['Meth'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['Tetra'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['DT'] ?></b>
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
	            		<b><?php echo $data['HBsAg'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['PregTest'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['SeroOt'] ?></b>
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
	            		<b><?php echo $data['FecColor'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['FecCon'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<b><?php echo $data['FecMicro'] ?></b>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<b><?php echo $data['FecOt'] ?></b>
	            	</div>
				</div>
				<div class="form-group row"><hr></div>

				<div class="form-group row">
	            	<div class="col">
	            		<center><b><?php echo $data['Received'] ?></b></center>
	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $data['QC'] ?></b></center>

	            	</div>
	            	<div class="col">
	            		<center><b><?php echo $data['Printed'] ?></b></center>
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
				<hr>
				<center><button type="button" class="btn btn-primary" onclick="document.location = 'LabIndustrialEDIT.php?id=<?php echo $data['PatientID']?>&tid=<?php echo $data['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
    </div>	
</div>
	
</div>
<?php }?>
</body>
</html> 