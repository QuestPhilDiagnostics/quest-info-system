

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>



			<input type="text" name="quantitytxt" id="quantitytxt" value="" style="width: 90px; background-color: #ECF0F1; border: 1px solid;" >
			<input type="text" name="unitprice" id="unitprice" value="" style="width: 90px; background-color: #ECF0F1; border: 1px solid;" >
			<input type="text" name="txtpricegtotal" id="txtpricegtotal" value="" style="width: 90px; background-color: #ECF0F1; border: 1px solid;" >


<script>
						    $('#quantitytxt').keyup(function(){
						        var quantitytxt;
						        var unitprice;
						        quantitytxt = parseFloat($('#quantitytxt').val());
						        unitprice = parseFloat($('#unitprice').val());
						        var txtpricegtotal =  unitprice * quantitytxt;
						        $('#txtpricegtotal').val(txtpricegtotal.toFixed(2));


			    });
						</script>
