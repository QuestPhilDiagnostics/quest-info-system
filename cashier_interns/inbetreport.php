 <?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
          <title>Sales Report</title>
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
  <button type="button" class="btn btn-success" name='add' value='Insert' 
            data-toggle="modal" data-target="#myModal">Generate report</button>
    <form method="POST" style="float: right;">
          <div class="form-group">                    
                        <button class="exportbut" value="export-file" name="exp">Export as Excel File</button>
           </div>                    
    </form>
    <table class="table table-striped table-condensed table2">
                        <thead>
                            <tr>
                                <th>Package Order<br>Id</th>
                                <th>Cashier</th>
                                <th>Packages Availed</th>
                                <th>Trans Type</th>
                                <th>Total</th>
                                <th>Cash</th>
                                <th>Change</th>
                                <th>Date</th>
                            </tr>
                        </thead>
 <?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $printdate = date("Y-m-d H:i:s");
    $today = date("Y-m-d");
     $SD = date("Y-m-d", strtotime($_GET['SD']));
    $ED = date("Y-m-d", strtotime('+1 day', strtotime($_GET['ED'])));
    echo "<b><h3>Sales from ".$SD." to ".$_GET['ED']." </h3></b>";
    $query1=mysqli_query($conn, "SELECT * FROM qpd_trans WHERE date >= '$SD' AND date <= '$ED' AND packid!='' AND status=0 ORDER BY date");
                            while($query2=mysqli_fetch_array($query1)){
                                $prod=$query2[17];
                                $ctr=1;
                                $arr=0;
                                $num=strlen($prod)-1;
                                echo "<tr>";
                                    echo "<td>".$query2[0]."</td>";
                                    echo "<td>".$query2[2]."</td>";
                                    echo "<td class='ordertd'>";
                                    if($num==1){
                                        $product[$arr]=$prod[$ctr];
                                        $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                        $query4=mysqli_fetch_array($query3);
                                        echo "Package: ".$query4[1]. "(" .$query4[3]. ")<span class='' style='float:right;'></span>"; 
                                        echo "<br>Price: ".$query4[2]."<br>";
                                        // echo $query4[2]."<span class='' style='float:right;'>";
                                        // echo $query4[4]."</span><br>";
                                    }
                                    while($ctr<$num){
                                        if($prod[$ctr]!=' '){
                                            if($prod[$ctr+1]==' '){
                                                $product[$arr]=$prod[$ctr];
                                                $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                                $query4=mysqli_fetch_array($query3);
                                                echo "Package: ".$query4[1]. "(" .$query4[3]. ")<span class='' style='float:right;'></span>"; 
                                                echo "<br>Price: ".$query4[2]."<br>";
                                            }
                                            else{
                                                $product[$arr]=$prod[$ctr].$prod[$ctr+1];
                                                $ctr++;
                                                $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                                $query4=mysqli_fetch_array($query3);
                                                echo "Package: ".$query4[1]. "(" .$query4[3]. ")<span class='' style='float:right;'></span>"; 
                                                echo "<br>Price: ".$query4[2]."<br>";
                                            }
                                        }
                                        $ctr++;
                                        if($ctr==$num){
                                            $product[$arr]=$prod[$ctr];
                                            $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                            $query4=mysqli_fetch_array($query3);
                                            echo "Package: ".$query4[1]. "(" .$query4[3]. ")<span class='' style='float:right;'></span>"; 
                                            echo "<br>Price: ".$query4[2]."<br>";
                                        }
                                    }
                                    echo "</td>"; 
                                    echo "<td>".$query2[1]."</td>";
                                    echo "<td>".$query2[19]."</td>";
                                    echo "<td>".$query2[20]."</td>";
                                    echo "<td>".$query2[21]."</td>";
                                    echo "<td>".$query2[22]."</td>";
                                    // echo "<td>".$query2[7]."</td>";
                                    // echo "<td>".$query2[8]."</td>";
                                    // echo "<td>".$query2[9]."</td>";
                                    // echo "<td>".$void."</td>";
                                echo "</tr>";
                            }
                        ?>
                         </tbody>
                    </table>
</body>
</html>
<!--modal Generate report -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales Report</h4>
        </div>
        <div class="modal-body">
            <h4>Generate sales from <?php echo $_GET['SD']. " to " .$_GET['ED'] ?></h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
          <button type="submit" class="btn btn-default"  name="gtr">Yes</button>
          <button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</html>

<?php
if(isset($_POST['gtr'])){
  echo" <script>window.open('IBDR.php?SD=".$_GET['SD']."&ED=".$_GET['ED']."', '_blank');</script>";
}
?>

<?php
if(isset($_POST['exp'])){
  echo" <script>window.open('exportIBDR.php?SD=".$_GET['SD']."&ED=".$_GET['ED']."', '_blank');</script>";
}
?>