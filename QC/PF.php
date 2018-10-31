<?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED']; 
?>
<html>
	<head>
		<title>DOCTORS PF Summary</title>
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
        				<th><center>Date</center></th>
        				<th><center>SR#</center></th>
		                <th><center>Company</center></th>
		                <th><center>Name</center></th>
		                <th><center>Doctor</center></th>
					</thead>
					<?php
					include_once('../summarycon.php'); 
           			$select = "SELECT f.comnam, f.date, f.firnam, f.midnam, f.lasnam, c.id , x.rad FROM qpd_form f, qpd_xray x, qpd_trans c WHERE f.id=x.id AND f.id=c.No AND f.date >= '$SD' AND f.date <='$ED' ORDER BY f.date";
           			$result = mysqli_query($con, $select);
		           $i = 0;
		           while($row = mysqli_fetch_array($result))
		            {
		                $comnam = $row['comnam'];
		                $firnam = $row['firnam'];
		                $midnam = $row['midnam'];
		                $lasnam = $row['lasnam'];
		                $date = $row['date'];
		                $sr = $row['id'];
		                $rad = $row['rad'];
		        		$i++;

					 ?>
					<tr>
							<td>
								<?php echo $date; ?>
							</td>
							<td nowrap>
								<?php echo $sr; ?>
							</td>
							<td>
								<?php echo $comnam; ?>
							</td>
							<td nowrap>
								<?php echo $lasnam; ?>, <?php echo $firnam; ?> <?php echo $midnam; ?>
							</td>
							<td>
								<?php echo $rad; ?>
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