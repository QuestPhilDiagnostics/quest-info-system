<?php
include_once('../connection.php');
include_once('../classes/pack.php');
$pack = new pack;
$pack = $pack->fetch_all();
?>
<?php 

	$conn=mysqli_connect("localhost","root","","dbqis");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	else
	{

		if (isset($_POST['btnCreatePackage'])) {
			

			$nameitem = $_POST['txtItemName'];
			$priceitem = $_POST['txtItemPrice'];
			$descriptionitem = $_POST['txtItemDescription'];
			$typecash = $_POST['CashType'];


			$sql_query = "INSERT INTO qpd_items (ItemName, ItemPrice, ItemDescription, ItemType)
			VALUES ('$nameitem', '$priceitem', '$descriptionitem', '$typecash')";

			if ($conn->query($sql_query) === TRUE)
			{
			    echo "<script> alert('Record Added Successfully') </script>";
			    header('Location: ItemCash.php'); 

			} 
			else 
			{
			    echo "Error: " . $conn->error;
			}

		}
	}

 ?>
<html>
	<head>
	    <title>Cashier Index</title>
		<script type="text/javascript" src="../source/CDN/jquery-1.12.4.js"></script>
		<script type="text/javascript" src="../source/CDN/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.bootstrap4.min.js"></script>
		<script type="text/javascript" src="../source/CDN/jszip.min.js"></script>
		<script type="text/javascript" src="../source/CDN/pdfmake.min.js"></script>
		<script type="text/javascript" src="../source/CDN/vfs_fonts.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.html5.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.print.min.js"></script>
		<script type="text/javascript" src="../source/CDN/buttons.colVis.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">	
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
	.modal-header, .modal-footer
	{
		background-color: #ecf0f1;
		font-family: "Century Gothic";
		font-size: 18px;
		color: black;
		font-weight: bolder;
	}
	.btnCreate
	{
		background-color: #008CBA; /* Blue */
		border-radius: 12px;
	    font-family: "Century Gothic";
	    font-size: 18px;
	    height: 50px;
	    width: 100px;
	}
</style>
<body>
<?php include_once('cashsidebar.php');?>
<div class="container-fluid">
<div class="col-md-10 offset-sm-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><b>Packages with Complete Descriptions</b></div>
		<div class="card-block">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
                    	<th>Item ID</th>
                    	<th>Date Created</th>
						<th>Item Name</th>
						<th>Item Price</th>
						<th>Item Description</th>
						<th></th>
					</thead>
						<?php foreach  ($pack as $pack) {  ?>
					<tr>
							<td>
								<?php echo $pack['ItemID']?>
							</td>
							<td>
								<?php echo $pack['CreationDate']?>
							</td>
							<td>
								<?php echo $pack['ItemName']?>
							</td>	
							<td>
								<?php echo $pack['ItemPrice']?>
							</td>	
							<td>
								<?php echo $pack['ItemDescription']?>
							</td>
							<td > 
								<button type="button" class="btn btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href = 'DeletePack.php?id=<?php echo $pack['ItemID']?>';>DELETE</button>
							</td>
							<?php } ?> 
					</tr> 
    	</table>
		</div>
	</div>
</div>
<!-- Trigger/Open The Modal -->
<div class="col-md-10 offset-sm-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
 		<div class="card-header"><center><b>CREATE PACKAGES</b></center></div>
		<div class="card-block">
			<div class="row">
				<div class="col">
					<form method="POST">
					<input type="" name="txtItemName" placeholder="Item Name" required="">
					<input type="" name="txtItemDescription" placeholder="Item Description" required="">
					<input type="" name="txtItemPrice" placeholder="Item Price" required="">
					<select name="CashType">
						<option value="CashIndustrial">CASH INDUSTRIAL</option>
						<option value="CashLab">CASH LAB</option>
						<option value="CashImaging">CASH IMAGING</option>
					</select>
					<input type="submit" name="btnCreatePackage" value="CREATE NEW PACKAGE">
					</form>
				</div>
			</div> 
		</div>
	</div>
</div>


</div>
<script>

function confirmationDelete(anchor)
{
	var conf = confirm('Are you sure want to delete this package?');
	if(conf)
	window.location=anchor.attr("href");
}


	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        scrollY:       500,
        scrollCollapse: true,
        "scrollX": true,
        paging:         false,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );	
</script>


</body>
</html>