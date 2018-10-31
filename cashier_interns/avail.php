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
   <h5>Avail: <?php
          $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
           while($query2 = mysqli_fetch_array($query1)){
            echo " ".$query2[2];
           } 
            ?></h5>

   <div class="card" style="border-radius: 0px; margin-top: 10px;">
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION</b></center></div>
            <div class="card-block">
        <form method="POST" enctype="multipart/form-data" autocomplete="off" >
          <div class="row">
          <div class="col-lg-4">
           <input type="text" name="company" class="form-control" placeholder="Company" required><br>
           <input type="text" name="pos" class="form-control" placeholder="Applied Position" ><br>
           <input type="text" name="fn" class="form-control" placeholder="First Name" required><br>
           <input type="text" name="mn" class="form-control" placeholder="Middle Name" required><br>
           <input type="text" name="ln" class="form-control" placeholder="Last Name" required><br>
          </div>
          <div class="col-lg-4">
            <input type="text" name="address" class="form-control" placeholder="Address" required><br>
            <input type="date" name="bd" class="form-control" placeholder="Birthdate (MM-DD-YY)" required><br>
            <input type="number" name="age" id="age" class="form-control" placeholder="Age" onkeyup="AGE()" required><br>
            <label for="">Gender:</label><br>
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="text" name="contact" class="form-control" placeholder="Contact No." required>
            <input type="hidden"  name="sid" id="sid" class="form-control" placeholder="Senior ID No." /><br>
            <input type="hidden" id="LOE" name="LOE" class="form-control" value="" placeholder="LOE No." required /><br>
            <input type="hidden" id="AN" name="AN" class="form-control" value="" placeholder="Account No."  required /><br>
            <input type="hidden" id="AC" name="AC" class="form-control" placeholder="Approval Code"  required />
          </div>
          <div class="col-lg-4">
            <input type="text" name="email" class="form-control" placeholder="Email" required><br>
           
            <!-- <input type="radio" name="bill" value="Intellicare" id='billto' onclick="HMO()"> Intellicare<br>
            <input type="radio" name="bill" value="Avega" id='billto' onclick="HMO()"> Avega<br>
            <input type="radio" name="bill" value="Valucare" id='billto' onclick="HMO()"> Valucare<br>
            <input type="radio" name="bill" value="Eastwest" id='billto' onclick="HMO()"> Eastwest<br>
            <input type="radio" name="bill" value="Maxicare" id='billto' onclick="HMO()"> Maxicare<br>
            <input type="radio" name="bill" value="Cocolife" id='billto' onclick="HMO()"> Cocolife<br> -->
            <input type="text" name="bill" style='text-transform:uppercase' class="form-control" placeholder="Bill to" id="billto" onkeyup="HMO()"><br>
            <input type="text" name="ref" class="form-control" placeholder="Referred by:" required><br>
            <textarea row="5" cols="5" name="comment" class="form-control" placeholder="Comment"></textarea><br>
          </div>
        </div>
        <div class="row">
          <div class="col"><br>
            <center><input type="submit" class="btn btn-primary" name='avail' value="AVAIL">
               <button type="button" class="btn btn-primary" name='cancel' value='Insert' 
                data-toggle="modal" data-target="#modalCancel">CANCEL </button></center>
          </div>
        </div>
      </form>
            </div>
        </div>

        <!--modal succcess-->
<div class="modal fade" id="summary" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Packages to Avail</h4>
        </div>
        <div class="modal-body">
            <h4>
              <?php 
                $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
                while($query2 = mysqli_fetch_array($query1)){
                  echo "<br>".$query2[2];
                }
              ?>
            </h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
          <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal cancel-->
<div class="modal fade" id="modalCancel" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cancel</h4>
        </div>
        <div class="modal-body">
            <h4>Are you sure to cancel?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="cancel">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
 function AGE()
  {
    
    var y = document.getElementById("age").value;
    if (y >= 60) 
    {
       document.getElementById('sid').type = 'text';
    }
    else
    {
      document.getElementById('sid').type = 'hidden';
    }

  }

  function HMO()
  {
     
    var x = document.getElementById("billto").value;
    //document.getElementById("billtox").value=x;
    if (x == 'INTELLICARE' || x == 'AVEGA' || x == 'VALUCARE' || x == 'COCOLIFE' || x == 'EASTWEST' || x == 'MAXICARE' ||
      x == 'intellicare' || x == 'avega' || x == 'valucare' || x == 'cocolife' || x == 'eastwest' || x == 'maxicare') 
    {
       document.getElementById('LOE').type = 'text';
       document.getElementById('AN').type = 'text';
       document.getElementById('AC').type = 'text';
    }
    else
    {
       document.getElementById('LOE').type = 'hidden';
       document.getElementById('AN').type = 'hidden';
       document.getElementById('AC').type = 'hidden';
    }

  }
</script>


</body>
</html>
<?php
if(isset($_POST['avail']))
{
  $pid='';
  $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
   while($query2 = mysqli_fetch_array($query1)){
   $pid=$pid." ".$query2[1];
   // $package=$query2[2];
   // $packprice=$query2[3];
   // $packlist=$query2[4];
 }
  // date_default_timezone_set("Asia/Kuala_Lumpur");
  // $date=date("Y-m-d H:i:s");
  $company=$_POST['company'];
  $pos=$_POST['pos'];
  $fn=$_POST['fn'];
  $mn=$_POST['mn'];
  $ln=$_POST['ln'];
  $address=$_POST['address'];
  $bd=$_POST['bd'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $bill=$_POST['bill'];
  $ref=$_POST['ref'];
  //$package=$_GET['id'];
  $sid=$_POST['sid'];
  $comment=$_POST['comment'];
  $AN=$_POST['AN'];
  $LOE=$_POST['LOE'];
  $AC=$_POST['AC'];
  $NA='N/A';

 // $query2= mysqli_query($conn,"INSERT INTO qpd_form (company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid, package, packprice, packlist, comment, packid) VALUES ('$company', '$pos', '$fn', '$mn', '$ln', '$address', '$bd', '$age', '$gender', '$contact', '$email', '$bill', '$ref', '$sid', '$package', '$packprice', '$packlist', '$comment', '$pid')");

   mysqli_query($conn, "UPDATE qpd_form SET company='$company', pos='$pos', fn='$fn', mn='$mn', ln='$ln', address='$address', bd='$bd', age='$age', gender='$gender', contact='$contact', email='$email', bill='$bill', ref='$ref', sid='$sid', comment='$comment', packid='$pid', AN='$AN', LOE='$LOE', AC='$AC' WHERE id='".$_GET['id']."'");


  // $query3= mysqli_query($conn,"INSERT INTO qpd_trans (trans_type, cashier, company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid, package, comment, date) VALUES ('$NA', '$NA' '$company', '$pos', '$fn', '$mn', '$ln', '$address', '$bd', '$age', '$gender', '$contact', '$email', '$bill', '$ref', '$sid', '$package', '$comment', '$date')");
  echo "<script>$('#summary').modal('show');</script>";
  // $id= mysqli_insert_id($conn);
  header("location:trans.php?id=".$_GET['id']);
  


}

?>

<?php
if(isset($_POST['cancel']))
{
  header("location:index.php");
}
?>