<?php
include_once('../summarycon.php');
if(isset($_POST['ADDNewRecord']))
{
	$id=$_GET['id'];
	$company=$_POST['company'];
	$position=$_POST['position'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$contact=$_POST['contact'];


	$addtemp_patient = " UPDATE temp_trans SET
							CompanyName = '$company',
							Position = '$position',
							FirstName = '$firstname',
							MiddleName = '$middlename',
							LastName = '$lastname',
							Address = '$address',
							Birthdate = '$birthday',
							Email = '$email',
							Age = '$age',
							Gender = '$gender',
							ContactNo = '$contact'
							WHERE TransactionRef = '$id'";

	if ($con->query($addtemp_patient) === TRUE) 
    {

    	$sql = mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = $id ");
					while($patdata = mysqli_fetch_array($sql))
					{
						$idpatient=$patdata['PatientID'];
						$company=$patdata['CompanyName'];
						$firstname=$patdata['FirstName'];
						$middlename=$patdata['MiddleName'];
						$lastname=$patdata['LastName'];
						$contact=$patdata['ContactNo'];

		}

        echo "<script> alert('Record Updated Successfully') </script>";
    }
  else
    {
      echo "Error updating record: " . $con->error;
      echo "<script> alert('.$conn->error.') </script>";

    }


}

	

?>






<?php
include_once('../summarycon.php');
if(isset($_POST['ADDNewRecord']))
{
	$id=$_GET['id'];
	$company=$_POST['company'];
	$position=$_POST['position'];
	$firstname=$_POST['firstname'];
	$middlename=$_POST['middlename'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$contact=$_POST['contact'];


	$addtemp_patient = " INSERT INTO qpd_patient (PatientRef, CompanyName, Position, FirstName, MiddleName, LastName, Address, Birthdate, Email, Age, Gender, ContactNo)
							VALUES ('$id', '$company', '$position', '$firstname', '$middlename', '$lastname', '$address', '$birthday', '$email', '$age', '$gender', '$contact')";

	if ($con->query($addtemp_patient) === TRUE) 
    {

    
        echo "<script> alert('Record Updated Successfully') </script>";
    }
  else
    {
      echo "Error updating record: " . $con->error;
      echo "<script> alert('.$conn->error.') </script>";

    }


}

	

?>