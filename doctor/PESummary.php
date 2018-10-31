<?php
include_once('../connection.php');
include_once('../classes/pe.php');
$pe = new pe;
$pe = $pe->fetch_all();
?>
<html>
	<head>
		<title>List Of Patients</title>
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	</head>
	<style type="text/css">
		td, thead
		{
			white-space: nowrap;
		}
	</style>
<body>
<?php
include_once('doctorsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="50%" style="overflow-x:scroll;">
        			<thead>
						<th>ID</th>
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
						<th>Doctor</th>
						<th>License</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($pe as $pe) {  ?>
					<tr>
							<td>
								<?php echo $pe['PatientID']?>
							</td>
							<td>
								<?php echo $pe['TransactionDate']?>
							</td>
							<td>
								<?php echo $pe['CompanyName']?>
							</td>	
							<td>
								<?php echo $pe['LastName']?>,<?php echo $pe['FirstName']?> <?php echo $pe['MiddleName']?> 
							</td>
							<td>
								<?php echo $pe['skin']?>
							</td>
							<td>
								<?php echo $pe['hn']?>
							</td>
							<td>
								<?php echo $pe['cbl']?>
							</td>
							<td>
								<?php echo $pe['ch']?>
							</td>
							<td>
								<?php echo $pe['abdo']?>
							</td>
							<td>
								<?php echo $pe['extre']?>
							</td>
							<td>
								<?php echo $pe['ot']?>
							</td>
							<td>
								<?php echo $pe['find']?>
							</td>
							<td>
								<?php echo $pe['Doctor']?>
							</td>
							<td>
								<?php echo $pe['License']?>
							</td>
							<td>
								<button type="button" class="btn btn-primary" onclick="document.location = 'PExamEDIT.php?id=<?php echo $pe['PatientID']?>&tid=<?php echo $pe['TransactionID']?>';">UPDATE RECORD</button>
							</td>
							
							
						<?php  }	?>
    </table>
    
</div>


<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       400,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>	
</body>
</html>