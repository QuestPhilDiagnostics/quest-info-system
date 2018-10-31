<?php
if (isset($_GET['gen']))
{
    $SD = $_GET['SD'];
    $ED = $_GET['ED'];
    $Company = $_GET['Company'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Summary Report</title>
    <link rel="stylesheet" media="all" type="text/css" href="../source/bootstrap3.3.7/css/bootstrap.min.css>">
    <link href="../sorting/bootstrap.css" rel="stylesheet">
    <link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../sorting/dataTables.responsive.css" rel="stylesheet">
</head>

<style type="text/css" media="all">
    .form-control
    {
        margin-bottom: 10px;
        width:300px;
    }


</style>
<body >
<div class="container-fluid">
<center><p style="font-family: 'Century Gothic'; font-size: 18px;"><b>Summary Report</b></p></center>
<center><p style="font-family: 'Century Gothic'; font-size: 20px;"><b><?php echo $Company;?></b></p></center><br>
<div class="col-sm-12" style="padding-left: 0px">
    <div class="dataTable_wrapper">
    <table class="table table-bordered" style="display: 100%; table-layout: auto; font-family:'Century Gothic'; ">
<?php
include_once('../summarycon.php');
if ($Company == 'ALORICA' || $Company == 'ALORICA TMO' || $Company == 'ALORICA UPS') 
{
   echo "<thead >
            <tr>
                <th><center>DATE</center></th>
                <th><center>COMPANY</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE/SEX</center></th>                
                <th><center>X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>MED.CERT.</center></th>
                <th><center>REMARKS</center></th>
                <th><center>ACCOUNT</center></th>
                <th><center>CONTACT #</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$comnam</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td>$age/$gen</td>
                <td>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$CBCOt</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
                <td nowrap>$comnam</td>
                <td nowrap>$connum</td>
            </tr>
        </tbody>";


        } //End of While
} // End of If ALORICA

else if ($Company == 'MAXIM NANOX' || $Company == 'MAXIM DE HUMANA' || $Company == 'MAXIM' || $Company == 'JFCF'|| $Company == 'JCFC') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>                
                <th><center>LMP</center></th>
                <th><center>ISHIHARA</center></th>
                <th><center>V.ACUITY</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>HBsAg</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>MEDICAL EVALUATION BY DOCTOR</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, c.date, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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


        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td>$age</td>
                <td nowrap>$lmp</td>
                <td>$cv</td>
                <td nowrap>$va,$va1--($va2)</td>
                <td>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$HBsAg1</td>
                <td nowrap>$DT</td>
                <td>$patclass1</td>
                <td nowrap>$findings1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";




        } //End of While
} // End of If MAXIM
else if ($Company == 'VXI') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
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



                ";

           
           $select = "SELECT f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.Meth, l.Tetra, l.DT,l.PregTest, x.imp, c.Patclass, c.ot, c.date, p.find,v.height,v.weight, v.BP, v.opr, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos, v.notes, m.id, m.asth, m.tb, m.dia, m.hb, m.hp, m.kp, m.ab, m.jbs, m.pp, m.mh, m.fs, m.alle, m.ct, m.hep, m.std FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v, qpd_medhis m WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.id = m.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
         echo"<tr>
                <td >$date</td>
                <td >$patclass2</td>
                <td nowrap>$patclass1</td>
                <td nowrap>$lasnam</td>
                <td nowrap>$firnam</td>
                <td nowrap>$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$gen</td>
                <td nowrap>$ht</td>
                <td nowrap>$wt</td>
                <td nowrap>$bp</td>
                <td nowrap>$va,$va1--($va2)</td></td>
                <td nowrap>$UriOt</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$xray1</td>
                <td >Meth: $Meth Tetra: $Tetra</td>
                <td nowrap>NONE</td>
                <td >$medhis</td>
                <td nowrap>$opr1</td>
                <td nowrap>$findings1</td>
                <td nowrap>$rec</td>

            </tr>
        </tbody>";




        } //End of While
} // End of If VXI
else if ($Company == 'DNATA' || $Company == 'DNATA TRAVEL INC') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>PREGNANCY TEST</center></th>
                <th><center>ISHIHARA</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, v.cv FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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

                $cv = $row['cv'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td>$age</td>
                <td nowrap>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$Preg</td>
                <td>$cv</td>
                <td nowrap>$DT</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If DNATA

else if ($Company == 'WONTECH') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CBC</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>PREGNANCY TEST</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$Preg</td>
                <td nowrap>$DT</td>
                <td nowrap>$xray1</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If WONTECH

else if ($Company == 'BEEPO') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>CBC</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$xray1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$DT</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If BEEP

else if ($Company == 'SUPPORT NINJA') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$DT</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If SUPPORT NINJA
 else if ($Company == 'PENTHOUSE') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>PREG TEST</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>ANTI-HAV</center></th>
                <th><center>HBSAG</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.SeroOt, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $SeroOt = $row['SeroOt'];


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
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$Preg</td>
                <td nowrap>$DT</td>
                <td nowrap>$SeroOt</td>
                <td nowrap>$HBsAg1</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If PENTHOUSE

else if ($Company == 'MY CLOUD PEOPLE') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>LMP</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>CBC</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.SeroOt, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $SeroOt = $row['SeroOt'];


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

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$lmp</td>
                <td nowrap>$xray1</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$UriOt</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If MY CLOUD PEOPLE

else if ($Company == 'OWENS ASIA') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>AGE</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>CBC</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.SeroOt, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $SeroOt = $row['SeroOt'];


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

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$age</td>
                <td nowrap>$xray1</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$DT</td>
                <td nowrap>$CBCOt</td>
                <td>$patclass1</td>
                <td nowrap>$patclass2</td>
            </tr>
        </tbody>";


        } //End of While
} // End of If OWENS ASIA

else if ($Company == 'STADIUM' || $Company == 'STADIUM/ENVY' || $Company == 'ENVY') 
{
   echo "<thead>
            <tr>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CBC</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>PREGNANCY TEST</center></th>
                <th><center>DRUG TEST</center></th>
                <th><center>HBSAG</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, f.date, f.age, f.gen, f.connum, l.CBCOt, l.HBsAg, l.FecMicro, l.FecOt, l.UriOt,l.DT,l.PregTest, x.imp, c.Patclass, c.ot, p.find, v.lmp, v.cv, v.uod, v.uos, v.cod, v.cos FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p, qpd_vital v WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.id=v.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
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
                $lmp = $row['lmp'];
                $cv = $row['cv'];
                $uod = $row['uod'];
                $uos = $row['uos'];
                $cod = $row['cod'];
                $cos = $row['cos'];

        $i++;
         echo"<tr>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam&nbsp$midnam</td>
                <td nowrap>$CBCOt</td>
                <td nowrap>$UriOt</td>
                <td nowrap>$FecMicro1</td>
                <td nowrap>$Preg</td>
                <td nowrap>$DT</td>
                <td nowrap>$HBsAg1</td>
                <td nowrap>$xray1</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If STADIUM

else if ($Company == 'OUTSOURCED HR SOLUTION CORP.' || $Company == 'OUTSOURCED HR SOLUTION CORP' || $Company == 'OUTSOURCED HR SOLUTION') 
{
   echo "<thead>
            <tr>
                <th><center>No.</center></th>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>DRUG TEST SCREENING</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.id, f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, l.CBCOt, l.FecMicro, l.FecOt, l.UriOt, l.DT, x.imp, c.Patclass, c.ot, p.find FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
           $result = mysqli_query($con, $select);
           $i = 0;
           while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $firnam = $row['firnam'];
                $midnam = $row['midnam'];
                $lasnam = $row['lasnam'];
                $date = $row['date'];
                $comnam = $row['comnam'];
                $CBCOt = $row['CBCOt'];
                $FecMicro = $row['FecMicro'];
                $DT = $row['DT'];
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

                $i++;

        
         echo"<tr>
                <td nowrap><$i</td>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam &nbsp; $midnam</td>
                <td>$xray1</td>
                <td>$UriOt</td>
                <td>$DT</td>
                <td>$FecMicro1</td>
                <td>$CBCOt</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of OUTSOURCED HR SOLUTION CORP.

else if ($Company == 'AVIATION HUB ASIA INC.' || $Company == 'AVIATION HUB ASIA' || $Company == 'AVIATION HUB ASIA INC') 
{
   echo "<thead>
            <tr>
                <th><center>No.</center></th>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>DRUG TEST SCREENING</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.id, f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, l.CBCOt, l.FecMicro, l.FecOt, l.UriOt, l.DT, x.imp, c.Patclass, c.ot, p.find FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
           $result = mysqli_query($con, $select);
           $i = 0;
           while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $firnam = $row['firnam'];
                $midnam = $row['midnam'];
                $lasnam = $row['lasnam'];
                $date = $row['date'];
                $comnam = $row['comnam'];
                $CBCOt = $row['CBCOt'];
                $FecMicro = $row['FecMicro'];
                $DT = $row['DT'];
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

                $i++;

        
         echo"<tr>
                <td nowrap><$i</td>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam &nbsp; $midnam</td>
                <td>$xray1</td>
                <td>$UriOt</td>
                <td>$DT</td>
                <td>$FecMicro1</td>
                <td>$CBCOt</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of AVIATION HUB ASIA INC.
else
    {
   echo "<thead>
            <tr>
            	<th><center>No.</center></th>
                <th><center>DATE</center></th>
                <th><center>NAME</center></th>
                <th><center>CHEST X-RAY</center></th>
                <th><center>URINALYSIS</center></th>
                <th><center>DRUG TEST SCREENING</center></th>
                <th><center>FECALYSIS</center></th>
                <th><center>CBC</center></th>
                <th><center>MEDICAL CLASSIFICATION</center></th>
                <th><center>REMARKS</center></th>";

           
           $select = "SELECT f.id, f.date, f.comnam,  f.firnam, f.midnam, f.lasnam, l.CBCOt, l.FecMicro, l.FecOt, l.UriOt, l.DT, x.imp, c.Patclass, c.ot, p.find FROM qpd_form f, qpd_labresult l, qpd_xray x, qpd_class c, qpd_pe p WHERE f.id=l.id AND f.id=x.id AND f.id=c.id AND f.id=p.id AND f.date >= '$SD' AND f.date <='$ED' AND f.comnam LIKE '$Company%' ORDER BY f.lasnam";
           $result = mysqli_query($con, $select);
           $i = 0;
           while($row = mysqli_fetch_array($result))
            {
                $id = $row['id'];
                $firnam = $row['firnam'];
                $midnam = $row['midnam'];
                $lasnam = $row['lasnam'];
                $date = $row['date'];
                $comnam = $row['comnam'];
                $CBCOt = $row['CBCOt'];
                $FecMicro = $row['FecMicro'];
                $DT = $row['DT'];
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

                $i++;

        
         echo"<tr>
         		<td nowrap>$i</td>
                <td nowrap>$date</td>
                <td nowrap>$lasnam,$firnam &nbsp; $midnam</td>
                <td>$xray1</td>
                <td>$UriOt</td>
                <td>$DT</td>
                <td>$FecMicro1</td>
                <td>$CBCOt</td>
                <td>$patclass1</td>
                <td>$patclass2</td>
            </tr>
        </tbody>";

        } //End of While
} // End of If Else



//End of Php?>
    </table>
    </div>
    </div>
    </div>
<?php
}
?>

</body>
</html>


