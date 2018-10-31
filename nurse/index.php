
<?php
session_start();
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row['class'] != "Medical Services"){

    $user_home->redirect('../doctor/doctor.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nurse Index</title>
    <link href="../source/bootstrap4/css/bootstrap.css" rel="stylesheet"/>
    <link href="../source/bootstrap4/css/bootstrap.min.css" rel="stylesheet"/>
    <script type="javascript" href="../source/bootstrap3.3.7/js/bootstrap.js"></script>
    <script type="javascript" href="../source/bootstrap3.3.7/js/bootstrap.min.js"> </script>
</head>
<style type="text/css" media="all">
	.form-control
	{
		margin-bottom: 10px;
		width:300px;
	}

	.col a
	{
		font-family: "Calibri";
		font-size: 36px;
		font-weight: bolder;

	}
	.card-header
	{
		font-family: "Calibri";
		font-size: 24px;
	}
 
</style>
<body>
<?php include_once('nursesidebar.php');
?>
<div class="container-fluid">

</div>
</body>
</html>