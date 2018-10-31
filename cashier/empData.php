<?php
include_once("../summarycon.php");
if($_REQUEST['empid']) {
$sql = "SELECT ItemPrice FROM temp_trans WHERE TransactionRef='".$_REQUEST['empid']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$data = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$data = $rows;
}
echo json_encode($data);
}
?>