<?php
	session_start();
	include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		  <title>Manage Package</title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="jquery/jquery-3.1.1.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/style-responsive.css" />
		  <link rel="stylesheet" type="text/css" href="design.css" />
      <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>
	</head>
<body>
	
    <?PHP
    include 'navbar.php';
    ?>
   <br><br><br>
   <div class="container">
    <button type="button" class="btn btn-primary" name='add' value='Insert' 
            data-toggle="modal" data-target="#myModal">Add Package</button>
   <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Package Name</th>
          <th>Package List</th>
          <th>Package Price</th>
        </tr>
      </thead>
      <tbody>
        <?PHP         
              if(isset($_GET['edit']))
                  {
                    
                    $query1 = mysqli_query($conn,"SELECT * FROM qpd_package where status=0 order by id='".$_GET['id']."' desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {

                      if($query2[0]==$_GET['id'])
                      { 
                        echo "<form method='POST'>";
                        echo "<tr>";
                          echo "<td><input type='text' class='form-control' name='packName' value='".$query2[1]."' autocomplete='off'></td>";
                          echo "<td><input type='text' class='form-control' name='packList' value='".$query2[3]."' disabled></td>";
                          echo "<td><input type='text' class='form-control' name='packPrice' value='".$query2[2]."' autocomplete='off' ></td>";
                          echo "<td><input type='submit' name='btnEdit' class='btn btn-link' value='Save'></td>";
                          echo "<td><a href='package.php' class='btn btn-link'>Cancel</a></td>";
                        echo "</tr>";
                        echo "</form>";
                      }
                      else
                      {
                        echo "<tr>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>P".strip_tags($query2[2])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                      if(isset($_POST['btnEdit']))
                      {
                       mysqli_query($conn, "UPDATE qpd_package SET packName='".$_POST['packName']."', packPrice='".$_POST['packPrice']."' where id='".$_GET['id']."'");
                        header("location:?new=".$_GET['id']."");
                      }
                    }
                  }
                  elseif(isset($_GET['new']))
                  {
                    
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_package where status=0  order by id='".$_GET['new']."' desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {
                      if($query2[0]==$_GET['new'])
                      {
                        echo "<tr style='background-color:#41D53C;'>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>P".strip_tags($query2[2])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                      else
                      {
                        echo "<tr>";
                          echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>P".strip_tags($query2[2])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                        echo "</tr>";
                      }
                    }
                  }
                  else
                  {
                    
                    $query1 = mysqli_query($conn, "SELECT * FROM qpd_package where status=0 order by id desc");
                    while($query2 = mysqli_fetch_array($query1))
                    {
                      echo "<tr>";
                         echo "<td>".strip_tags($query2[1])."</td>";
                          echo "<td>".strip_tags($query2[3])."</td>";
                          echo "<td>P".strip_tags($query2[2])."</td>";
                          echo "<td><a href='?delete&id=".$query2[0]."'>Delete</a></td>";
                          echo "<td><a href='?edit&id=".$query2[0]."'>Edit</a></td>";
                      echo "</tr>";
                    }
                  }

                // }
               
         ?>
  </tbody>
  </table>         
</div>

<!--modal add package-->
  <div class="modal" id="myModal" role="dialog">
<!-- Modal Create content -->
      <div class="modal-content">
      <form method="post" autocomplete="off" enctype="multipart/form-data">
      <div class="modal-header">
          Create New Package
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="card card-info" style="border-radius: 0px;">
        <div class="card-header"><b>Tests List</b></div>
        <div class="card-block">
        <b>NOTE: Price indicated are HMO Prices</b>
          <div class="row">
            <div class="col">
              <b>HEMATOLOGY</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="CBC">Complete Blood Count(P225)</label>
              </div>
              <hr>
              <b>MICROSCOPY</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="U/A">Urinalysis(P135)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="F/A">Fecalysis(P117)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="PT">Pregnancy Test(P315)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="DT">Drug Test(P300)-Walk-in</label>
              </div>
              <hr>
              <b>HEPATITIS MARKERS</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="HBsAg">HBsAg(P297)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="anti-HAV">anti-HAV(P117)</label>
              </div>
            </div>
            <div class="col">
              <b>IMAGING</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="X-RAY">X-RAY(P324)</label>
              </div>
              <div>
                <label>X-RAY Type:<input type="text" name="test[]" class="form-control" value=""></label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="ECG">ECG(P720)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="UTZ-WHOLEABD">UTZ WHOLE ABD(P2880)</label>
              </div>
              <hr>
              <b>OTHER TESTS</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="PE">Physical Examination(P200)-Walk-in</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="PAPSMEAR">PAPSMEAR(P720)</label>
              </div>
            </div>
            <div class="col">
              <b>CHEMISTRY</b>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="FBS">FBS(P144)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="BUA">BUA(P378)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="BUN">BUN(P171)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="CREA">CREA(P360)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="LipidProfile">Lipid Profile(P747)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="Sodium">Sodium(P378)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="Potassium">Potassium(P378)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="Chloride">Chloride(P378)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="SGPT">SGPT(P198)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="SGOT">SGOT(P198)</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="test[]" value="HBA1C">HBA1C(P900)</label>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
          <fieldset class="w-100">
              <div class="row">
                <div class="col-7"><input type="text" class="form-control" name="packName" placeholder="Package Name" required></div>
                <div class="col-3"><input type="number" min="1" step="any" class="form-control" name="packPrice" placeholder="Price" required></div>
                <div class="col-2"><button class="btnCreate" type="submit" name='create'>CREATE</button></div>
              </div>
           </fieldset>
      </div>
      </form>
      </div>
    </div>
  </div>

  <!--modal delete-->
<div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete</h4>
        </div>
        <div class="modal-body">
            <h4>Are you sure you want to delete?</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
               <input type="submit" class="btn btn-default"  value="Yes" name="del">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<!--modal succcess-->
<div class="modal fade" id="success" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Success</h4>
        </div>
        <div class="modal-body">
            <h4>Package successfully added!</h4>
        <div class="modal-footer">
              <form method="POST" enctype="multipart/form-data">
          <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

</html>
<?php
if(isset($_POST['create']))
{
  date_default_timezone_set("Asia/Kuala_Lumpur");
  $PackName = $_POST['packName'];
  $PackPrice = $_POST['packPrice'];
  $date=date("Y-m-d H:i:s");
  $test = $_POST['test'];
  $string = implode(", ", $test);
  $query = mysqli_query($conn,"INSERT INTO qpd_package (packName, packPrice, packList, date) VALUES ('$PackName','$PackPrice','$string','$date') ");
  echo"<script>$('#success').modal('show');</script>";
  header("location:package.php");
  // $sqlinsert = "INSERT INTO qpd_package (packName, packPrice, packList, date) VALUES ('$PackName','$PackPrice','$string','$date') ";
}
?>

<?php
if(isset($_POST['del']))
{
  $query = mysqli_query($conn,"UPDATE qpd_package set status=1 where id='".$_GET['id']."'");
  header("location:?deleted=".$_SESSION['deleted']."");  
}
  if(isset($_GET['delete'])){
    echo"<script>$('#delete').modal('show');</script>";
  }
?>


