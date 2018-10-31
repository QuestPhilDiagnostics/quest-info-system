<?php

//Generate 8 digit random number for REFERENCE
function randomDigits()
	{
	    $numbers = range(0,9);
	    $digits = '';
	    $length = 8;
	    shuffle($numbers);
		    for($i = 0; $i < $length; $i++)
		    {
		    	global $digits;
		       	$digits .= $numbers[$i];
		    }
	    return $digits;
	}

//Pass generated random number to another variable
$reference = randomDigits();
//check to database if the generated number has duplicate
include_once('../summarycon.php');
$check = mysqli_query($con,  "SELECT * FROM qpd_trans WHERE TransactionRef = '$reference'" );

//if NO == use the generated as the REFERENCE
if (!empty($check)) 
{
	echo "NOOOOO!";
	$finalRef = $reference;
	
}

//if YES == Generate a new one
else
{
	echo "YASSSS!!";
	$numbers = range(0,9);
	$digits = '';
	$length = 8;
	shuffle($numbers);
	for($i = 0; $i < $length; $i++)
	{
		global $digits;
		$digits .= $numbers[$i];
	}

	return $digits;

	$finalRef = $digits;
}
?>


