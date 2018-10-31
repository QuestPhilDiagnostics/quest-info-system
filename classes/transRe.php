<?php

class trans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_trans ORDER BY TransactionRef desc");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_trans WHERE TransactionRef = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
