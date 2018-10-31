<?php

	$id = $_GET['id'];


?>
<?php
include_once('../summarycon.php');
if(isset($_POST['ADDNewRecord']))
{
	//$id = $_GET['id'];
	$idpatient=$_POST['idpatient'];
	$company=$_POST['company'];
	$position=$_POST['position'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$contact=$_POST['contact'];
	$billto=$_POST['billto'];
	$comment=$_POST['comment'];


	$updatetemp_patient= "UPDATE temp_trans SET PatientID='$idpatient', PatientRef='$id', CompanyName='$company', Position='$position', FirstName='$firstname', MiddleName='$middlename', Lastname='$lastname', Address='$address', Birthdate='$birthday', Email='$email', Age='$age', Gender='$gender', ContactNo='$contact', Notes='$comment', Biller = '$billto' WHERE TransactionRef ='$id'";

	

	if ($con->query($updatetemp_patient) === TRUE) 
    {
	  echo "<script> alert('Record Updated Successfully') </script>";
    //echo "<script>window.open('LabIndustrialView.php?id=$id','_self')</script>";
    }
  	else
  	{
      echo "Error updating record: " . $con->error;
  	}
}
?>
<?php
//Fetch from temp_patient
	include_once('../summarycon.php');
	$pat= mysqli_query($con, "SELECT * from temp_trans WHERE PatientRef='".$id."'");
	$patrow= mysqli_fetch_array($pat);
?>

<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Transaction Type</title>
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script  src="../source/CDN/jquery-1.12.4" type="text/javascript"></script>
	<script  src="../source/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
     <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
</head>
<style type="text/css">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Century Gothic";
		font-size: 22px;
		padding-bottom: 0px;  
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
		font-size: 14px;
		font-weight: bolder;
		margin: 0px;
	}

	#scrollable-dropdown-menu .tt-dropdown-menu 
	{
	  overflow-y: auto;
	}

  	.footer 
  	{
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 50px;
	background-color: #a7b4ba;
	color: white;
	text-align: center;
	}

	button
	{
		height: 50px;
		width: 100px;
	}

	/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    font-family: "Century Gothic";
	font-size: 12px;
	padding-bottom: 0px; 
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 20%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

</style>
<body >
<?php
include_once('cashsidebar.php');
?>
<div class="container-fluid">


<div class="row">
    <div class="col-md-12">
    	<div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></div>
       	<div class="card-block">
       	<form method="POST">
            	<div class="row" style="padding-left: 20px;">
					<SELECT name="patientId" id="searchpatient" class="form-control" style="width: 400px; height: 40px;" required>
	               		<OPTION selected="" value="" id = "patx">SELECT PATIENT</OPTION>
					    <?php 
					        include_once('../summarycon.php');
					        $select = "SELECT DISTINCT PatientID, LastName, FirstName, MiddleName FROM qpd_patient ORDER BY Lastname ASC";
							$result = mysqli_query($con, $select);
							$i=0;
							while($row = mysqli_fetch_array($result))
							{
							    echo "<option value='".$row['PatientID']."'><b>".$row['LastName'].",".$row['FirstName']." ".$row['MiddleName']."</option>";
							}
						?>
					</SELECT>
            	<input type="submit" name="SEARCHPATX" style="height: 40px;" class="btn btn-primary" value="SEARCH">
            	</div>

            	<!--<a href="Transaction.php?">Clear</a>-->


        </form>


        <?php
        include_once('../summarycon.php');
        


        	if (isset($_POST['SEARCHPATX'])) 
        	{
        		if (isset($_POST['patientId']) != "" || isset($_POST['patientId']) != 0) 
        		{
        			$PatID = $_POST['patientId'];
        			$sql = mysqli_query($con, "SELECT * FROM qpd_patient WHERE PatientID = '$PatID'");
					$patdata = mysqli_fetch_array($sql);
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
						$comment=$patdata['Notes'];
					}




        		}
        			

        	}







         ?>
        		
 		<form action="" method="POST">
       	<div class="row">
       		<div class="col">
       			<input type="hidden"  name="idpatient" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

						echo $idpatient;

				} ?>" id="myInput" required />
				<label for="">Company Name:</label>
				<input type="text"  name="company" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

						echo $company;

				} ?>" id="myInput" required />
				<label for="">Applied Position:</label>
				<input type="text" name="position" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $position; 
				}?>" id="myInput" required />
				<label for="">First Name:</label>
				<input type="text"  name="firstname" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $firstname; 
				}?>" id="myInput" required />
				<label for=""> Middle Name:</label>
				<input type="text"  name="middlename" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $middlename; 
				}?>" id="myInput" />
				<label for=""> Last Name:</label>
				<input type="text"  name="lastname"  class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $lastname; 
				}?>" id="myInput" required />
			</div>
			<div class="col">
				<label for="">Address:</label>
				<input type="text"  name="address" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $address; 
				}?>" id="myInput" required />
				<label for=""> Birth Date:</label>
				<input type="text"  name="birthday" class="form-control" placeholder="MM-DD-YYYY" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $birthday; 
				}?>" id="myInput" required />
				<label for="">Age:</label>
				<input type="text"  name="age" id="age" class="form-control" onkeyup="AGE()" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $age; 
				}?>" id="myInput" required />
				<label for="">Gender:</label>
				<input type="text"  name="gender" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $gender; 
				}?>" id="myInput" required  />
				<label for="">Contact No.:</label>
				<input type="text"  name="contact" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $contact; 
				}?>" id="myInput" />	
			</div>
			<div class="col">
				<label for="">Email Address:</label>
				<input type="text"  name="email" class="form-control" value="<?php if (isset($_POST['SEARCHPATX'])){

					echo $email; 
				}?>" id="myInput" />
				<label for="">Bill to:</label>
				<input type="text"  name="billto" id="billto" class="form-control" onkeyup="HMO()" id="myInput" value="" />
				<label for="">Referred By:</label>
				<input type="text"  name="referral" class="form-control" id="myInput" value="" />
				<label for="">Comment:</label>
				<input type="text"  name="comment" class="form-control" id="myInput"  value="" />
			</div>
			
		</div>
	</div>
       <div class="card-footer card-inverse card-info">
       	<div class="row">
       		<div class="col">
       			<button type="submit" name="ADDNewRecord" class="btn btn-primary" style="font-size: 20px; width: 140px;"><i class="far fa-check-circle"></i>&nbsp; SUBMIT</button>
</form>
<form action="finaltrans.php?id=<?php echo $id?>" method="POST">
				<input type="hidden" name="id" value="<?php echo $id;?>">
       			<button type="submit" name="CASH" class="btn btn-primary" style="font-size: 20px; width: 140px;"><i class="far fa-check-circle"></i>&nbsp; Cash</button>
       			<button type="submit" name="ACCOUNT" class="btn btn-primary" style="font-size: 20px; width: 140px;"><i class="far fa-check-circle"></i>&nbsp; Account</button>
</form>
       		</div>
       	</div>
            
            <!-- <button type="submit" class="btn btn-primary" id="CASHPayment">CASH</button></center> -->
            <
       </div>
	</div>

	</div>
	



<script type="text/javascript">
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