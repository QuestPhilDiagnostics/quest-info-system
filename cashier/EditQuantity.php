<?php
$conn=mysqli_connect("localhost","root","","dbqis");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_GET['id'];
$ref=$_GET['reference'];
$addquantity = $_POST['quantitytxt'];
$discounttxt = $_POST['discounttxt'];

$sqlselect=mysqli_query($conn, "SELECT * FROM qpd_items  WHERE ItemID = '$id'");
while ($result = mysqli_fetch_assoc($sqlselect)) 
{

  $ItemPrice = $result['ItemPrice'];
}
$discounttotal = $discounttxt / 100 * $ItemPrice;
$Price = $ItemPrice - $discounttotal;
$Grand = $Price * $addquantity;

  $sqlupdate = "UPDATE temp_trans SET ItemQTY = '$addquantity', Discount = '$discounttotal', DiscountPer = '$discounttxt', TotalPrice = '$Price', GrandTotal = '$Grand' WHERE TransactionRef = '$ref' AND ItemID = '$id'";
  if ($conn->query($sqlupdate) === TRUE) 
    {
       echo "<script>window.open('Cash.php?id=$ref','_self')</script>";
    }
  else
    {
      echo "Error updating record: " . $conn->error;

    }




              
?>