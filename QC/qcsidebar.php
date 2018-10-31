<?php
if(!isset($_SESSION)) 
  { 
  session_start(); 
  } 
require_once '../class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
  $user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="../source/bootstrap4/css/bootstrap.css" rel="stylesheet"/>
    <link href="../source/bootstrap4/css/bootstrap.min.css" rel="stylesheet"/>
    <script type="javascript" href="../source/bootstrap3.3.7/js/bootstrap.js"></script>
    <script type="javascript" href="../source/bootstrap3.3.7/js/bootstrap.min.js"> </script>
</head>
<style type="text/css">
  .navbar-custom {
    background-color: #2980b9;
}
  .navbar-nav a {
    font-family: "Calibri";
    font-size: 20px;
    font-weight: bold;
    color:#bdc3c7;
  }

</style>
<body>
<nav class="navbar navbar-toggleable-md navbar-dark navbar-custom">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <a class="navbar-brand">
    <img src="../assets/QPDLogo.png" width="40" height="40" class="d-inline-block align-center" alt="">
    
  </a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php" style="border-right: solid #7f8c8d 3px;">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="ListOfPatients.php" style="border-right: solid #7f8c8d 3px;">Patient Summary</a>
      <a class="nav-item nav-link" href="QCMCList.php" style="border-right: solid #7f8c8d 3px;">QC</a>
      <a class="nav-item nav-link" href="SummaryReport.php" style="border-right: solid #7f8c8d 3px;">Summary</a>
      <a class="nav-item nav-link" href="PEList.php" style="border-right: solid #7f8c8d 3px;">PE Form</a>
      <a class="nav-item nav-link" href="MCList.php" style="border-right: solid #7f8c8d 3px;">MedCert</a>
    </div>
  </div>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="../logout.php">LOGOUT</a></li>
    </ul>
</nav>











</body>
</html>