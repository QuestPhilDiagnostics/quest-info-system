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
   <!-- <h2>Avail <?php $query1=mysqli_query($conn, "SELECT * FROM qpd_package WHERE status=0 and id=$_GET[id];");
   while($query2 = mysqli_fetch_array($query1)){
   echo $query2[1]; }?></h2> -->

   <div class="card" style="border-radius: 0px; margin-top: 10px;">
     <?php
          $list=mysqli_query($conn, "SELECT * FROM qpd_form where id='".$_GET['pid']."'");
          while($query2 = mysqli_fetch_array($list)){
            ?>
            <div class="card-header card-inverse card-info"><center><b>PATIENT INFORMATION for <?php echo $query2[5].",".$query2[3]." ".$query2[4];?></b></center></div>
            <div class="card-block">
        <form method="POST" enctype="multipart/form-data" autocomplete="off" >
         
          <!-- <h2><?php $query2[5].",".$query2[3]." ".$query2[4]?></h2> -->
          <div class="row">
          <div class="col-lg-4">
           <label>Company:</label><input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $query2[1]; ?>" required><br>
           <label>Position:</label><input type="text" name="pos" class="form-control" placeholder="Applied Position" value="<?php echo $query2[2]; ?>" ><br>
            <label>Address:</label><input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $query2[6]; ?>" required><br>
            <label>Age:</label><input type="number" name="age" id="age" class="form-control" placeholder="Age" onkeyup="AGE()"  value="<?php echo $query2[8]; ?>" required><br>
            <label>Contact no:</label><input type="text" name="contact" class="form-control" placeholder="Contact No." value="<?php echo $query2[10]; ?>" required><br>

        <!--<input type="text" name="fn" class="form-control" placeholder="First Name" required><br>
           <input type="text" name="mn" class="form-control" placeholder="Middle Name" required><br>
           <input type="text" name="ln" class="form-control" placeholder="Last Name" required><br> -->
          </div>
          <div class="col-lg-4">
            <!-- <input type="text" name="bd" class="form-control" placeholder="Birthdate (MM-DD-YY)" required><br> -->
            <!-- <label for="">Gender:</label><br>
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br> -->
            
            <label>Email:</label><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $query2[11];  ?>" required><br>
            <label for="">Bill to:</label><br>
            <input type="text" name="bill" class="form-control" style='text-transform:uppercase' id="billto" onkeyup="HMO()" value="<?php echo $query2[12]; ?>" ><br>
            <label>Referred by:</label><input type="text" name="ref" class="form-control" placeholder="Referred by:" value="<?php echo $query2[13]; ?>" required><br>
            <label>Comment:</label><textarea row="5" cols="5" name="comment" class="form-control" placeholder="Comment" ><?php echo $query2[15];  ?></textarea><br>
          </div>
          <div class="col-lg-4">
            
            <!-- <input type="radio" name="bill" value="Intellicare" id='billto' onclick="HMO()"> Intellicare<br>
            <input type="radio" name="bill" value="Avega" id='billto' onclick="HMO()"> Avega<br>
            <input type="radio" name="bill" value="Valucare" id='billto' onclick="HMO()"> Valucare<br>
            <input type="radio" name="bill" value="Eastwest" id='billto' onclick="HMO()"> Eastwest<br>
            <input type="radio" name="bill" value="Maxicare" id='billto' onclick="HMO()"> Maxicare<br>
            <input type="radio" name="bill" value="Cocolife" id='billto' onclick="HMO()"> Cocolife<br> -->
            <label>Senior Id no:</label><input type="text"  name="sid" id="sid" class="form-control" placeholder="Senior ID No." value="<?php echo $query2[14]; ?>"/><br>

            <label>Loe no:</label><input type="text" id="LOE" name="LOE" class="form-control"  placeholder="LOE No." value="<?php echo $query2[19]; ?>" /><br>
            <label>Account no:</label><input type="text" id="AN" name="AN" class="form-control"  placeholder="Account No." value="<?php echo $query2[20]; ?>"  /><br>
            <label>Approval code:</label><input type="text" id="AC" name="AC" class="form-control" placeholder="Approval Code"  value="<?php echo $query2[21]; } ?>" />
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
<div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
            <h4>Package successfully availed!</h4>
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
<!-- <script type="text/javascript">
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
    if (x == 'Intellicare' || x == 'Avega' || x == 'Valucare' || x == 'Cocolife' || x == 'Eastwest' || x == 'Maxicare') 
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
</script> -->


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
 $list=mysqli_query($conn, "SELECT * FROM qpd_form where id=".$_GET['pid']);
 while($list2 = mysqli_fetch_array($list)){
  $fn=$list2[3];
  $mn=$list2[4];
  $ln=$list2[5];
  $gender=$list2[9];
 }
  // date_default_timezone_set("Asia/Kuala_Lumpur");
  // $date=date("Y-m-d H:i:s");
  $company=$_POST['company'];
  $pos=$_POST['pos'];
  $address=$_POST['address'];
  $bd=$_POST['bd'];
  $age=$_POST['age'];
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
  echo"<script>$('#success').modal('show');</script>";
  // $id= mysqli_insert_id($conn);
  header("location:trans.php?id=".$_GET['id']);
  


}

?>

<?php
if(isset($_POST['cancel']))
{
  header("location:listofpatient.php?id=".$_GET['id']);
}
?>