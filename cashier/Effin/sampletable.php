		<div class="row">
			<div class="col-4" style="padding-left: 0px;"><b>Item</b></div>
			<div class="col-5" style="padding-left: 0px;"><b>Description</b></div>
			<div class="col-3" style="padding-left: 0px;"><center><b>Price</b></center></div>
		</div>



		<div class="row">
			<div class="col-8"><center><hr></center></div>
		</div>
		<div class="row" style="min-height: 1in;">
			<div class="col-4" style="padding-left: 25px;"><b>
				<?php 
				$ItemName = explode(",",$data['ItemName']);
				foreach ($ItemName as $item) {
					echo $item."<br>";
				}
				unset($item);
				?>
			</b></div>
			<div class="col-5" style="padding-left: 0px;">
				<?php 
				$ItemDesc = explode(",",$data['ItemDescription']);
				foreach ($ItemDesc as $desc) {
					echo $desc."<br>";
				}
				unset($desc);
				?>
			</div>
			<div class="col-3" style="padding-left: 25px;"><b>
				<?php 
				$ItemPrice = explode(",",$data['ItemPrice']);
				foreach ($ItemPrice as $price) {
					echo "₱:".$price."<br>";
				}
				unset($price);
				?>
			</b></div>
		</div>