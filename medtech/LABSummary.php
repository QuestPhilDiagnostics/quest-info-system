<?php
include_once('../connection.php');
include_once('../classes/lab.php');
$lab = new lab;
$lab= $lab->fetch_all();


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
include_once('labsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="50%" style="overflow-x:scroll;">
        			<thead>
						<th>ID</th>
						<th>Transaction ID</th>
						<th>Last Date Updated</th>
						<th>Company Name</th>
						<th>Patient Name</th>
						<th>White Blood Cells</th>
						<th>Hemoglobin</th>
						<th>Hematocrit</th>
						<th>Neutrophils</th>
						<th>Lymphocytes</th>
						<th>Monocytes</th>
						<th>CBC Notes</th>
						<th>Methamphethamine</th>
						<th>Tetrahydrocanabinol</th>
						<th>DT Result</th>
						<th>HBsAg</th>
						<th>Pregnancy Test</th>
						<th>Others/Notes</th>
						<th>Fecalysis Color</th>
						<th>Fecalysis Consistency</th>
						<th>Fecalysis Microscopic Findings</th>
						<th>Others/Notes</th>
						<th>Unrinalysis Color</th>
						<th>Unrinalysis Transparency</th>
						<th>Unrinalysis pH</th>
						<th>Unrinalysis Sp. Gravity</th>
						<th>Unrinalysis Protein</th>
						<th>Unrinalysis Glucose</th>
						<th>RBC</th>
						<th>WBC</th>
						<th>E.Cells</th>
						<th>Amorphous</th>
						<th>Bacteria</th>
						<th>M.Threads</th>
						<th>CaOx</th>
						<th>Urinalysis Notes</th>
						<th>Received By:</th>
						<th>Printed By:</th>
						<th>Action</th>
					</thead>
					
					<?php foreach  ($lab as $lab) {  ?>
					
					<tr>
							<td>
								<?php echo $lab['PatientID']?>
							</td>
							<td>
								<?php echo $lab['TransactionID']?>
							</td>
							<td>
								<?php echo $lab['TransactionDate']?>
							</td>
							<td>
								<?php echo $lab['CompanyName']?>
							</td>	
							<td>
								<?php echo $lab['LastName']?>,<?php echo $lab['FirstName']?> <?php echo $lab['MiddleName']?> 
							</td>
							<td>
								<?php echo $lab['WhiteBlood']?>
							</td>
							<td>
								<?php echo $lab['Hemoglobin']?>
							</td>
							<td>
								<?php echo $lab['Hematocrit']?>
							</td>
							<td>
								<?php echo $lab['Neutrophils']?>
							</td>
							<td>
								<?php echo $lab['Lymphocytes']?>
							</td>
							<td>
								<?php echo $lab['Monocytes']?>
							</td>
							<td>
								<?php echo $lab['CBCOt']?>
							</td>
							<td>
								<?php echo $lab['Meth']?>
							</td>
							<td>
								<?php echo $lab['Tetra']?>
							</td>
							<td>
								<?php echo $lab['DT']?>
							</td>
							<td>
								<?php echo $lab['HBsAg']?>
							</td>
							<td>
								<?php echo $lab['PregTest']?>
							</td>
							<td>
								<?php echo $lab['SeroOt']?>
							</td>
							<td>
								<?php echo $lab['FecColor']?>
							</td>
							<td>
								<?php echo $lab['FecCon']?>
							</td>
							<td>
								<?php echo $lab['FecMicro']?>
							</td>
							<td>
								<?php echo $lab['FecOt']?>
							</td>
							<td>
								<?php echo $lab['UriColor']?>
							</td>
							<td>
								<?php echo $lab['UriTrans']?>
							</td>
							<td>
								<?php echo $lab['UriPh']?>
							</td>
							<td>
								<?php echo $lab['UriSp']?>
							</td>
							<td>
								<?php echo $lab['UriPro']?>
							</td>
							<td>
								<?php echo $lab['UriGlu']?>
							</td>
							<td>
								<?php echo $lab['RBC']?>
							</td>
							<td>
								<?php echo $lab['WBC']?>
							</td>
							<td>
								<?php echo $lab['ECells']?>
							</td>
							<td>
								<?php echo $lab['Amorph']?>
							</td>
							<td>
								<?php echo $lab['Bac']?>
							</td>
							<td>
								<?php echo $lab['MThreads']?>
							</td>
							<td>
								<?php echo $lab['CoAx']?>
							</td>
							<td>
								<?php echo $lab['UriOt']?>
							</td>
							<td>
								<?php echo $lab['Received']?>
							</td>
							<td>
								<?php echo $lab['Printed']?>
							</td>
							<td>
								<button type="button" class="btn btn-primary" onclick="document.location = 'LabIndustrialEDIT.php?id=<?php echo $lab['PatientID']?>&tid=<?php echo $lab['TransactionID']?>';">UPDATE RECORD</button>
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