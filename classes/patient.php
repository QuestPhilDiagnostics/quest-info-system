<?php

class Patient {
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM qpd_patient ORDER BY PatientID DESC LIMIT 1000");
		$query->execute();

		return $query->fetchAll();
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient WHERE PatientID = ? ");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>






