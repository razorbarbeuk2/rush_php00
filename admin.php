<?php
session_start();
include('function.php');
if ($_SESSION['LOGGUED'] != NULL){
	redir_index();
}
else{
	if (verif_admin($_SESSION['LOGGUED']) == 0){
		redir_index();
	}
}
?>

<html></html>
