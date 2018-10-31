<?php
include_once('../connection.php');
include_once('../classes/trans.php');
include_once('../classes/patient.php');
$patient = new Patient;
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id,$tid);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laboratory Industrial</title>
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
include_once('labsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Laboratory Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabIndustrialINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>Patient ID.: </label><br>
						<input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
						<b><?php echo $data['PatientID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction No.: </label><br>
						<input type="hidden" name="tid" value="<?php echo $trans['TransactionID'] ?>">
						<b><?php echo $trans['TransactionID'] ?></b>
					</div>
					<div class="col col-md-auto">
						<label>Transaction Date.: </label><br>
						<input type="hidden" value="<?php echo $trans['TransactionDate'] ?>">
						<b><?php echo $trans['TransactionDate'] ?></b>
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
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Availed Items</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col col-md-auto">
            			Item Avail: <p><b><?php echo $trans['ItemName'] ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Description: <p><b><?php echo $trans['ItemDescription'] ?></b></p>
            		</div>
            		<div class="col col-md-auto">
            			Transaction Type: <p><b><?php echo $trans['TransactionType'] ?></b></p>
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
	            		<input type="text" name="WhiteBlood" class="form-control" id="WhiteBlood">
	            	</div>
	            	<label for="WhiteBlood" class="col-2 col-form-label">x10^9/L</label>
	            	<label for="WhiteBlood" class="col-2 col-form-label">4.23-11.07</label>
				</div>
				<div class="form-group row">
	            	<label for="Hemoglobin" class="col-3 col-form-label text-right">Hemoglobin :</label>
	            	<div class="col-2">
	            		<input type="text" name="Hemoglobin" class="form-control" id="Hemoglobin">
	            	</div>
	            	<label for="Hemoglobin" class="col-2 col-form-label">g/L</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="HemoNR">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="M:137-175">M:137-175</OPTION>
				 	 		<OPTION value="F:112-157">F:112-175</OPTION>
				 		</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Hematocrit" class="col-3 col-form-label text-right">Hematocrit :</label>
	            	<div class="col-2">
	            		<input type="text" name="Hematocrit" class="form-control" id="Hematocrit">
	            	</div>
	            	<label for="Hematocrit" class="col-2 col-form-label">VF</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="HemaNR">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="M:0.40-0.51">M:0.40-0.51</OPTION>
				 	 		<OPTION value="F:0.34-0.45">F:0.34-0.45</OPTION>
				 		</SELECT>
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
	            		<input type="text" name="Neutrophils" class="form-control" id="Neutrophils">
	            	</div>
	            	<label for="Neutrophils" class="col-2 col-form-label">%</label>
	            	<label for="Neutrophils" class="col-2 col-form-label">34-71</label>
				</div>
				<div class="form-group row">
	            	<label for="Lymphocytes" class="col-3 col-form-label text-right">Lymphocytes :</label>
	            	<div class="col-2">
	            		<input type="text" name="Lymphocytes" class="form-control" id="Lymphocytes">
	            	</div>
	            	<label for="Lymphocytes" class="col-2 col-form-label">%</label>
	            	<label for="Lymphocytes" class="col-2 col-form-label">22-53</label>
				</div>
				<div class="form-group row">
	            	<label for="Monocytes" class="col-3 col-form-label text-right">Monocytes :</label>
	            	<div class="col-2">
	            		<input type="text" name="Monocytes" class="form-control" id="Monocytes">
	            	</div>
	            	<label for="Monocytes" class="col-2 col-form-label">%</label>
	            	<label for="Monocytes" class="col-2 col-form-label">5-12</label>
				</div>
				<div class="form-group row">
	            	<label for="CBCOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="CBCOt" class="form-control" id="CBCOt">
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
				 	 		<OPTION >NONE</OPTION>
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
				 	 		<OPTION >NONE</OPTION>
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
				 	 		<OPTION >NONE</OPTION>
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
				 	 		<OPTION >NONE</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="UriOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="UriOt" class="form-control" id="UriOt">
	            	</div>

	            	<label for="CoAx" class="col-3 col-form-label text-right">CaOx:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="CoAx" id="CoAx">
				 	 		<OPTION >NONE</OPTION>
				 	 		<OPTION value="Rare">Rare</OPTION>
				 	 		<OPTION value="Few">Few</OPTION>
				 	 		<OPTION value="Moderate">Moderate</OPTION>
				 	 		<OPTION value="Many">Many</OPTION>
				 	 	</SELECT>
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
	            		<SELECT class="form-control" name="Meth" id="Meth">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="Tetra" class="col-3 col-form-label text-right">TETRAHYDROCANABINOL:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="Tetra" id="Tetra">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="DT" class="col-3 col-form-label text-right">DT RESULT:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="DT" id="DT">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
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
	            		<SELECT class="form-control" name="HBsAg" id="HBsAg">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NONREACTIVE">NON-REACTIVE</OPTION>
				 	 		<OPTION value="REACTIVE">REACTIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="PregTest" class="col-3 col-form-label text-right">PREGNANCY TEST:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="PregTest" id="PregTest">
				 	 		<OPTION value="N/A" >N/A</OPTION>
				 	 		<OPTION value="NEGATIVE">NEGATIVE</OPTION>
				 	 		<OPTION value="POSITIVE">POSITIVE</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="SeroOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="SeroOt" class="form-control" id="SeroOt">
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
	            		<SELECT class="form-control" name="FecColor" id="FecColor">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="BROWN">BROWN</OPTION>
				 	 		<OPTION value="LIGHT BROWN">LIGHT BROWN</OPTION>
				 	 		<OPTION value="DARK BROWN">DARK BROWN</OPTION>
				 	 		<OPTION value="GREEN">GREEN</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecCon" class="col-3 col-form-label text-right">Consistency:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="FecCon" id="FecCon">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="FORMED">FORMED</OPTION>
				 	 		<OPTION value="SEMI-FORMED">SEMI-FORMED</OPTION>
				 	 		<OPTION value="SOFT">SOFT</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecMicro" class="col-3 col-form-label text-right">Microscopic Findings:</label>
	            	<div class="col-2">
	            		<SELECT class="form-control" name="FecMicro" id="FecMicro">
				 	 		<OPTION >N/A</OPTION>
				 	 		<OPTION value="NO INTESTINAL PARASITE SEEN">NO INTESTINAL PARASITE SEEN</OPTION>
				 	 		<OPTION >Presence of:</OPTION>
				 	 	</SELECT>
	            	</div>
				</div>
				<div class="form-group row">
	            	<label for="FecOt" class="col-3 col-form-label text-right">OTHERS/NOTES :</label>
	            	<div class="col-2">
	            		<input type="text" name="FecOt" class="form-control" id="FecOt" placeholder="Presence of:">
	            	</div>
				</div>
				<div class="form-group row">
	            	<div class="col">
	            		<input type="text" name="Received" class="form-control" value ='Adelbert D. Gonzales,RMT' placeholder=" Medical Technologist">
	            	</div>
	            	<div class="col">
	            		<input type="text" name="qc" class="form-control" value ='Edward S. Agustin' placeholder=" Quality Control">
	            	</div>
	            	<div class="col">
	            		<input type="text" name="Printed" class="form-control" value="Emiliano Dela Cruz,MD">
	            	</div>
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