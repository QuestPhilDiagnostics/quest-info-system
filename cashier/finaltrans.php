<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
//CASH
if (isset($_POST['CASH']))
{
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$date=date("Y-m-d H:i:s");
	$id = $_POST['id'];
	$idpatx = $_POST['idpatx'];

	if ($idpatx == '') 
	{

		$selectITEMS=mysqli_query($conn, "SELECT * from temp_trans WHERE TransactionRef='$id'");
		//insert to qpd_trans
		while($checkITEMS = mysqli_fetch_assoc($selectITEMS))
		{
			$ItemID[] = $checkITEMS['ItemID'];
			$ItemName[] = $checkITEMS['ItemName'];
			$ItemDesc[] = $checkITEMS['ItemDescription'];
			$ItemPrice[] = $checkITEMS['ItemPrice'];
			$ItemQTY[] = $checkITEMS['ItemQTY'];
			$Cashier[] = $checkITEMS['Cashier'];
			$PatientID[] = $checkITEMS['PatientID'];
			$GrandTotal[] = $checkITEMS['GrandTotal'];
			$Discount[] = $checkITEMS['Discount'];
			$PaidIn[] = $checkITEMS['PaidIn'];
			$PaidOut[] = $checkITEMS['PaidOut'];
			$TotalPrice[] = $checkITEMS['TotalPrice'];
			$CompanyName= $checkITEMS['CompanyName'];
			$Position = $checkITEMS['Position'];
			$FirstName = $checkITEMS['FirstName'];
			$MiddleName = $checkITEMS['MiddleName'];
			$LastName = $checkITEMS['LastName'];
			$Address = $checkITEMS['Address'];
			$Birthdate = $checkITEMS['Birthdate'];
			$Email = $checkITEMS['Email'];
			$Age = $checkITEMS['Age'];
			$Gender = $checkITEMS['Gender'];
			$ContactNo = $checkITEMS['ContactNo'];

		}
		$sCashier = implode(", ",$Cashier);
		$sGrandTotal = implode(", ",$GrandTotal);
		$sDiscount = implode(", ",$Discount);
		$sPaidIn = implode(", ",$PaidIn);
		$sPaidOut = implode(", ",$PaidOut);
		$comTotalPrice =  array_sum($ItemPrice);
		$comItemID =  implode(", ",$ItemID);
		$comItemName =  implode(", ",$ItemName);
		$comItemDesc =  implode(", ",$ItemDesc);
		$comItemPrice =  implode(",  ",$ItemPrice);
		$comTotalQTY =  array_sum($ItemQTY);



		$TRANS = mysqli_query($conn, "INSERT INTO qpd_trans(
						TransactionRef, 
						TransactionType, 
						PatientID, 
						Cashier, 
						ItemID, 
						ItemName, 
						ItemDescription, 
						ItemPrice, 
						TotalPrice, 
						ItemQTY, 
						GrandTotal, 
						PaidIn, 
						PaidOut, 
						Discount) VALUES (
						'".$id."',
						'CASH',
						'".$idpatx."',
						'".$sCashier."', 
						'".$comItemID."', 
						'".$comItemName."', 
						'".$comItemDesc."',
						'".$comItemPrice."',
						'".$comTotalPrice."',
						'".$comTotalQTY."',
						'".$sGrandTotal."',
						'".$sPaidIn."',
						'".$sPaidOut."',
						'".$sDiscount."'
					)");

				if ($TRANS === TRUE)
				{

					$TRANS1 = mysqli_query($conn, "INSERT INTO qpd_patient(
						PatientRef, 
						PatientType, 
						CompanyName, 
						Position, 
						FirstName, 
						MiddleName, 
						LastName, 
						Address, 
						Birthdate, 
						Email, 
						Age, 
						Gender, 
						ContactNo) VALUES (
						'".$id."',
						'CASH',
						'".$CompanyName."',
						'".$Position."', 
						'".$FirstName."', 
						'".$MiddleName."', 
						'".$LastName."',
						'".$Address."',
						'".$Birthdate."',
						'".$Email."',
						'".$Age."',
						'".$Gender."',
						'".$ContactNo."'
					)");

						if($TRANS1 === TRUE)
						{
							$lastid1 = mysqli_insert_id($conn);
							$UPDATETrans=mysqli_query($conn, "UPDATE qpd_trans SET PatientID = '$lastid1' WHERE TransactionRef='$id'");
								if($UPDATETrans === TRUE){
									$DeleteData=mysqli_query($conn, "DELETE FROM temp_trans WHERE TransactionRef = '$id'");
									echo "<script>window.open('CashReceipt.php?id=$id&patid=$lastid1')</script>";
									echo "<script>window.open('Cash.php','_self')</script>";
								}
								else
								{
									echo("Error description: " . mysqli_error($conn));
								}

						}
						else
						{

								echo("Error description: " . mysqli_error($conn));

						}



				}
				else
				{

					echo("Error description: " . mysqli_error($conn));

				}


		}
		else
		{

		$selectITEMS=mysqli_query($conn, "SELECT * from temp_trans WHERE TransactionRef='$id'");
		//insert to qpd_trans
		while($checkITEMS = mysqli_fetch_assoc($selectITEMS))
		{
			$ItemID[] = $checkITEMS['ItemID'];
			$ItemName[] = $checkITEMS['ItemName'];
			$ItemDesc[] = $checkITEMS['ItemDescription'];
			$ItemPrice[] = $checkITEMS['ItemPrice'];
			$ItemQTY[] = $checkITEMS['ItemQTY'];
			$Cashier[] = $checkITEMS['Cashier'];
			$PatientID[] = $checkITEMS['PatientID'];
			$GrandTotal[] = $checkITEMS['GrandTotal'];
			$Discount[] = $checkITEMS['Discount'];
			$PaidIn[] = $checkITEMS['PaidIn'];
			$PaidOut[] = $checkITEMS['PaidOut'];
			$TotalPrice[] = $checkITEMS['TotalPrice'];
			$CompanyName= $checkITEMS['CompanyName'];
			$Position = $checkITEMS['Position'];
			$FirstName = $checkITEMS['FirstName'];
			$MiddleName = $checkITEMS['MiddleName'];
			$LastName = $checkITEMS['LastName'];
			$Address = $checkITEMS['Address'];
			$Birthdate = $checkITEMS['Birthdate'];
			$Email = $checkITEMS['Email'];
			$Age = $checkITEMS['Age'];
			$Gender = $checkITEMS['Gender'];
			$ContactNo = $checkITEMS['ContactNo'];

		}
		$sCashier = implode(", ",$Cashier);
		$sGrandTotal = implode(", ",$GrandTotal);
		$sDiscount = implode(", ",$Discount);
		$sPaidIn = implode(", ",$PaidIn);
		$sPaidOut = implode(", ",$PaidOut);
		$comTotalPrice =  array_sum($ItemPrice);
		$comItemID =  implode(", ",$ItemID);
		$comItemName =  implode(", ",$ItemName);
		$comItemDesc =  implode(", ",$ItemDesc);
		$comItemPrice =  implode(",  ",$ItemPrice);
		$comTotalQTY =  array_sum($ItemQTY);



		$TRANS = mysqli_query($conn, "INSERT INTO qpd_trans(
						TransactionRef, 
						TransactionType, 
						PatientID, 
						Cashier, 
						ItemID, 
						ItemName, 
						ItemDescription, 
						ItemPrice, 
						TotalPrice, 
						ItemQTY, 
						GrandTotal, 
						PaidIn, 
						PaidOut, 
						Discount) VALUES (
						'".$id."',
						'CASH',
						'".$idpatx."',
						'".$sCashier."', 
						'".$comItemID."', 
						'".$comItemName."', 
						'".$comItemDesc."',
						'".$comItemPrice."',
						'".$comTotalPrice."',
						'".$comTotalQTY."',
						'".$sGrandTotal."',
						'".$sPaidIn."',
						'".$sPaidOut."',
						'".$sDiscount."'
					)");

				if ($TRANS === TRUE)
				{

					$TRANS1 = mysqli_query($conn, "UPDATE qpd_patient SET PatientRef = '".$id."' WHERE PatientID = '".$idpatx."'");

						if($TRANS1 === TRUE)
						{
							$DeleteData=mysqli_query($conn, "DELETE FROM temp_trans WHERE TransactionRef = '$id'");
							echo "<script>window.open('CashReceipt.php?id=$id&patid=$idpatx')</script>";
							echo "<script>window.open('Cash.php','_self')</script>";
						}
						else
						{
							echo("Error description: " . mysqli_error($conn));
						}

				}
				else
				{

					echo("Error description: " . mysqli_error($conn));

				}



		}
}


//ACCOUNT
	else if(isset($_POST['ACCOUNT']))
	{
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$date=date("Y-m-d H:i:s");
		$id = $_POST['id'];
		$cashier = $_POST['cashier'];
		$idpatient = $_POST['idpatient'];
		$item = $_POST['Item'];

		if ($idpatient == 0 ) 
		{
			$PAT = mysqli_query($conn, "INSERT INTO qpd_patient(
						PatientRef, 
						CompanyName, 
						Position, 
						FirstName, 
						MiddleName, 
						LastName, 
						Address, 
						Birthdate, 
						Age, 
						Gender, 
						Email, 
						ContactNo, 
						Notes) 
						VALUES 
						('".$id."',
						'".$_POST['company']."',
						'".$_POST['position']."',
						'".$_POST['firstname']."',
						'".$_POST['middlename']."',
						'".$_POST['lastname']."',
						'".$_POST['address']."',
						'".$_POST['birthdate']."',
						'".$_POST['age']."',
						'".$_POST['gender']."',
						'".$_POST['email']."',
						'".$_POST['contact']."',
						'".$_POST['comment']."'
					)");
					if ($PAT === TRUE)
					{
						$lastid = mysqli_insert_id($conn);
						$selectITEMS=mysqli_query($conn, "SELECT * from qpd_items WHERE ItemID='$item'");
						$checkITEMS = mysqli_fetch_assoc($selectITEMS);
						$ItemID = $checkITEMS['ItemID'];
						$ItemName = $checkITEMS['ItemName'];
						$ItemDesc = $checkITEMS['ItemDescription'];
						$ItemPrice= $checkITEMS['ItemPrice'];


						$TRANS = mysqli_query($conn, "INSERT INTO qpd_trans(
						TransactionRef, 
						TransactionType, 
						PatientID, 
						Cashier, 
						ItemID, 
						ItemName, 
						ItemDescription, 
						ItemPrice, 
						TotalPrice, 
						ItemQTY, 
						GrandTotal,
						Biller,
						Referral,
						LOE,
						AN,
						AC,
						SID) VALUES (
						'".$id."',
						'ACCOUNT',
						'".$lastid."',
						'".$cashier."', 
						'".$ItemID."', 
						'".$ItemName."', 
						'".$ItemDesc."',
						'".$ItemPrice."',
						'".$ItemPrice."',
						'1',
						'".$ItemPrice."',
						'".$_POST['billto']."',
						'".$_POST['reff']."',
						'".$_POST['LOE']."',
						'".$_POST['AN']."',
						'".$_POST['AC']."',
						'".$_POST['SID']."'
						)");

						if ($TRANS === TRUE) 
						{

							echo "<script>window.open('AccountReceipt.php?id=$id&patid=$lastid')</script>";
							echo "<script>window.open('Account.php','_self')</script>";
							
						}
						else 
						{
							echo("Error description: " . mysqli_error($conn));
						}
					}

					else 
					{
						echo("Error description: " . mysqli_error($conn));
					}
		}
		else 
		{
			$PAT = mysqli_query($conn, "UPDATE qpd_patient SET PatientRef='".$id."', CompanyName='".$_POST['company']."',Position='".$_POST['position']."', FirstName='".$_POST['firstname']."', MiddleName='".$_POST['middlename']."', LastName='".$_POST['lastname']."', Address='".$_POST['address']."', Birthdate='".$_POST['birthdate']."', Age='".$_POST['age']."', Gender='".$_POST['gender']."', Email='".$_POST['email']."', ContactNo='".$_POST['contact']."', Notes='".$_POST['comment']."' WHERE PatientID = '".$_POST['idpatient']."'");

					if ($PAT === TRUE)
					{
						$selectITEMS=mysqli_query($conn, "SELECT * from qpd_items WHERE ItemID='$item'");
						$checkITEMS = mysqli_fetch_assoc($selectITEMS);
						$ItemID = $checkITEMS['ItemID'];
						$ItemName = $checkITEMS['ItemName'];
						$ItemDesc = $checkITEMS['ItemDescription'];
						$ItemPrice= $checkITEMS['ItemPrice'];


						$TRANS = mysqli_query($conn, "INSERT INTO qpd_trans(
						TransactionRef, 
						TransactionType, 
						PatientID, 
						Cashier, 
						ItemID, 
						ItemName, 
						ItemDescription, 
						ItemPrice, 
						TotalPrice, 
						ItemQTY, 
						GrandTotal,
						Biller,
						Referral,
						LOE,
						AN,
						AC,
						SID) VALUES (
						'".$id."',
						'ACCOUNT',
						'".$idpatient."',
						'".$cashier."', 
						'".$ItemID."', 
						'".$ItemName."', 
						'".$ItemDesc."',
						'".$ItemPrice."',
						'".$ItemPrice."',
						'1',
						'".$ItemPrice."',
						'".$_POST['billto']."',
						'".$_POST['reff']."',
						'".$_POST['LOE']."',
						'".$_POST['AN']."',
						'".$_POST['AC']."',
						'".$_POST['SID']."'
						)");

						if ($TRANS === TRUE) 
						{

							echo "<script>window.open('AccountReceipt.php?id=$id&patid=$idpatient')</script>";
							echo "<script>window.open('Account.php','_self')</script>";
							
						}
						else 
						{
							echo("Error description: " . mysqli_error($conn));
						}
					}

					else 
					{
						echo("Error description: " . mysqli_error($conn));
					}
			
		}

		

	}
	else 
	{
		echo("Error description: " . mysqli_error($conn));
	}









}
$conn->close();
?>