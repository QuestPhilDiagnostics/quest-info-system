<?php
try {
$pdo = new PDO ('mysql:host=localhost;dbname=dbqis','root','') ;
} catch (PDOException $e) {
	exit('Database Error.');
}
?>