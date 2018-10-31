<?php
session_start();
require_once '../class.user.php';
include_once('../summarycon.php');
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$Cashier = $row['userName'];

if ($row['class'] == "CashierCASH")
{ 
	$user_home->redirect('Cash.php'); 
}
elseif ($row['class'] == "CashierACCOUNT") 
{
	$user_home->redirect('Account.php'); 
}
else
{
	$user_home->redirect('../home.php');
}