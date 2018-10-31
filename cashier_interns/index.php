<?php
	session_start();
	include('connect.php');
  if ($_SESSION['qpd_users'] != 'true') {
    header('Location:../login.php');
 }
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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
<body>
	  <?PHP
    include 'navbar.php';
    ?>
   <br><br><br>
 <div class="container">
  <div class="card card-info"  style="border-radius: 0px; margin-top: 10px;">
   <div class="card-header" style="color: #fff;">Packages
      <form method="post" style="float:right; font-family: century gothic; font-size: 10px; " >
        <button type="button" class="btn btn-default" name='add' value='Insert' 
                data-toggle="modal" data-target="#availModal"> FILL UP FORM (new) </button>
            <button type="submit" class="btn btn-default" name='availold' value='Insert' > Registered </button>
      </form>
    </div>
 <div class="card-block" style="background-color:#eae8e8; padding: 20px;">

       <form method="POST">
         <input  type="text"
                placeholder="Add Package" id='pack' autocomplete="off" name="searchpack" required>
          <input type="submit" name="search" value="ADD">
        </form>
        <script type="text/javascript">
              <?php
                $asd = mysqli_query($conn,"SELECT * FROM qpd_items");
                $num = mysqli_num_rows($asd);
             ?>   
              $( function() {
                  var availableTags = [
                   <?php 
                   $a=0;
                   while($zxc = mysqli_fetch_array($asd))
                    {   
                      if($a!=$num){
                        echo '"'.$zxc[1].'" ,';
                      }
                      else{
                       echo '"'.$zxc[1].'"';
                      }
                    }
                   ?>
                  ];
                  $( "#pack" ).autocomplete({
                    source: availableTags
                  });
                   
                } );
          </script>
    
          <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Package Name</th>
              <th>Package List</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
           <?php
           if(isset($_POST['search'])){
                $pack= mysqli_query($conn, "SELECT * from qpd_package WHERE status=0 and packName='".$_POST['searchpack']."'");
                $pack2= mysqli_fetch_array($pack);
               //echo "<script>alert('".$pack2[1]."')</script>";
                $query= mysqli_query($conn, "INSERT into temp (packID, PackName, PackList, PackPrice, Cashier) VALUES ('".$pack2[0]."', '".$pack2[1]."', '".$pack2[2]."', '".$pack2[3]."',  '".$_SESSION['user']."')");
                header('location:index.php');
                  }
                else{
                   $i=0;
                   $totalaccount = 0;
                   $queryselect = mysqli_query($conn, "SELECT * FROM temp WHERE cashier='".$_SESSION['userSession']."' ");
                    while($query2= mysqli_fetch_array($queryselect))
                        {
                    echo "<tr>";
                      echo "<td>".strip_tags($query2[2])."</td>";
                        echo "<td>".strip_tags($query2[4])."</td>";
                        echo "<td>".strip_tags($query2[3])."</td>";
                      echo "<td><a href='?remove&id=".$query2[0]."'><button class='btn btn-danger'>Remove</button></a></td>";
                     //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                    echo "</tr>";
                    $totalaccount += $query2[3];
                     $i++;
                      }
                  }
              ?>
            </tbody>
          </table>
</div>
</div>
</div>
    <!--modalremove-->
<div class="modal fade" id="removeModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remove</h4>
        </div>
        <div class="modal-body">
            <h4>Remove package from list?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="del">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal avail-->
<div>
<div class="modal fade" id="availModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Avail</h4>
        </div>
        <div class="modal-body">
            <h4>Avail now?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="avail">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>

<!--modal availold-->
<!-- <div>
<div class="modal fade" id="availOld" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Avail</h4>
        </div>
        <div class="modal-body">
            <h4>Avail now?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="availold">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div> -->
    

  <nav  class="navbar navbar-default navbar-fixed-bottom" >
    <div class="nav pull-right">
       <div class="nav navbar-nav" style="padding-top: 10px;">
        <form method="POST">
        <b style="font-size: 15px; padding-right: 100px; color: #fff;">Total Price: <input type="text" style="color: #000;" name="total" disabled value="P<?php echo $totalaccount; ?>"></b>
        <!-- <input type="submit" name="avail" value="Avail Packages" data-toggle="modal" data-target="#availModal">  -->
       
        </form>
      </div>
    </div>
  </nav>


</body>
</html>

<?php
if(isset($_GET['remove']))
{
  $query = mysqli_query($conn,"DELETE from temp where id='".$_GET['id']."'");
  header("location:index.php");  
}
  // if(isset($_GET['remove'])){
  //   echo"<script>$('#removeModal').modal('show');</script>";
  //   echo"<script>alert('sadfasdfasdf')</script>";
  // }
?>

<?php
if(isset($_POST['avail'])){
  $empty = mysqli_query($conn, "SELECT * FROM temp WHERE cashier='".$_SESSION['user']."' ");
  $empty2=mysqli_num_rows($empty);
  if ($empty2==0){
    echo"<script>alert('Select package first!')</script>";
  }
  else{
  $query2= mysqli_query($conn,"INSERT INTO qpd_form (company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid,  comment, packid, totalprice, LOE, AN, AC) VALUES ('NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA',  'NA', 'NA', '$totalaccount', 'NA', 'NA', 'NA')");
   $id= mysqli_insert_id($conn);
  header("location:avail.php?id=".$id);
  }
}
?>

<?php
if(isset($_POST['availold'])){
  $empty = mysqli_query($conn, "SELECT * FROM temp WHERE cashier='".$_SESSION['user']."' ");
  $empty2=mysqli_num_rows($empty);
  if ($empty2==0){
    echo"<script>alert('Select package first!')</script>";
  }
  else{
  $query2= mysqli_query($conn,"INSERT INTO qpd_form (company, pos, fn, mn, ln, address, bd, age, gender, contact, email, bill, ref, sid,  comment, packid, totalprice, LOE, AN, AC) VALUES ('NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA',  'NA', 'NA', '$totalaccount', 'NA', 'NA', 'NA')");
   $id= mysqli_insert_id($conn);
  header("location:listofpatient.php?id=".$id);
  }
}
?>


