<?php
try {
$pdo = new PDO ('mysql:host=localhost;dbname=dbtest','root','') ;
} catch (PDOException $e) {
	exit('Database Error.');
}

?>
<?php

class Users {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM tbl_users ");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($article_id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM tbl_users WHERE userID = ?");
			$query->bindValue(1, $article_id);
			$query->execute();

			return $query->fetch();


	}

}
?>

<?php

$User = new Users;
$U = $User->fetch_all();
?>


<html>
<head>


  <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link href="sorting/bootstrap.css" rel="stylesheet">
    <link href="sorting/dataTables.bootstrap.css" rel="stylesheet">
    <link href="sorting/dataTables.responsive.css" rel="stylesheet">

</head>
<body>

<br><br>
<div class="container-fluid">
	<div class="col-sm-12 ">
	<div class=" panel panel-info">
		<div class="panel-heading" style="height: 45px;">
			<h4>List of Registered Staffs</h4>
		</div>
		<div class="panel-body">	
				<div class="dataTable_wrapper">
                    <table class="table table-hover" id="dataTables-example">
                    <thead>
                     <tr>
                    	<th >Name  </th>
						<th >Position </th>
						<th>User Status  </th>
					
					</tr>
					</thead>

					<tbody>
						<?php foreach  ($U as $Us) {  ?>
<tr>
<td><?php echo $Us['userName'];?></td>
<td><?php echo $Us['Class'];?> </td>
<td>

<?php if ($Us['userStatus'] == 'Y') {

	?><button class="btn btn-success" type="button"> Activated</button> <?php
} else
{
			?><button class="btn btn-warning" type="button"> Not Activated</button> <?php
}

?>
</td>
</tr>
	<?php }?>

					</tbody>
				</table>
			</div>
		</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
