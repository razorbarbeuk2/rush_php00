<?php
session_start();
include('function.php');
if ($_POST['submit'] == "Valider la commande" && $_SESSION['LOGGUED'] != NULL){
	cart_bdd($_SESSION['LOGGUED']);
}
else{

}
?>
