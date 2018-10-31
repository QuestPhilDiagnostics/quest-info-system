<?php
include_once('../connection.php');
include_once('../classes/pe.php');
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$pe = $pe->fetch_data($id,$tid);

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
<form action="PExamUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Edit Physical Examination</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
						<label>SR No.: </label><br>
						<input type="hidden" name="id" value="<?php echo $pe['PatientID'] ?>">
						<input type="hidden" name="tid" value="<?php echo $pe['TransactionID'] ?>">
						<b><?php echo $pe['PatientID'] ?></b>
					</div>
					<div class="col">
						<label>Name:</label><br>
						<input type="hidden" name="LastName" value="<?php echo $pe['LastName'] ?>">
						<input type="hidden" name="FirstName" value="<?php echo $pe['FirstName'] ?>">
						<input type="hidden" name="MiddleName" value="<?php echo $pe['MiddleName'] ?>">
						<p><b><?php echo $pe['LastName'] ?>,<?php echo $pe['FirstName'] ?> <?php echo $pe['MiddleName'] ?></b></p>
					</div>
					<div class="col">
						<label>Company Name: </label><br>
						<input type="hidden" name="CompanyName" value="<?php echo $pe['CompanyName'] ?>">
						<p><b><?php echo $pe['CompanyName'] ?></b></p>
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
            <b>NOTE: Please reselect all the dropdown boxes for updates.</b>
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
						<textarea name="find" cols="40" rows="5" class="form-control" ><?php echo $pe['find'] ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Others/Notes:</label><br>
					</div>
					<div class="col-6">
						<textarea name="ot" cols="40" rows="5" class="form-control" ><?php echo $pe['ot'] ?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Doctor:</label><br>
					</div>
					<div class="col-4">
						<SELECT class="form-control" name="doc">
							<OPTION value="FROILAN A. CANLAS, M.D.">FROILAN A. CANLAS, M.D.</OPTION>
							<OPTION value=""></OPTION>
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
						</SELECT>
					</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="UPDATE"></center>
				


            </div>
        </div>
    </div>
</div>

</form>
</div>
</body>
</html>
<?php } ?>