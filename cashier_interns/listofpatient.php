<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Lists</title>
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
        <h4><center>Package/s:
          <?php
          $query1=mysqli_query($conn, "SELECT * FROM temp where cashier='".$_SESSION['user']."'");
           while($query2 = mysqli_fetch_array($query1)){
            echo "<br>".$query2[2];
           } 
          ?></center></h4>
  <div class="container">
    <table class="table table-hover table-striped" id='myTable'>
      <thead>
        <tr>
          <th >Patient</th>
        </tr>
      </thead>
      <tbody>
      <form method="POST">
     		 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." autocomplete="off">
      </form><br>
      	<?php
      			$query1=mysqli_query($conn, 'SELECT * FROM qpd_form where ln!="NA" AND status=0 GROUP BY ln, fn, mn ORDER BY ln ASC');
      			while($query2 = mysqli_fetch_array($query1)){
                echo "<tr style='font-family:Century Gothic;'>"; 
        		      echo "<td><a href=availold.php?id=".$_GET['id']."&pid=".$query2[0].">".$query2[5].",".$query2[3]." ".$query2[4]."<br></a></td";
                echo "</tr>"; 
      			}
       
  	     ?>
       </tbody>
     </table>
   </div>
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
</body>
</html>