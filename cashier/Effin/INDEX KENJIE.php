<?php
session_start();
require_once '../class.user.php';
include_once('../summarycon.php');
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['class'] != "Cashier")
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
			header('Location: index.php?id='.$finalRef); 
			
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
			header('Location: index.php?id='.$finalRef); 
		}
		
	}
}
?>
<?php
include_once('../summarycon.php');
if(isset($_POST['ADDNewRecord']))
{
	$ref=$_POST['ref'];
	$type="HOLD";
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
	$comment=$_POST['comment'];

	$addtemp_patient = mysqli_query($con, 
		"INSERT INTO temp_patient 
		(PatientRef, PatientType, CompanyName, Position, FirstName, MiddleName, LastName, Address, Birthdate, Email, Age, Gender, ContactNo, Notes )
		VALUES 
		('$ref','$type', '$company','$position', '$firstname','$middlename','$lastname','$address','$birthday', '$email','$age','$gender','$contact','$comment')" );

	if ($addtemp_patient === TRUE) 
	{
		echo "<script> alert('SUCCESS!') </script>";
		echo "<meta http-equiv='refresh' content='0'>";
	}
	else
	{
		echo "<script> alert('FAILED!') </script>";
	}
}
?>
<?php
//Fetch from temp_patient
	include_once('../summarycon.php');
	$pat= mysqli_query($con, "SELECT * from temp_patient WHERE PatientRef='".$id."'");
	$patrow= mysqli_fetch_array($pat);
?>

<!--<?php 

            	if (isset($_POST['btnPayout'])) {


            		$AmountRes = $_POST['txtAmountRes'];
            		$total = $_POST['txtTotal'];

            		if ($total>$AmountRes) {
            			echo '<script type="text/javascript"> alert("Please enter higher amount!") </script>';
            		}else{

			            		$query = "SELECT * FROM tbl_cart_$b";
			         			$result = mysqli_query($con,$query);

			            		while ($row = mysqli_fetch_array($result)) {

			            		$subtotal = $_POST['txtSubTotal'];
			            		$total = $_POST['txtTotal'];
			            		$AmountRes = $_POST['txtAmountRes'];
			            		$change = $AmountRes-$total;
			            		$date = date("y/m/d");
			            		$user = $_SESSION['username'];
			            		$dc = $_POST['txtDeduct'];

			            		
			            		$item_code = $row['item_code'];
			            		$medicine_name = $row['medicine_name'];
			            		$price = $row['price'];
			            		//$original_price = $row['original_price'];
			            		$quantity = $row['quantity'];
			            		$receipt_no = $subtotal.$total.$amount_res.$change.$dc;
			            		$vatsales = $total * .12;

			            		$query = "INSERT INTO tbl_dailytransactions_$b(
			            													`res_number`,
			            													`item_code`,
			            													`medicine_name`,
			            													`price`,
			            													`quantity`,
			            													`subtotal`,
			            													`discount`,
			            													`total`,
			            													`amount_res`,
			            													`change`,
			            													`incharge`,
			            													`receipt_date`
			            													)VALUES(
			            													'$receipt_no',
			            													'$item_code',
			            													'$medicine_name',
			            													'$price',
			            													'$quantity',
			            													'$subtotal',		
			            													'$dc',
			            													'$total',		
			            													'$AmountRes',		
			            													'$change',
			            													'$user',
			            													'$date'		
			            													)";

			            		mysqli_query($con,$query) or die(mysqli_error($con));

			            		$stock = "SELECT * FROM tbl_medicine_$b WHERE item_code = '$item_code'";
			            		$stockres = mysqli_query($con,$stock);
			            		$stockrow = mysqli_fetch_array($stockres);
			            		$stockquantity = $stockrow['stock'];	

			            		$deductStock = $stockquantity-$quantity;

			            		mysqli_query($con,"UPDATE tbl_medicine_$b SET stock = '$deductStock' WHERE item_code = '$item_code'");

			            		//insert data to daily inventory
			            		$d = date('y_m_d');
					    		$tbl = $d.'_'.$b;
			      

			            		//drop cart
			            		mysqli_query($con,"DELETE FROM tbl_cart_$b");



			            		echo '
								<script type="text/javascript">
								window.open("record.php?b='.$b.'&rn='.$receipt_no.'","PENDING","menubar=no,toolbar=no,height=500,width=500");
								</script>';
			            			
			            		}	//while

            		} //else if

            	

            	}

            	 ?>--->
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Make A Sale</title>
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
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
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
    <div class="col-md-6">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info">
            <div class="row">
            	<div class="col">
            		Transaction No.:<b>&nbsp;&nbsp;<?php echo $id; ?></b><br>
            	</div>
            	<div class="col">
            		Cashier:<b><?php echo $row['userName']; ?></b>
            	</div>
            </div>
            </div>
            <!-- <form action="Submit.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return CheckValues()"> -->
            <div class="card-block">
			
            	<div class="row">
            		<div class="col">
            				<form method="POST">
								  <SELECT name="Item" id="searchpack" class="form-control" style="width: 500px; height: 50px" required>
	               					<OPTION selected="" value="">SELECT ITEM</OPTION>
					                <?php 
					                include_once('../summarycon.php');
					                $select = "SELECT DISTINCT * FROM qpd_items ORDER BY ItemName ASC";
							        $result = mysqli_query($con, $select);
							        $i=0;
							        while($row = mysqli_fetch_array($result))
							        {
							      	echo "<option value='".$row['ItemID']."'><b>".$row['ItemName']."</b>&nbsp&nbsp&nbsp(".$row['ItemDescription'].")&nbsp&nbsp(".$row['ItemPrice']."</option>";
									}
									?>
						            </SELECT>
								  <input type="submit" name="item" value="ADD">
							</form>
            		</div>
            	
				<table class="table table-hover table-striped">
		          <thead>
		            <tr>
		              <th>Item Name</th>
		              <th>Description</th>
		              <th>Quantity</th>
		              <th>Price(PHP)</th>
		            </tr>
		          </thead>
		          <tbody>
		           <?php
		           include_once('../summarycon.php');
		           $lastid = $id;
		           if(isset($_POST['item'])){
		                $pack= mysqli_query($con, "SELECT * from qpd_items WHERE ItemID='".$_POST['Item']."'");
		                $pack2= mysqli_fetch_array($pack);
		               //echo "<script>alert('".$pack2[1]."')</script>";
		                $query= mysqli_query($con, "INSERT into temp_trans (TransactionRef, ItemID, ItemName, ItemDescription, ItemQTY, ItemPrice, Cashier) VALUES ('".$lastid."','".$pack2[0]."', '".$pack2[1]."', '".$pack2[3]."',1,'".$pack2[2]."',  '".$row['userName']."')");
		                echo "<meta http-equiv='refresh' content='0'>";
		                //echo "<meta http-equiv='refresh' content='0;url=http:localhost/qis/cashier/index.php?id=$finalRef'/>";
		                  }
		                else{
		                   $i=0;
		                   $totalaccount = 0;
		                   $totalamount = 0;
		                   $totalqty = 0;
		                   $queryselect = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef='".$lastid."' ");
		                    while($query2= mysqli_fetch_array($queryselect))
		                        {

		                    echo "<tr>";
		                      echo "<td>".strip_tags($query2[6])."</td>";
		                        echo "<td>".strip_tags($query2[7])."</td>";
		                        echo "<td>".strip_tags($query2[8])."</td>";
		                        echo "<td>".strip_tags($query2[9])."</td>";
		                      //echo "<td><a href='?remove&id=".$query2[0]."'><button class='btn btn-danger'>Remove</button></a></td>";
		                     //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
		                    echo "</tr>";
		                    $totalaccount += $query2[9];
		                    $totalqty += $query2[8];
		                    $totalamount = number_format((float)$totalaccount, 2, '.', '');
		                    $i++;
		                     $queryadd = mysqli_query($con, "INSERT FROM temp_trans WHERE TotalPrice='".$totalaccount."' ");
		                      }
		                      echo "<hr>";
		                      echo "<tr>";
		                      echo "<td><b>GRAND TOTAL</b></td>";
		                      echo "<td></td>";
		                      echo "<td><b>".$totalqty."</b></td>";
		                      echo "<td><b>".$totalamount."</b></td>";
		                      echo "<td></td>";
		                     //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
		                    echo "</tr>";
		                  }
		              ?>
		            </tbody>
          		</table>
			<!-- </form> -->
            </div>
        </div>
    </div>

</div>
    <div class="col-md-6">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info">
            <div class="row">
            	<div class="col">
            		PATIENT INFORMATION
            	</div>
            </div>
            </div>
            <!-- <form action="Submit.php" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return CheckValues()"> -->
            <div class="card-block">
			<input type="hidden" name="cashier" value="<?php echo $row['userName']; ?>">
            	<div class="row">
            		<div class="col-7" style="padding-left: 20px;">
							<form method="POST">
							<SELECT name="patientId" id="searchpatient" class="form-control" style="width: 350px; height: 40px;">
	               				<OPTION selected="" value="">SELECT PATIENT</OPTION>
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
						    <input type="submit" class="btn btn-primary" style="height: 40px;" name="searchpatient" value="SEARCH">
						    </form>	
            		</div>
            		<div class="col-3" style="padding-left: 0px;">
            			<form method="POST"><input type="submit" class="btn btn-primary" style="height: 40px;" name="addnew" value="NEW RECORD"></form>
            		</div>
            		
	            			

	            </div>





 				<form action="finaltrans.php" method="POST">
            		<?php
		           	include_once('../summarycon.php');
		           	$lastid = $id;
		           	//$total = $_POST['txtTotal'];
		           	if(isset($_POST['searchpatient']))
		           	{
		                $pack= mysqli_query($con, "SELECT * from qpd_patient WHERE PatientID='".$_POST['patientId']."'");

		                while($row =mysqli_fetch_array($pack))
						{
				           
				        echo "<div class='row' style='padding: 10px;''>";
						echo "<div class='col'>";
							echo "<label for=''>First Name:</label>";
							echo "<input type='text'  name='firstname' class='form-control' value=".$row['FirstName']."  required />";
							echo "<label for=''>Company Name:</label>";
							echo "<input type='text'  name='company' class='form-control' value=".$row['CompanyName']."  required />";
							echo "<label for=''>Birth Date:</label>";
							echo "<input type='text'  name='birthday' class='form-control' placeholder='MM-DD-YYYY' value=".$row['Birthdate']." required />";
							echo "<label for=''>Contact No.:</label>";
							echo "<input type='text'  name='contact' class='form-control' value=".$row['ContactNo']."  />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Middle Name:</label>";
							echo "<input type='text'  name='middlename' class='form-control' value=".$row['MiddleName']." />";
							echo "<label for=''>Applied Position:</label>";
							echo "<input type='text' name='position' class='form-control' value=".$row['Position']."  required />";
							echo "<label for=''>Age:</label>";
							echo "<input type='text'  name='age' id='age' class='form-control' onkeyup='AGE()'' value=".$row['Age']." required />";
							echo "<label for=''>Email Address:</label>";
							echo "<input type='text'  name='email' class='form-control' value=".$row['Email']." />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Last Name:</label>";
							echo "<input type='text'  name='lastname'  class='form-control' value = ".$row['LastName']." required />";
							echo "<label for=''>Address:</label>";
							echo "<input type='text'  name='address' class='form-control' value=".$row['Address']."  required />";
							echo "<label for=''>Gender:</label>";
							echo "<input type='text'  name='gender' class='form-control' value=".$row['Gender']." required />";
							echo "<label for=''>Comment:</label>";
							echo "<input type='text'  name='comment' class='form-control' value=".$row['Notes']." />";
							echo "<input type='hidden'  name='PatRef' class='form-control' value=".$row['PatientRef']." />";
							echo "<input type='hidden'  name='PatID' class='form-control' value=".$row['PatientID']." />";
						echo "</div>";
						echo "</div>";

					}
				}
				else if (isset($_POST['addnew']))
				{
				        echo "<form method='POST'>";
				        echo "<div class='row' style='padding: 10px;''>";

						echo "<div class='col'>";
							echo "<label for=''>First Name:</label>";
							echo "<input type='text'  name='firstname' class='form-control' value=''  required />";
							echo "<label for=''>Company Name:</label>";
							echo "<input type='text'  name='company' class='form-control' value='' required />";
							echo "<label for=''>Birth Date:</label>";
							echo "<input type='text'  name='birthday' class='form-control' placeholder='MM-DD-YYYY' value=''  required />";
							echo "<label for=''>Contact No.:</label>";
							echo "<input type='text'  name='contact' class='form-control' value=''  />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Middle Name:</label>";
							echo "<input type='text'  name='middlename' class='form-control' value='' />";
							echo "<label for=''>Applied Position:</label>";
							echo "<input type='text' name='position' class='form-control' value='' required />";
							echo "<label for=''>Age:</label>";
							echo "<input type='text'  name='age' id='age' class='form-control' onkeyup='AGE()'' value='' required />";
							echo "<label for=''>Email Address:</label>";
							echo "<input type='text'  name='email' class='form-control' value='' />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Last Name:</label>";
							echo "<input type='text'  name='lastname'  class='form-control' value='' required />";
							echo "<label for=''>Address:</label>";
							echo "<input type='text'  name='address' class='form-control' value=''  required />";
							echo "<label for=''>Gender:</label>";
							echo "<input type='text'  name='gender' class='form-control' value='' required />";
							echo "<label for=''>Comment:</label>";
							echo "<input type='text'  name='comment' class='form-control' value='' />";
						echo "</div>";
						echo "</div>";
						echo "<input type='submit' class='btn btn-primary' style='height: 40px;' name='ADDNewRecord' value='SUBMIT'>";
						echo "</form>";
						

				}
				        

				?>
	            </div>
	        </div>
	    </div>
	</div>

</div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  	<div class="modal-content">
    <span class="close">&times;</span>

    	<form method="POST" >

    			
            		
            		<select name="selDiscount" id="list">
            			<option value="0">--SELECT DISCOUNT--</option>
            			<option value="1">PWD</option>
            			<option value="2">Senior Citizen</option>
            			
            		</select>
            		<br>
            		<label for="txtSubTotal">Sub Total: </label>
            		<br>
            		<input type="text" name="txtSubTotal" id="totalamount" value="₱: <?php echo $totalamount; ?>" readonly style="background-color: #E8E8BD;">
            		<br>
            		<label for="txtDeduct">Discount: </label>
            		<br>
            		<input type="text" name="txtDeduct" id="txtDeduct" value="₱: 0" readonly style="background-color: #E8E8BD;">
            		<br>
            		<label for="txtTotal">Total:</label>
            		<br>
            		<input type="text" name="txtTotal" id="txtTotal" readonly="" value="<?php echo $totalamount; ?>" style="background-color: #E8E8BD;">
            		
            		<br>
            		<label for="txtAmountRes">Amount Received: </label>
            		<br>
            		<input type="number" name="txtAmountRes" class="form-control visible-xs-block visible-sm-block visible-md-block visible-xs-inline visible-sm-inline visible-md-inline visible-lg-inline" required="required">
            		<br>
            		<br>
            		<input class="btn btn-default" type="submit" name="btnPayout" value="Payout">

            		<?php 

            				if (isset($_POST['btnPayout'])) 
            				{
            						$AmountRes = $_POST['txtAmountRes'];
            						$total = $_POST['txtTotal'];
            				}







            		 ?>
        </form>

        <script>
						$('#list').change(function() {
						    if ($(this).val() === '1') {

						    	var st = <?php echo json_encode($totalamount); ?>;
						    	var compute = st*0.30;
						    	var total = st-compute;
						        document.getElementById('txtTotal').value = total;
						        document.getElementById('txtDeduct').value = compute;

						    }else if ($(this).val() === '2') {

						    	var st = <?php echo json_encode($totalamount); ?>;
						    	var compute = st*0.50;
						    	var total = st-compute;
						    	document.getElementById('txtTotal').value = total;
						        document.getElementById('txtDeduct').value = compute;

						    }else if ($(this).val() === '3') {

						    	var st = <?php echo json_encode($totalamount); ?>;
						    	var compute = st*0.60;
						    	var total = st-compute;
						    	document.getElementById('txtTotal').value = total;
						        document.getElementById('txtDeduct').value = compute;

						    }else if($(this).val() === '0'){
						    	var st = <?php echo json_encode($totalamount); ?>;
						    	document.getElementById('txtTotal').value = st;
						    	document.getElementById('txtDeduct').value = "0";
						    }
						});
		</script>
  </div>

</div>

<div class="footer">
	<input type="hidden"  name="id" class="form-control" value="<?php echo $id; ?>" />
	<!--<button type="submit" class="btn btn-primary" name="CASH" onclick="myFunction()">CASH</button>-->
	<button type="submit" class="btn btn-primary" name="ACCOUNT" >ACCOUNT</button>
</form>


	<button type="submit" class="btn btn-primary" id="CASHPayment">CASH</button>

</div>
	

	<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the button that opens the modal
		var btn = document.getElementById("CASHPayment");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		    modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		    modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>

	 <script src="cashier/jquery.min.js"></script>

</body>
</html>