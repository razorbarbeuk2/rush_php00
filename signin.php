<?php
session_start();
include('function.php');
$conn = connexion();
if ($_SESSION['LOGGUED'] == NULL){
	echo "ALREADY LOGGUED IN\n";
	return ;
}
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL){
	$passwd = crypte($_POST['passwd']);
	$login = $_POST['login'];
	if (check_signin($_POST['login'], $passwd, $conn) === 1){
		$_SESSION['LOGGUED'] = $login;
	}
	else{
		echo "LOGIN DONT EXISTS\n";
	}
}
else{
	echo "ALREADY LOGGUED IN\n";
}

?>
<html>
<head><title>SIGNIN</title></head>
<body>
<center><H1>SIGNIN</H1><form action"signup.php" method="POST">
	Identifiant: <input type="text" name="login" value=""/>
	<br />
	Mot de passe: <input type="password" name="passwd" value=""/>
	<br />
	<input type="submit" value="OK" name="submit"/>
</form></center>
</body>
</html>
