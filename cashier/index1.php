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

if ($row['class'] != "CashierCASH")
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
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="refresh" content="5; url=index.ph> -->
	<title>Make A Sale</title>
	<link rel="icon" type="image/png" href="../assets/qpd.png">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- <script type="text/javascript" src="script/ajaxData.js"></script> -->

</head>
<style type="text/css">
	hr
	{
		height: 100px;
	}
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}
	.card-header
	{
		font-family: "Century Gothic";
		font-size: 20px;
		padding-bottom: 0px;
		background-color: #5BC0DE;  
	}

	.card-block, .checkbox
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 14px;
	}
	.card-block input
	{
		font-family: "Century Gothic";
		font-size: 14px;
	}
	.card-block select
	{
		font-family: "Century Gothic";
		font-size: 14px;
	}
	.col p
	{
		text-transform: uppercase;
		font-size: 12px;
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

	th{

		background-color: #08863E;
		color: #F0F0F0;
	}

	td{

		background-color: #ECF0F1;
		color: black;
	}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 150px; /* Location of the box */
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
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #025AA5;
    color: white;
    margin: 1px;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #025AA5;
    color: white;
    margin: 1px;
}




</style>
<body style="background-color: #ECF0F1;">
<?php
include_once('accountsidebar.php');
?>
<div class="container-fluid" >

<div>
    <div class="col-md-12" >
    	<hr style="background-color: : black;">
    	<center>
        <div class="card card-header" style="background-color: #025AA5">

            <div class=" card-inverse card-info" style="background-color: #025AA5;">

            <div class="row" >

            	<div class="col">

            		No.:<b style="padding-right: 70px;">&nbsp;<i class="fas fa-barcode"></i>&nbsp;<?php echo $id; ?></b><br>
            	</div>
            	<div class="col">
            		<i class="fas fa-users"></i>&nbsp; Cashier:&nbsp;<b><?php echo $Cashier; ?></b>
            	</div>
            </div>
            </div>
        </div>   
          </center>
    <div class="card-block" style="height: 130px;" >
			<div class="row">
            	<div class="col" >
            		
            				<form method="POST" >
								  <SELECT name="Item" id="searchpack" class="form-control" style="width: 500px; height: 40px;" >
	               					<OPTION selected="" value="">SELECT ITEM</OPTION>
					                <?php 
					                include_once('../summarycon.php');
					                $select = "SELECT DISTINCT * FROM qpd_items WHERE ItemType LIKE 'CASH%' ORDER BY ItemName ASC";
							        $result = mysqli_query($con, $select);
							        $i=0;
							        
            
							        while($row = mysqli_fetch_array($result))
							        {
							      	echo "<option value='".$row['ItemID']."' style='font-family='Century Gothic';><b>".$row['ItemName']."</b>&nbsp&nbsp&nbsp[".$row['ItemDescription']."]&nbsp&nbsp[".$row['ItemPrice']."]</option>";
									}
									?>

						           </SELECT>
								  <input type="submit" name="item" value="ADD">	

							</form>

				</div>
			<div class="col" style="margin-left: 300px;">
            	<form method="POST">
            		
					<SELECT name="patientId" id="searchpatient" class="form-control" style="width: 400px; height: 40px;" >
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
					<button type="button" class="btn btn-primary" style="height: 40px; width: 140px; font-size: 15px;" data-toggle="modal" data-target="#ModalAdd">Add New Patient</button>
            		<input type="submit" name="SEARCHPATX" style="height: 40px;" class="btn btn-primary" value="SEARCH">
       			

	
		</form>
				
		</div>
		</div>


	
   </div>
   			<div class="row col" style="background-color: #ECF0F1; font-size: 19px;">
   				<form method="POST">
   				
					<div class="row col" style="margin: 0px; height: 0px;" style="background-color: #ECF0F1;">
						<input type="hidden" name="idpatx" style="width: 0px;" value="<?php if(isset($_POST['SEARCHPATX'])){

							echo" $idpatient ";

						}else if(isset($_POST['ADDNewRecord'])){

						
							echo $idpatient ;
							

						} ?>">
					
				
						<input type="text"  name="firstname" class="form-control" style="background-color: #ECF0F1; border: none; width: 350px; height: 20px; font-weight: bold; font-size: 19px; " value="<?php if (isset($_POST['SEARCHPATX'] )){

							echo "".$firstname." ".$middlename." ".$lastname.""; 
						}else{

									$sql = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = $id ");
										while($patdata = mysqli_fetch_array($sql))
										{
											$idpatient=$patdata['PatientID'];
											$company=$patdata['CompanyName'];
											$firstname=$patdata['FirstName'];
											$middlename=$patdata['MiddleName'];
											$lastname=$patdata['LastName'];
											$contact=$patdata['ContactNo'];
											
											
											

							}
							if(isset($_POST['ADDNewRecord'])){

								echo "".$firstname." ".$middlename." ".$lastname."";
							}

					

						}?>" id="myInput" required readonly />
						
						<input type="text"  name="company" class="form-control" style="background-color: #ECF0F1; border: none; width: 150px; height: 20px; font-weight: bold; font-size: 19px;" value="<?php if (isset($_POST['SEARCHPATX'])){

								echo $company; 

						}else{

							$sql = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = $id ");
										while($patdata = mysqli_fetch_array($sql))
										{
											$idpatient=$patdata['PatientID'];
											$company=$patdata['CompanyName'];
											$firstname=$patdata['FirstName'];
											$middlename=$patdata['MiddleName'];
											$lastname=$patdata['LastName'];
											$contact=$patdata['ContactNo'];
											echo $company; 
											

							}


						} ?>" id="myInput" required readonly/>
						
						<input type="text" name="position" class="form-control" style="background-color: #ECF0F1; border: none; width: 150px; height: 20px; font-weight: bold; font-size: 19px;" value="<?php if (isset($_POST['SEARCHPATX'])){

							echo $contact; 
						}else{

							$sql = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = $id ");
										while($patdata = mysqli_fetch_array($sql))
										{
											$idpatient=$patdata['PatientID'];
											$company=$patdata['CompanyName'];
											$firstname=$patdata['FirstName'];
											$middlename=$patdata['MiddleName'];
											$lastname=$patdata['LastName'];
											$contact=$patdata['ContactNo'];
											echo $contact; 
											

							}


						}
						?>" id="myInput" required readonly />
			</form>

					</div>	

					
				</div>

            	
				<table class="table table-hover table-striped">
		          <thead>
		            <tr colspan="8">
		              
		              <th width="10%">Item #</th>
		              <th width="10%">Item Name</th>
		              <th width="1%">Attribute</th>
		              <th width="10%">Quantity</th>
		              <th width="10%"></th>
		              <th width="10%">Price</th>
		              <th width="10%">Ext Price</th>
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
		                $query= mysqli_query($con, "INSERT into temp_trans (TransactionRef, ItemID, ItemName, ItemDescription, ItemQTY, ItemPrice, Cashier, GrandTotal) VALUES ('".$lastid."','".$pack2[0]."', '".$pack2[1]."', '".$pack2[3]."',1,'".$pack2[2]."',  '".$Cashier."','".$pack2[2]."')");
		                echo "<meta http-equiv='refresh' content='0'>";
		                //echo "<meta http-equiv='refresh' content='0;url=http:localhost/qis/cashier/index.php?id=$finalRef'/>";
		                  }
		                else
		                {
		                   $i=0;
		                   $totalaccount = 0;
		                   $totalamount = 0;
		                   $totalqty = 0;

		                  
		                   $queryselect = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef='".$lastid."' ");
		                    while($query2= mysqli_fetch_array($queryselect))
		                        {
					                echo "<form method='POST' action='EditQuantity.php?id=".strip_tags($query2[5])."&amp;reference=".$lastid."' >";

					                echo "<tr style='background-color: red;'>";
					                    echo "<td style=' font-weight: bold; background-color: #025AA5;'><input type='text' name='idnumber' id='' value='".strip_tags($query2[5])."' style='width: 90px; background-color: #025AA5; border: none;' readonly></td>";
					                    echo "<td style=' font-weight: bold; background-color: #025AA5;' nowrap>".strip_tags($query2[6])."</td>";
					                    echo "<td style=' font-weight: bold; background-color: #025AA5;' nowrap>Discount:  ".strip_tags($query2[21])."% <br> Item Price: ".strip_tags($query2[9])." </td>";
					                 
					                    echo "<td id = 'value2' onload = 'Check101()' style=' font-weight: bold; background-color:  #025AA5;display: none; ' nowrap>
					                    Original Price: 	".strip_tags($query2[9])."		<br>  
					                    Discount %: 		<b id = 'value3'>".strip_tags($query2[21])."</b> 	</td>";

					                    echo "<td style='font-weight: bold; background-color:  #025AA5;' nowrap>
					                    	QTY: <input type='text' name='quantitytxt' id='quantitytxt' value='".strip_tags($query2[8])."' style='width: 90px; background-color: white; border: 1px solid;' >
					                    	Discount %:<input type='number' name='discounttxt' id='discounttxt' value='".strip_tags($query2[21])."' style='width: 90px; background-color: #ECF0F1; border: 1px solid;'></td>";
					                    echo "<td style='background-color:  #025AA5;'><input type='submit' class='btn btn-success' style='width: 140px; height: 30px;font-size: 12px; text-align: center;' name='btnaddquantity' id='btnaddquantity' value='Edit QTY/Discount' href = 'EditQuantity.php?id=".strip_tags($query2[5])."&amp;reference=".$lastid."';>
					                    <button type='button' class='btn btn-danger' style='width: 100px; height: 30px;font-size: 12px; padding: 0px; margin-bottom:5px;' onclick='javascript:confirmationDelete($(this));return false;'' href = 'DeleteItem.php?id=".strip_tags($query2[0])."&amp;reference=".$lastid."';'><i class='far fa-trash-alt'></i>&nbsp;&nbsp;Remove</button></td>";

						            	echo "<td style='background-color:  #025AA5;'><input type='text' name='unitprice' id='unitprice' value='₱:".strip_tags($query2[17])."' style='width: 90px; background-color: #025AA5; border: none;' readonly></td>";


					                    echo "<td style=' font-weight: bold; background-color:  #025AA5;'><input type='text' name='txtpricegtotal' id='txtpricegtotal' value='₱:".strip_tags($query2[18])."' style='width: 90px; background-color: #025AA5; border: none;'></td>";    	
					                echo "</tr>";
					                echo "</form>";
					                    $totalaccount += $query2[18];
					                    $totalqty += $query2[8];
					                    $totalamount = number_format((float)$totalaccount, 2, '.', '');
					                    $i++;
					                    $queryadd = mysqli_query($con, "INSERT FROM temp_trans WHERE TotalPrice='".$totalaccount."' ");
		                      	}
		                      

		                    	
		                  }



		                  		
		              ?>
		          </tbody>
		         </table>



<form method="POST">
 <div class="row">
	<div class="col-8">
	

	</div>
	<div class="col-2" style="font-size: 20px;">
		<p>Sub Total: </p>
		<p >Amount Received: </p>
	

	</div>
	<div class="col-2">
		<p><input type="number" value="<?php echo $totalamount;?>" readonly style="background-color: #ECF0F1; border: none; padding-left: 50px;"></p>
		<input type="hidden" name="txtSubTotal" id="txtSubTotal" value="<?php echo $totalamount;?>"><br>
        <p style="padding-left: 50px;"><input type="number" name="txtAmountRes" id="txtAmountRes" class="" style="width: 100px; height: 30px;"></p>
	</div>
	

</div>

<hr>
 <div class="row">
	<div class="col-8">
	<input class="btn btn-primary" type="submit" name="btnPayout" id="btnPayout" value="CASH" style="margin-right: 10px; font-size: 16px; width: 100px; height: 40px; background-color:  #0260B0;">
	</div>
</form>
	<div class="col-2">
		<p style="color: red; font-size: 20px;"><b>Amount Due:</b></p>
		<p style="font-weight: bolder; font-size: 20px;">Change: </p>
	</div>
	<div class="col-2">
		<p><input type="text" name="txtTotal" id="txtTotal" readonly="" value="₱:<?php echo $totalamount; ?>" style="background-color: #ECF0F1; border: none; color: red; font-size: 20px; font-weight: bold;padding-left: 50px;"></p>
            	<?php 
		        include_once('../summarycon.php');


		        $id = $_GET['id'];
				$sqlselect12=mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = '$id'");
				while ($result12 = mysqli_fetch_assoc($sqlselect12)) 
				{
					$sChange12 = $result12['PaidOut'];
				}

				error_reporting(0);
			
				?>
			<p style="padding-left: 50px;"><input type="text" id="" value="₱:<?php 
            	
       		

            		echo $sChange12;

            	 
            	?> " style="background-color: #ECF0F1; width: 90px; border: none; font-weight: bolder; font-size: 20px;"  readonly></p>



	</div>
	

</div>
<?php

if (isset($_POST['btnPayout'])) 
	{
	# code...
	$id = $_GET['id'];
	$sqlselect=mysqli_query($con, "SELECT * FROM temp_trans  WHERE TransactionRef = '$id'");
	while ($result = mysqli_fetch_assoc($sqlselect)) 
	{

	  $GrandTotal = $result['GrandTotal'];
	}
		$AmountRes = $_POST['txtAmountRes'];
		$total = $_POST['txtSubTotal'];
		$change = $AmountRes-$total; 
        $id = $_GET['id'];



		if ($total>$AmountRes) 
		{
 			echo '<script type="text/javascript"> alert("Please enter higher amount!") </script>';
 		}
 		else
 		{


           	$AmountRes = $_POST['txtAmountRes'];
           	$change = $AmountRes-$total;

           	

           	$sqlupdate = "UPDATE temp_trans SET PaidIn = '$AmountRes', PaidOut = '$change' WHERE TransactionRef ='$id'";


           	if ($con->query($sqlupdate) === TRUE) 
		    {
		    	echo "<script>window.open('index.php?id=$id','_self')</script>";
		    }
		  	else
		  	{
		      echo "Error updating record: " . $con->error;
		  	}
						
		}

}



?>
<hr>
 <div class="row">
	<div class="col-8">

	</div>
	<div class="col-2">
	<input type="submit" class="btn btn-primary" name="SAVE" style="margin-left: 10px; font-size: 18px; width: 200px; height: 40px;	" value="SAVE ONLY" />
	</div>
	<div class="col-2">
	<form action="finaltrans.php?id=<?php echo $id ?>&idpatx=<?php echo $idpatient ?>" method="POST">
		<button type="button" class="btn btn-primary" name="CASH" style="margin-left: 10px; font-size: 18px; width: 180px; height: 40px;" data-toggle="modal" data-target="#myModal">SAVE AND PRINT</button>
		<input type="hidden"  name="id" class="form-control" value="<?php echo $id; ?>" />
		<input type="hidden"  name="idpatx" class="form-control" value="<?php if(isset($_POST['SEARCHPATX'])){ echo $idpatient ;} ?>" />
	</form>        

	</div>
	

</div>





	  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      	<div class="modal-header">
      		<br>
      	</div>
        <form method="POST" action="finaltrans.php?id=<?php echo $id ?>&idpatx=<?php echo $idpatient ?>" >
        	<div style="font-size: 20px; font-family: Century Gothic;">
    			<center>
 
              		<label for="txtTotal" style="padding-top: 50px; margin: 10px; font-weight: bold;">Amount Due: </label>
 
            		<input type="text" name="txtTotal" id="txtTotal" readonly="" value="<?php echo $totalamount; ?>" style="background-color: white; width: 110px; border: none; margin: 10px;">
            		<br>
            		<label for="txtAmountRes" style="margin: 10px; font-weight: bold;">Change: </label>
      
            		<input type="number" name="txtAmountRes"  required="required" value="<?php echo $sChange12 ?>" style="width: 110px; margin: 10px; border: none;" readonly>
            		<br>
            		<input class="btn btn-primary" type="submit" name="CASH" value="OK" onclick="return RefreshWindow();" style="width: 110px; height: 50px; margin: 10px; font-size: 15px;">
            		<input type="hidden"  name="id" class="form-control" value="<?php echo $id; ?>" />
					<input type="hidden"  name="idpatx" class="form-control" value="<?php if(isset($_POST['SEARCHPATX'])){ echo $idpatient ;} ?>" />
					</center>

					<script>
						

						function RefreshWindow()
						{
						         window.location.reload(true);
						}

					</script>
			</div>
		</form>
      <div class="modal-footer">
      		
      	</div>
      
    </div>
  </div>
  
</div>


<div class="modal fade" id="ModalAdd" role="dialog" style="padding-top: 100px;">
	<center>
    <div class="" style="width: 500px;">
    	 <div class="modal-content modal-dialog">

    	 	<div class="modal-header" style="font-size: 20px;">
    	 	    	 	
    	 		Add New Patient
      		<br>
      	</div>
<form method="POST">
      	 <div style="width: 500px; padding: 30px;">
      	 	<div class="row">
      	 	<div class="col">
       			<input type="hidden"  name="idpatient" class="form-control" value="" id="myInput" required />
				<label for="">Company Name:</label>
				<input type="text"  name="company" class="form-control" value="" id="myInput" required />
				<label for="">Applied Position:</label>
				<input type="text" name="position" class="form-control" value="" id="myInput" required />
				<label for="">First Name:</label>
				<input type="text"  name="firstname" class="form-control" value="" id="myInput" required />
				<label for=""> Middle Name:</label>
				<input type="text"  name="middlename" class="form-control" value="" id="myInput" />
				<label for=""> Last Name:</label>
				<input type="text"  name="lastname"  class="form-control" value="" id="myInput" required />
			</div>
			<div class="col">
				<label for="">Address:</label>
				<input type="text"  name="address" class="form-control" value="" id="myInput" required />
				<label for=""> Birth Date:</label>
				<input type="text"  name="birthday" class="form-control" placeholder="MM-DD-YYYY" value="" id="myInput" required />
				<label for="">Age:</label>
				<input type="text"  name="age" id="age" class="form-control" onkeyup="AGE()" value="" id="myInput" required />
				<label for="">Gender:</label>
				<input type="text"  name="gender" class="form-control" value="" id="myInput" required  />
				<label for="">Contact No.:</label>
				<input type="text"  name="contact" class="form-control" value="" id="myInput" />	
			</div>
			<div class="col">
				<label for="">Email Address:</label>
				<input type="text"  name="email" class="form-control" value="" id="myInput" />
				<label for="">Bill to:</label>
				<input type="text"  name="billto" id="billto" class="form-control" onkeyup="HMO()" id="myInput" value="" />
				<br>
				<button type="submit"  name="ADDNewRecord" class="btn btn-primary" style="font-size: 14px; width: 120px; height: 40px;"><i class="far fa-check-circle"></i>&nbsp; SUBMIT</button>
				<!-- <button onclick="myFunction()">TRY</button> -->

				
		
			</div>	
		</div>
		</div>
</form>

 </div>
</div>
</center>
</div>




</script>

<?php
	
	include_once('../summarycon.php');
		if(isset($_POST['ADDNewRecord']))
			{
				$id=$_GET['id'];
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



				$addtemp_patient = " UPDATE temp_trans SET
										CompanyName = '$company',
										Position = '$position',
										FirstName = '$firstname',
										MiddleName = '$middlename',
										LastName = '$lastname',
										Address = '$address',
										Birthdate = '$birthday',
										Email = '$email',
										Age = '$age',
										Gender = '$gender',
										ContactNo = '$contact'
										WHERE TransactionRef = '$id'";

				if ($con->query($addtemp_patient) === TRUE) 
			    {

					// header("Refresh: 5; url=index.php?id=.$id");
			        echo "<script> alert('Record Updated Successfully') </script>";
			        //header('location: index.php?id='.$id);





			    }
			  else
			    {
			      echo "Error updating record: " . $con->error;
			      echo "<script> alert('.$conn->error.') </script>";

			    }

			    header("Refresh: 5; url=index.php?id=.$id");


		}

?>

	
												

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

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

	function confirmationDelete(anchor)
	{
		var conf = confirm('Are you sure want to delete this package?');
		if(conf)
		window.location=anchor.attr("href");
	}

	function confirmationEdit(anchor)
	{
		var conf = confirm('Are you sure want to edit this package?');
		if(conf)
		window.location=anchor.attr("href");
	}

	function Check101()
	{

		var x = document.getElementById("value3").value;
		if (x != "" ||  x != "0") 
		{
		   document.getElementById('value1').style.display = 'none';
		   document.getElementById('value2').style.display = 'block';

		}
		else
		{
		   document.getElementById('value1').style.display = 'block';
		   document.getElementById('value2').style.display = 'none';

		}
		


	}
</script>




<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
  $(document).ready(function(){
    $('#myForm').submit(function(){
        $.ajax({
            url : 'index.php',
            data : $(this).serialize(),
            type : 'POST',
            success : function(data){
                console.log(data);
                $("#success").show().fadeOut(5000);
            },
            error:function(data){
                $("#error").show().fadeOut(5000);
            }
        });
        // !important for ajax form submit
        return false;
    });
});
  </script>

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</div>
</body>
</html>