<?php
include_once('../connection.php');
include_once('../classes/rad.php');
$rad = new rad;
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $tid = $_GET['tid'];
    $data = $rad->fetch_data($id, $tid);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Radiology Report</title>
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
include_once('radsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Radiology Results</p></center>
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
	<div class="col-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Radiology Report</b></center></div>
            <div class="card-block">
            <div class="row">
            	<div class="col">
            		<b>X-RAY Findings:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<?php echo $data['Comment'] ?>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<b>X-RAY Impression:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<?php echo $data['Impression'] ?>
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		<b>Quality Assurance:</b>
            	</div>
            	<div class="col">
            		<b>Radiologist:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<?php echo $data['QA'] ?>
            	</div>
            	<div class="col">
            		<?php echo $data['Radiologist'] ?>
            	</div>
            </div>
            <hr>
            <center><button type="button" class="btn btn-primary" onclick="document.location = 'XRayEDIT.php?id=<?php echo $data['PatientID']?>&tid=<?php echo $data['TransactionID']?>';">UPDATE RECORD</button></center>
            </div>
        </div>
	</div>
</div>



</div>
<?php } ?>
</body>
</html>