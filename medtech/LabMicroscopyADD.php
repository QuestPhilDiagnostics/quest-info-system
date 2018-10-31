<?php
include_once('../connection.php');
include_once('../classes/transVal.php');
include_once('../classes/patient.php');
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
	<title>Laboratory Clinical Microscopy</title>
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabMicroscopyINSERTUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
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
	            		<b>Physical/Macroscopic</b>
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
	            		<SELECT class="form-control" name="UriColor" id="UriColor">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="STRAW">STRAW</OPTION>
				 	 		<OPTION value="LIGHT YELLOW">LIGHT YELLOW</OPTION>
				 	 		<OPTION value="YELLOW">YELLOW</OPTION>
				 	 		<OPTION value="DARK YELLOW">DARK YELLOW</OPTION>
				 	 		<OPTION value="RED">RED</OPTION>
				 	 		<OPTION value="ORANGE">ORANGE</OPTION>
				 	 		<OPTION value="AMBER">AMBER</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="RBC" class="col-3 col-form-label text-right">RBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="RBC" class="form-control" id="RBC">
	            	</div>
	            	<label for="RBC" class="col-1 col-form-label">/hpf</label>
	            	<label for="RBC" class="col-2 col-form-label">0-3</label>
				</div>
				<div class="form-group row">
	            	<label for="UriTrans" class="col-3 col-form-label text-right">Transparency :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriTrans" id="UriTrans">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="CLEAR">CLEAR</OPTION>
				 	 		<OPTION value="HAZY">HAZY</OPTION>
				 	 		<OPTION value="SL. TURBID">SL. TURBID</OPTION>
				 	 		<OPTION value="TURBID">TURBID</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="WBC" class="col-3 col-form-label text-right">WBC :</label>
	            	<div class="col-1">
	            		<input type="text" name="WBC" class="form-control" id="WBC">
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
	            		<SELECT class="form-control" name="UriPh" id="UriPh">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="5.0">5.0</OPTION>
				 	 		<OPTION value="6.0">6.0</OPTION>
				 	 		<OPTION value="6.5">6.5</OPTION>
				 	 		<OPTION value="7.0">7.0</OPTION>
				 	 		<OPTION value="7.5">7.5</OPTION>
				 	 		<OPTION value="8.0">8.0</OPTION>
				 	 		<OPTION value="8.5">8.5</OPTION>
				 	 		<OPTION value="9.0">9.0</OPTION>
				 	 		<OPTION value="9.5">9.5</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="ECells" class="col-3 col-form-label text-right">E.Cells:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="ECells" id="ECells">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriSp" class="col-3 col-form-label text-right">Sp. Gravity :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriSp" id="UriSp">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="1.000">1.000</OPTION>
				 	 		<OPTION value="1.005">1.005</OPTION>
				 	 		<OPTION value="1.010">1.010</OPTION>
				 	 		<OPTION value="1.015">1.015</OPTION>
				 	 		<OPTION value="1.020">1.020</OPTION>
				 	 		<OPTION value="1.025">1.025</OPTION>
				 	 		<OPTION value="1.030">1.030</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="MThreads" class="col-3 col-form-label text-right">M.Threads:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="MThreads" id="MThreads">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriPro" class="col-3 col-form-label text-right">Protein :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriPro">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="Bac" class="col-3 col-form-label text-right">Bacteria:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="Bac" id="Bac">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriGlu" class="col-3 col-form-label text-right">Glucose :</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="UriGlu" id="UriGlu">
				 	 		<OPTION >-</OPTION>
				 	 		<OPTION value="Negative">Negative</OPTION>
				 	 		<OPTION value="Trace">Trace</OPTION>
				 	 		<OPTION value="1+">1+</OPTION>
				 	 		<OPTION value="2+">2+</OPTION>
				 	 		<OPTION value="3+">3+</OPTION>
				 	 		<OPTION value="4+">4+</OPTION>
				 	 	</SELECT>
	            	</div>
	            	<label for="Amorph" class="col-3 col-form-label text-right">Amorphous:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="Amorph" id="Amorph">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="LE" class="col-3 col-form-label text-right">Leukocyte Esterase:</label>
	            	<div class="col-2">
	            		<input type="text" name="LE" class="form-control" id="LE">
	            	</div>
	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="CoAx" id="CoAx">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="NIT" class="col-3 col-form-label text-right">Nitrite:</label>
	            	<div class="col-2">
	            		<input type="text" name="NIT" class="form-control" id="NIT">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="URO" class="col-3 col-form-label text-right">Urobilinogen:</label>
	            	<div class="col-2">
	            		<input type="text" name="URO" class="form-control" id="URO">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BLD" class="col-3 col-form-label text-right">Blood:</label>
	            	<div class="col-2">
	            		<input type="text" name="BLD" class="form-control" id="BLD">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="KET" class="col-3 col-form-label text-right">Ketone:</label>
	            	<div class="col-2">
	            		<input type="text" name="KET" class="form-control" id="KET">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="BIL" class="col-3 col-form-label text-right">Bilirubin:</label>
	            	<div class="col-2">
	            		<input type="text" name="BIL" class="form-control" id="BIL">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriOt" class="form-control" id="UriOt">
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
	            		<input type="text" name="FecColor" class="form-control" id="FecColor">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-4">
	            		<input type="text" name="FecCon" class="form-control" id="FecCon">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-4">
	            		<input type="text" name="FecMicro" class="form-control" id="FecMicro">
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-4">
	            		<input type="text" name="FecOt" class="form-control" id="FecOt" placeholder="Presence of:">
	            	</div>
				</div>
				<div class="form-group row">
				<div class="col">
	            	<input type="text" name="Clinician" class="form-control" placeholder="Clinician/Walk-In">
	            </div>
	            <div class="col">
	            	<input type="text" name="Received" class="form-control" value ='Jayanara May S. Capulong,RMT' placeholder=" Medical Technologist">
	            </div>
	            <div class="col">
	            	<input type="text" name="qc" class="form-control" value ='Althea Joy S. Padios,RMT' placeholder=" Quality Control">
	            </div>
	            <div class="col">
	            	<input type="text" name="Printed" class="form-control" value="Emiliano Dela Cruz,MD">
	            </div>
			</div>
			<div class="form-group row">
				<div class="col">
	            	
	            </div>
	            <div class="col">
	            	<input type="text" name="RMTLIC" class="form-control" value ='0075119' placeholder=" Medical Technologist License">
	            </div>
	            <div class="col">
	            	<input type="text" name="QCLIC" class="form-control" value =' 0076211' placeholder="Quality Control License">
	            </div>
	            <div class="col">
	            	<input type="text" name="PATHLIC" class="form-control" value="0073345" placeholder="Pathologist License">
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
<?php }} ?>
</body>
</html>