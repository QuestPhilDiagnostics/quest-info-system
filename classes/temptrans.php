<?php

class temptrans {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM temp_trans  ORDER BY TransactionID desc LIMIT 1000");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM temp_trans WHERE TransactionRef = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
