<?php
include_once('../connection.php');
include_once('../classes/hmo.php');
$trans = new trans;
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$tid = $_GET['tid'];
	$trans = $trans->fetch_data($id, $tid);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HMO Update</title>
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
		font-weight: bolder;
	}
	.card-block input, 
	{
		font-family: "Century Gothic";
		font-size: 18px;
	}
</style>

<body >
<?php
include_once('cashsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">UPDATE HMO PATIENT INFO</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            <form action="HMOUpdate.php" method="post" autocomplete="off" enctype="multipart/form-data">
            	<div class="row">
					<div class="col">
						<input type="hidden"  name="id" class="form-control" value="<?php echo $trans['PatientID']?>" required />
						<input type="hidden"  name="tid" class="form-control" value="<?php echo $trans['TransactionID']?>" required />
						<label for=""> Company Name:</label>
						<input type="text" name="comnam" class="form-control" value="<?php echo $trans['CompanyName']?>" required/>
						<label for="">First Name:</label>
						<input type="text"  name="fn" class="form-control" value="<?php echo $trans['FirstName']?>" required />
						<label for=""> Middle Name:</label>
						<input type="text"  name="mn" class="form-control" value="<?php echo $trans['MiddleName']?>"  />
						<label for=""> Last Name:</label>
						<input type="text"  name="ln"  class="form-control" value="<?php echo $trans['LastName']?>" required />
						<label for=""> Birth Date:</label>
						<input type="text"  name="bd" class="form-control" placeholder="MM-DD-YYYY" value="<?php echo $trans['Birthdate']?>"  required />
					</div>
					<div class="col">
						<label for="">Age:</label>
						<input type="text"  name="age" id="age" class="form-control" onkeyup="AGE()" value="<?php echo $trans['Age']?>" required />
						<label for="">Gender:</label>
						<input type="text"  name="gen" class="form-control" value="<?php echo $trans['Gender']?>" required />
						<label for="">Contact No.:</label>
						<input type="text"  name="cn" class="form-control" value="<?php echo $trans['ContactNo']?>" />
						<label for="">Bill to:</label>
						<input type="text"  name="billto" id="billto" class="form-control" value="<?php echo $trans['Biller']?>"  required/>
						<label for="">Referred By:</label>
						<input type="text"  name="reff" class="form-control" value="<?php echo $trans['Referral']?>" />
					</div>
					<div class="col">
						<label for="">Comment:</label>
						<input type="text"  name="comment" class="form-control" value="<?php echo $trans['Notes']?>"  />
						<label for="">LOE No.:</label>
						<input type="text" id="LOE" name="LOE" class="form-control" value="<?php echo $trans['LOE']?>"/>
						<label for="">Account No.:</label>
						<input type="text" id="AN" name="AN" class="form-control" value="<?php echo $trans['AN']?>"/>
						<label for="">Approval Code:</label>
						<input type="text" id="AC" name="AC" class="form-control" placeholder="" value="<?php echo $trans['AC']?>"/>
						<label for="">Senior ID:</label>
						<input type="text"  name="SID" class="form-control" value="<?php echo $trans['SID']?>" />
					</div>
				</div>
				<div class="row">
            		<div class="col">
						<label for="">DATE:</label>
						<input type="text"  name="date" class="form-control" value="<?php echo $trans['CreationDate']?>" />
						<label for="">Package:</label>
						<input type="text" name="PackName" class="form-control" value="<?php echo $trans['ItemName']?>" required/>
						<label for="">Package Price:</label>
						<input type="text" name="PackPrice" class="form-control" value="<?php echo $trans['ItemPrice']?>" required/>
						<label for="">List of Items:</label>
						<input type="text" name="PackList" class="form-control" value="<?php echo $trans['ItemDescription']?>" required/>
					</div>
            	</div>
				<div class="row">
					<div class="col">
						<center><input type="submit" class="btn btn-primary" value="UPDATE"></center>
					</div>
				</div>
			</form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
<?php } ?>