<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Avail Package</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
	</head>
<body>
  <?php
	include('header.php');
  ?>
 <div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">CASH</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Cash Payment No.: <?php $query1=mysqli_query($conn, "SELECT * FROM qpd_trans WHERE status=0 AND id=".$_GET['id']);
               while($query2 = mysqli_fetch_array($query1)){
               echo $query2[0]; }?></b></center></div>
            <div class="card-block">
            <form method="POST" autocomplete="off" enctype="multipart/form-data">  
            <div class="row">
            <?php
              $query1=mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND id='".$_GET['id']."'");
              while($query2 = mysqli_fetch_array($query1))
              {
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
               
                $prod=$query2[17];
                $ctr=1;
                $arr=0;
                $perprod=0;
                $num=strlen($prod)-1;
                for($a=0;$a<$num;$a++){
                    $qty[$a]=0;
                }
                echo "Customer Name: " .$ln. "," .$fn." ".$mn; 
                echo "<br>Company: ".$company; 
                echo "<br>Age/Gender: ".$age. "/" .$gender; 
                echo "<br>Birthday: ".$bd; 
                echo "<br>Bill to: ".$bill; 
                echo "<br>Referred: ".$ref; 
              
                  
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
       
          }
         echo "<br><br>Total Price: " .$totalprice;
         echo "<br><br>Cash: " .$cash;
         echo "<br><br>Change: " .$change; 
        ?>
      </div>
      <div class="row">
       <!--  <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
        <input type="hidden" name="totalprice" value="<?php echo $data['PackPrice'] ?>"/> -->
        <div class="col">
          <center>
            <!-- <input type="submit" class="btn btn-primary" name="transtype" value="ACCOUNT"> -->
            <button type="button" class="btn btn-primary" name="print" data-toggle="modal" data-target="#print">PRINT RECEIPT</button>
          </center>
        </div>
      </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- <script language="javascript"> 
  function PrintReceipt()
  { 
  if(confirm("Are you sure want to print?"))
    { 
    win = window.open("cashrec.php?id=<?php echo $_GET['id']?>");
    }
  }
  </script> -->
</body>
 <!--modal print-->
<div class="modal fade" id="print" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print</h4>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to print receipt?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="printmodal">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</html>
<?php
if(isset($_POST['printmodal'])){
  //header("location:cashrec.php?id=".$_GET['id']);
   // mysqli_query($conn,"DELETE FROM temp WHERE cashier='".$_SESSION['user']."'");  
  echo" <script>window.open('cashrec.php?id=".$_GET['id']."', '_blank');</script>";
}

  if(isset($_GET['print']))
  {
    echo"<script>$('#print').modal('show');</script>";
  }

?>