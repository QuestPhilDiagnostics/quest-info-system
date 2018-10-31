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
	$CheckID=mysqli_query($conn, "SELECT PatientID from temp_trans WHERE TransactionRef='$id'");
	$checkIDTest = mysqli_fetch_assoc($CheckID);

		if ($checkIDTest['PatientID'] == 0) 
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

				}
				$PatientID= $checkITEMS['PatientID'];
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
					'".$PatientID."',
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

					$selectPat=mysqli_query($conn, "SELECT * from temp_trans WHERE TransactionRef='$id'");
					$checkPat = mysqli_fetch_assoc($selectPat);

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
						Notes, 
						SID) VALUES (
						'".$id."',
						'".$checkPat['CompanyName']."',
						'".$checkPat['Position']."',
						'".$checkPat['FirstName']."',
						'".$checkPat['MiddleName']."',
						'".$checkPat['LastName']."',
						'".$checkPat['Address']."',
						'".$checkPat['Birthdate']."',
						'".$checkPat['Age']."',
						'".$checkPat['Gender']."',
						'".$checkPat['Email']."',
						'".$checkPat['ContactNo']."',
						'".$checkPat['Notes']."',
						'".$checkPat['SID']."'
					)");

					if ($PAT === TRUE)
					{
						$lastid = mysqli_insert_id($conn);
						$updatePat=mysqli_query($conn, "UPDATE qpd_trans SET PatientID ='".$lastid."' WHERE TransactionRef = '".$id."'");

						if ($updatePat === TRUE)
						{
							$DeleteData=mysqli_query($conn, "DELETE FROM temp_trans WHERE TransactionRef = '".$id."'");

							echo "<script>window.open('CashReceipt.php?id=$id&patid=$lastid')</script>";
							echo "<script>window.open('index.php','_self')</script>";

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

				}
				$sPatientID = implode(", ",$PatientID);
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
					'".$sPatientID."',
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

					$selectPat=mysqli_query($conn, "SELECT * from temp_trans WHERE TransactionRef='$id'");
					$checkPat = mysqli_fetch_assoc($selectPat);
					$lastid = $checkPat['PatientID'];

					$PAT = mysqli_query($conn, "UPDATE qpd_patient SET PatientRef='".$id."', CompanyName='".$checkPat['CompanyName']."',Position='".$checkPat['Position']."', FirstName='".$checkPat['FirstName']."', MiddleName='".$checkPat['MiddleName']."', LastName='".$checkPat['LastName']."', Address='".$checkPat['Address']."', Birthdate='".$checkPat['Birthdate']."', Age='".$checkPat['Age']."', Gender='".$checkPat['Gender']."', Email='".$checkPat['Email']."', ContactNo='".$checkPat['ContactNo']."', Notes='".$checkPat['Notes']."',SID='".$checkPat['SID']."' WHERE PatientID = '".$checkPat['PatientID']."'");

					if ($PAT === TRUE)
					{
						$DeleteData=mysqli_query($conn, "DELETE FROM temp_trans WHERE TransactionRef = '".$id."'");
						echo "<script>window.open('CashReceipt.php?id=$id&patid=$lastid')</script>";
						echo "<script>window.open('index.php','_self')</script>";

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
						GrandTotal) VALUES (
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
						'".$ItemPrice."'
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
						GrandTotal) VALUES (
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
						'".$ItemPrice."'
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