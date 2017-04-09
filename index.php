<?php
session_start();
include('function.php');
if ($_GET['name'] != NULL && $_GET['quantite'] != NULL && $_GET['submit'] == OK){
	handle_cookie($_GET['name'], $_GET['quantite']);
}
?>
<html>
<head>
<title>Rent Club</title>
<h1><img id="title" src="font.png"></h1>
<link rel="stylesheet" href="style.css">
</head>
<div class="header">
	<a href="#"><img id="cart" src="http://le-ecommerce.com/wp-content/uploads/2014/10/la-formule-du-panier-moyen-1.jpg"></a>
	<form action="panier.php" method="POST"><button id='validation'><input type='submit' name='submit' value='Valider la commande'></button></form>
	<div class="info">
	</div>
</div>
<body>
<?php
$conn = connexion();
$req = mysqli_query($conn, "SELECT id_objet, name, value, url FROM objet;");
$tab = array();
while ($arr = mysqli_fetch_array($req)){
	$arr[id_objet];
	$arr[name];
	$arr[value];
	$arr[url];
echo"<div class='img'>";
echo"<form action='' method='GET'>";
echo"<img src='$arr[url]' name='$arr[name]'><br />";
echo"<input id='input' type='text' name='quantite' value=''>";
echo"<input id='input' type='hidden' name='name' value='$arr[name]'>";
echo"<input id='input' type='submit' name='submit' value='OK'>";
echo"</form></div>";
}
?>
</body>
</html>
