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
	if (check_signup($_POST['login'], $conn) === 1){
		$req = "INSERT INTO membre (login, passwd) VALUES ('$login', '$passwd');";
		if (mysqli_query($conn, $req)){
			$_SESSION['LOGGUED'] = $login;
		}
		else{
				echo "QUERRY FAIL\n";
		}
	}
	else{
		echo "LOGIN ALREADY EXISTS\n";
	}
}

?>
<html>
<head><title>SIGNUP</title></head>
<body>
<center><H1>SIGNUP</H1><form action"signup.php" method="POST">
	Identifiant: <input type="text" name="login" value=""/>
	<br />
	Mot de passe: <input type="password" name="passwd" value=""/>
	<br />
	<input type="submit" value="OK" name="submit"/>
</form></center>
</body>
</html>
