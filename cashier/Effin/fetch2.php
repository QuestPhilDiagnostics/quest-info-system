<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbqis");
$search = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM qpd_items WHERE ItemName LIKE '% U %' OR ItemDescription LIKE '%".$search."%' OR ItemPrice LIKE '%".$search."%'
";

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
 	$myObj->id = $row[0];
  	$myObj->name = $row[1];
 	$myObj->price = $row[2];
  	$myObj->desc = $row[3];
 }
 echo json_encode($myObj);
}

?>
