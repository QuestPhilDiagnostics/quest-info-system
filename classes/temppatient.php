<?php

class temppatient {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM temp_patient  ORDER BY PatientID desc LIMIT 1000");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM temp_patient WHERE PatientRef = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
