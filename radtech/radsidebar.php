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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


</head>
<style type="text/css">
  .navbar-custom {
    background-color: #2980b9;
}
  .navbar-nav a {
    font-family: "Calibri";
    font-size: 24px;
    font-weight: bold;
    color:#bdc3c7;
  }

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
      <a class="nav-item nav-link" href="index.php"><i class="fas fa-home"></i>&nbsp; Home</a>
      <a class="nav-item nav-link" href="ListOfPatients.php"><i class="fas fa-user-cog"></i>&nbsp;Patient Summary</a>
      <a class="nav-item nav-link" href="XRaySummary.php"><i class="fas fa-x-ray"></i>&nbsp;XRAY Summary</a>
      <a class="nav-item nav-link" href="XRay.php"><i class="fas fa-times"></i>&nbsp;Radiology Report</a>
      <a class="nav-item nav-link" href="PEList.php"><i class="fab fa-steam"></i>&nbsp;PE Form</a>
      <a class="nav-item nav-link" href="MCList.php"><i class="fas fa-certificate"></i>&nbsp;MedCert</a>
      <a class="nav-item nav-link" href="../logout.php" style="padding-left:290px; "><i class="fas fa-sign-out-alt"></i>&nbsp; LOGOUT</a>
    </div>

  </div>
  
    
</nav>


</body>
</html>