<?php
include_once('../summarycon.php');
$select = "SELECT * FROM qpd_form ORDER BY lasnam ASC";
$result = mysqli_query($con, $select);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["lasnam"].",".$row["firnam"]." ".$row["midnam"]." - ".$row["date"];
 }
 echo json_encode($data);
}

?>

