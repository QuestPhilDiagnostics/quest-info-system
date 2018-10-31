

<?php

class sum {
	public function fetch_all($SD, $ED){
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM qpd_form WHERE date >= ? and date <= ? ORDER BY lasnam ASC");
		$query->bindValue(1, $SD);
		$query->bindValue(2, $ED);
		$query->execute();

		return $query->fetchAll();

	}

	public function fetch_data($Company, $SD, $ED){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM qpd_form WHERE comnam = ? AND date >= ? and date <= ? ORDER BY lasnam ASC");
			$query->bindValue(1, $Company);
			$query->bindValue(2, $SD);
			$query->bindValue(3, $ED);
			$query->execute();

			return $query->fetch();


	}


}
?>






