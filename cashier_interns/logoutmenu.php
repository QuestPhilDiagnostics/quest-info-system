 <?PHP
  include("connect.php");
?>

<!--change pass modal-->
  <div class="modal fade" id="change" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
         <form method="POST" enctype="multipart/form-data">
          <input type="text" class="form-control" name="user" id="username" placeholder="Enter username" value="<?PHP
          echo $_SESSION['user']; ?>"><br>

          <input type="password" class="form-control" name="pass" id="password" placeholder="Enter password" autofocus><br>
        
          <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter new password" minlength="6" required><br>
          
          <input type="password" class="form-control" name="confirmpass" id="confirmpass" placeholder="Re-enter new password" minlength="6" required> <br>
        </div>
        <div class="modal-footer">
               <input type="submit" class="btn btn-default"  value="Change Password" name="changepass">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>


<!-- Password error-->
  <div class="modal fade" id="passerror" role="dialog">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="modal-title">Wrong Old Password</h4>
                    </center>
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btnsubmit" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Okay</button>
                </div>
            </div>

        </div>
    </div> 

    <!-- Match error-->
  <div class="modal fade" id="matcherror" role="dialog">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="modal-title">New password does not match!</h4>
                    </center>
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btnsubmit" data-dismiss="modal" data-toggle="modal" data-target="#myModal">Okay</button>
                </div>
            </div>

        </div>
    </div> 

    <!-- Success-->
  <div class="modal fade" id="success" role="dialog">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4 class="modal-title">Password successfully change!</h4>
                    </center>
                </div>
                <div class="modal-footer" style="">
                    <a href="logout.php"><button type="button" class="btn btnsubmit">Okay</button></a>
                </div>
            </div>

        </div>
    </div>


<?PHP
    if(isset($_POST['changepass']))
    {
      

      $query1=mysqli_query($conn,"SELECT * FROM qpd_users where user='".$_POST['user']."' AND pass='".sha1($_POST['pass'])."'");
        $query2=mysqli_num_rows($query1);
        $query3=mysqli_fetch_array($query1);
        if($query2==0)
        {
            echo"<script>$('#passerror').modal('show');</script>";
        }
        else
        {
          if($_POST['newpass']==$_POST['confirmpass'])
          {
            $query1=mysqli_query($conn,"SELECT * FROM qpd_users where user='".$_POST['user']."' AND pass='".sha1($_POST['pass'])."'");
            $query2=mysqli_fetch_array($query1);
            mysqli_query($conn,"UPDATE qpd_users SET pass='".sha1($_POST['newpass'])."' WHERE id='".$query2[0]."'");
                  echo"<script>$('#success').modal('show');</script>";
          }
          else
          {     
                  echo"<script>$('#matcherror').modal('show');</script>";
          }         
        }
    }
?>

