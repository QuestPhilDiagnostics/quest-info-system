<?php
include_once('../connection.php');
include_once('../classes/trans.php');
$trans = new trans;
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $tid = $_GET['tid'];
    $data = $trans->fetch_data($id, $tid);

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Radiology Report</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
      <script type="text/javascript">
      function Res() 
          {
                  var myBox1 = document.getElementById('rad').value;    
                  if(myBox1 == 'Salvador Ramirez,MD.DPBR')
                  {
                        document.getElementById("com").value = "No abnormal densities seen in both lung parenchyma. The heart is normal in size and configuration. Aorta is unremarkable. The diaphragms, costrophrenic sulci and bony thorax are intact.";
                         document.getElementById("imp").value = "NORMAL CHEST FINDINGS";
                  }
                  else if(myBox1 == 'Ricardo MA. O. Pacheco,MD.DPBR')
                  {
                        document.getElementById("com").value = "Lung fields are clear. Heart is not enlarged. Diaphragm, its sulci visualized bone are intact.";
                         document.getElementById("imp").value = "NORMAL CHEST FINDINGS";
                  }
          }
      </script>
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Calibri";
		font-size: 24px;
	}
	.card-block, .checkbox
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block input
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
	.col p
	{
		text-transform: uppercase;
	}
</style>
<body >
<?php
include_once('radsidebar.php');
?>
<div class="container-fluid">
<form action="XRayINSERT.php" method="post" autocomplete="off" enctype="multipart/form-data">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Add Radiology Results</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
                    <div class="col col-md-auto">
                        <label>Patient ID.: </label><br>
                        <input type="hidden" name="id" value="<?php echo $data['PatientID'] ?>">
                        <b><?php echo $data['PatientID'] ?></b>
                    </div>
                    <div class="col col-md-auto">
                        <label>Transaction No.: </label><br>
                        <input type="hidden" name="tid" value="<?php echo $data['TransactionID'] ?>">
                        <b><?php echo $data['TransactionID'] ?></b>
                    </div>
                    <div class="col col-md-auto">
                        <label>Transaction Date.: </label><br>
                        <input type="hidden" value="<?php echo $data['TransactionDate'] ?>">
                        <b><?php echo $data['TransactionDate'] ?></b>
                    </div>
                    <div class="col col-md-auto">
                        <label>Name:</label><br>
                        <input type="hidden" name="lasnam" value="<?php echo $data['LastName'] ?>">
                        <input type="hidden" name="firnam" value="<?php echo $data['FirstName'] ?>">
                        <input type="hidden" name="midnam" value="<?php echo $data['MiddleName'] ?>">
                        <p><b><?php echo $data['LastName'] ?>,<?php echo $data['FirstName'] ?> <?php echo $data['MiddleName'] ?></b></p>
                    </div>
                    <div class="col col-md-auto">
                        <label>Company Name: </label><br>
                        <input type="hidden" name="comnam" value="<?php echo $data['CompanyName'] ?>">
                        <p><b><?php echo $data['CompanyName'] ?></b></p>
                    </div>
                    <div class="col col-md-auto">
                        <label>Gender:</label><br>
                        <p><b><?php echo $data['Gender'] ?></b></p>
                    </div>
				</div>
            </div>
        </div>
    </div>	
</div>
<div class="row">
	<div class="col-7 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Radiology Report</b></center></div>
            <div class="card-block">
            <div class="row">
            	<div class="col">
            		<b>X-RAY Findings:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<textarea name="com" id="com" cols="40" rows="5" class="form-control" placeholder="Findings"></textarea>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<b>X-RAY Impression:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<textarea name="imp" id="imp" cols="40" rows="5" class="form-control" placeholder="Impression"></textarea>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<b>Quality Assurance:</b>
            	</div>
            	<div class="col">
            		<b>Radiologist:</b>
            	</div>
            </div>
            <div class="row">
            	<div class="col">
            		<input name="qa" class="form-control" placeholder="" value="">
            	</div>
            	<div class="col">
            		<SELECT class="form-control" name="rad" id="rad" onchange="Res()">
					<OPTION >-</OPTION>
                              <OPTION value="Salvador Ramirez,MD.DPBR">Salvador Ramirez,MD.DPBR</OPTION>
					<OPTION value="Ricardo MA. O. Pacheco,MD.DPBR">Ricardo MA. O. Pacheco,MD.DPBR</OPTION>
				</SELECT>
            	</div>
            </div>
            <center><input type="submit" class="btn btn-primary" value="SUBMIT"></center>
           </form>
            </div>
        </div>
	</div>
	<div class="col-3">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Normal Templates</b></center></div>
            <div class="card-block">
            <div class="row">
            	<div class="col">
            		<center>NORMAL FINDINGS TEMPLATE</center>
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		<center><b>DOC RAMIREZ</b></center>
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		No abnormal densities seen in both lung parenchyma. The heart is normal in size and configuration. Aorta is unremarkable. The diaphragms, costrophrenic sulci and bony throrax are intact.
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		<center><b>DOC PACHECO</b></center>
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		Lung fields are clear. Heart is not enlarged. Diaphragm, its sulci visualized bone are intact.
            	</div>
            </div>
            <hr>
            <div class="row">
            	<div class="col">
            		<b>NORMAL CHEST FINDINGS</b>
            	</div>
            </div>
            </div>
        </div>	
	</div>

</div>



</div>
<?php } ?>
</body>
</html>
