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
	<title>UPDATE INFO</title>
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
		font-weight: bolder;
	}
	.card-block input, 
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
</style>

<body >
<?php
include_once('nursesidebar.php');
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
					<div class="col">
					<form action="PatientInfoUpdateUPDATE.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $data['PatientID']?>" name="id"/>
						<label for=""> Company Name:</label>
						<input type="text"  name="comnam" class="form-control" value="<?php echo $data['CompanyName']?>"  required />
						<label for="">Applied Position:</label>
						<input type="text" name="ap" class="form-control" value="<?php echo $data['Position']?>"  required />
						<label for="">First Name:</label>
						<input type="text"  name="fn" class="form-control" value="<?php echo $data['FirstName']?>" required />
						<label for=""> Middle Name:</label>
						<input type="text"  name="mn" class="form-control" value="<?php echo $data['MiddleName']?>" />
						<label for=""> Last Name:</label>
						<input type="text"  name="ln"  class="form-control" value="<?php echo $data['LastName']?>" required />
						<label for="">Address:</label>
						<input type="text"  name="address" class="form-control" value="<?php echo $data['Address']?>"  required />
					</div>
					<div class="col">
						<label for=""> Birth Date:</label>
						<input type="text"  name="bd" class="form-control" placeholder="MM-DD-YYYY" value="<?php echo $data['Birthdate']?>" required />
						<label for="">Age:</label>
						<input type="text"  name="age" class="form-control" value="<?php echo $data['Age']?>" required />
						<label for="">Gender:</label>
						<input type="text"  name="gen" class="form-control" value="<?php echo $data['Gender']?>" required />	
						<label for="">Contact No.:</label>
						<input type="text"  name="cn" class="form-control" value="<?php echo $data['ContactNo']?>"  />	
						<label for="">Email Address:</label>
						<input type="text"  name="ea" class="form-control" value="<?php echo $data['Email']?>" />
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12" style="margin: 10px;">
	<center><input type="submit" class="btn btn-primary" value="Submit"></center> 
</div>
</form>
</div>
</body>
</html>
<?php } ?>