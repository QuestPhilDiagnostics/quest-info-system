<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registration</title>
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
					<form action="RegistrationINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
						<label for=""> Company Name:</label>
						<input type="text"  name="comnam" class="form-control" value=""  required />
						<label for="">Applied Position:</label>
						<input type="text" name="ap" class="form-control" value=""  required />
						<label for="">First Name:</label>
						<input type="text"  name="fn" class="form-control"  required />
						<label for=""> Middle Name:</label>
						<input type="text"  name="mn" class="form-control" />
						<label for=""> Last Name:</label>
						<input type="text"  name="ln"  class="form-control" required />
						<label for="">Address:</label>
						<input type="text"  name="address" class="form-control" value="-"  required />
					</div>
					<div class="col">
						<label for=""> Birth Date:</label>
						<input type="text"  name="bd" class="form-control" placeholder="MM-DD-YYYY" required />
						<label for="">Age:</label>
						<input type="text"  name="age" class="form-control" required />
						<label for="">Gender:</label>
						<input type="text"  name="gen" class="form-control" required />	
						<label for="">Contact No.:</label>
						<input type="text"  name="cn" class="form-control" value="-"  />	
						<label for="">Email Address:</label>
						<input type="text"  name="ea" class="form-control" value="-" />
						<label for="">Comment:</label>
						<input type="text"  name="comment" class="form-control" value="" />
					</div>
				</div>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>SPECIMEN</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col">
            			<div class="checkbox">
						  <label><input type="checkbox" name="urispec" value="PASSED"><b>URINE</b></label>
						</div>
            		</div>
            		<div class="col">
						<div class="checkbox">
						  <label><input type="checkbox" name="fecaspec" value="PASSED"><b>STOOL</b></label>
						</div>            			
            		</div>
            		<div class="col">
            			<div class="checkbox">
						  <label><input type="checkbox" name="bloodspec" value="PASSED"><b>BLOOD</b></label>
						</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12" style="margin: 10px;">
	<center><input type="submit" class="btn btn-primary" value="REGISTER"></center> 
</div>
</form>
</div>
</body>
</html>