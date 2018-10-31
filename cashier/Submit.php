<?php
$conn=mysqli_connect("localhost","root","","dbtest");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
date_default_timezone_set("Asia/Kuala_Lumpur");

$comnam=$_POST['comnam'];
$apppos=$_POST['ap'];
$firnam=$_POST['fn'];
$midnam=$_POST['mn'];
$lasnam=$_POST['ln'];
$address=$_POST['address'];
$birdat=$_POST['bd'];
$age=$_POST['age'];
$gen=$_POST['gen'];
$reff=$_POST['reff'];
$connum=$_POST['cn'];
$billto=$_POST['billto'];
$LOE=$_POST['LOE'];
$AN=$_POST['AN'];
$AC=$_POST['AC'];
$comment=$_POST['comment'];
$SID=$_POST['SID'];
$cash_name=$_POST['cash_name'];
$emaadd=isset($_POST['ea']) ? $_POST['ea'] : "NONE";
$class="Referral";
$date=date("Y-m-d H:i:s");
$Package = $_POST['Package'];


$sql = "SELECT * FROM qpd_package WHERE id = '$Package'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $PackName = $row["PackName"];
        $PackList = $row["PackList"];
        $PackPrice= $row["PackPrice"];
    }

	$sql1 = "INSERT INTO qpd_form (comnam, apppos, firnam, midnam, lasnam, address, birdat, age, gen, connum, class, date, comment, SID) VALUES ('$comnam','$apppos','$firnam','$midnam','$lasnam','$address','$birdat','$age','$gen','$connum','$class','$date', '$comment', '$SID') ";

	$sql2 = "INSERT INTO qpd_trans (cash_name, cust_comnam, firnam, midnam, lasnam, cust_birdat, cust_age, cust_gen,reff, connum, PackName, PackList, PackPrice, bill_to, LOE, AN, AC, comment, SID) VALUES ('$cash_name','$comnam','$firnam','$midnam','$lasnam','$birdat','$age','$gen','$reff','$connum','$PackName','$PackList','$PackPrice','$billto','$LOE','$AN','$AC', '$comment', '$SID') ";

	if ($conn->query($sql1) === TRUE) 
	{
		
		if ($conn->query($sql2) === TRUE) 
		{
			$lastid = mysqli_insert_id($conn);
			$sqlSELECT = "SELECT id FROM qpd_form ORDER BY id DESC LIMIT 1";
			$resultSELECT = mysqli_query($conn, $sqlSELECT);
			if (mysqli_num_rows($resultSELECT) > 0) 
			{
				while($rows = mysqli_fetch_assoc($resultSELECT)) 
				{
				    $idSELECT = $rows["id"];

				}

				$sqlUPDATE = "UPDATE qpd_trans SET No = $idSELECT WHERE id = $lastid ";
				$resultUPDATE= $conn->query($sqlUPDATE);

				   
			}
			if ($LOE != '')
			{
			  	$sql3 = "UPDATE qpd_trans SET trans_type ='ACCOUNT' WHERE id = '$lastid'";
			  	if ($conn->query($sql3) === TRUE) 
				{
					$sql4 = "UPDATE qpd_trans SET totalprice ='$PackPrice' WHERE id = '$lastid'";
					if ($conn->query($sql4) === TRUE) 
					{
					  	echo "<script>window.open('ForPrintAccount.php?id=$lastid','_self')</script>";
					}
					else
					{
						echo "Error updating record: " . $conn->error;
					}
				}
				else
				{
					echo "Error updating record: " . $conn->error;
				}
			}

			else
			{
				echo "<script>window.open('TransType.php?id=$lastid','_self')</script>";	
			}
		    
		} 
		else
		{
			echo "Error updating record: " . $conn->error;
		}
	}

}
$conn->close();
?>