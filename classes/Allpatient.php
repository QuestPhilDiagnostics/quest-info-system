

<?php

class Patient {
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM qpd_patients ORDER BY PatientID");
		$query->execute();

		return $query->fetchAll();
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patients WHERE PatientID = ? ");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>






