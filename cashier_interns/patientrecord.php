<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Patient Record</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
      <link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
<body>
	  <?PHP
    include 'navbar.php';
    ?>
   <br><br><br>
   <h3 style="text-align: center;">
    <?php $query1=mysqli_query($conn, "SELECT * FROM qpd_form where status=0 AND id='".$_GET['pid']."'");
              while($query2 = mysqli_fetch_array($query1))
              { 
              	$ln = $query2[5];
              	$fn = $query2[3];
              	$mn = $query2[4];
              	echo "<b>".$ln.",".$fn." ".$mn."</b>";
              }
              ?> Transaction Record
    </h3><br>
    <div class="container">
	    <table class="table table-hover table-striped">
	      <thead>
	        <tr>
	          <th>Date</th>
	          <th>Transaction No.</th>		
	          <th>Trans type</th>
	          <th>Bill to</th>		
	          <th>Packages Availed</th>
	          <th>Total Price</th>
	          <th>Cash</th>
	          <th>Change</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php
	      	$query1 = mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND ln='$ln' AND fn='$fn' AND mn='$mn' order by date desc");
                  while($query2 = mysqli_fetch_array($query1))
                  {
                    echo "<tr>";
                      	echo "<td>".strip_tags($query2[22])."</td>";
                        echo "<td>".strip_tags($query2[0])."</td>";
                        echo "<td>".strip_tags($query2[1])."</td>";
                        echo "<td>".strip_tags($query2[14])."</td>";
                        echo "<td>";
                                    $prod=$query2[17];
                                    $ctr=1;
                                    $arr=0;
                                    $perprod=0;
                                    $num=strlen($prod)-1;
                                    for($a=0;$a<$num;$a++){
                                        $qty[$a]=0;
                                      }
                          if($num==1){
                          $product[$arr]=$prod[$ctr];
                          $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                          $query4=mysqli_fetch_array($query3);
                          echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                          
                      }
                      while($ctr<$num){
                          if($prod[$ctr]!= ''){
                              if($prod[$ctr+1]==' '){
                                      $product[$arr]=$prod[$ctr];
                                      $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                      $query4=mysqli_fetch_array($query3);
                                       echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                              }
                              else{
                                      $product[$arr]=$prod[$ctr].$prod[$ctr+1];
                                      $ctr++;
                                      $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                      $query4=mysqli_fetch_array($query3);
                                       echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                                  }
                              }
                          $ctr++;
                          if($ctr==$num){
                                  $product[$arr]=$prod[$ctr];
                                  $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                  $query4=mysqli_fetch_array($query3);
                                   echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ;  
                              }
                           }
                    "</td>";
                        echo "<td>".strip_tags($query2[19])."</td>";
                        echo "<td>".strip_tags($query2[20])."</td>";
                        echo "<td>".strip_tags($query2[21])."</td>";
                    echo "</tr>";
                  }
                 ?>
	      </tbody>
	  </table>
  </div>
</body>
</html>