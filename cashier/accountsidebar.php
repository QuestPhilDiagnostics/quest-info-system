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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="assets/QPD.png">
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

  .navbar{background:#2980B9;}
.nav-item::after{content:'';display:block;width:0px;height:2px;background:#55D4FF;transition: 0.2s;}
.nav-item:hover::after{width:100%;}
.navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show > .nav-link,.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover{color:#55D4FF;}
.nav-link{padding:0px 5px;transition:0.2s;}
.dropdown-item.active, .dropdown-item:active{color:#D4D4FF;}
.dropdown-item:focus, .dropdown-item:hover{background:#55D4FF;}



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
      <a class="nav-item nav-link" href="Account.php" ><i class="fas fa-home"></i>&nbsp; Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="TransactionListAccount.php"><i class="fas fa-list-ul"></i>&nbsp; Transaction List</a>
      <a class="nav-item nav-link" href="HMO.php"><i class="far fa-calendar"></i>&nbsp; HMO Record</a>
      <a class="nav-item nav-link" href="AccountItems.php"><i class="fas fa-archive"></i>&nbsp; Manage Tests Packages</a>
      <a class="nav-item nav-link" href="AccountSalesReport.php"><i class="far fa-newspaper"></i>&nbsp; Sales Report</a>
      <a class="nav-item nav-link" href="../logout.php" style="float: right; padding-left:320px; "><i class="fas fa-sign-out-alt"></i>&nbsp LOGOUT</a>
    </div>

  </div>
  
    <!-- <a class="nav-item nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp LOGOUT</a> -->
    
</nav>




</body>
</html>