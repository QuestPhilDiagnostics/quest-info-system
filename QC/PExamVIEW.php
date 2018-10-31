<?php
include_once('../connection.php');
include_once('../classes/pe.php');
$pe = new pe;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $pe->fetch_data($id);
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
include_once('qcsidebar.php');
?>
<br><br>	
<div class="container-fluid">
	<div class="col-sm-12 ">
	<div class=" panel panel-info">
		<div class="panel-heading">
			<b>PHYSICAL EXAMINATIONS</b>
		</div>
		<div class="panel-body">	
 			<div class="dataTable_wrapper">
                <table class="table table-hover table-bordered" id="dataTables-example" style="overflow-x: scroll; display: block; table-layout: auto">
                    <thead>
						<th>Last Date Updated</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<th>Skin</th>
						<th>Head and Neck</th>
						<th>Chest/Breast/Lungs</th>
						<th>Cardiac/Heart</th>
						<th>Abdomen</th>
						<th>Extremities</th>
						<th>Others/Notes</th>
						<th>Findings</th>
						<th></th>
					</thead>
					<tr>
							<td>
								<?php echo $data['date']?>
							</td>
							<td>
								<?php echo $data['comnam']?>
							</td>	
							<td>
								<?php echo $data['lasnam']?>,<?php echo $data['firnam']?> <?php echo $data['midnam']?> 
							</td>
							<td>
								<?php echo $data['skin']?>
							</td>
							<td>
								<?php echo $data['hn']?>
							</td>
							<td>
								<?php echo $data['cbl']?>
							</td>
							<td>
								<?php echo $data['ch']?>
							</td>
							<td>
								<?php echo $data['abdo']?>
							</td>
							<td>
								<?php echo $data['extre']?>
							</td>
							<td>
								<?php echo $data['ot']?>
							</td>
							<td>
								<?php echo $data['find']?>
							</td>
							<td>
								<button type="button" class="btn btn-info" onclick="document.location = 'PExamEDIT.php?id=<?php echo $data['id']?>';">UPDATE RECORD</button>
							</td>
							
							
						<?php  }	?>
	
					</tr>
				</table>
				<button type="button" class="btn btn-info" onclick="document.location = 'PExam.php';">BACK</button>


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