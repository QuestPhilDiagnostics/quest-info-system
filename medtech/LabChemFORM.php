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

$C = $lab['Clinician'];
$FBS = $lab['FBS'];
$BUA = $lab['BUA'];
$BUN = $lab['BUN'];
$CREA = $lab['CREA'];
$CHOL = $lab['CHOL'];
$TRIG = $lab['TRIG'];
$HDL = $lab['HDL'];
$LDL = $lab['LDL'];
$CH = $lab['CH'];
$VLDL = $lab['VLDL'];
$Na = $lab['Na'];
$K = $lab['K'];
$Cl = $lab['Cl'];
$ALT = $lab['ALT'];
$AST = $lab['AST'];
$HB = $lab['HB'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$printdate = date("Y-m-d H:i:s");
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LABORATORY CHEMISTRY FORM</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script type="text/javascript">
	window.onload = function() 
	{ 
		var x = "<?php echo $C ?>";
		if ( x == "WALK-IN") 
		{
			document.getElementById("Check").style.visibility = "hidden";
		}
		else if ( x == "") 
		{
			document.getElementById("CheckAgain").innerHTML = "-";
		}

		var FBS = "<?php echo $FBS ?>";
		if ( FBS == "") 
		{
			var divOne = document.getElementById("CheckFBS");
			divOne.remove();
		}

		var BUA = "<?php echo $BUA ?>";
		if ( BUA == "") 
		{
			var divTwo = document.getElementById("CheckBUA");
			divTwo.remove();
		}

		var BUN = "<?php echo $BUN ?>";
		if ( BUN == "") 
		{
			var divThree = document.getElementById("CheckBUN");
			divThree.remove();
		}

		var CREA = "<?php echo $CREA ?>";
		if ( CREA == "") 
		{
			var divFour = document.getElementById("CheckCREA");
			divFour.remove();
		}

		var CHOL = "<?php echo $CHOL ?>";
		if ( CHOL == "") 
		{
			var divFive = document.getElementById("CheckCHOL");
			divFive.remove();

		}

		var TRIG = "<?php echo $TRIG ?>";
		if ( TRIG == "") 
		{
			var divSeven = document.getElementById("CheckTRIG");
			divSeven.remove();
		}

		var HDL = "<?php echo $HDL ?>";
		if ( HDL == "") 
		{
			var divEight = document.getElementById("CheckHDL");
			divEight.remove();
		}

		var LDL = "<?php echo $LDL ?>";
		if ( LDL == "") 
		{
			var divNine = document.getElementById("CheckLDL");
			divNine.remove();
		}

		var CH = "<?php echo $CH ?>";
		if ( CH == "") 
		{
			var divTen = document.getElementById("CheckCH");
			divTen.remove();
		}

		var VLDL = "<?php echo $VLDL ?>";
		if ( VLDL == "") 
		{
			var divEle = document.getElementById("CheckVLDL");
			divEle.remove();
		}

		var Na = "<?php echo $Na ?>";
		if ( Na == "") 
		{
			var divTwe = document.getElementById("CheckNa");
			divTwe.remove();
		}

		var K = "<?php echo $K ?>";
		if ( K == "") 
		{
			var divThi = document.getElementById("CheckK");
			divThi.remove();
		}

		var Cl = "<?php echo $Cl ?>";
		if ( Cl == "") 
		{
			var divFou = document.getElementById("CheckCl");
			divFou.remove();
		}

		var ALT = "<?php echo $ALT ?>";
		if ( ALT == "") 
		{
			var divFif = document.getElementById("CheckALT");
			divFif.remove();
		}

		var AST = "<?php echo $AST ?>";
		if ( AST == "") 
		{
			var divSixt = document.getElementById("CheckAST");
			divSixt.remove();
		}

		var HB = "<?php echo $HB ?>";
		if ( HB == "") 
		{
			var divSev = document.getElementById("CheckHB");
			divSev.remove();
		}

		if(FBS == "" && BUA == "" && BUN == "" && CREA == "")
		{
			var LabelOne = document.getElementById("CHEM");
			LabelOne.remove();
		}

		if(CHOL == "" && TRIG == "" && HDL == "" && LDL == "" && CH == "" && VLDL == "")
		{
			var LabelTwo = document.getElementById("LP");
			LabelTwo.remove();
		}
		if(Na == "" && K == "" && Cl == "")
		{
			var LabelThree = document.getElementById("E");
			LabelThree.remove();
		}
		if(ALT == "" && AST == "")
		{
			var LabelFour = document.getElementById("EN");
			LabelFour.remove();
		}




	}		
	</script>
</head>
<style type="text/css">

.card-header
{
	font-family: "Times New Roman";
	font-size: 18px;
	color: white;
	background-color: #104E8B;
	padding: 0px;
	margin: 0px;
}

.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 50px;
	height: 16px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:16px;
	font-size: 24px;
	
}

.label
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:16px;

	
}
.lineName
{
	font-family: "Garamond";
	font-size: 20px;
	text-transform: uppercase;
	color: #000000;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	
}
.labelName
{
	font-family: "Garamond";
	font-size: 18px;
	color: #104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;

	
}
.Names
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;
	line-height:18px;
	color: #000000;
}
.lineNameSig
{
	font-family: "Garamond";
	display: table-cell;
	width: 500px;
	height: 16px;
	border-bottom: 1px solid black;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 1px;
	margin: 1px;
	line-height:3px;
	color: #000000;
	
}


.label1
{
	font-family: "Garamond";
	font-size: 18px;
	color:#104E8B;
	font-weight: bold;
	padding: 0px;
	margin: 0px;
	line-height:0px;
	

}
.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
{
	padding-left: 0px;
	margin-left: 0px;
}

.col u
{
	font-family: "Garamond";
	text-transform: uppercase;
	font-weight: bolder;
	
}
hr
{
	background-color: #fff;
	border-top: 3px dashed #8c8b8b;
	line-height:1px;

}

</style>

<body >
<div class="container-fluid">
<div class="col-md-10" style="margin-top: 5px;">
	<img src="../assets/QPDHeader.jpg" height="100px" width="100%">
</div>
<div class="col-md-10">
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
	<div class="card-block">
	<div class="row">
	    <div class="col-1"><p class="labelName">Name:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Lab Number:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['id'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">QuestID:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $data['id'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName">Age:</p></div>
	    <div class="col-6">
	        <span class="lineName"><?php echo $data['age'] ?></span>
	    </div>
	    <div class="col-2 text-right">
	        <p class="labelName">Gender:</p>
	    </div>
	    <div class="col">
	        <span class="lineName"><?php echo $data['gen'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col-1"><p class="labelName" id="Check">Clinician:</p></div>
	    <div class="col-6">
	        <span class="lineName" id="CheckAgain"><?php echo $lab['Clinician'] ?></span>
	    </div>
	</div>
	<div class="row">
	    <div class="col col-sm-auto"><p class="labelName">Received:</p></div>
	    <div class="col col-sm-auto">
	        <u><?php echo $data['date'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Reported:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $lab['date'] ?></u>
	    </div>
	    <div class="col"></div>
	    <div class="col col-sm-auto">
	        <p class="labelName">Printed:</p>
	    </div>
	    <div class="col col-sm-auto">
	        <u><?php echo $printdate ?></u>
	    </div>
	</div>
	</div>
	</div>
</div>

<div class="col-md-10" >
	<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-header"><center><b>LABORATORY RESULTS</b></center></div>
	<div class="card-block" style="height: 7in;">

	<div class="row">
	    <div class="col-3"><p class="label">TEST</p></div>
	    <div class="col-2"><p class="label"></p></div>
	    <div class="col-3"><p class="label">SI Units</p></div>
	    <div class="col-1"><p class="label"></p></div>
	    <div class="col-3"><p class="label">Conventional Units</p></div>
	</div>

	<hr>

	<!-- Blood -->
			<div class="row" id="CHEM">
			    <p class="label">CHEMISTRY</p><br>
			</div>
			<div class="row" id="CheckFBS">
	            <label class="col-3"><p class="label">Fasting Blood Sugar</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['FBS'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 4.1-5.9</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['FBScon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 75 -107</p>
	            </div>
			</div>
			<div class="row" id="CheckBUA">
	            <label class="col-3"><p class="label">Uric Acid</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['BUA'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 155 - 428</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['BUAcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 3 - 7.1</p>
	            </div>
			</div>
			<div class="row" id="CheckBUN">
	            <label class="col-3"><p class="label">Blood Urea Nitrogen</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['BUN'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 2.5 - 7.5</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['BUNcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 7 - 21</p>
	            </div>
			</div>
			<div class="row" id="CheckCREA">
	            <label class="col-3"><p class="label">Creatinine</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['CREA'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">umol/L Female: 53 - 106</p>
	            	<p class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 71 - 115</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['CREAcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl &nbsp;Female: 0.60 - 1.20</p>
	            	<p class="label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male: 0.80 - 1.30</p><br>
	            </div>
			</div>
			<div class="row" id="LP">
			    <p class="label">LIPID PROFILE</p><br>
			</div>
			<div class="row" id="CheckCHOL">
	            <label class="col-3"><p class="label">Cholesterol</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['CHOL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 5.17</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['CHOLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl < 200</p>
	            </div>
			</div>
			<div class="row" id="CheckTRIG">
	            <label class="col-3"><p class="label">Triglycerides</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['TRIG'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.3-1.7</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['TRIGcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 27-150</p>
	            </div>
			</div>
			<div class="row" id="CheckHDL">
	            <label class="col-3"><p class="label">HDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['HDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.9-2.21</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['HDLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 35-85.32</p>
	            </div>
			</div>
			<div class="row" id="CheckLDL">
	            <label class="col-3"><p class="label">LDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['LDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 2.5-4.1</p>
	            </div>
	            <div class="col-1">
	            	<span class="line"><?php echo $lab['LDLcon'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mg/dl 96.52-158.30</p>
	            </div>
			</div>
			<div class="row" id="CheckCH">
	            <label class="col-3"><p class="label">Cholesterol/HDL Ratio</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['CH'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L < 4.40 </p>
	            </div>
			</div>
			<div class="row" id="CheckVLDL">
	            <label class="col-3"><p class="label">VLDL</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['VLDL'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 0.050-1.04</p><br>
	            </div>
			</div>
			
			<div class="row" id="E">
			   <p class="label">ELECTROLYTES</p><br>
			</div>
			
			<div class="row" id="CheckNa">
	            <label class="col-3"><p class="label">Sodium</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['Na'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 135 - 153</p>
	            </div>
			</div>
			<div class="row" id="CheckK">
	            <label class="col-3"><p class="label">Potassium</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['K'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 3.50 - 5.30</p>
	            </div>
			</div>
			<div class="row" id="CheckCl">
	            <label class="col-3"><p class="label">Chloride</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['Cl'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">mmol/L 98-107</p><br>
	            </div>
			</div>
			<div class="row" id="EN">
			    <p class="label">ENZYMES</p><br>
			</div>
			<div class="row" id="CheckALT">
	            <label class="col-3"><p class="label">SGPT/ALT</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['ALT'] ?></span>
	            </div>
	            <div class="col-4">
	            	<p class="label">U/L Female: 5 - 31  Male: 10 - 41</p>
	            </div>
			</div>
			<div class="row" id="CheckAST">
	            <label class="col-3"><p class="label">SGOT/AST</p></label>
	            <div class="col-2">
	            	<span class="line"><?php echo $lab['AST'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">U/L 0 - 40</p><br>
	            </div>
			</div>

			<div class="row" id="CheckHB">
			    <div class="col-3"><p class="label">HBA1C</p></div>
			    <div class="col-2">
	            	<span class="line"><?php echo $lab['HB'] ?></span>
	            </div>
	            <div class="col-3">
	            	<p class="label">% 4.3 - 6.3</p><br>
	            </div>
			</div>
			
	</div>
	</div>
</div>
<div class="col-md-10">
<div class="card" style="border-radius: 0px; margin-top: 10px;">
	<div class="card-block" style="height: 1.3in;" >
			<div class="row">
				<div class="col" style="padding-left: 0px"><center><span class="Names"><br><b><?php echo $lab['Received'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="Names"><br><b><?php echo $qc['qc'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="Names"><br><b><?php echo $lab['Printed'] ?></b></span></center></div>
			</div>
			<div class="row">
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>LIC NO. <?php echo $lab['RMTLIC'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>LIC NO. <?php echo $qc['QCLIC'] ?></b></span></center></div>
				<div class="col" style="padding-left: 0px"><center><span class="lineNameSig"><br><b>LIC NO. <?php echo $lab['PATHLIC'] ?></b></span></center></div>
			</div>
			<div class="row">
				<div class="col"><center><p class="labelName">Registered Medical Technologist</p></center></div>
				<div class="col"><center><p class="labelName">Quality Control</p></center></div>
				<div class="col"><center><p class="labelName">Pathologist</p></center></div>		
			</div>
			<center>**Report Electronically Signed Out**</center>
	</div>
</div>
</div>
<div class="col-md-10">
	<img src="../assets/QPDFooter.jpg" height="50px" width="100%">
</div>
<?php }}}} ?>
</div>
</body>
</html>