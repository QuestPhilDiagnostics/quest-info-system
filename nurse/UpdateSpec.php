<?php
include_once('../connection.php');
include_once('../classes/patient.php');
$patient = new Patient;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $patient->fetch_data($id);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration</title>
	<link rel="stylesheet" media="all" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
</style>

<body >
<?php
include_once('nursesidebar.php');
?>
<div class="container">
<center><h3><b> UPDATE SPECIMEN</b></h3></center><br>
<div class="col-sm-12 col-sm-offset-0">
	<div class="panel panel-info" style="border-radius: 0px;">
	<div class="panel-heading"><b>Patient Specimens</b></div>
	<div class="panel-body">
		<div class="form-group">
				<div class="col-sm-12 ">
					<div class="col-sm-3 " >
						Company Name:
					</div>
					<div class="col-sm-3 ">
						First Name:
					</div>
					<div class="col-sm-3 ">
						Middle Name:
					</div>
					<div class="col-sm-3 ">
						Last Name:
					</div>
				</div>

				<div class="col-sm-12 ">
					<div class="col-sm-3 " style="padding-left: 18px" name="comnam" value="<?php echo $data['comnam'] ?>"><?php echo $data['comnam'] ?></div>
					<div class="col-sm-3 " style="padding-left: 18px" name="firnam" value="<?php echo $data['firnam'] ?>"><?php echo $data['firnam'] ?></div>
					<div class="col-sm-3 " style="padding-left: 18px" name="midnam" value="<?php echo $data['midnam'] ?>"><?php echo $data['midnam'] ?></div>
					<div class="col-sm-3 " style="padding-left: 18px" name="lasnam" value="<?php echo $data['lasnam'] ?>"><?php echo $data['lasnam'] ?></div>
				</div>
				
				<div class="col-sm-12 " style="padding-bottom: 10px;"><hr></div>
				<div class="col-sm-12 "><center>Date Last Updated:<b><?php echo $data['DateUpdate'] ?></b></center></div>
				<form action="UpdateSpecUPDATE.php" method="post" autocomplete="off" enctype="multipart/form-data">	
				<div class="col-sm-12 " style="padding-bottom: 10px;"><hr></div>


				<div class="col-sm-12">
						<div class="col-sm-4 ">
							URINE
							  <label><input type="text" name="urispec" value="<?php echo $data['urispec'] ?>"></label>
						</div>
						<div class="col-sm-4">
							STOOL
							  <label><input type="text" name="fecaspec" value="<?php echo $data['fecaspec'] ?>"></label>
						</div>
						<div class="col-sm-4">
							BLOOD
							  <label><input type="text" name="bloodspec" value="<?php echo $data['bloodspec'] ?>"></label>
						</div>
						<input type="text" class="hidden"  name="id" value="<?php echo $data['id'] ?>">
				</div>
		</div>
		<div class="col-sm-12 " style="padding-bottom: 10px;"><hr></div>
<div class="col-sm-12" style="padding-left: 0px">
	<center><input type="submit" class="btn btn-success" value="UPDATE"></center> 
</div>
</form>
</div>
<?php } ?>
</body>
</html>