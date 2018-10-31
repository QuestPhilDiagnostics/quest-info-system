<?php
$con=mysqli_connect("localhost","root","","dbqis");
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  	date_default_timezone_set("Asia/Kuala_Lumpur");
  	$printdate = date("Y-m-d H:i:s");

  	$SD = $_GET['SD'];
    $ED = $_GET['ED'];
    $j=0;
    $select = "SELECT GrandTotal FROM qpd_trans WHERE TransactionType = 'CASH' AND TransactionDate >= '$SD' AND TransactionDate <= '$ED'";
	$result = mysqli_query($con, $select);


    while($row = mysqli_fetch_array($result))
    {
    	$totalcash1[] = $row['GrandTotal'];
    	$j++;

    }
    $tots = implode(", ",$totalcash1);
    $tots1 = explode(", ",$tots);
    $totalcash = array_sum($tots1);

    $i=0;
	$select1 = "SELECT TotalPrice FROM qpd_trans WHERE TransactionType = 'ACCOUNT' AND TransactionDate >= '$SD' AND TransactionDate <= '$ED'";
	$result1 = mysqli_query($con, $select1);
    $totalaccount = 0;
    while($row = mysqli_fetch_array($result1))
    {
    	$totalaccount += $row['TotalPrice'];
    	$i++;
    	
    }

	$select2 = "SELECT PaidOut FROM qpd_trans WHERE TransactionDate >= '$SD' AND TransactionDate <= '$ED'";
	$result2 = mysqli_query($con, $select2);
    $change = 0;
    while($row = mysqli_fetch_array($result2))
    {
    	$change += $row['PaidOut'];
    	
    }

	$select3 = "SELECT PaidIn FROM qpd_trans WHERE TransactionDate >= '$SD' AND TransactionDate <= '$ED'";
	$result3 = mysqli_query($con, $select3);
    $cash = 0;
    while($row = mysqli_fetch_array($result3))
    {
    	$cash += $row['PaidIn'];
    	
    }

	$net = $totalaccount + $totalcash;
	$count= $j + $i;
   


?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>End of the Day Report</title>
    <link rel="stylesheet" href="style.css">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	</head>
<style type="text/css">
	.container-fluid
	{
		font-family: "Century Gothic";
		font-size: 12px;

	}
		td
	{
		font-family: "Century Gothic";
		font-size: 12px;

	}
</style>
<body>	
<div class="container-fluid" >
<div class="col-4" style="padding: 0px; margin-top: 30px;">
	<div class="row">
		<div class="col"><?php echo $printdate; ?></div>
	</div>
	<div class="row">
		<div class="col" style="font-size: 14px;"><center><b>QUEST INFO SYSTEM</b></center></div>
	</div>
	<div class="row">
		<div class="col" style="font-size: 14px;"><center><b>END OF THE DAY REPORT</b></center></div>
	</div>
	<div class="row">
		<div class="col"><center><?php echo $SD; ?> to <?php echo $ED; ?></center></div>
	</div>
	<div class="row">
		<div class="col"><b>SlsActvt</b></div>
		<div class="col"><b>Sales</b></div>
		<div class="col"><b>Return</b></div>
		<div class="col text-right"><b style="padding-right: 10px;">Net</b></div>
	</div>
	<div class="row">
		<div class="col">NonTxbl:</div>
		<div class="col"><?php echo number_format((float)$net, 2, '.', '');?></div>
		<div class="col"></div>
		<div class="col text-right"><?php echo number_format((float)$net, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col">Subttl:</div>
		<div class="col"><?php echo number_format((float)$net, 2, '.', '');?></div>
		<div class="col"></div>
		<div class="col text-right"><?php echo number_format((float)$net, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col"><b>Ttl Act:</b></div>
		<div class="col"><b><?php echo number_format((float)$net, 2, '.', '');?></b></div>
		<div class="col"><b>0.00</b></div>
		<div class="col text-right"><b><?php echo number_format((float)$net, 2, '.', '');?></b></div>
	</div>
	<div class="row">
		<div class="col"><b>Sales Adjustments</b></div>
	</div>
	<div class="row">
		<div class="col">Net Sales Activity:</div>
		<div class="col text-right"><?php echo number_format((float)$net, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col">Charge to Account:</div>
		<div class="col text-right">(<?php echo number_format((float)$totalaccount, 2, '.', '');?>)</div>
	</div>
	<div class="row">
		<div class="col">Gift Certificate used:</div>
		<div class="col text-right">0.00</div>
	</div>
	<div class="row">
		<div class="col">Gift Cards used:</div>
		<div class="col text-right">0.00</div>
	</div>
	<div class="row">
		<div class="col">Net Deposits used:</div>
		<div class="col text-right">0.00</div>
	</div>
	<div class="row">
		<div class="col">Payouts:</div>
		<div class="col text-right">0.00</div>
	</div>
	<div class="row">
		<div class="col"><b>Total Available for Deposit:</b></div>
		<div class="col text-right"><b><?php echo number_format((float)$totalcash, 2, '.', '');?></b></div>
	</div>
	<div class="row">
		<div class="col"><center><b>RECEIPT COUNTS</b></center></div>
	</div>
	<div class="row">
		<div class="col">Sales:</div>
		<div class="col text-right"><?php echo $count;?></div>
	</div>
	<div class="row">
		<div class="col">Returns:</div>
		<div class="col text-right">0</div>
	</div>
	<div class="row">
		<div class="col">Deposits:</div>
		<div class="col text-right">0</div>
	</div>
	<div class="row">
		<div class="col">Reversed:</div>
		<div class="col text-right">0</div>
	</div>
	<div class="row">
		<div class="col">Payouts:</div>
		<div class="col text-right">0</div>
	</div>
	<br>
	<div class="row">
		<div class="col"><b>Dollars</b></div>
	</div>
	<div class="row">
		<div class="col">Paid In:</div>
		<div class="col text-right"><?php echo number_format((float)$cash, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col">Paid Out:</div>
		<div class="col text-right"><?php echo number_format((float)$change, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col">Net:</div>
		<div class="col text-right"><?php echo number_format((float)$totalcash, 2, '.', '');?></div>
	</div>
	<br>
	<div class="row">
		<div class="col"><b>Account</b></div>
	</div>
	<div class="row">
		<div class="col">Paid In:</div>
		<div class="col text-right"><?php echo number_format((float)$totalaccount, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col">Paid Out:</div>
		<div class="col text-right">0.00</div>
	</div>
	<div class="row">
		<div class="col">Net:</div>
		<div class="col text-right"><?php echo number_format((float)$totalaccount, 2, '.', '');?></div>
	</div>
	<div class="row">
		<div class="col"><center><b>Account Listing</b></center></div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<table>
				<thead>
					<tr>
			            <td><b>Amount</b></td>
			            <td><center><b>Name</b></center></td>
			            <td><b>BillTo</b></td>
			        </tr>
				</thead>
				<tbody>
				<?php
				    $select4 = "SELECT * FROM qpd_trans t, qpd_patient p WHERE t.TransactionType = 'ACCOUNT' AND p.PatientID = t.PatientID AND t.TransactionDate BETWEEN '$SD' AND '$ED'";

					$result4 = mysqli_query($con, $select4);
				    while($row = mysqli_fetch_array($result4))
				    {
				    	$totalprice = $row['GrandTotal'];
				        $firnam = $row['FirstName'];
				        $midnam = $row['MiddleName'];
				        $lasnam = $row['LastName'];
				        $billto = $row['Biller'];

					echo"
						<tr>
			                <td>$totalprice --</td>
			                <td nowrap>$lasnam,$firnam &nbsp;$midnam</td>
			                <td nowrap>-$billto</td>
			            </tr>";	
					}
				?>
				<tr>
					<td><b><?php echo number_format((float)$totalaccount, 2, '.', '');?></b></td>
					<td><b>TOTAL</b></td>
					<td><b><?php echo $i;?>--ACCOUNTS</b></td>
				</tr>
				<tr>
				</tr>
				</tbody>
			</table>
		</div>
	</div>


</div>
</div>
</div>
</body>
</html>