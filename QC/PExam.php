<?php
include_once('../connection.php');
include_once('../classes/patient.php');
$patient = new Patient;
$patients = $patient->fetch_all();
?>
<html>
	<head>
		<title>Physical Examinations</title>
   		<link href="../sorting/bootstrap.css" rel="stylesheet">
    	<link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="../sorting/dataTables.responsive.css" rel="stylesheet">
	</head>
<body>
<?php
include_once('qcsidebar.php');
?>
<br><br>	
<div class="container-fluid">
	<div class="col-sm-12 ">
	<div class=" panel panel-info">
		<div class="panel-heading">
			<b>PATIENT INFORMATION</b>
		</div>
		<div class="panel-body">	
 			<div class="dataTable_wrapper">
                <table class="table table-hover table-bordered" id="dataTables-example" style="overflow-x: scroll; display: 100%; table-layout: auto">
                    <thead>
                    	<th>Patient Code</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<th></th>
					</thead>
					<?php foreach  ($patients as $patient) {  ?>
					
					<tr>
							<td>
								<?php echo $patient['Code']?>
							</td>
							<td>
								<?php echo $patient['comnam']?>
							</td>	
							<td>
								<?php echo $patient['lasnam']?>,<?php echo $patient['firnam']?> <?php echo $patient['midnam']?> 
							</td>
							<td > 
								<button type="button" class="btn btn-info" onclick="document.location = 'PExamVIEW.php?id=<?php echo $patient['id']?>';">VIEW RECORD</button>
								<button type="button" class="btn btn-info" onclick="document.location = 'PExamADD.php?id=<?php echo $patient['id']?>';">ADD RECORD</button>
							</td>

					</tr>
					<?php  } 	?> 
				</table>
	
</body>
</html> 