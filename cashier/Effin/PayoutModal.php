<div id="myModal" class="modal">

  <!-- Modal content -->
  	<div class="modal-content">
    <span class="close">&times;</span>

    	<form method="POST" action="finaltrans.php" >

    			<center>
            		
            		<select name="selDiscount" id="list" style="width: 120px;">
            			<option value="0">--SELECT DISCOUNT--</option>
            			<option value="1">PWD</option>
            			<option value="2">Senior Citizen</option>
            			
            		</select>
            		<br>
            		<label for="txtSubTotal">Sub Total: </label>
            		<br>
            		<input type="text" name="txtSubTotal" id="totalamount" value="₱: <?php echo $totalamount; ?>" readonly style="background-color: white; width: 110px; border: none;">
            		<br>
            		<label for="txtDeduct">Discount: </label>
            		<br>
            		<input type="text" name="txtDeduct" id="txtDeduct" value="₱: 0" readonly style="background-color: white; width: 110px; border: none;">
            		<br>
            		<label for="txtTotal">Total:</label>
            		<br>
            		<input type="text" name="txtTotal" id="txtTotal" readonly="" value="<?php echo $totalamount; ?>" style="background-color: white; width: 110px; border: none;">
            		
            		<br>
            		<label for="txtAmountRes">Amount Received: </label>
            		<br>
            		<input type="number" name="txtAmountRes" class="form-control" required="required" style="width: 110px;">
            		<br>
            		<input class="btn btn-default" type="submit" name="btnPayout" value="Payout" style="width: 110px; background-color:  #a7b4ba;">
</center>
            		<?php 

            				if (isset($_POST['btnPayout'])) {
            					# code...
            						$AmountRes = $_POST['txtAmountRes'];
            						$total = $_POST['txtTotal'];
            						$change = $AmountRes-$total; 
							        $dc = $_POST['txtDeduct'];



            						if ($total>$AmountRes) {
				            			echo '<script type="text/javascript"> alert("Please enter higher amount!") </script>';
				            		}else{


				            				$query = "SELECT * FROM temp_trans";
			         						$result = mysqli_query($conn,$query);



			         						while ($row = mysqli_fetch_array($result)) {


			       
							            		$total = $_POST['txtTotal'];
							            		$AmountRes = $_POST['txtAmountRes'];
							            		$change = $AmountRes-$total; 
							            		$dc = $_POST['txtDeduct'];



							            		
							            		

							            		/*mysqli_query($conn,"UPDATE temp_trans SET 
																			FinalTotal = '$total', 
																			PaidIn = '$AmountRes', 
																			PaidOut = '$change', 
																			Discount = '$dc', 
																			WHERE TransactionRef='$lastid'");


							            		//echo '<script type="text/javascript"> alert("Success!!") </script>';*/
													
												}


												mysqli_query($conn,"UPDATE qpd_trans SET 
																			FinalTotal = '$total', 
																			PaidIn = '$AmountRes', 
																			PaidOut = '$change', 
																			Discount = '$dc', 
																			WHERE TransactionRef='$finalRef'");


							            		echo '<script type="text/javascript"> alert("'.$total.','.$AmountRes.','.$change.','.$dc.'") </script>';

												




			         	
            				}

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
