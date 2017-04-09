<?php
	session_start();
	unset($_SESSION['LOGGUED']);
	session_destroy();
?>
