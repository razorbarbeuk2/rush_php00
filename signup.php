<?php
session_start();
include('function.php');
$conn = connexion();
$path = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'], 1);
$p = $path."/signin.php";
if ($_SESSION['LOGGUED'] != NULL){
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
	<br />
	<a href="<?php echo $p; ?>">DEJA UN COMPTE ?</a>
</form></center>
</body>
</html>
