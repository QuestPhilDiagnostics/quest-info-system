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

			$query = $pdo->prepare("SELECT * FROM qpd_patient f, qpd_trans t, qpd_labresult v, qpd_class m WHERE f.PatientID = ? AND t.PatientID = ? AND v.PatientID = ? AND m.PatientID = ?");
			$query->bindValue(1, $id);
			$query->bindValue(2, $id);
			$query->bindValue(3, $id);
			$query->bindValue(4, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
