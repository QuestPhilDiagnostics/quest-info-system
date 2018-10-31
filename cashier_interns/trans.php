
<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >
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
      <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

	</head>
<body>
  <?php
	include('header.php');
  ?>
 <div class="container-fluid">
<center><p style="font-size: 36px; font-family: 'Century Gothic';">Transaction Type</p></center>
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>Transaction No.: <?php $query1=mysqli_query($conn, "SELECT * FROM qpd_form WHERE status=0 and id=".$_GET['id']);
               while($query2 = mysqli_fetch_array($query1)){
               echo $query2[0]; }?></b></center></div>
            <div class="card-block">
            <form method="POST" autocomplete="off" enctype="multipart/form-data">  
            <div class="row">
            <?php
             
              $query1=mysqli_query($conn, "SELECT * FROM qpd_form where status=0 and id='".$_GET['id']."'");
              while($query2 = mysqli_fetch_array($query1))
              {

                $company=$query2[1];
                $pos=$query2[2];
                $fn=$query2[3];
                $mn=$query2[4];
                $ln=$query2[5];
                $address=$query2[6];
                $bd=$query2[7];
                $age=$query2[8];
                $gender=$query2[9];
                $contact=$query2[10];
                $email=$query2[11];
                $bill=$query2[12];
                $ref=$query2[13];
                $sid=$query2[14];
                $comment=$query2[15];
                $totalprice=$query2[18];
                
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
       
        ?>
          
     
    </div>

      <div class="row">
        <div class="col">
          <div style="text-align: right;">
            <button type="button" class="btn btn-primary" name="editpack"  data-toggle="modal" data-target="#modalEditPack" >Edit Package?</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAccount" >Account</button>
            <!-- <input type="submit" class="btn btn-primary" name="acc" value="ACCOUNT"> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCash" >Cash</button>
            <!-- <input type="submit" class="btn btn-primary" name="cash" value="CASH"> -->
          </div>
        </div>
      </div>
            </form>
        </div>
    </div>
</div>
</div>
<div>



</body>
<!--modal editpack-->
<div class="modal fade" id="modalEditPack" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
        <h4>Do you want to edit the package?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
              <input type="submit" class="btn btn-default"  value="Yes" name="editpack">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal account-->
<div class="modal fade" id="modalAccount" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">A c c o u n t</h4>
        </div>
        <div class="modal-body">
        <h4>Transact now?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
              <input type="submit" class="btn btn-default"  value="Yes" name="acc">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal cash-->
<div class="modal fade" id="modalCash" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">C a s h</h4>
        </div>
        <div class="modal-body">
        <h4>Transact now?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
              <input type="submit" class="btn btn-default"  value="Yes" name="cash">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

</html>

<?php
  if(isset($_POST['cash']))
  {
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date=date("Y-m-d H:i:s");
    $NA='NA';
    $CASH='CASH';
    $qpd_form= mysqli_query($conn, "SELECT * from qpd_form where status=0 and id=".$_GET['id']);
    $qpd_form2= mysqli_fetch_array($qpd_form);

    $query= mysqli_query($conn,"INSERT INTO qpd_trans (trans_type, cashier, company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid,  packid, comment, totalprice, cash, chnge, date, LOE, AN, AC) VALUES ( '$CASH', '".$_SESSION['user']."', '".$qpd_form2[1]."', '".$qpd_form2[2]."', '".$qpd_form2[3]."', '".$qpd_form2[4]."', '".$qpd_form2[5]."', '".$qpd_form2[6]."', '".$qpd_form2[7]."', '".$qpd_form2[8]."', '".$qpd_form2[9]."', '".$qpd_form2[10]."', '".$qpd_form2[11]."', '".$qpd_form2[12]."', '".$qpd_form2[13]."', '".$qpd_form2[14]."', '".$qpd_form2[17]."', '".$qpd_form2[15]."','".$qpd_form2[18]."', '$NA', '$NA', '$date' ,'".$qpd_form2[19]."','".$qpd_form2[20]."','".$qpd_form2[21]."')");

  $id= mysqli_insert_id($conn);
  header("location:transtypecash.php?id=".$id);
  }
?>

<?php
  if(isset($_POST['acc']))
  {
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $date=date("Y-m-d H:i:s");
    $NA='NA';
    $ACC='ACCOUNT';
    $qpd_form= mysqli_query($conn, "SELECT * from qpd_form where status=0 and id=".$_GET['id']);
    $qpd_form2= mysqli_fetch_array($qpd_form);

    $query= mysqli_query($conn,"INSERT INTO qpd_trans (trans_type, cashier, company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid,  packid, comment, totalprice, cash, chnge, date, LOE, AN, AC) VALUES ( '$ACC', '".$_SESSION['user']."', '".$qpd_form2[1]."', '".$qpd_form2[2]."', '".$qpd_form2[3]."', '".$qpd_form2[4]."', '".$qpd_form2[5]."', '".$qpd_form2[6]."', '".$qpd_form2[7]."', '".$qpd_form2[8]."', '".$qpd_form2[9]."', '".$qpd_form2[10]."', '".$qpd_form2[11]."', '".$qpd_form2[12]."', '".$qpd_form2[13]."', '".$qpd_form2[14]."', '".$qpd_form2[17]."', '".$qpd_form2[15]."','".$qpd_form2[18]."', '$NA', '$NA', '$date','".$qpd_form2[19]."','".$qpd_form2[20]."','".$qpd_form2[21]."')");
    
  $id= mysqli_insert_id($conn);
  header("location:transtypeacc.php?id=".$id);
  }
?>



<?php
if(isset($_POST['editpack'])){
  
   header("location:epack.php?id=".$_GET['id']);
  }

?>