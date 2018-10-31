<?php

class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t WHERE f.PatientID = t.PatientID ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_vital v, qpd_medhis m, qpd_pe p WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND m.PatientID = ? AND p.PatientID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $id);
			$query->bindValue(3, $id);
			$query->bindValue(4, $id);
			$query->bindValue(5, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
