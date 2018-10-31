<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'dbqis');

	$sql = $conn->prepare("SELECT * FROM qpd_patient WHERE Lastname LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$LastName[''] = $row["LastName"];
		}
		echo json_encode($Lastname);
	}
	$conn->close();
?>
