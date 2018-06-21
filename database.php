<?php

$host = "localhost";
$dbname = "phone_book";
$user = "telemaque";
$pass = "telemaque";

// DB connexion
try {
	$db_connect = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $pass);
}
catch (PDOException $e) {
	die("Erreur en se connectant à la base de donnée: " . $e->getMessage());
}
?>
