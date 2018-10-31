<?php
include_once('../connection.php');
include_once('../classes/trans.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $trans->fetch_data($id);
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>For Printing</title>
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
<br><br>	
<div class="container-fluid">
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>SR No.: <?php echo $data['id'] ?></b></center></div>
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
						CASH:<br>
						CHANGE:<br>
					</div>
					<?php 
						if ($data['reff']=="") {
							$reff = $data['cust_comnam'];
						} else {
							$reff = $data['reff'];
						}
					?>
					<div class="col">
						<b><?php echo $data['lasnam'] ?>,<?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b><br>
						<b><?php echo $data['cust_comnam'] ?></b><br>
						<b><?php echo $data['cust_age'] ?>/<?php echo $data['cust_gen'] ?></b><br>
						<b><?php echo $data['cust_birdat'] ?></b><br>
						<b><?php echo $data['bill_to'] ?></b><br>
						<b><?php echo $reff ?></b><br><br><br>
						<b><?php echo $data['PackName'] ?></b>(<?php echo $data['PackList'] ?>)<br>
						<b><?php echo $data['PackPrice'] ?></b><br>
						<b><?php echo $data['PackPrice'] ?></b><br>
						<b><?php echo $data['cust_cash'] ?></b><br>
						<b><?php echo $data['cust_change'] ?></b><br>
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
<?php }?>
<script language="javascript"> 
	function PrintReceipt()
	{ 
	if(confirm("Are you sure want to print?"))
		{ 
		win = window.open("CashReceipt.php?id=<?php echo $data['id'] ?>");
		}
	}
</script>
</body>
</html> 