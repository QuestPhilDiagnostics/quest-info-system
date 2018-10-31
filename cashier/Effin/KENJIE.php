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
            						$Discount = $_POST['txtDeduct'];
            						$Change = $AmountRes - $total;

            						$insertTrans = mysqli_query($con, "UPDATE qpd_temp SET Discount = '$Discount', PaidIn = '$AmountRes', PaidOut = '$Change' WHERE TransactionRef = '$lastid'");


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