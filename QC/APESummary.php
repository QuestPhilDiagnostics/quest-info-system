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
        				<th><center>DATE</center></th>
        				<th><center>COMPANY</center></th>
		                <th><center>NAME</center></th>
		                <th><center>CHEST X-RAY</center></th>
		                <th><center>URINALYSIS</center></th>
		                <th><center>FECALYSIS</center></th>
		                <th><center>CBC</center></th>
		                <th><center>HBSAG</center></th>
		                <th><center>DRUG TEST</center></th>
		                <th><center>MEDICAL CLASSIFICATION</center></th>
		                <th><center>REMARKS</center></th>
						
					</thead>
					<?php
					include_once('../summarycon.php');
					 $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, l.CBCOt, l.FecMicro, l.FecOt, l.UriOt, l.HBsAg,l.DT, x.imp, c.Patclass, c.ot, p.find FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
					$result = mysqli_query($con, $select);
					$i=0;
					while($row = mysqli_fetch_array($result))
					{

						 	$firnam = $row['firnam'];
			                $midnam = $row['midnam'];
			                $lasnam = $row['lasnam'];
			                $date = $row['date'];
			                $comnam = $row['comnam'];
			                $CBCOt = $row['CBCOt'];
			                $FecMicro = $row['FecMicro'];
			                if ($FecMicro == "NO INTESTINAL PARASITE SEEN") 
			                    {
			                        $FecMicro1="NIPS";
			                    }
			                    else if ($FecMicro == "Presence of:") 
			                    {
			                        $FecMicro1=$row['FecOt'];
			                    }
			                    else
			                    {
			                        $FecMicro1 = "NO SPECIMEN";
			                    }
			                $DT = $row['DT'];
			                $UriOt = $row['UriOt'];
			                $HBsAg = $row['HBsAg'];
		                    if ($HBsAg == "NON-REACTIVE") 
		                    {
		                        $HBsAg1="NR";
		                    }
		                    else if ($HBsAg == "NONREACTIVE") 
		                    {
		                        $HBsAg1="NR";
		                    }
		                    else if ($HBsAg == "REACTIVE") 
		                    {
		                        $HBsAg1="R";
		                    }
		                    else
		                    {
		                        $HBsAg1 = "N/A";
		                    }
			                $xray = $row['imp'];
			                if ($xray == "NORMAL CHEST FINDINGS" || $xray == "CONSIDERED NORMAL CHEST PA")
			                {
			                    $xray1 = "NORMAL";
			                }
			                else if ($xray == "-NORMAL CHEST FINDINGS")
			                {
			                    $xray1 = "NORMAL";
			                }
			                else if ($xray == "")
			                {
			                    $xray1 = "NO XRAY";
			                }
			                else
			                {
			                    $xray1 = $row['imp'];
			                }

			                $patclass = $row['Patclass'];

			                $note = $row['ot'];
			                if ($patclass == "CLASS A - Physically Fit")
			                {
			                    $patclass1 = "Class A";
			                    $patclass2 = "FIT TO WORK";
			                }
			                else if ($patclass == "CLASS B - Physically Fit but with minor condition curable within a short period of time, that will not adversely affect the workers efficiency")
			                {
			                    $patclass1 = "Class B";
			                    $patclass2 = "FIT TO WORK";
			                }
			                else if ($patclass =="CLASS C - With abnormal findings generally not accepted for employment.") 
			                {
			                    $patclass1 = "Class C";
			                    $patclass2 = "Unemployable";
			                } 
			                else if ($patclass =="CLASS D - Unemployable") 
			                {
			                    $patclass1 = "Class D";
			                    $patclass2 = "Unemployable";
			                }
			                else
			                {
			                    $patclass1 = "PENDING";
			                    $patclass2 = $note;
			                }

			                $findings = $row['find'];
			                if ($findings == "")
			                {
			                    $findings1 = "NORMAL";
			                }
			                else
			                {
			                    $findings1 = $row['find'];
			                }



					 ?>
					<tr>
							<td>
								<?php echo $date; ?>
							</td>
							<td>
								<?php echo $comnam; ?>
							</td>
							<td>
								<?php echo $lasnam; ?>, <?php echo $firnam; ?> <?php echo $midnam; ?>
							</td>
							<td>
								<?php echo $xray1; ?>
							</td>
							<td>
								<?php echo $UriOt; ?>
							</td>
							<td>
								<?php echo $FecMicro1; ?>
							</td>
							<td>
								<?php echo $CBCOt; ?>
							</td>
							<td>
								<?php echo $HBsAg1; ?>
							</td>
							<td>
								<?php echo $DT; ?>
							</td>
							<td>
								<?php echo $patclass1; ?>
							</td>
							<td>
								<?php echo $patclass2; ?>
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