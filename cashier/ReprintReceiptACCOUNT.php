<script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script>
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
    <title>Account Receipt</title>
    <link rel="stylesheet" href="style.css">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	</head>
	<style type="text/css">
	body
		{
			font-family: "Century Gothic";
			font-size: 16px;
		}
	hr
	    {
	    	border-top: 3px solid #8c8b8b;
	    	line-height: 1px;
	    	margin-top: 0px;
	    	margin-bottom: 0px;
	    	margin-left: 0px;
	    	margin: 0px;
	    	width: 320px;
	    }
	h3
		{
			font-family: "Century Gothic";
		    padding: 0px;
		    margin: 0px;
		    color: black;

		}
	.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
		{
			padding-left: 0px;
			margin-left: 5px;
		}
	.info
		{
			padding-left: 70px;
		}
	.items
		{
			padding-left: 20px;
		}
	</style>
<body>
<br><br>	
<div class="container-fluid">
	<div class="col-5">
		<div class="row">
			<div class="col"><?php echo $data['date'] ?></div>
		</div>
		<div class="row">
			<div class="col"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
		</div>
		<div class="row">
			<div class="col"><center>McArthur Hi-Way Cor. Salome Rd. Angeles City</center></div>
		</div>
		<br>
		<div class="row">
			<div class="col"><b class="info" style="font-size: 20px;"><?php echo $data['lasnam'] ?>, <?php echo $data['firnam'] ?> <?php echo $data['midnam'] ?></b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 45px;">Co: <b><?php echo $data['cust_comnam'] ?></b></div>
		</div>
		<div class="row">
			<div class="col"><b class="info"><?php echo $data['cust_age'] ?>/<?php echo $data['cust_gen'] ?></b></div>
		</div>
		<div class="row">
			<div class="col"><b class="info"><?php echo $data['cust_birdat'] ?></b></div>
		</div>
		<?php 
		if ($data['reff']=="") {
			$reff = $data['cust_comnam'];
		} else {
			$reff = $data['reff'];
		}
		?>
		<div class="row">
			<div class="col">Referred by: <b><?php echo $reff ?></b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;">Cashier: <b><?php echo $data['cash_name'] ?></b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;">Comment: <b><?php echo $data['comment'] ?> </b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><h3>RCPT:<b>#<?php echo $data['id'] ?></b></h3></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div>
		<div class="row">
			<div class="col-8" style="padding-left: 25px;">Item Description</div>
			<div class="col-2">Price</div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div>
		<div class="row" style="min-height: 1in;">
			<div class="col-8" style="padding-left: 25px;"><b><?php echo $data['PackName'] ?> </b>[<?php echo $data['PackList'] ?>]</div>
			<div class="col-2"><b>Php<?php echo $data['PackPrice'] ?></b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div>
		<div class="row">
			<div class="col-8 text-right">Receipt Total:</div>
			<div class="col-2"><b>Php<?php echo $data['totalprice'] ?></b></div>
		</div>
		<br>
		<div class="row">
			<div class="col"><center><p style="border: solid 2px black">online results, www.questphil.com.ph</p></center></div>
		</div>
		<div class="row">
			<div class="col"><center><img src="bar.jpg" height="30px" width="259px" style="margin: 0px; padding: 0px;"></center></div>
		</div>





	</div>
</div>
<?php }?>
</body>
</html>