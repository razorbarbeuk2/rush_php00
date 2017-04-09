<?php
session_start();
include('function.php');
if ($_SESSION['LOGGUED'] != NULL){
	if ($_POST['submit'] == "Valider la commande"){
		$id_session = cart_bdd($_SESSION['LOGGUED']);
		unlink("/cart/".$id_session);
	}
	else{
		echo "ERROR SUBMIT\n";
	}
}
else{
	$path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'], 1);
	$loc = "Location: ".$path."/signup.php";
	header($loc);
}
?>
