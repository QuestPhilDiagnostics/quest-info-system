<?php

class pack {
	public function fetch_all(){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_items WHERE ItemType LIKE 'Account%' ORDER BY ItemID desc");
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_items WHERE ItemID = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();


	}


}
?>
