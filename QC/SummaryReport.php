<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Summary Report</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		margin-top: 0px;
		padding-left: 0px;
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
		font-size: 12px;
		font-weight: bold;
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
include_once('qcsidebar.php');
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Generate Everyday Summary Report</b></center></div>
            <div class="card-block">
            <form action="SummaryPrint.php" method="get" target="_blank">
				<b><center>NOTE: This section is for Generating PDF through browser for daily updating per company.</center></b>
            	<div class="row">
					<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
	            	</div>
					<div class="col">
						<label>Company Name:</label>
		                <SELECT name="Company" style="width: 200px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" required>
						<OPTION selected="" value="">Select Company..</OPTION>
		                <?php 
		                include_once('../summarycon.php');
		                $select = "SELECT DISTINCT comnam FROM qpd_form ORDER BY comnam ASC";
				        $result = mysqli_query($con, $select);
				        $i=0;
				        while($row = mysqli_fetch_array($result))
				        {
				        	echo "<option value='$row[0]'> $row[0] </option>";
						}?>
			            </SELECT>
					</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="Generate" name="gen"></center> 
			</form>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>VXI SUMMARY ON EXCEL FILE</b></center></div>
            <div class="card-block">
            <form action="VXISummary.php" method="get" target="_blank">
            	<div class="row">
					<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
	            	</div>
					<div class="col">
						<label>Company Name:</label>
		                <SELECT name="Company" style="width: 200px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" required>
						<OPTION selected="" value="">Select Company..</OPTION>
		                <?php 
		                include_once('../summarycon.php');
		                $select = "SELECT DISTINCT comnam FROM qpd_form ORDER BY comnam ASC";
				        $result = mysqli_query($con, $select);
				        $i=0;
				        while($row = mysqli_fetch_array($result))
				        {
				        	echo "<option value='$row[0]'> $row[0] </option>";
						}?>
			            </SELECT>
					</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="Generate" name="gen"></center> 
			</form>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Generate Billing Report</b></center></div>
            <div class="card-block">
            <form action="Billing.php" method="get" target="_blank">
            <b><center>NOTE: This section is for Generating EXCEL/PDF through browser for billing per company.</center></b>
            	<div class="row">
					<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
	            	</div>
					<div class="col">
						<label>Company Name:</label>
		                <SELECT name="Company" style="width: 200px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control">
						<OPTION selected="" value="">Select Company..</OPTION>
		                <?php 
		                include_once('../summarycon.php');
		                $select = "SELECT DISTINCT comnam FROM qpd_form ORDER BY comnam ASC";
				        $result = mysqli_query($con, $select);
				        $i=0;
				        while($row = mysqli_fetch_array($result))
				        {
				        	echo "<option value='$row[0]'> $row[0] </option>";
						}?>
			            </SELECT>
					</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="Generate" name="gen"></center> 
			</form>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>END OF THE DAY SUMMARY</b></center></div>
            <div class="card-block">
            <form action="EOTDS.php" method="get" target="_blank">
            	<div class="row">
					<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
	            	</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="Generate" name="gen"></center> 
			</form>
            </div>
        </div>
    </div>	
</div>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>RADIOLOGIST PF</b></center></div>
            <div class="card-block">
            <form action="PF.php" method="get" target="_blank">
            	<div class="row">
					<div class="col">
	            		<label>Start Date</label>
	                	<input class="form-control" type="text" name="SD" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
		            </div>
	            	<div class="col">
	            		<label>End Date</label>
	                	<input class="form-control" type="text" name="ED" style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px;" class="form-control" placeholder="yyyy-mm-dd hh:mm:ss" required>
	            	</div>
				</div>
				<center><input type="submit" class="btn btn-primary" value="Generate" name="gen"></center> 
			</form>
            </div>
        </div>
    </div>	
</div>






</div>
</body>
</html>