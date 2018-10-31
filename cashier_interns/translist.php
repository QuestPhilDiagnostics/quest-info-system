<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Transaction List</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
      <link rel="stylesheet" type="text/css" href="styles.css" />
      <style type="text/css">

          /*table.scroll tbody,
          table.scroll thead { display: block; }

          table.scroll tbody {
              height: 468px;
              overflow-y: auto;
              overflow-x: auto;
          }

          tbody td:last-child, thead th:last-child {
              border-right: none;
          }*/
      </style>
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
  <div class="container" >
  <table class="table table-hover table-striped scroll" id='transtable'>
      <thead>
        <tr>
          <th>Date/Time</th>
          <th>Cashier</th>
          <th>Trans No.</th>
          <th>Trans Type</th>
          <th>Customer Name</th>
          <th>Company</th>
          <th>Age/Gender</th>
          <th>Contact</th>
          <th>Package</th>
          <th>Total</th>
          <th>Cash</th>
          <th>Change</th>
          <th></th>
        </tr>
      </thead>
      <tbody id='myTable'>
        <?PHP       
            if(isset($_POST['search']))
              {
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_trans WHERE status=0 AND date = '%".$_POST['searchtrans']."%' OR status=0 AND company LIKE '%".$_POST['searchtrans']."%' OR status=0 AND fn LIKE '%".$_POST['searchtrans']."%' OR status=0 AND ln LIKE '%".$_POST['searchtrans']."%' order by date desc");
                while($query2 = mysqli_fetch_array($query1))
                {
                  echo "<tr>";
                    echo "<td>".strip_tags($query2[22])."</td>";
                    echo "<td>".strip_tags($query2[2])."</td>";
                      echo "<td>".strip_tags($query2[0])."</td>";
                      echo "<td>".strip_tags($query2[1])."</td>";
                      echo "<td>".strip_tags($query2[7]). "," .strip_tags($query2[5]). " " .strip_tags($query2[6]). "</td>";
                      echo "<td>".strip_tags($query2[3])."</td>";
                      echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11]). "</td>";
                      echo "<td>".strip_tags($query2[12])."</td>";
                      echo "<td>";
                                  $prod=$query2[17];
                                  $ctr=1;
                                  $arr=0;
                                  $perprod=0;
                                  $num=strlen($prod)-1;
                                  for($a=0;$a<$num;$a++){
                                      $qty[$a]=0;
                                    }
                        if($num==1){
                        $product[$arr]=$prod[$ctr];
                        $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                        $query4=mysqli_fetch_array($query3);
                        echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                        
                    }
                    while($ctr<$num){
                        if($prod[$ctr]!= ''){
                            if($prod[$ctr+1]==' '){
                                    $product[$arr]=$prod[$ctr];
                                    $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                    $query4=mysqli_fetch_array($query3);
                                     echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                            }
                            else{
                                    $product[$arr]=$prod[$ctr].$prod[$ctr+1];
                                    $ctr++;
                                    $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                    $query4=mysqli_fetch_array($query3);
                                     echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                                }
                            }
                        $ctr++;
                        if($ctr==$num){
                                $product[$arr]=$prod[$ctr];
                                $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                $query4=mysqli_fetch_array($query3);
                                 echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ;  
                            }
                         }
                  "</td>";
                      echo "<td>".strip_tags($query2[19])."</td>";
                      echo "<td>".strip_tags($query2[20])."</td>";
                      echo "<td>".strip_tags($query2[21])."</td>";
                    echo "<td><a href='?reprint&id=".$query2[0]."'>Reprint Receipt</a></td>";
                   //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                  echo "</tr>";
                }
              }
            else
              {   
                  $query1 = mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 order by date desc");
                  while($query2 = mysqli_fetch_array($query1))
                  {
                    echo "<tr>";
                      echo "<td>".strip_tags($query2[22])."</td>";
                      echo "<td>".strip_tags($query2[2])."</td>";
                        echo "<td>".strip_tags($query2[0])."</td>";
                        echo "<td>".strip_tags($query2[1])."</td>";
                        echo "<td>".strip_tags($query2[7]). ", " .strip_tags($query2[5]). " " .strip_tags($query2[6]). "</td>";
                        echo "<td>".strip_tags($query2[3])."</td>";
                        echo "<td>".strip_tags($query2[10]). "/" .strip_tags($query2[11]). "</td>";
                        echo "<td>".strip_tags($query2[12])."</td>";
                        echo "<td>";
                                    $prod=$query2[17];
                                    $ctr=1;
                                    $arr=0;
                                    $perprod=0;
                                    $num=strlen($prod)-1;
                                    for($a=0;$a<$num;$a++){
                                        $qty[$a]=0;
                                      }
                          if($num==1){
                          $product[$arr]=$prod[$ctr];
                          $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                          $query4=mysqli_fetch_array($query3);
                          echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                          
                      }
                      while($ctr<$num){
                          if($prod[$ctr]!= ''){
                              if($prod[$ctr+1]==' '){
                                      $product[$arr]=$prod[$ctr];
                                      $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                      $query4=mysqli_fetch_array($query3);
                                       echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                              }
                              else{
                                      $product[$arr]=$prod[$ctr].$prod[$ctr+1];
                                      $ctr++;
                                      $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                      $query4=mysqli_fetch_array($query3);
                                       echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ; 
                                  }
                              }
                          $ctr++;
                          if($ctr==$num){
                                  $product[$arr]=$prod[$ctr];
                                  $query3=mysqli_query($conn,"SELECT * FROM qpd_package WHERE id=".$product[$arr]);
                                  $query4=mysqli_fetch_array($query3);
                                   echo $query4[1]. "(" .$query4[3]. ") - " .$query4[2]. "<br>" ;  
                              }
                           }
                    "</td>";
                        echo "<td>".strip_tags($query2[19])."</td>";
                        echo "<td>".strip_tags($query2[20])."</td>";
                        echo "<td>".strip_tags($query2[21])."</td>";
                      echo "<td><a href='?reprint&id=".$query2[0]."'>Reprint Receipt</a></td>";
                     //echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                    echo "</tr>";
                  }
            }
         ?>
  </tbody>
  </table>
  <script type="text/javascript">
        function exportSub(){
            window.open('exportTranslist.php');
            
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
                                                }
                                        // }
                                    }
                                }
                            }
                        }
                    }
                }
            }
          }   

          // // Change the selector if needed
          // var $table = $('table.scroll'),
          //     $bodyCells = $table.find('tbody tr:first').children(),
          //     colWidth;

          // // Adjust the width of thead cells when window resizes
          // $(window).resize(function() {
          //     // Get the tbody columns width array
          //     colWidth = $bodyCells.map(function() {
          //         return $(this).width();
          //     }).get();
              
          //     // Set the width of thead columns
          //     $table.find('thead tr').children().each(function(i, v) {
          //         $(v).width(colWidth[i]);
          //     });    
          // }).resize(); // Trigger resize handler 
  </script>
</div>
</body>
<!--modal reprint-->
<div class="modal fade" id="reprint" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Print</h4>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to reprint the receipt?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="reprintmodal">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>

<?php
  if(isset($_POST['reprintmodal']))
  {
    $query1=mysqli_query($conn, "SELECT * FROM qpd_trans where status=0 AND id='".$_GET['id']."'");
    while($query2 = mysqli_fetch_array($query1))
    {
      $transtype=$query2[1];
    }
    if($transtype=='CASH')
    {
    //header("location:cashrec.php?id=".$_GET['id']);
    echo" <script>window.open('cashrec.php?id=".$_GET['id']."', '_blank');</script>";
    }
    else
    //header("location:accrec.php?id=".$_GET['id']);
    echo "<script>window.open('accrec.php?id=".$_GET['id']."', '_blank');</script>";
  }
    if(isset($_GET['reprint']))
      {
        echo"<script>$('#reprint').modal('show');</script>";
      }
?>