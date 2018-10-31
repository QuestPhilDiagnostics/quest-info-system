<?php
		           	include_once('../summarycon.php');
		           	$lastid = $id;
		           	//$total = $_POST['txtTotal'];
		           	if(isset($_POST['searchpatient']))
		           	{
		                $pack= mysqli_query($con, "SELECT * from qpd_patient WHERE PatientID='".$_POST['patientId']."'");

		                while($row =mysqli_fetch_array($pack))
						{
				           
				        echo "<div class='row' style='padding: 10px;''>";
						echo "<div class='col'>";
							echo "<label for=''>First Name:</label>";
							echo "<input type='text'  name='firstname' class='form-control' value=".$row['FirstName']."  required />";
							echo "<label for=''>Company Name:</label>";
							echo "<input type='text'  name='company' class='form-control' value=".$row['CompanyName']."  required />";
							echo "<label for=''>Birth Date:</label>";
							echo "<input type='text'  name='birthday' class='form-control' placeholder='MM-DD-YYYY' value=".$row['Birthdate']." required />";
							echo "<label for=''>Contact No.:</label>";
							echo "<input type='text'  name='contact' class='form-control' value=".$row['ContactNo']."  />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Middle Name:</label>";
							echo "<input type='text'  name='middlename' class='form-control' value=".$row['MiddleName']." />";
							echo "<label for=''>Applied Position:</label>";
							echo "<input type='text' name='position' class='form-control' value=".$row['Position']."  required />";
							echo "<label for=''>Age:</label>";
							echo "<input type='text'  name='age' id='age' class='form-control' onkeyup='AGE()'' value=".$row['Age']." required />";
							echo "<label for=''>Email Address:</label>";
							echo "<input type='text'  name='email' class='form-control' value=".$row['Email']." />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Last Name:</label>";
							echo "<input type='text'  name='lastname'  class='form-control' value = ".$row['LastName']." required />";
							echo "<label for=''>Address:</label>";
							echo "<input type='text'  name='address' class='form-control' value=".$row['Address']."  required />";
							echo "<label for=''>Gender:</label>";
							echo "<input type='text'  name='gender' class='form-control' value=".$row['Gender']." required />";
							echo "<label for=''>Comment:</label>";
							echo "<input type='text'  name='comment' class='form-control' value=".$row['Notes']." />";
							echo "<input type='hidden'  name='PatRef' class='form-control' value=".$row['PatientRef']." />";
							echo "<input type='hidden'  name='PatID' class='form-control' value=".$row['PatientID']." />";
						echo "</div>";
						echo "</div>";

					}
				}
				else if (isset($_POST['addnew']))
				{
				        echo "<form method='POST'>";
				        echo "<div class='row' style='padding: 10px;''>";

						echo "<div class='col'>";
							echo "<label for=''>First Name:</label>";
							echo "<input type='text'  name='firstname' class='form-control' value=''  required />";
							echo "<label for=''>Company Name:</label>";
							echo "<input type='text'  name='company' class='form-control' value='' required />";
							echo "<label for=''>Birth Date:</label>";
							echo "<input type='text'  name='birthday' class='form-control' placeholder='MM-DD-YYYY' value=''  required />";
							echo "<label for=''>Contact No.:</label>";
							echo "<input type='text'  name='contact' class='form-control' value=''  />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Middle Name:</label>";
							echo "<input type='text'  name='middlename' class='form-control' value='' />";
							echo "<label for=''>Applied Position:</label>";
							echo "<input type='text' name='position' class='form-control' value='' required />";
							echo "<label for=''>Age:</label>";
							echo "<input type='text'  name='age' id='age' class='form-control' onkeyup='AGE()'' value='' required />";
							echo "<label for=''>Email Address:</label>";
							echo "<input type='text'  name='email' class='form-control' value='' />";
						echo "</div>";
						echo "<div class='col'>";
							echo "<label for=''>Last Name:</label>";
							echo "<input type='text'  name='lastname'  class='form-control' value='' required />";
							echo "<label for=''>Address:</label>";
							echo "<input type='text'  name='address' class='form-control' value=''  required />";
							echo "<label for=''>Gender:</label>";
							echo "<input type='text'  name='gender' class='form-control' value='' required />";
							echo "<label for=''>Comment:</label>";
							echo "<input type='text'  name='comment' class='form-control' value='' />";
						echo "</div>";
						echo "</div>";
						echo "<input type='submit' class='btn btn-primary' style='height: 40px;' name='ADDNewRecord' value='SUBMIT'>";
						echo "</form>";
						

				}
				        

				?>