<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>HMO</title>
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
   <br><br><br><br>
   <div class="container">
 <form method="POST">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.." autocomplete="off">
          <button class="exportbut" onclick="exportSub()" name="" style="float: right;  margin-right: 5px; value="export-file">Export as Excel File</button> 
        </form>
      </div>
       <br>
       <div class="container">
        <table class="table table-hover table-striped" >
      <thead>
        <tr>
          <th>Date/Time</th>
          <th>HMO</th>
          <th>Trans Type</th>
          <th>Trans No.</th>
          <th>Customer Name</th>
          <th>Company</th>
          <th>Age/Gender</th>
          <th>Contact No.</th>
          <th>LOE</th>
          <th>AN</th>
          <th>AC</th>
        </tr>
      </thead>
      <tbody id='myTable'>
      <?PHP
                  if(isset($_GET['edit']))
                  {
                    
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND bill LIKE 'Intellicare' OR bill LIKE 'Avega' AND status=0 OR bill LIKE 'Cocolife' AND status=0 OR bill LIKE 'Valucare' AND status=0 OR bill LIKE 'Eastwest' AND status=0 OR bill LIKE 'Maxicare' AND status=0 order by id='".$_GET['id']."' desc,date desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {

                      if($query2[0]==$_GET['id'])
                      { 
                        echo "<form method='POST'>";
                        echo "<tr>";
                          echo "<td><input type='text' class='form-control' name='date' value='".$query2[22]."' autocomplete='off' disabled></td>";
                          echo "<td><input type='text' class='form-control' name='bill' value='".$query2[14]."' autocomplete='off'></td>";
                          echo "<td><input type='text' class='form-control' name='trans_type' value='".$query2[1]."' disabled></td>";
                          echo "<td><input type='text' class='form-control' name='id' value='".$query2[0]."' disabled></td>";
                          echo "<td><input type='text' class='form-control' name='name' value='".$query2[7]. " " .$query2[5]."' disabled></td>";
                           echo "<td><input type='text' class='form-control' name='company' value='".$query2[3]."' disabled ></td>";
                          echo "<td><input type='text' class='form-control' name='agegen' value='".$query2[10]. "/" .$query2[11]."' disabled></td>";
                          echo "<td><input type='text' class='form-control' name='contact' value='".$query2[12]."' disabled ></td>";
                          echo "<td><input type='text' class='form-control' name='LOE' value='".$query2[24]."' ></td>";
                          echo "<td><input type='text' class='form-control' name='AN' value='".$query2[25]."' ></td>";
                          echo "<td><input type='text' class='form-control' name='AC' value='".$query2[26]."' ></td>";
                          echo "<td><input type='submit' name='btnEdit' class='btn btn-link' value='Save'></td>";
                          echo "<td><a href='hmo.php' class='btn btn-link'>Cancel</a></td>";
                        echo "</tr>";
                        echo "</form>";
                      }
                      else
                      {
                        echo "<tr>";
                          echo "<td>".strip_tags($query2[22])."</td>";
                          echo "<td>".strip_tags($query2[14])."</td>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[0])."</td>";
                          echo "<td>".strip_tags($query2[7]). " " .strip_tags($query2[5]). "</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11])."</td>";
                          echo "<td>".strip_tags($query2[12])."</td>";
                          echo "<td>".strip_tags($query2[24])."</td>";
                          echo "<td>".strip_tags($query2[25])."</td>";
                          echo "<td>".strip_tags($query2[26])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                      if(isset($_POST['btnEdit']))
                      {
                         date_default_timezone_set("Asia/Kuala_Lumpur");
                         $date=date("Y-m-d H:i:s");
                       mysqli_query($conn, "UPDATE qpd_trans SET bill='".$_POST['bill']."', LOE='".$_POST['LOE']."', AN='".$_POST['AN']."', AC='".$_POST['AC']."' , date='$date' where id='".$_GET['id']."'");
                        header("location:?new=".$_GET['id']."");
                      }
                    }
                  }
                  elseif(isset($_GET['new']))
                  {
                    
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND bill LIKE 'Intellicare' OR bill LIKE 'Avega' AND status=0 OR bill LIKE 'Cocolife' AND status=0 OR bill LIKE 'Valucare' AND status=0 OR bill LIKE 'Eastwest' AND status=0 OR bill LIKE 'Maxicare' AND status=0 order by id='".$_GET['new']."' desc,date desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {
                      if($query2[0]==$_GET['new'])
                      {
                        echo "<tr style='background-color:#41D53C;'>";
                           echo "<td>".strip_tags($query2[22])."</td>";
                          echo "<td>".strip_tags($query2[14])."</td>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[0])."</td>";
                          echo "<td>".strip_tags($query2[7]). " " .strip_tags($query2[5]). "</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11])."</td>";
                          echo "<td>".strip_tags($query2[12])."</td>";
                          echo "<td>".strip_tags($query2[24])."</td>";
                          echo "<td>".strip_tags($query2[25])."</td>";
                          echo "<td>".strip_tags($query2[26])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                      else
                      {
                        echo "<tr>";
                           echo "<td>".strip_tags($query2[22])."</td>";
                          echo "<td>".strip_tags($query2[14])."</td>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[0])."</td>";
                          echo "<td>".strip_tags($query2[7]). " " .strip_tags($query2[5]). "</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11])."</td>";
                          echo "<td>".strip_tags($query2[12])."</td>";
                          echo "<td>".strip_tags($query2[24])."</td>";
                          echo "<td>".strip_tags($query2[25])."</td>";
                          echo "<td>".strip_tags($query2[26])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                    }
                  }
                  else
                  {
                    
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND bill LIKE 'Intellicare' OR bill LIKE 'Avega' AND status=0 OR bill LIKE 'Cocolife' AND status=0 OR bill LIKE 'Valucare' AND status=0 OR bill LIKE 'Eastwest' AND status=0 OR bill LIKE 'Maxicare' AND status=0 order by date desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {
                      echo "<tr>";
                         echo "<td>".strip_tags($query2[22])."</td>";
                          echo "<td>".strip_tags($query2[14])."</td>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[0])."</td>";
                          echo "<td>".strip_tags($query2[7]). " " .strip_tags($query2[5]). "</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11])."</td>";
                          echo "<td>".strip_tags($query2[12])."</td>";
                          echo "<td>".strip_tags($query2[24])."</td>";
                          echo "<td>".strip_tags($query2[25])."</td>";
                          echo "<td>".strip_tags($query2[26])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                      echo "</tr>";
                    }
                  }

                // }
                ?>
                
  </tbody>
  </table>
   <script type="text/javascript">
          function exportSub()
          {
              window.open('exportHmo.php');  
          }

          function myFunction()
          {
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                    td2 = tr[i].getElementsByTagName("td")[1];
                    if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                        td3 = tr[i].getElementsByTagName("td")[2];
                        if (td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                            td4 = tr[i].getElementsByTagName("td")[3];
                            if (td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                                td5 = tr[i].getElementsByTagName("td")[4];
                                if (td5.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                    td6 = tr[i].getElementsByTagName("td")[5];
                                    if (td6.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                            td8 = tr[i].getElementsByTagName("td")[8];
                                            if (td8.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                tr[i].style.display = "";
                                            } else {
                                                tr[i].style.display = "none";
                                                td9 = tr[i].getElementsByTagName("td")[9];
                                                if (td9.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                    tr[i].style.display = "";
                                                } else {
                                                    tr[i].style.display = "none";
                                                    td10 = tr[i].getElementsByTagName("td")[10];
                                                    if (td10.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
          }            
   </script>
</div>
</body>
 <!--modal delete-->
<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete</h4>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to delete?</h4>
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
</html>

 <?PHP
  if(isset($_POST['del']))
  { 
    
    mysqli_query($conn, "UPDATE qpd_trans set status=1 where id='".$_GET['id']."'");
    header("location:hmo.php");
    
  }
  if(isset($_GET['delete'])){
    echo"<script>$('#delete').modal('show');</script>";
  }
?> 

