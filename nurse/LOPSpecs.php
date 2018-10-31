<?php
include_once('../connection.php');
include_once('../classes/patient.php');
$patient = new Patient;
$patients = $patient->fetch_all();
?>
<html>
	<head>
		<title>List Of Patients</title>
   		<link href="../sorting/bootstrap.css" rel="stylesheet">
    	<link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="../sorting/dataTables.responsive.css" rel="stylesheet">
	</head>
<body>
<?php
include_once('nursesidebar.php');
?>
<br><br>	
<div class="container-fluid">
	<div class="col-sm-12 ">
	<div class=" panel panel-info">
		<div class="panel-heading">
			<b>PATIENT'S SPECIMENS</b>
		</div>
		<div class="panel-body">	
 			<div class="dataTable_wrapper">
                <table class="table table-hover table-bordered" id="dataTables-example" style="overflow-x: scroll; display: 100%; table-layout: auto">
                    <thead>
	                    <th>ID</th>
	                    <th>Last Update</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<th>Urine Specimen</th>
						<th>Stool Specimen</th>
						<th>Blood Specimen</th>
						<th></th>
					</thead>
					
						<?php foreach  ($patients as $patient) {  ?>
					<tr>
							<td>
								<?php echo $patient['id']?>
							</td>
							<td>
								<?php echo $patient['DateUpdate']?>
							</td>
							<td>
								<?php echo $patient['comnam']?>
							</td>	
							<td>
								<?php echo $patient['lasnam']?>,<?php echo $patient['firnam']?> <?php echo $patient['midnam']?> 
							</td>
							<td>
								<?php echo $patient['urispec']?>
							</td>
							<td>
								<?php echo $patient['fecaspec']?>
							</td>
							<td>
								<?php echo $patient['bloodspec']?>
							</td>
							<td>
								<button type="button" class="btn btn-info" onclick="document.location = 'UpdateSpec.php?id=<?php echo $patient['id']?>';">Update Specimens</button>
								
							</td>
							<?php  } 	?> 
					</tr>
				</table>


    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script src="../sorting/jquery.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../sorting/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../sorting/jquery.dataTables.min.js"></script>
    <script src="../sorting/dataTables.bootstrap.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

	
</body>
</html> 