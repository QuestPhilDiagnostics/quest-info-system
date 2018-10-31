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
    <title>Payment</title>
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
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Transaction Type</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Cash Payment No.: <?php echo $data['id'] ?></b></center></div>
            <div class="card-block">
            <form action="Pay.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return CheckValues()">
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
						<b><input type="text"  name="cust_cash" placeholder="Input Cash" required /></b><br>
					</div>
			</div>
			<div class="row">
				<input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
				<input type="hidden" name="totalprice" value="<?php echo $data['PackPrice'] ?>"/>
				<div class="col">
					<center>
						<input type="submit" class="btn btn-primary" value="TRANSACT">
					</center>
				</div>
			</div>
            </form>
        </div>
    </div>
</div>
</div>


<script language="javascript"> 
	function CheckValues()
	{
	var r = confirm("Are you sure you want to TRANSACT?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
	}
</script>

</body>
</html>
<?php }?>