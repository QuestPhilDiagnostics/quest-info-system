<?php

class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT f.PatientID, f.CompanyName, f.Position, f.FirstName, f.MiddleName, f.LastName, f.Age, f.Gender, f.ContactNo, f.Notes, t.TransactionID, t.TransactionDate, t.TransactionType, t.ItemName, t.ItemDescription, t.ItemPrice, t.GrandTotal, t.Biller, t.SID FROM qpd_patient f, qpd_trans t WHERE f.PatientID = t.PatientID AND t.TransactionType = 'ACCOUNT' AND t.Biller = 'INTELLICARE' OR t.Biller = 'EASTWEST' OR t.Biller = 'VALUCARE' OR t.Biller = 'COCOLIFE' OR t.Biller = 'AVEGA' ORDER BY t.TransactionID");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id, $tid){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans t, qpd_patient p WHERE t.TransactionID = ? AND p.PatientID = ? ");
			$query->bindValue(1, $tid);
			$query->bindValue(2, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
