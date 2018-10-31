<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sales Report</title>
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
include_once('cashsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Generate Sales Report</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Sales Details</b></center></div>
            <div class="card-block">
            <form action="CashSalesDetails.php" method="get" target="_blank">
            	<div class="row">
            		<div class="col">
	            		<label>Start Date</label>
		                <input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
	            	</div>
            	</div>
            	<center><input type="submit" class="btn btn-success" value="Generate Report" name="gen"></center> 
            	</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>End of the Day Report</b></center></div>
            <div class="card-block">
            <form action="EOTD.php" method="get" target="_blank">
            	<div class="row">
            		<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
	            	</div>
            	</div>
            	<center><input type="submit" class="btn btn-success" value="Generate Report" name="gen"></center> 
            	</form>
            </div>
        </div>
    </div>
</div>




</div>
</body>
</html>