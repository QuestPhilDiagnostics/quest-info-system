 <?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED'];
    $Company = $_GET['Company'];
?>
<html>
	<head>
		<title>Billing</title>
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
                    	<th>Transaction Type</th>
        				<th>Date</th>
                    	<th>SR No.</th>
						<th>Patient Name</th>
						<th>Package</th>
						<th>Amount</th>
						<th>Description</th>
						<th>ID</th>
						<th>Company</th>
						<th>Bill to</th>
						
					</thead>
					<?php
					include_once('../summarycon.php');
					$select = "SELECT * FROM qpd_trans WHERE date >= '$SD' AND date <= '$ED' AND cust_comnam LIKE '$Company%'";
					$result = mysqli_query($con, $select);
					$i=0;
					while($row = mysqli_fetch_array($result))
					{

						$date = $row['date'];
						$No = $row['No'];
						$id = $row['id'];
						$trans_type = $row['trans_type'];
						$cash_name = $row['cash_name'];
						$lasnam = $row['lasnam'];
						$firnam = $row['firnam'];
						$midnam = $row['midnam'];
						$cust_comnam = $row['cust_comnam'];
						$PackName = $row['PackName'];
						$PackList = $row['PackList'];
						$PackPrice = $row['PackPrice'];
						$bill_to = $row['bill_to'];
						$reff = $row['reff'];
						$totalprice = $row['totalprice'];
						$cust_cash = $row['cust_cash'];
						$cust_change = $row['cust_change'];



					 ?>
					<tr>
							<td>
								<?php echo $trans_type; ?>
							</td>
							<td>
								<?php echo $date; ?>
							</td>
							<td>
								<?php echo $id; ?>
							</td>
							<td>
								<?php echo $lasnam; ?>, <?php echo $firnam; ?> <?php echo $midnam; ?>
							</td>
							<td>
								<?php echo $PackName; ?>
							</td>
							<td>
								<?php echo $PackPrice; ?>
							</td>
							<td>
								<?php echo $PackList; ?>
							</td>
							<td>
								<?php echo $No; ?>
							</td>
							<td>
								<?php echo $cust_comnam; ?>
							</td>
							<td>
								<?php echo $bill_to; ?>
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