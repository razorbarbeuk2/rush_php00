<?php
session_start();
// Fonction de cryptage
	function crypte($var) {
		$crypt = hash("Whirlpool", $var);
		return $crypt;
	}

// Fonction connection
	function connexion(){
		$conn = mysqli_connect("localhost", "root", "root", "Rush");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $conn;
	}

// Fonction recherche login mdp similaire
	function check_signin($login, $passwd, $conn){
		$res = mysqli_query($conn, "SELECT login, passwd FROM membre WHERE login = '$login' AND passwd = '$passwd';");
		if (mysqli_num_rows($res) == 1 && $res != NULL){
			return 1;
		}
		return 0;
	}
// Fonction recherche login similaire
	function check_signup($login, $conn){
		$res = mysqli_query($conn, "SELECT login FROM membre WHERE login = '$login';");
		if (mysqli_num_rows($res) == 0 && $res != NULL){
			return 1;
		}
		return 0;
	}
// Function modification de cookie
	function modif_cookie($name, $quantite, $tab){
		$a = 0;
		$cook = unserialize(file_get_contents("cart/".$tab['ID_SESSION']));
		while (!empty($cook[$a])){
			if ($name == $cook[$a]['name'] && $quantite != $cook[$a]['quantite'] && $cook[$a]['ID_SESSION'] == $tab['ID_SESSION']){
				$cook[$a]['quantite'] = $cook[$a]['quantite'] + $quantite;
				$cook[$a]['total'] = $tab['value'] * $quantite;
				file_put_contents("cart/".$tab['ID_SESSION'], serialize($cook));
				return ;
			}
			if ($name == $cook[$a]['name'] && $cook[$a]['ID_SESSION'] != $tab['ID_SESSION']){
				file_put_contents("cart/".$tab['ID_SESSION'], serialize($tab));
				return ;
			}
			$a++;
		}
		if ($name != $cook[$a - 1]['name'] && $cook[$a - 1]['ID_SESSION'] == $tab['ID_SESSION']){
			$cook[] = $tab;
			file_put_contents("cart/".$tab['ID_SESSION'], serialize($cook));
			return ;
		}
		if ($name == $cook[$a - 1]['name'] && $quantite != $cook[$a]['quantite'] && $cook[$a - 1]['ID_SESSION'] == $tab['ID_SESSION']){
			$cook[]['quantite'] = $cook[$a]['quantite'] + $quantite;
			$cook[]['total'] = $tab['value'] * $quantite;
			file_put_contents("cart/".$tab['ID_SESSION'], serialize($cook));
			return ;
		}
	}
// Create cookie pour le futur panier
	function create_cookie($name, $quantite, $tab){
		$arr[] = $tab;
		file_put_contents("cart/".$tab['ID_SESSION'], serialize($arr));
	}
// Fonction de gestion de cookie
	function handle_cookie($name, $quantite){
		$conn = connexion();
		$req = mysqli_query($conn, "SELECT id_objet, value FROM objet WHERE name = '$name';");
		$arr = mysqli_fetch_array($req);
		$tab['id_objet'] = $arr['id_objet'];
		$tab['value'] = $arr['value'];
		$tab['name'] = $name;
		$tab['quantite'] = $quantite;
		$tab['total'] = $tab['value'] * $quantite;
		$tab['ID_SESSION'] = session_id();
		if (!file_exists("cart/".$tab['ID_SESSION'])){
			create_cookie($name, $quantite, $tab);
		}
		else{
			modif_cookie($name, $quantite, $tab);
		}
	}
// Fonction affichage cookie
	function print_cookie(){
		$id_session = session_id();
		$cook = unserialize(file_get_contents("cart/".$id_session));
		return $cook;
}
// Fonction push panier dans la bdd
	function cart_bdd($login){
		$conn = connexion();
		$req_id = mysqli_query($conn, "SELECT id_membre FROM membre WHERE login = '$login';");
		$arr = mysqli_fetch_array($req_id);
		$id_membre = $arr['id_membre'];
		$tab['ID_SESSION'] = session_id();
		$cook = unserialize(file_get_contents("cart/".$tab['ID_SESSION']));
		$a = 0;
		// while (!empty($cook[$a])){
			echo $id_membre."\n";
			echo $cook[$a]['id_objet']."\n";
			echo $cook[$a]['quantite']."\n";
			echo $cook[$a]['total']."\n";
			$req_insert = "INSERT INTO panier (id_membre, id_objet, quantite, total) VALUES ('$id_membre', '$cook[$a]['id_objet']', '$cook[$a]['quantite']', '$cook[$a]['total']');";
			if (mysqli_query($conn, $req_insert) === false){
				die("Connection error: " . mysqli_error($conn));
			}
		// 	$a++;
		// }
	}
	cart_bdd("toto");
?>
