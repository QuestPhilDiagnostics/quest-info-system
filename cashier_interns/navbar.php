
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
        </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
          <li>
          <a class="navbar-brand"><img src="QPDLogo.png" width="40" height="40" class="logo" alt="QuestPhil"></a></li>
            <li class="#"><a href="index.php" style="border-right: solid #7f8c8d 3px;">Home</a></li>
            <li class="#"><a href="package.php" style="border-right: solid #7f8c8d 3px;">Manage Package</a></li>
            <li class="#"><a href="translist.php" style="border-right: solid #7f8c8d 3px;">Transaction List</a></li>
            <li class="#"><a href="hmo.php" style="border-right: solid #7f8c8d 3px;">HMO Record</a></li>
            <li class="#"><a href="patient.php" style="border-right: solid #7f8c8d 3px;">Patient Transaction Record</a></li>
            <li class="#"><a href="sales.php">Sales Report</a></li>
            
      </ul>
      <!--LOGOUT MENU-->
      <div class="top-nav">
                  <ul class="nav pull-right top-menu">
                      <li class="dropdown" id="logout">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                              <span  class="glyphicon glyphicon-user" style="color: black;"></span>
                              <span  class="username" style=" font-size: 15px; color: black;">Welcome <?php echo "<b>".$_SESSION['user']; ?> </b>          
                </span>
                              <b class="caret" style="color: black;"></b>
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