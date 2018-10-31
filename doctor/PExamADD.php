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
	<title>Physical Examinations</title>
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
<form action="PExamINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Physical Examination</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
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
            <div class="card-header card-inverse card-info"><center><b>Physical Examination</b></center></div>
            <div class="card-block">
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
						<textarea name="find" cols="40" rows="5" class="form-control" ></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Others/Notes:</label><br>
					</div>
					<div class="col-6">
						<textarea name="ot" cols="40" rows="5" class="form-control" ></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-3 col-form-label text-right">
						<label>Doctor:</label><br>
					</div>
					<div class="col-4">
						<SELECT class="form-control" name="doc">
							<OPTION value="FROILAN A. CANLAS, M.D.">FROILAN A. CANLAS, M.D.</OPTION>
							<OPTION value="JOHN TANGLAO, M.D.">JOHN TANGLAO, M.D.</OPTION>
							<OPTION value="MARIGOLD A. SIBAL, M.D.">MARIGOLD A. SIBAL, M.D.</OPTION>
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
							<OPTION value="104200">104200</OPTION>
						</SELECT>
					</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="SUBMIT"></center>
				


            </div>
        </div>
    </div>
</div>

</form>
</div>
<?php }} ?>
</body>
</html>