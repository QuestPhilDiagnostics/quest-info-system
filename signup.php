<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$class = trim($_POST['class']);

	$code = md5(uniqid(rand()));
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email already exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$code,$class))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						<table bgcolor='#4184F3' width='100%'' border='0' cellspacing='0' cellpadding='0' style='min-width:332px;max-width:600px;border:1px solid #e0e0e0;border-bottom:0;color:#ffffff;border-top-left-radius:3px;border-top-right-radius:3px'>
						<tr >
							<td height='72px' colspan='3'></td>
						</tr>
						<tr>
							<td width='32px'></td>

								<td style='font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:24px;line-height:1.25'>Quest Phil Diagnostics</td>
						
						<td width='32px'></td>
						</tr>
						<tr >
							<td height='18px' colspan='3'></td>
						</tr>
						</table>

						<br><br>
						Welcome to Quest Phil Diagnostics!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />

						<a href='http://localhost/quest/verify.php?id=$id&code=$code'>
						<button style='background-color:#33337F;border-radius: 0px;color:white;padding: 5px 5px 5px 5px;'>Activate Now</button></a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup | Coding Cage</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
				<?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
     Please Choose:  
     <select name="class">
		  <option value="Doctor">Doctor</option>
		  <option value="Medical Services">Medical Services</option>
		  <option value="Accounting">Accounting</option>
		  <option value="Laboratory">Laboratory</option>
		  <option value="Imaging">Imaging</option>
		  <option value="CashierCASH">CashierCASH</option>
		   <option value="CashierACCOUNT">CashierACCOUNT</option>
		  <option value="Admin">Admin</option>
	 </select>

     <hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>