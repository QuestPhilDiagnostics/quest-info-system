<?php
include_once('../connection.php');
include_once('../classes/pe.php');
$pe = new pe;
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $tid = $_GET['tid'];
    $pe = $pe->fetch_data($id, $tid);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Physical Examination</title>
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
include_once('doctorsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Physical Examination Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="LabResultsINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col col-md-auto">
						<label>SR No.: </label><br>
						<input type="hidden" name="PatientID" value="<?php echo $pe['PatientID'] ?>">
                        <input type="hidden" name="TransactionID" value="<?php echo $pe['TransactionID'] ?>">
						<b><?php echo $pe['PatientID'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<p><b><?php echo $pe['LastName'] ?>,<?php echo $pe['FirstName'] ?> <?php echo $pe['MiddleName'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<p><b><?php echo $pe['CompanyName'] ?></b></p>
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
                        <p style="padding-left: 20px;"><b><?php echo $pe['Doctor']?><br></b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="col-12 text-right">License:</label><br>
                    </div>
                    <div class="col">
                        <p style="padding-left: 20px;"><b><?php echo $pe['License']?><br></b></p>
                    </div>
                </div>
            <hr>
            <center><button type="button" class="btn btn-primary" onclick="document.location = 'PExamEDIT.php?id=<?php echo $pe['id']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
	</div>
</div>
<center><button type="button" class="btn btn-primary" onclick="document.location = 'PExam.php';">BACK</button></center>


</div>
<?php } ?>
</body>
</html>