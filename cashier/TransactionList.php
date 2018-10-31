<?php
include_once('../connection.php');
include_once('../classes/trans.php');
$trans = new trans;
$trans = $trans->fetch_all();
?>
<html>
	<head>
		<title>Transactions Lists</title>
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
include_once('cashsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
						<th>Date/Time</th>
						<th>ID</th>
						<th>Transaction Type</th>
						<th>Transaction No.</th>
						<th>Customer Name</th>
						<th>Company</th>
						<th>Age/Gender</th>
						<th>Contact No.</th>
						<th>Package</th>
						<th>ACTION</th>
</thead>
					
						<?php foreach  ($trans as $trans) {  ?>
					<tr>
							<td>
								<?php echo $trans['TransactionDate']?>
							</td>
							<td>
								<?php echo $trans['TransactionID']?>
							</td>
							<td>
								<?php echo $trans['TransactionType']?>
							</td>
							<td>
								<?php echo $trans['PatientID']?>
							</td>	
							<td nowrap>
								<?php echo $trans['LastName']?>,<?php echo $trans['FirstName']?> <?php echo $trans['MiddleName']?> 
							</td>
							<td>
								<?php echo $trans['CompanyName']?>
							</td>
							<td>
								<?php echo $trans['Age']?>/<?php echo $trans['Gender']?>
							</td>
							<td>
								<?php echo $trans['ContactNo']?>
							</td>
							<td nowrap>
								<b><?php echo $trans['ItemName']?></b> (<?php echo $trans['ItemDescription']?>)
							</td>
							<td > 
								<button type="button" class="btn btn-primary" onclick="document.location = 'ForREPrint.php?id=<?php echo $trans['TransactionID']?>&patid=<?php echo $trans['PatientID']?>';">Reprint Receipt</button>
							</td>


							<?php  }	?> 
					</tr>

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