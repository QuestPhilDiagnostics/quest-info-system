<?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED']; 
?>
<html>
	<head>
		<title>Sales Details</title>
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
include_once('accountsidebar.php');
?>
<div class="container" style="margin-top: 10px;">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
        				<th>Date</th>
                    	<th>SR No.</th>
                    	<th>Transaction Type</th>
						<th>Cashier</th>
						<th>PatientID</th>
						<th>Name</th>
						<th>Company</th>
						<th>Package</th>
						<th>Description</th>
						<th>Price</th>
						<th>Bill To</th>
						<th>Referred By</th>
						<th>Amount Availed</th>
						<th>Cash</th>
						<th>Change</th>
						
					</thead>
					<?php
					include_once('../summarycon.php');
					$select = "SELECT * FROM qpd_trans t, qpd_patient p WHERE t.TransactionDate >= '$SD' AND t.TransactionDate <= '$ED' AND t.TransactionType = 'ACCOUNT' AND p.PatientID = t.PatientID";
					$result = mysqli_query($con, $select);
					$i=0;
					while($row = mysqli_fetch_array($result))
					{



					 ?>
					<tr>
							<td nowrap>
								<?php echo $row['TransactionDate']; ?>
							</td>
							<td>
								<?php echo $row['TransactionID']; ?>
							</td>
							<td>
								<?php echo $row['TransactionType']; ?>
							</td>
							<td>
								<?php echo $row['Cashier']; ?>
							</td>
							<td>
								<?php echo $row['PatientID']; ?>
							</td>
							<td nowrap>
								<?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?> <?php echo $row['MiddleName']; ?>
							</td>
							<td>
								<?php echo $row['CompanyName'];?>
							</td>
							<td>
								<?php echo $row['ItemName'];?>
							</td>
							<td>
								<?php echo $row['ItemDescription'];?>
							</td>
							<td>
								<?php echo $row['ItemPrice'];?>
							</td>
							<td>
								<?php echo $row['Biller'];?>
							</td>
							<td>
								<?php echo $row['Referral'];?>
							</td>
							<td>
								<?php echo $row['GrandTotal'];?>
							</td>
							<td>
								<?php echo $row['PaidIn'];?>
							</td>
							<td>
								<?php echo $row['PaidOut'];?>
							</td>

							

					</tr>
					<?php  } } 	?> 
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