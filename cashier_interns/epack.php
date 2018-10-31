<?php
  session_start();
  include('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
      <title>Edit</title>
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

  </head>
<body>
  <?php
  include('header.php');
  ?>
<form method="POST">
         <input  type="text"
                placeholder="Add Package" id='pack' autocomplete="off" name="searchpack" required>
          <input type="submit" name="search" value="ADD">
        </form>
        <script type="text/javascript">
              <?php
                $asd = mysqli_query($conn,"SELECT * FROM qpd_package where status=0");
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
                $query= mysqli_query($conn, "INSERT into temp (packid, packName, packPrice, packList,  cashier) VALUES ('".$pack2[0]."', '".$pack2[1]."', '".$pack2[2]."', '".$pack2[3]."',  '".$_SESSION['user']."')");
                header('location:epack.php?id='.$_GET['id']);
                  }
                else{
                   $i=0;
                   $totalaccount = 0;
                   $queryselect = mysqli_query($conn, "SELECT * FROM temp WHERE cashier='".$_SESSION['user']."' ");
                    while($query2= mysqli_fetch_array($queryselect))
                        {
                    echo "<tr>";
                      echo "<td>".strip_tags($query2[2])."</td>";
                        echo "<td>".strip_tags($query2[4])."</td>";
                        echo "<td>".strip_tags($query2[3])."</td>";
                      echo "<td><a href=epack.php?remove&id=".$_GET['id']."&rid=".$query2[0].">Remove</a></td>";
                     //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                    echo "</tr>";
                    $totalaccount += $query2[3];
                     $i++;
                      }
                  }
              ?>
            </tbody>
          </table>
              
              <nav class="navbar navbar-default navbar-fixed-bottom" >
              <div class="nav pull-right">
                 <div class="nav navbar-nav" style="padding-top: 10px;">
                  <form method="POST">
                  <b style="font-size: 15px; ">Total Price: <input type="text" name="total" disabled value="P<?php echo $totalaccount; ?>"></b>
                  <input type="submit" class="btn btn-default"  value="Done" name="editpack">
                  <button type="submit" class="btn btn-default" name="cancel">Cancel</button>
                  </form>
                </div>
              </div>
            </nav>
               
        </body>
        </html>
<?php
if(isset($_GET['remove']))
{
  $query = mysqli_query($conn,"DELETE from temp where id='".$_GET['rid']."'");
    //echo"<script>$('#modalEditPack').modal('show');</script>";
 //  $pid='';
 //  $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
 //   while($query2 = mysqli_fetch_array($query1)){
 //   $pid=$pid." ".$query2[1];
 // }
 //   mysqli_query($conn, "UPDATE qpd_form SET packid='$pid' , totalprice='$totalaccount' WHERE id='".$_GET['id']."'");
  header("location:epack.php?id=".$_GET['id']);  
}
?>

<?php
if(isset($_POST['editpack'])){
  $empty = mysqli_query($conn, "SELECT * FROM temp WHERE cashier='".$_SESSION['user']."' ");
  $empty2=mysqli_num_rows($empty);
  if ($empty2==0){
    echo"<script>alert('Select package first!')</script>";
  }
  else{
  $pid='';
  $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
   while($query2 = mysqli_fetch_array($query1)){
   $pid=$pid." ".$query2[1];

   mysqli_query($conn, "UPDATE qpd_form SET packid='$pid' , totalprice='$totalaccount' WHERE id='".$_GET['id']."'");
   echo"<script>alert('Done!')</script>";
   header("location:trans.php?id=".$_GET['id']);
  }
}
}
?>

<?php
if(isset($_POST['cancel'])){
  
   header("location:trans.php?id=".$_GET['id']);
  }

?>