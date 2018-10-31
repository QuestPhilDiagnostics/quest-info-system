<?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED']; 
    date_default_timezone_set("Asia/Kuala_Lumpur");
  	$printdate = date("Y-m-d H:i:s");
?>
<html>
	<head>
		<title>Result Summary <?php echo $printdate ?></title>
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
        				<th><center>No.</center></th>
        				<th><center>Date</center></th>
		                <th><center>Name</center></th>
		                <th><center>Company</center></th>
		                <th><center>Age</center></th>
		                <th><center>Gender</center></th>
		                <th><center>CBC</center></th>
		                <th><center>F/A</center></th>
		                <th><center>U/A</center></th>
		                <th><center>DT</center></th>
		                <th><center>PT</center></th>
		                <th><center>HBsAg</center></th>                
		                <th><center>XRay</center></th>
		                <th><center>Class</center></th>
		                <th><center>REMARKS</center></th>	
					</thead>
					<?php
					include_once('../summarycon.php'); 
           			$select = "SELECT f.id, f.comnam, f.date, f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.date >= '$SD' AND f.date <='$ED' ORDER BY f.comnam";
           			$result = mysqli_query($con, $select);
		           $i = 0;
		           while($row = mysqli_fetch_array($result))
		            {
		            	$id = $row['id'];
		                $comnam = $row['comnam'];
		                $firnam = $row['firnam'];
		                $midnam = $row['midnam'];
		                $lasnam = $row['lasnam'];
		                $age = $row['age'];
		                $gen = $row['gen'];
		                $date = $row['date'];
		                $CBCOt = $row['CBCOt'];
		                $DT = $row['DT'];
		                $Preg = $row['PregTest'];
		                $HBsAg = $row['HBsAg'];
		                    if ($HBsAg == "NONREACTIVE") 
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
		                        $FecMicro1 = "N/A";
		                    }
		                $UriOt = $row['UriOt'];

		                $xray = $row['imp'];
		                if ($xray == "NORMAL CHEST FINDINGS")
		                {
		                    $xray1 = "NORMAL";
		                }
		                else if ($xray == "-NORMAL CHEST FINDINGS")
		                {
		                    $xray1 = "NORMAL";
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
		        		$i++;
					 ?>
					<tr>
							<td nowrap>
								<?php echo $id; ?>
							</td>
							<td nowrap>
								<?php echo $date; ?>
							</td>
							<td nowrap>
								<?php echo $lasnam; ?>, <?php echo $firnam; ?> <?php echo $midnam; ?>
							</td>
							<td nowrap>
								<?php echo $comnam; ?>
							</td>
							<td nowrap>
								<?php echo $age; ?>
							</td>
							<td nowrap>
								<?php echo $gen; ?>
							</td>
							<td nowrap>
								<?php echo $CBCOt; ?>
							</td>
							<td nowrap>
								<?php echo $FecMicro1; ?>
							</td>
							<td nowrap>
								<?php echo $UriOt;?>
							</td>
							<td nowrap>
								<?php echo $DT;?>
							</td>
							<td nowrap>
								<?php echo $Preg;?>
							</td>
							<td nowrap>
								<?php echo $HBsAg; ?>
							</td>
							<td nowrap>
								<?php echo $xray1; ?>
							</td>
							<td nowrap>
								<?php echo $patclass1; ?>
							</td>
							<td nowrap> 
								<?php echo $note; ?>
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