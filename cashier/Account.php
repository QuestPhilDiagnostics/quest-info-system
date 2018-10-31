<?php
session_start();
require_once '../class.user.php';
include_once('../summarycon.php');
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$id = $_GET['id'];
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$Cashier = $row['userName'];

if ($row['class'] != "CashierACCOUNT")
{ $user_home->redirect('../home.php'); }
else
{

	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
	}

	else
	{
		//Generate 8 digit random number for REFERENCE
		function randomDigits()
			{
			    $numbers = range(0,9);
			    $digits = '';
			    $length = 8;
			    shuffle($numbers);
				    for($i = 0; $i < $length; $i++)
				    {
				    	global $digits;
				       	$digits .= $numbers[$i];
				    }
			    return $digits;
			}

		//Pass generated random number to another variable
		$reference = randomDigits();
		//check to database if the generated number has duplicate
		include_once('../summarycon.php');
		$check = mysqli_query($con,  "SELECT * FROM qpd_trans WHERE TransactionRef = '$reference'" );

		//if NO == use the generated as the REFERENCE
		if (!empty($check)) 
		{
			$finalRef = $reference;
			//$url = "http:localhost/qis/cashier/index.php?id=".$finalRef;
			header('Location: Account.php?id='.$finalRef); 
			
		}

		//if YES == Generate a new one
		else
		{
			$numbers = range(0,9);
			$digits = '';
			$length = 8;
			shuffle($numbers);
			for($i = 0; $i < $length; $i++)
			{
				global $digits;
				$digits .= $numbers[$i];
			}

			return $digits;

			$finalRef = $digits;
			//$url = "http:localhost/qis/cashier/index.php?id=".$finalRef;
			header('Location: Account.php?id='.$finalRef); 
		}
		
	}
}
?>
        <?php
        include_once('../summarycon.php');
        


        	if (isset($_POST['SEARCHPATX']))
        	{
        		$PatID=$_POST['patientId'];
        		if (isset($_POST['patientId']) != "" || isset($_POST['patientId']) != 0) 
        		{



        			$PatID = $_POST['patientId'];
        			$sql = mysqli_query($con, "SELECT * FROM qpd_patient WHERE PatientID = '$PatID'");
					while($patdata = mysqli_fetch_array($sql))
					{
						$idpatient=$patdata['PatientID'];
						$refpatient=$patdata['PatientRef'];
						$company=$patdata['CompanyName'];
						$position=$patdata['Position'];
						$firstname=$patdata['FirstName'];
						$middlename=$patdata['MiddleName'];
						$lastname=$patdata['LastName'];
						$address=$patdata['Address'];
						$birthday=$patdata['Birthdate'];
						$email=$patdata['Email'];
						$age=$patdata['Age'];
						$gender=$patdata['Gender'];
						$contact=$patdata['ContactNo'];
						$comment=$patdata['Notes'];

					}
        		}
        		else
        		{

        			$sql = mysqli_query($con, "SELECT * FROM temp_trans WHERE PatientRef = $id ");
					while($patdata = mysqli_fetch_array($sql))
					{
						$idpatient=$patdata['PatientID'];
						$refpatient=$patdata['PatientRef'];
						$company=$patdata['CompanyName'];
						$position=$patdata['Position'];
						$firstname=$patdata['FirstName'];
						$middlename=$patdata['MiddleName'];
						$lastname=$patdata['LastName'];
						$address=$patdata['Address'];
						$birthday=$patdata['Birthdate'];
						$email=$patdata['Email'];
						$age=$patdata['Age'];
						$gender=$patdata['Gender'];
						$contact=$patdata['ContactNo'];
						$billto=$_POST['billto'];
						$comment=$patdata['Notes'];
					}




        		}
        			

        	}

         ?>
<html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ACCOUNTS</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script  src="../source/CDN/jquery-1.12.4" type="text/javascript"></script>
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
include_once('accountsidebar.php');
?>
<div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Make a Sale</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
            	<div class="row">
            		<div class="col-5">
				        		<form method="POST" >
								  <SELECT name="patientId" id="searchpatient" class="form-control" style="width: 350px; height: 40px;" >
				               		<OPTION selected="" value="" id = "patx">SELECT PATIENT</OPTION>
								    <?php 
								        include_once('../summarycon.php');
								        $select = "SELECT DISTINCT * FROM qpd_patient ORDER BY Lastname ASC";
										$result = mysqli_query($con, $select);
										$i=0;
										while($row = mysqli_fetch_array($result))
										{
										    echo "<option value='".$row['PatientID']."'><b>".$row['LastName'].",".$row['FirstName']." ".$row['MiddleName']."</b>[".$row['Age']."/".$row['Gender']."]</option>";
										}
									?>
								</SELECT>            			
            	
            		</div>
            		<div class="col-2">
			            		<input type="submit" name="SEARCHPATX" style="height: 40px;" class="btn btn-primary" value="SEARCH">
							</form>
            		</div>


<form action="finaltrans.php?id=<?php echo $id ?>" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return CheckValues()">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="cashier" value="<?php echo $Cashier; ?>">
            		<div class="col-5">
							<center>
								  <SELECT name="Item" id="searchpack" class="form-control" style="width: 400px; height: 40px;" required>
	               					<OPTION selected="" value="">SELECT ITEM</OPTION>
					                <?php 
					                include_once('../summarycon.php');
					                $select = "SELECT DISTINCT * FROM qpd_items WHERE ItemType LIKE 'ACCOUNT%' ORDER BY ItemName ASC";
							        $result = mysqli_query($con, $select);
							        $i=0;
							        
            
							        while($row = mysqli_fetch_array($result))
							        {
							      	echo "<option value='".$row['ItemID']."' style='font-family='Century Gothic';><b>".$row['ItemName']."</b>&nbsp&nbsp&nbsp[".$row['ItemDescription']."]&nbsp&nbsp[".$row['ItemPrice']."]</option>";
									}
									?>
						            </SELECT>
					    </center>
            		</div>
            	</div>

				<input type="hidden" name="idpatient" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $idpatient; }?>"  required />
            	<div class="row">
					<div class="col">
						
						<label for=""> Company Name:</label>
						<input type="text"  name="company" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){ echo $company;} ?>"  required />
						<label for="">Applied Position:</label>
						<input type="text" name="position" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $position;} ?>"  required />
						<label for="">First Name:</label>
						<input type="text"  name="firstname" class="form-control"  value="<?php if (isset($_POST['SEARCHPATX'])){echo $firstname;} ?>" required />
						<label for=""> Middle Name:</label>
						<input type="text"  name="middlename" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $middlename;} ?>" />
						<label for=""> Last Name:</label>
						<input type="text"  name="lastname"  class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $lastname;} ?>" required />
					</div>
					<div class="col">
						<label for="">Address:</label>
						<input type="text"  name="address" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $address;} ?>"  required />
						<label for=""> Birth Date:</label>
						<input type="text"  name="birthdate" class="form-control" placeholder="MM-DD-YYYY" value="<?php if (isset($_POST['SEARCHPATX'])){echo $birthday;} ?>" required />
						<label for="">Age:</label>
						<input type="text"  name="age" id="age" class="form-control" onkeyup="AGE()" value="<?php if (isset($_POST['SEARCHPATX'])){echo $age;} ?>" required />
						<label for="">Gender:</label>
						<input type="text"  name="gender" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $gender;} ?>" required />
						<label for="">Contact No.:</label>
						<input type="text"  name="contact" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $contact;} ?>"  />	
					</div>
					<div class="col">
						<label for="">Email Address:</label>
						<input type="text"  name="email" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){echo $email;} ?>" />
						<label for="">Bill to:</label>
						<input type="text"  name="billto" id="billto" class="form-control" value="" onkeyup="HMO()" required/>
						<label for="">Referred By:</label>
						<input type="text"  name="reff" class="form-control" value="" />
						<label for="">Comment:</label>
						<input type="text"  name="comment" class="form-control" value="<?php  if (isset($_POST['SEARCHPATX'])){ echo $comment;} ?>" />
					</div>
				</div>
				<div class="row">
					<div class="col"></div>
					<div class="col">
						<input type="hidden" id="SID" name="SID"  class="form-control" placeholder="Senior ID No." value=""/>
						<input type="hidden" id="LOE" name="LOE"  class="form-control" placeholder="LOE No."       value="" required />
						<input type="hidden" id="AN"  name="AN"   class="form-control" placeholder="Account No."   value="" required />
						<input type="hidden" id="AC"  name="AC"   class="form-control" placeholder="Approval Code" value="" required />
					</div>
					<div class="col"></div>
				</div>
				<div class="row">
					<div class="col">
						<center><input type="submit" class="btn btn-primary" name="ACCOUNT" value="SUBMIT"></center>
					</div>
				</div>
			</form>
            </div>
        </div>
    </div>
</div>
</div>

<script language="javascript"> 

	function HMO()
	{
		var x = document.getElementById("billto").value;
		if (x == 'INTELLICARE' || x == 'AVEGA' || x == 'VALUCARE' || x == 'COCOLIFE' || x == 'EASTWEST' || x == 'MAXICARE') 
		{
		   document.getElementById('LOE').type = 'text';
		   document.getElementById('AN').type = 'text';
		   document.getElementById('AC').type = 'text';
		}
		else
		{
		   document.getElementById('LOE').type = 'hidden';
		   document.getElementById('AN').type = 'hidden';
		   document.getElementById('AC').type = 'hidden';
		}

	}

	function AGE()
	{
		
		var y = document.getElementById("age").value;
		if (y >= 60) 
		{
		   document.getElementById('SID').type = 'text';
		}
		else
		{
			document.getElementById('SID').type = 'hidden';
		}

	}


	function CheckValues()
	{
	var r = confirm("Are you sure to submit?");
	if (r == true) {
	    return true;
	} else {
	    return false;
	}
	}
</script>


</body>
</html>