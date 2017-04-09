<?php
session_start();
include('function.php');
if ($_SESSION['LOGGUED'] != NULL){
	if ($_POST['submit'] == "Valider la commande"){
		$id_session = cart_bdd($_SESSION['LOGGUED']);
		if (file_exists("/cart/".$id_session)){
			unlink("/cart/".$id_session);
		}
	}
	else{
		echo "ERROR SUBMIT\n";
	}
}
else{
	redir_suffix("/signup.php");
}
?>
