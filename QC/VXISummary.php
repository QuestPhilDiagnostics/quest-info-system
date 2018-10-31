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
        				<th><center>DATE EMAILED</center></th>
        				<th><center>DATE RECEIVED HARDCOPY</center></th>
        				<th><center>DT SOFTCOPY</center></th>
        				<th><center>LOB</center></th>
        				<th><center>REMARKS</center></th>
        				<th><center>CLASS</center></th>
		                <th><center>LAST NAME</center></th>
		                <th><center>FIRST NAME</center></th>
		                <th><center>MIDDLE NAME</center></th>
		                <th><center>AGE</center></th>
		                <th><center>SEX</center></th>
		                <th><center>HT(ft)</center></th>
		                <th><center>WT(kg)</center></th>
		                <th><center>BP(mmHg)</center></th>
		                <th><center>VISUAL ACUITY</center></th>
		                <th><center>URINALYSIS</center></th>
		                <th><center>CBC</center></th>
		                <th><center>CHEST XRAY</center></th>
		                <th><center>DRUG TEST</center></th>
		                <th><center>ALV/SPOT VIEW</center></th>
						<th><center>MEDICAL HISTORY</center></th>
		                <th><center>PAST SURGICAL HISTORY</center></th>
		                <th><center>PHYSICAL EXAMINATION FINDINGS</center></th>
		                <th><center>RECOMMENDATIONS</center></th>
						
					</thead>
					<?php
					include_once('../summarycon.php');
					  $select = "SELECT f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.Meth, l.Tetra, l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find,v.height,v.weight, v.BP, v.opr, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos, v.notes, m.id, m.asth, m.tb, m.dia, m.hb, m.hp, m.kp, m.ab, m.jbs, m.pp, m.mh, m.fs, m.alle, m.ct, m.hep, m.std FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v, qpd_medhis m WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.id = m.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
			           $result = mysqli_query($con, $select);
			           $i = 0;
			           while($row = mysqli_fetch_array($result))
			            {
			                $firnam = $row['firnam'];
			                $midnam = $row['midnam'];
			                $lasnam = $row['lasnam'];
			                $date = $row['date'];
			                $comnam = $row['comnam'];
			                $age = $row['age'];
			                $gen = $row['gen'];
			                $connum = $row['connum'];
			                $CBCOt = $row['CBCOt'];
			                $DT = $row['DT'];
			                $Meth = $row['Meth'];
			                $Tetra = $row['Tetra'];
			                $Preg = $row['PregTest'];
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
			                $UriOt = $row['UriOt'];

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
			                $ht = $row['height'];
			                $wt = $row['weight'];
			                $bp = $row['BP'];
			                $lmp = $row['lmp'];
			                $cv = $row['cv'];
			                $uod = $row['uod'];
			                $uos = $row['uos'];
			                $cod = $row['cod'];
			                $cos = $row['cos'];
			                 if ($uod!="" && $uos!="") 
			                {
			                    $va = $uod;
			                    $va1 = $uos;
			                    $va2 = "UNCORRECTED";
			                }
			                else if ($cod!="" && $cos!="") 
			                {
			                    $va = $cod;
			                    $va1 = $cos;
			                    $va2 = "CORRECTED";
			                }
			                else
			                {
			                    $va = $cod + $uod;
			                    $va1 = $cos + $uod;
			                    $va2 = "";
			                }

			                $opr = $row['opr'];
			                if ($opr == '' || $opr == '-')
			                {
			                	$opr1 = 'NONE';
			                }
			                else
			                	$opr1=$opr;

			                $rec = $row['notes'];



			                $asth = $row['asth'];
							$tb = $row['tb'];
							$dia = $row['dia'];
							$hb = $row['hb'];
							$hp = $row['hp'];
							$kp = $row['kp'];
							$ab = $row['ab'];
							$jbs = $row['jbs'];
							$pp = $row['pp'];
							$mh = $row['mh'];
							$fs = $row['fs'];
							$alle = $row['alle'];
							$ct = $row['ct'];
							$hep = $row['hep'];
							$std = $row['std'];

							$a=array();

							if($asth == "YES")
			                {
			                    array_push($a, "ASTHMA");          
			                }
			                if($tb == "YES")
			                {
			                    array_push($a, "TUBERCOLOSIS");          
			                }
			                if($dia == "YES")
			                {
			                    array_push($a, "DIABETES");          
			                }
			                if($hb == "YES")
			                {
			                    array_push($a, "HIGH BLOOD PRESSURE");          
			                }
			                if($hp == "YES")
			                {
			                    array_push($a, "HEART PROBLEM");          
			                }
			                if($kp == "YES")
			                {
			                    array_push($a, "KIDNEY PROBLEM");          
			                }
			                if($ab == "YES")
			                {
			                    array_push($a, "ABDOMINAL/HERNIA");          
			                }
			                if($jbs == "YES")
			                {
			                    array_push($a, "JOINT/BACK/SCOLIOSIS");          
			                }
			                if($pp == "YES")
			                {
			                    array_push($a, "PSYCHIATRIC PROBLEM");          
			                }
			                if($mh == "YES")
			                {
			                    array_push($a, "MIGRAINE/HEADACHE");          
			                }
			                if($fs == "YES")
			                {
			                    array_push($a, "FAINTING/SEIZURE");          
			                }
			                if($alle == "YES")
			                {
			                    array_push($a, "ALLERGIES");          
			                }
			                if($ct == "YES")
			                {
			                    array_push($a, "CANCER/TUMOR");          
			                }
			                if($hep == "YES")
			                {
			                    array_push($a, "HEPATITIS");          
			                }
			                if($std == "YES")
			                {
			                    array_push($a, "STD");          
			                }
			                if(empty($a))
			                {
			                    array_push($a, "NONE");          
			                }




			                $medhis = implode(", ", $a); 


			        $i++;


					 ?>
					<tr>
						<td ><?php echo $date ?></td>
		                <td ></td>
		                <td ></td>
		                <td ></td>
		                <td ></td>
		                <td ><?php echo $patclass2 ?></td>
		                <td ><?php echo $patclass1 ?></td>
		                <td ><?php echo $lasnam ?></td>
		                <td ><?php echo $firnam ?></td>
		                <td ><?php echo $midnam ?></td>
		                <td ><?php echo $age ?></td>
		                <td ><?php echo $gen ?></td>
		                <td ><?php echo $ht ?></td>
		                <td ><?php echo $wt ?></td>
		                <td ><?php echo $bp ?></td>
		                <td ><?php echo $va ?>,<?php echo $va1 ?> --  (<?php echo $va2 ?>) </td></td>
		                <td ><?php echo $UriOt ?></td>
		                <td ><?php echo $CBCOt ?></td>
		                <td ><?php echo $xray1 ?></td>
		                <td >Meth: <?php echo $Meth ?> Tetra: <?php echo $Tetra ?></td>
		                <td >NONE</td>
		                <td ><?php echo $medhis ?></td>
		                <td ><?php echo $opr1 ?></td>
		                <td ><?php echo $findings1 ?></td>
		                <td ><?php echo $rec ?></td>

							

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