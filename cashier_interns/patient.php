<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Patient</title>
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
   <br><br><br><br>
   <div class="container">
    <table class="table table-hover table-striped" id='myTable'>
      <thead>
        <tr>
          <th style="font-size: 16px;">PATIENTS</th>
        </tr>
      </thead>
      <tbody>
   <form method="POST">
 		 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search name.." autocomplete="off">
  </form><br>
  	<?php
          
  			$query1=mysqli_query($conn, 'SELECT * FROM qpd_form where ln!="NA" AND status=0 GROUP BY ln, fn, mn ORDER BY ln ASC');
  			while($query2 = mysqli_fetch_array($query1)){
		      echo "<tr style='font-family:Century Gothic;'>";     
		      	echo "<td style='font-size: 15px; color:black; '>".$query2[5].", ".$query2[3]." ".$query2[4]."<br></td>";
		      	echo "<td><a href='?view&id=".$query2[0]."'><button type='Button' class='btn btn-primary' style='float:right; '>View Record</button></a></td>";
		      echo "</tr>";
  			}

  	?>
	  </tbody>
	</table>
  <script type="text/javascript">
    function myFunction() {
      // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  </script>
  </div>
</body>
<!--modal view-->
<div>
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View</h4>
        </div>
        <div class="modal-body">
            <h4>View patient's record list?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="viewrec">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>
</html>
<?PHP
  if(isset($_POST['viewrec']))
  { 
    header("location:patientrecord.php?pid=".$_GET['id']);
  }
  if(isset($_GET['view'])){
    echo"<script>$('#viewModal').modal('show');</script>";
  }
?> 
