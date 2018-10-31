<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbqis");
$output = '';
if(isset($_POST["query"]))
{
$search = mysqli_real_escape_string($connect, $_POST["query"]);
$query = " SELECT * FROM qpd_items WHERE ItemID LIKE '%".$search."%' OR ItemName LIKE '%".$search."%' OR ItemDescription LIKE '%".$search."%' OR ItemPrice LIKE '%".$search."%'";
$result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
     $output .= '
      <div class="table-responsive">
       <table class="table table bordered">
        <tr>
         <th>Item ID</th>
         <th>Item Name</th>
         <th>Item Description</th>
         <th>Item Price Code</th>
        </tr> ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>
        <td>'.$row["ItemID"].'</td>
        <td>'.$row["ItemName"].'</td>
        <td>'.$row["ItemDescription"].'</td>
        <td>'.$row["ItemPrice"].'</td>
       </tr> ';
     }

     echo $output;
  }
  else
  {
   echo 'Data Not Found';
  }

}

?>