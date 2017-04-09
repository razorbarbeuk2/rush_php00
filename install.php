<?php
session_start();

$conn = mysqli_connect(localhost, "root", "root");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE Rush;";
$sql0 = "USE Rush";
$sql1 = "CREATE TABLE membre (id_membre int(11) NOT NULL,login text NOT NULL,passwd text NOT NULL,droit int(11) NOT NULL DEFAULT 0);";
$sql2 = "CREATE TABLE objet (id_objet int(11) NOT NULL,name text NOT NULL,class text NULL,value int(11) NOT NULL DEFAULT 0,url text NOT NULL);";
$sql3 = "CREATE TABLE panier (id_panier int(11) NOT NULL,id_membre int(11) NOT NULL,id_objet int(11) NOT NULL,quantite int(11) NOT NULL DEFAULT '0',total int(11) NOT NULL);";
$sql4 = "ALTER TABLE membre ADD PRIMARY KEY (id_membre);";
$sql5 = "ALTER TABLE objet ADD PRIMARY KEY (id_objet);";
$sql6 = "ALTER TABLE panier ADD PRIMARY KEY (id_panier), ADD KEY id_membre (id_membre), ADD KEY id_objet (id_objet);";
$sql7 = "ALTER TABLE membre MODIFY id_membre int(11) NOT NULL AUTO_INCREMENT;";
$sql8 = "ALTER TABLE objet MODIFY id_objet int(11) NOT NULL AUTO_INCREMENT;";
$sql9 = "ALTER TABLE panier MODIFY id_panier int(11) NOT NULL AUTO_INCREMENT;";

if (mysqli_query($conn, $sql)) {
	mysqli_query($conn, $sql0);
	mysqli_query($conn, $sql1);
	mysqli_query($conn, $sql2);
	mysqli_query($conn, $sql3);
	mysqli_query($conn, $sql4);
	mysqli_query($conn, $sql5);
	mysqli_query($conn, $sql6);
	mysqli_query($conn, $sql7);
	mysqli_query($conn, $sql8);
	mysqli_query($conn, $sql9);
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
$array_names = array("amarzial", "aoudin", "bsouchet", "ccorcy", "chikram", "mbooth", "cumberto", "czalewsk", "ddufour", "mbuch", "tfontain", "tsanzey", "tfleming", "ebonafi", "fqueyrel", "hcherchi", "oseng", "pba", "pmartine", "auhuynh", "cattouma", "dimayout", "ealbert", "framel", "hboudra", "jcarra", "jhezard", "lboudaa", "mdos-san", "mseinic", "qduperon", "qhonore", "qloubier", "rabougue", "rorousse", "snicolet", "spajeo", "tbollach", "vdaviot", "vijacque", "vsteffen", "yismail", "ysan-seb");
// $array_class = array("Commis", "Le Bleu", "Average Men", "Captain", "General");
for ($i=0; $i <= 42; $i++)
{
	// $class = NULL;
	$nb = rand(5, 50);
	// if ($nb > 5 && $nb < 13)
	// 	$class = $array_class[0];
	// if ($nb > 12 && $nb < 21)
	// 	$class = $array_class[1];
	// if ($nb > 20 && $nb < 29)
	// 	$class = $array_class[2];
	// if ($nb > 28 && $nb < 37)
	// 	$class = $array_class[3];
	// if ($nb > 36 && $nb < 51)
	// 	$class = $array_class[4];
	$line = "INSERT INTO objet (name, value, url) VALUES ('$array_names[$i]', $nb, 'https://cdn.intra.42.fr/users/$array_names[$i].jpg');";
	if (mysqli_query($conn, $line) === false)
		die("Connection error: " . mysqli_error($conn));
}

?>
