<?php
// La classe de connexion a la bdd
class Bdd {
	private static $connexion = NULL;
	// Fonction connexion a la bdd
	public static function connectBdd() {
		if(!self::$connexion) {
			self::$connexion = new PDO("mysql:host=localhost", root, root);
			self::$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$connexion;
	}
	// Fontion creation de la bdd
	public static function createBdd() {
			$resultat = Bdd::connectBdd() -> prepare("CREATE DATABASE IF NOT EXISTS Rush");
			$resultat -> execute();
			$resultat -> prepare("USE Rush");
			$resultat -> execute();
			$resultat -> prepare("CREATE TABLE membre (
  				id_membre int(11) NOT NULL,
				login text NOT NULL,
  				passwd text NOT NULL,
  				date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
			)");
			$resultat -> execute();
		}
}

class Cryptage {
	// Fonction de cryptage
	public static function crypter($var) {
		$cript = hash("Whirlpool", $var);
		return $crypt;
	}
}
?>
