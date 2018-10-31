<?php
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if  ($row['class'] == "Doctor")
 {
     $user_home->redirect('doctor/index.php');
 }
if ($row['class'] == "Medical Services")
 { 
    $user_home->redirect('nurse/index.php');
 }
  if ($row['class'] == "Accounting")
 { 
    $user_home->redirect('QC/index.php');
 }
if ($row['class'] == "Admin")
 { 
    $user_home->redirect('admin/index.php');
 }
  if ($row['class'] == "CashierCASH")
 { 
    $user_home->redirect('cashier/Cash.php');
 }
   if ($row['class'] == "CashierACCOUNT")
 { 
    $user_home->redirect('cashier/Account.php');
 }
  if ($row['class'] == "Laboratory")
 { 
    $user_home->redirect('medtech/index.php');
 }
  if ($row['class'] == "Imaging")
 { 
    $user_home->redirect('radtech/index.php');
 }

?>
