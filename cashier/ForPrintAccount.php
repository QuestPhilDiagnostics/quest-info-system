<?php
include_once('../connection.php');
include_once('../classes/patient.php');
include_once('../classes/transRe.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id1 = $_GET['id'];
	$data = $trans->fetch_data($id1);

$pat = new Patient;
if (isset($_GET['patid'])){
	$id2 = $_GET['patid'];
	$data1 = $pat->fetch_data($id2);
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>For Printing Account</title>
    <link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
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
include_once('cashsidebar.php');
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>SR No.: <?php echo $data['TransactionID'] ?></b></center></div>
            <div class="card-block">
            <div class="row">
					<div class="col-3">
						Customer Name:<br>
						Company:<br>
						Age/Gender:<br>
						Birthdate:<br>
						Bill to:<br>
						Referred by:<br><br><br>
						ITEM/DESCRIPTION:<br>
						AMOUNT:<br>
						TOTAL:<br>
					</div>
					<!-- <?php 
						if ($data['reff']=="") {
							$reff = $data['cust_comnam'];
						} else {
							$reff = $data['reff'];
						}
					?> -->
					<div class="col">
						<b><?php echo $data1['LastName'] ?>,<?php echo $data1['FirstName'] ?> <?php echo $data1['MiddleName'] ?></b><br>
						<b><?php echo $data1['CompanyName'] ?></b><br>
						<b><?php echo $data1['Age'] ?>/<?php echo $data1['Gender'] ?></b><br>
						<b><?php echo $data1['Birthdate'] ?></b><br>
						<b><?php echo $data['Biller'] ?></b><br>
						<b></b><br><br><br>
						<b><?php echo $data['ItemName'] ?></b>(<?php echo $data['ItemDescription'] ?>)<br>
						<b><?php echo $data['ItemPrice'] ?></b><br>
						<b><?php echo $data['GrandTotal'] ?></b><br>
					</div>
			</div>
			<div class="row">
				<div class="col"></div>
				<div class="col">
					<button type="button" class="btn btn-primary" onclick="PrintReceipt()">PRINT RECEIPT</button>
				</div>
				<div class="col"></div>
			</div>
        </div>
    </div>
</div>
</div>




</div>
<?php }}?>
<script language="javascript"> 
	function PrintReceipt()
	{ 
	if(confirm("Are you sure want to print?"))
		{ 
		win = window.open("AccountReceipt.php?id=<?php echo $data['id'] ?>");
		}
	}
</script>
</body>
</html> 