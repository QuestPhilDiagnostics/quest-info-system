<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Sales</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
      
      <link rel="stylesheet" type="text/css" href="styles.css" />
	</head>
<body>
	
    <?PHP
    include 'navbar.php';
    ?>
   <br><br><br>
 <center><h2>Sales today</h2>
 <button type="button" class="btn btn-success" name='rt'  
            data-toggle="modal" data-target="#reporttoday">View Today Sales</button></center><br>

<div><center>
  <h2>Sales between dates</h2>
  <form method="POST" >
      Start Date: <input type="Date" name="SD" class="form-control" required style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px"><br>
      End Date: <input type="Date" name="ED" class="form-control" required style="width: 300px; height: 50px; margin-left: 10px; margin-right: 20px">
  <br><button type="submit" class="btn btn-success" name='ibr'>V i e w&nbsp&nbsp&nbspS a l e s</button>
  </form>
  
</div></center>
            
  
</body>
<!--modal Generate report today-->
<div class="modal fade" id="reporttoday" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales Report</h4>
        </div>
        <div class="modal-body">
            <h4>Generate sales report for today?</h4>
        <div class="modal-footer">
              <form method="POST" action="reporttoday.php" enctype="multipart/form-data">
          <button type="submit" class="btn btn-default"  name="reportfortoday">Yes</button>
          <button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal Generate In between dates-->
<!-- <div class="modal fade" id="reportinbetween" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales Report</h4>
        </div>
        <div class="modal-body">
            <h4>Generate sales report?</h4>
        <div class="modal-footer">
              <form method="POST"  enctype="multipart/form-data">
          <button type="submit" class="btn btn-default"  name="reportinbetween">Yes</button>
          <button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div> -->
</html>

<?php
  if(isset($_POST['ibr'])){
    echo "<script>window.location.href='inbetreport.php?SD=".$_POST['SD']."&ED=".$_POST['ED']."'</script>";
  }
?>

