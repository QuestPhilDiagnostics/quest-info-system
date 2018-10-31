<?php
include_once('../connection.php');
include_once('../classes/Allpatient.php');
$patient = new Patient;
$patients = $patient->fetch_all();
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
<body>
<?php
include_once('qcsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
                    	<th>ID</th>
                    	<th nowrap>Last Update</th>
						<th>Company Name</th>
						<th nowrap>Patient Name</th>
						<th>Action</th>
					</thead>
					<?php foreach  ($patients as $patient) {  ?>
					
					<tr>
							<td>
								<?php echo $patient['id']?>
							</td>
							<td>
								<?php echo $patient['date']?>
							</td>
							<td>
								<?php echo $patient['comnam']?>
							</td>	
							<td nowrap>
								<?php echo $patient['lasnam']?>,<?php echo $patient['firnam']?> <?php echo $patient['midnam']?> 
							</td>
							<td > 
								<button type="button" class="btn btn-info" onclick="document.location = '../PEReport.php?id=<?php echo $patient['id']?>';">View Certificate</button>
							</td>

					</tr>
					<?php  } 	?> 
    </table>
</div>


<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
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