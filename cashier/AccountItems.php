<?php
include_once('../connection.php');
include_once('../classes/packaccount.php');
$pack = new pack;
$pack = $pack->fetch_all();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cashier Index</title>
    <link rel="stylesheet" type="text/css" href="../source/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
	<link href="../sorting/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../sorting/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../source/CDN/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../source/CDN/buttons.bootstrap4.min.css	">
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
<?php include_once('accountsidebar.php');?>
<div class="container-fluid">
<div class="col-md-10 offset-sm-1">
	<div class="card card-info" style="border-radius: 0px; margin-top: 10px;">
		<div class="card-header"><b>Packages with Complete Descriptions</b></div>
		<div class="card-block">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
								<button type="button" class="btn btn-danger" onclick="javascript:confirmationDelete($(this));return false;" href = 'DeletePackAccount.php?id=<?php echo $pack['ItemID']?>';">DELETE</button>
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
					<center><button id="myBtn" class="button button1" data-toggle="modal" data-target="#myModal">CREATE NEW PACKAGE</button></center>
				</div>
			</div> 
		</div>
	</div>
</div>
<!-- The Modal Create -->
 <div class="modal" id="myModal" role="dialog">
<!-- Modal Create content -->
<div class="modal-content">
<form action="CreateItemAccount.php" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="modal-header">
    Create New Package
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
	<div class="card card-info" style="border-radius: 0px;">
	<div class="card-header"><b>Tests List</b></div>
	<div class="card-block">
	<b>NOTE: Price indicated are HMO Prices</b>
		<div class="row">
			<div class="col">
				<b>HEMATOLOGY</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="CBC">Complete Blood Count(P225)</label>
				</div>
				<hr>
				<b>MICROSCOPY</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="U/A">Urinalysis(P135)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="F/A">Fecalysis(P117)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="PT">Pregnancy Test(P315)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="DT">Drug Test(P300)-Walk-in</label>
				</div>
				<hr>
				<b>HEPATITIS MARKERS</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="HBsAg">HBsAg(P297)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="anti-HAV">anti-HAV(P117)</label>
				</div>
			</div>
			<div class="col">
				<b>IMAGING</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="X-RAY">Chest XRAY(P324)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="ECG">ECG(P720)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="UTZ-WHOLEABD">UTZ WHOLE ABD(P2880)</label>
				</div>
				<hr>
				<b>OTHER TESTS</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="PE">Physical Examination(P200)-Walk-in</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="PAPSMEAR">PAPSMEAR(P720)</label>
				</div>
			</div>
			<div class="col">
				<b>CHEMISTRY</b>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="FBS">FBS(P144)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="BUA">BUA(P378)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="BUN">BUN(P171)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="CREA">CREA(P360)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="LipidProfile">Lipid Profile(P747)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="Sodium">Sodium(P378)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="Potassium">Potassium(P378)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="Chloride">Chloride(P378)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="SGPT">SGPT(P198)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="SGOT">SGOT(P198)</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="test[]" value="HBA1C">HBA1C(P900)</label>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<div class="modal-footer">
    <fieldset class="w-100">
        <div class="row">
	        <div class="col-6"><input type="text" class="form-control" name="PackName" placeholder="Package Name" required></div>
	        <div class="col-2"><input type="number" min="1" step="any" class="form-control" name="PackPrice" placeholder="Price" required></div>
	        <div class="col-2">
	        	<SELECT name="type" class="form-control">
	        		<OPTION value="AccountIndustrial">ACCOUNT INDUSTRIAL</OPTION>
	        		<OPTION value="AccountHMO">ACCOUNT HMO</OPTION>
	        	</SELECT>
	        </div>
	        <div class="col-2"><button class="btnCreate" type="submit">CREATE</button></div>
        </div>
     </fieldset>
</div>
</form>
</div>
</div>
</div>
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