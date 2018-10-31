<?php  
                  include_once('../../summarycon.php');
                  $id = $_GET['id'];
                  $a=1;
                  if($a=1){


                        $sqlselect=mysqli_query($con, "SELECT * FROM temp_trans WHERE TransactionRef = '$id'");
                        while ($result = mysqli_fetch_assoc($sqlselect)) 
                        {
                              $grandTotal += $result['GrandTotal'];
                               
                        }

                        echo $grandTotal;
                  }
                  else
                  {
                        echo"0.00";
                  }




?>