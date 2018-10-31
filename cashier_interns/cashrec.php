<script type="text/javascript">
	window.onload = function() 
	{ 
		window.print(); 
	}
</script>
<?php
	session_start();
	include('connect.php');
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cash Receipt</title>
    <link rel="stylesheet" href="style.css">
	<link href="../source/bootstrap4/css/bootstrap.min.css" media="all" rel="stylesheet"/>
	</head>
	<style type="text/css">
	body
		{
			font-family: "Century Gothic";
			font-size: 16px;
		}
	hr
	    {
	    	border-top: 3px solid #8c8b8b;
	    	line-height: 1px;
	    	margin-top: 0px;
	    	margin-bottom: 0px;
	    	margin-left: 0px;
	    	margin: 0px;
	    	width: 320px;
	    }
	h3
		{
			font-family: "Century Gothic";
		    padding: 0px;
		    margin: 0px;
		    color: black;

		}
	.col, .col-1, .col-2, .col-3, .col-4, .col-5 .col-6
		{
			padding-left: 0px;
			margin-left: 5px;
		}
	.info
		{
			padding-left: 70px;
		}
	.items
		{
			padding-left: 20px;
		}
	</style>
<body>
<br><br>	
<?php
              $query1=mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND id='".$_GET['id']."'");
              while($query2 = mysqli_fetch_array($query1))
              {
              	$cashier=$query2[2];
              	$id=$query2[0];
                 $company=$query2[3];
                $pos=$query2[4];
                $fn=$query2[5];
                $mn=$query2[6];
                $ln=$query2[7];
                $address=$query2[8];
                $bd=$query2[9];
                $age=$query2[10];
                $gender=$query2[11];
                $contact=$query2[12];
                $email=$query2[13];
                $bill=$query2[14];
                $ref=$query2[15];
                $sid=$query2[16];
                $totalprice=$query2[19];
                $packlist=$query2[17];
                $comment=$query2[18];
                $cash=$query2[20];
                $change=$query2[21];
                $date=$query2[22];

                $prod=$query2[17];
                $ctr=1;
                $arr=0;
                $perprod=0;
                $num=strlen($prod)-1;
                for($a=0;$a<$num;$a++){
                    $qty[$a]=0;
                }
                ?>  

<div class="container-fluid">
	<div class="col-5">
		<div class="row">
			<center><div class="col"><?php echo $date ?></div>
			<div class="col" ><h4>RCPT:<b>#<?php echo $id ?></b></h4></div></center>
		</div>
		<div class="row">
			<div class="col"><center><b>QUEST PHIL DIAGNOSTICS</b></center></div>
		</div>
		<div class="row">
			<div class="col"><center>McArthur Hi-Way Cor. Salome Rd. Angeles City</center></div>
		</div>
		<br>
		<div class="row">
			<div class="col">Name: <b  style="font-size: 16px;"><?php echo $ln ?>, <?php echo $fn ?> <?php echo $mn ?></b></div>
		</div>
		<div class="row">
			<div class="col" >Company: <b><?php echo $company ?></b></div>
		</div>
		<div class="row">
			<div class="col">Age/Gender: <b ><?php echo $age ?>/<?php echo $gender ?></b></div>
		</div>
		<div class="row">
			<div class="col">Birthdate: <b ><?php echo $bd ?></b></div>
		</div>
		<!-- <?php 
		if ($data['reff']=="") {
			$reff = $data['cust_comnam'];
		} else {
			$reff = $data['reff'];
		}
		?> -->
		<div class="row">
			<div class="col">Referred by: <b><?php echo $ref ?></b></div>
		</div><br>
		<div class="row">
			<div class="col" >Cashier: <b><?php echo $cashier ?></b></div>
		</div>
		<div class="row">
			<div class="col" >Comment: <b><?php echo $comment ?></b></div>
		</div>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div>
		<div class="row">
			<div class="col-8" style="">Item Description:</div>
			<?php
			 if($num==1){
              $product[$arr]=$prod[$ctr];
              $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
              $query4=mysqli_fetch_array($query3);
              echo "<br>Package: ".$query4[1]. "(" .$query4[3]. ")" ; 
              echo "<br>Price: ".$query4[2]; 
          }
          while($ctr<$num){
              if($prod[$ctr]!= ''){
                  if($prod[$ctr+1]==' '){
                          $product[$arr]=$prod[$ctr];
                          $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                          $query4=mysqli_fetch_array($query3);
                          echo "<br>Package: ".$query4[1]. "(" .$query4[3]. ")" ; 
                          echo "<br>Price: ".$query4[2];
                  }
                  else{
                          $product[$arr]=$prod[$ctr].$prod[$ctr+1];
                          $ctr++;
                          $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                          $query4=mysqli_fetch_array($query3);
                          echo "<br>Package: ".$query4[1]. "(" .$query4[3]. ")" ; 
                          echo "<br>Price: ".$query4[2];
                      }
                  }
              $ctr++;
              if($ctr==$num){
                      $product[$arr]=$prod[$ctr];
                      $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                      $query4=mysqli_fetch_array($query3);
                      echo "<br>Package: ".$query4[1]. "(" .$query4[3]. ")" ; 
                      echo "<br>Price: ".$query4[2]; 

                  }
               }
               ?>
			<!-- <div class="col-2" style="padding-left: 20px;"><b><?php echo $package ?> </b>[<?php echo $packlist ?>]</div>
			
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div>
		<div class="row" style="min-height: 1in;">
			<div class="col-8">Price:</div>
			<div class="col-2"><b>Php<?php echo $packprice ?></b></div>
		</div>
		<div class="row">
			<div class="col" style="padding-left: 20px;"><hr></div>
		</div> -->
		<div class="row">
			<div class="col-8 text-right"><br>Receipt Total:</div>
			<div class="col-2"><b>Php<?php echo $totalprice ?></b></div>
		</div>
		<div class="row">
			<div class="col-8 text-right">Amount Tendered:</div>
			<div class="col-2"><b>Php<?php echo $cash ?></b></div>
		</div>
		<div class="row">
			<div class="col-8 text-right">Given Change:</div>
			<div class="col-2"><b>Php<?php echo $change ?></b></div>
		</div>
		<br>
		<div class="row">
			<div class="col"><center><p style="border: solid 2px black">online results, www.questphil.com.ph</p></center></div>
		</div>
		<div class="row">
			<div class="col"><center><img src="bar.jpg" height="30px" width="259px" style="margin: 0px; padding: 0px;"></center></div>
		</div>





	</div>
</div>
<?php }?>
</body>
</html>