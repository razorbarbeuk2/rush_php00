<?php
session_start();
include('function.php');

// Create connection
$conn = mysqli_connect(localhost, "root", "root");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE Rush;";
$sql0 = "USE Rush";
$sql1 = "CREATE TABLE membre (id_membre int(11) NOT NULL,login text NOT NULL,passwd text NOT NULL,droit int(11) NOT NULL);";
$sql2 = "CREATE TABLE objet (id_objet int(11) NOT NULL,class text NOT NULL,value int(11) NOT NULL DEFAULT 0,url text NOT NULL);";
$sql3 = "CREATE TABLE panier (id_panier int(11) NOT NULL,id_membre int(11) NOT NULL,id_objet int(11) NOT NULL);";
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

?>
