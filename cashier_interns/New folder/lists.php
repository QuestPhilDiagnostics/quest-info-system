<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Avail Package</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php">Cashier</a>
        </div>
      <!--LOGOUT MENU-->
      <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              <span class="glyphicon glyphicon-user"></span>
                              <span class="username">Welcome <?php echo $_SESSION['user']; ?>           
                </span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <li><a href="" data-toggle="modal" data-target="#change"><span class="glyphicon glyphicon-cog"></span> CHANGE PASSWORD </a></li>
                              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>
       </div>
   </nav>
           <?PHP
             include ('logoutmenu.php');
            ?>
   <br><br><br>
   
 </body>
 </html>