<?php
include_once('connection.php');
include_once('classes/qc.php');
include_once('classes/pe.php');
include_once('classes/vital.php');
include_once('classes/medhis.php');
include_once('classes/patient.php');
include_once('classes/transVal.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id,$tid);
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$data = $patient->fetch_data($id,$tid);
$His = new His;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$his = $His->fetch_data($id,$tid);
$vital = new vital;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$vit = $vital->fetch_data($id,$tid);
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$pex = $pe->fetch_data($id,$tid);
$qc = new qc;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$qc = $qc->fetch_data($id,$tid);
$printdate = date("m-d-Y");

$chkEmail = $data['Email'];
$chkCon = $data['ContactNo'];

$Asthma = $his['asth'];
$Tubercolosis = $his['tb'];
$Diabetes = $his['dia'];
$HBP = $his['hb'];
$HP = $his['hp'];
$KP = $his['kp'];
$AH = $his['ab'];
$JBS = $his['jbs'];
$PP = $his['pp'];
$MH = $his['mh'];
$FS = $his['fs'];
$ALLE = $his['alle'];
$CT = $his['ct'];
$HEP = $his['hep'];
$STD = $his['std'];

$skin = $pex['skin'];
$hn = $pex['hn'];
$cbl = $pex['cbl'];
$ch = $pex['ch'];
$abdo = $pex['abdo'];
$extre = $pex['extre'];
$find = $pex['find'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Physical Examination Report</title>
	<link href="source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script type="text/javascript">
	window.onload = function() 
	{ 
		var x = "<?php echo $chkEmail ?>";
		if ( x == "-") 
		{
			document.getElementById("email").innerHTML = "-";
		}

		var y = "<?php echo $chkCon ?>";
		if ( y == "") 
		{
			document.getElementById("con").innerHTML = "-";
		}

		var asthma = "<?php echo $Asthma ?>";
		if ( asthma == "YES" ) 
		{
			document.getElementById("a").style.color = "red";
		}
		var b = "<?php echo $Tubercolosis ?>";
		if ( b == "YES") 
		{
			document.getElementById("tb").style.color = "red";
		}
		var c = "<?php echo $Diabetes ?>";
		if ( c == "YES") 
		{
			document.getElementById("c").style.color = "red";
		}
		var d = "<?php echo $HBP ?>";
		if ( d == "YES") 
		{
			document.getElementById("d").style.color = "red";
		}
		var e = "<?php echo $HP ?>";
		if ( e == "YES") 
		{
			document.getElementById("e").style.color = "red";
		}
		var f = "<?php echo $KP ?>";
		if ( f == "YES") 
		{
			document.getElementById("f").style.color = "red";
		}
		var g = "<?php echo $AH ?>";
		if ( g == "YES") 
		{
			document.getElementById("g").style.color = "red";
		}
		var h = "<?php echo $JBS ?>";
		if ( h == "YES") 
		{
			document.getElementById("h").style.color = "red";
		}
		var i = "<?php echo $PP ?>";
		if ( i == "YES") 
		{
			document.getElementById("i").style.color = "red";
		}
		var j = "<?php echo $MH ?>";
		if ( j == "YES") 
		{
			document.getElementById("j").style.color = "red";
		}
		var k = "<?php echo $FS ?>";
		if ( k == "YES") 
		{
			document.getElementById("k").style.color = "red";
		}
		var l = "<?php echo $ALLE ?>";
		if ( l == "YES") 
		{
			document.getElementById("l").style.color = "red";
		}
		var m = "<?php echo $CT ?>";
		if ( m == "YES") 
		{
			document.getElementById("m").style.color = "red";
		}
		var n = "<?php echo $HEP ?>";
		if ( n == "YES") 
		{
			document.getElementById("n").style.color = "red";
		}
		var o = "<?php echo $STD ?>";
		if ( o == "YES") 
		{
			document.getElementById("o").style.color = "red";
		}

		var aa  = "<?php echo $skin ?>";
		if ( aa == "NO") 
		{
			document.getElementById("aa").style.color = "red";
		}

		var bb = "<?php echo $hn ?>";
		if ( bb == "NO") 
		{
			document.getElementById("bb").style.color = "red";
		}

		var cc = "<?php echo $cbl ?>";
		if ( cc == "NO") 
		{
			document.getElementById("cc").style.color = "red";
		}

		var dd = "<?php echo $ch ?>";
		if ( dd == "NO") 
		{
			document.getElementById("dd").style.color = "red";
		}

		var ee = "<?php echo $abdo ?>";
		if ( ee == "NO") 
		{
			document.getElementById("ee").style.color = "red";
		}

		var ff = "<?php echo $extre ?>";
		if ( ff == "NO") 
		{
			document.getElementById("ff").style.color = "red";
		}

		var gg = "<?php echo $find ?>";
		if ( gg != "") 
		{
			document.getElementById("FINDINGS").style.color = "red";
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
.card-block
{
	padding-top: 0px;
	padding-bottom: 0px;
}
.line
{
	font-family: "Garamond";
	display: table-cell;
	width: 1000px;
	height: 24px;
	border-bottom: 1px solid #104E8B;
	text-transform: uppercase;
	font-weight: bolder;
	padding: 0px;
	margin: 0px;	
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
	font-size: 18px;
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
.para
{
	font-family: "Garamond";
	font-size: 14px;
	color:#104E8B;
	line-height: 14px;
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
	color: #104E8B;
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
.dashedhr
{
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
	line-height: 2px;

}
</style>
<body>
<div class="container-fluid">
<div class="row">
	<div class="col-sm-12" style="margin-top: 5px;">
		<img src="assets/QPDHeader.jpg" height="100px" width="100%">
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>QUEST PHIL DIAGNOSTICS MEDICAL EXAMINATION REPORT</b></center></div>
		<div class="card-block">
			<div class="row">
			    <div class="col-1"><p class="labelName">Company:</p></div>
			    <div class="col-6">
			        <span class="lineName"><?php echo $data['CompanyName'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Date:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $trans['TransactionDate'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-1"><p class="labelName">Name:</p></div>
			    <div class="col-6">
			        <span class="lineName"><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">QuestID:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $data['PatientID'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-1"><p class="labelName">Address:</p></div>
			    <div class="col-6">
			        <span class="lineName"><?php echo $data['Address'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Gender:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $data['Gender'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-1"><p class="labelName">Email:</p></div>
			    <div class="col-6">
			        <span class="lineName"><?php echo $data['Email'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Age:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $data['Age'] ?></span>
			    </div>
			</div>
			<div class="row">
			    <div class="col-1"><p class="labelName">Mobile:</p></div>
			    <div class="col-6">
			        <span class="lineName"><?php echo $data['ContactNo'] ?></span>
			    </div>
			    <div class="col-2 text-right">
			        <p class="labelName">Birthdate:</p>
			    </div>
			    <div class="col">
			        <span class="lineName"><?php echo $data['Birthdate'] ?></span>
			    </div>
			</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6" >
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>MEDICAL HISTORY</b></center></div>
		<div class="card-block" style="height: 4.5in;">
		<div class="row">
			<div class="col"><p class="labelName">Significant Past Illness</p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Asthma</p></div>
			<div class="col-4"><p class="lineName" id="a"><?php echo $his['asth']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Tuberculosis</p></div>
			<div class="col-4"><p class="lineName" id="tb"><?php echo $his['tb']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Diabetes</p></div>
			<div class="col-4"><p class="lineName" id="c"><?php echo $his['dia']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">High Blood Pressure</p></div>
			<div class="col-4"><p class="lineName" id="d"><?php echo $his['hb']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Heart Problem</p></div>
			<div class="col-4"><p class="lineName" id="e"><?php echo $his['hp']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Kidney Problem</p></div>
			<div class="col-4"><p class="lineName" id="f"><?php echo $his['kp']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Abdominal/Hernia</p></div>
			<div class="col-4"><p class="lineName" id="g"><?php echo $his['ab']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Joint/Back/Scoliosis</p></div>
			<div class="col-4"><p class="lineName" id="h"><?php echo $his['jbs']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Psychiatric Problem</p></div>
			<div class="col-4"><p class="lineName" id="i"><?php echo $his['pp']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Migraine/Headache</p></div>
			<div class="col-4"><p class="lineName" id="j"><?php echo $his['mh']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Fainting/Seizure</p></div>
			<div class="col-4"><p class="lineName" id="k"><?php echo $his['fs']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Allergies</p></div>
			<div class="col-4"><p class="lineName" id="l"><?php echo $his['alle']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Cancer/Tumor</p></div>
			<div class="col-4"><p class="lineName" id="m"><?php echo $his['ct']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">Hepatitis</p></div>
			<div class="col-4"><p class="lineName" id="n"><?php echo $his['hep']?></p></div>
		</div>
		<div class="row">
			<div class="col-8"><p class="labelName">STD</p></div>
			<div class="col-4"><p class="lineName" id="o"><?php echo $his['std']?></p></div>
		</div>


		</div>
		</div>
	</div>
	<div class="col-sm-6" >
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>VITAL SIGNS</b></center></div>
		<div class="card-block" style="height: 4.5in;">
		<div class="row">
			<div class="col"><p class="labelName">Height</p></div>
			<div class="col"><p class="lineName" style="text-transform: lowercase;"><?php echo $vit['height']?></p></div>
			<div class="col"><p class="labelName">Weight</p></div>
			<div class="col"><p class="lineName" style="text-transform: lowercase;"><?php echo $vit['weight']?></p></div>
			<div class="col"><p class="labelName">BMI</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['bmi']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">BP</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['bp']?></p></div>
			<div class="col"><p class="labelName">PR</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['pr']?></p></div>
			<div class="col"><p class="labelName">RR</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['rr']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Visual Acuity Uncorrected</p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">OD</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['uod']?></p></div>
			<div class="col"><p class="labelName">OS</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['uos']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Visual Acuity Corrected</p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">OD</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['cod']?></p></div>
			<div class="col"><p class="labelName">OS</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['cos']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Color Vision/Ishihara</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['cv']?></p></div>
		</div>
		<div class="row">
			<div class="col-4"><p class="labelName">Hearing</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['hearing']?></p></div>
		</div>
		<div class="row">
			<div class="col-4"><p class="labelName">Hospitalization</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['hosp']?></p></div>
		</div>
		<div class="row">
			<div class="col-4"><p class="labelName">Operation</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['opr']?></p></div>
		</div>
		<div class="row">
			<div class="col-4"><p class="labelName">Medication</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['pm']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Smoker,Sticks/Year</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['smoker']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Alcoholic Drinker</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['ad']?></p></div>
		</div>
		<div class="row">
			<div class="col"><p class="labelName">Last Menstrual Period</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['lmp']?></p></div>
		</div>
		<div class="row">
			<div class="col-4"><p class="labelName">Others/Notes</p></div>
			<div class="col"><p class="lineName"><?php echo $vit['Notes']?></p></div>
		</div>


		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12" >
		<div class="card" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><center><b>PHYSICAL EXAMINATION</b></center></div>
		<div class="card-block" style="height: 4in;">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col-sm-6"><p class="labelName"></p></div>
					<div class="col-sm-6"><p class="labelName">NORMAL</p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName"></p></div>
					<div class="col-sm-6"><p class="labelName">YES/NO</p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Skin</p></div>
					<div class="col-sm-6"><p class="lineName" id="aa"><?php echo $pex['skin']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Neck</p></div>
					<div class="col-sm-6"><p class="lineName" id="bb"><?php echo $pex['hn']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Chest/Breast/Lungs</p></div>
					<div class="col-sm-6"><p class="lineName" id="cc"><?php echo $pex['cbl']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Cardiac/Heart</p></div>
					<div class="col-sm-6"><p class="lineName" id="dd"><?php echo $pex['ch']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Abdomen</p></div>
					<div class="col-sm-6"><p class="lineName" id="ee"><?php echo $pex['abdo']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Extremities</p></div>
					<div class="col-sm-6"><p class="lineName" id="ff"><?php echo $pex['extre']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-6"><p class="labelName">Others/Notes</p></div>
					<div class="col-sm-6"><p class="lineName"><?php echo $pex['ot']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-11"><p class="para">(Scalp, Eyes, Ears, Nose, Sinuses, Mouth, Throat, Thyroid, Axilla, Back, Anus-rectum, G-U System, Inguinals, Genitals, others)</p></div>
				</div>
			</div>
			<div class="col">
				<div class="row" style="margin-top: 28px;">
					<div class="col"><p class="labelName">FINDINGS</p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line" id="FINDINGS"><?php echo $pex['find']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="line"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-1"><p class="labelName"></p></div>
					<div class="col-sm-11"><p class="lineName"></p></div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-2"><p class="labelName">Physician:</p></div>
					<div class="col-sm-10"><p class="lineName"><?php echo $pex['Doctor']?></p></div>
				</div>
				<div class="row">
					<div class="col-sm-2"><p class="labelName" style="line-height: 1px;">License:</p></div>
					<div class="col-sm-10"><p class="lineName" style="line-height: 1px;"><?php echo $pex['License']?></p></div>
				</div>
			</div>
		</div>
		<hr class="dashedhr">
		<div class="row">
			<div class="col-sm-2"><p class="labelName"></p></div>
			<div class="col-sm-10"><p class="lineName" style="line-height: 1px;">Patient Signature</p></div>
		</div>
		<div class="row">
			<div class="col align-center"><p class="para"><br>I hereby authorized QPD and its physicians to furnish information that the company may need pertaining to my health status and do hereby release them from any and all legal responsibility be doing so, I certify that the medical history is true of my knowledge and any false statement will disqualify me from my employment benefits and claims.</p></div>
		</div>

		</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<img src="assets/QPDFooter.jpg" height="50px" width="100%">
	</div>
</div>
<?php }}}}}} ?>
</div>
</body>
</html>