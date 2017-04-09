<?php
session_start();
include('function.php');
?>
<html>
<head>
	<title>Rent Club</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>
	<script src="./js/main.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<h1><img src="./img/font.png" alt="title"></h1>
		</header>
			<nav class="primary_nav">
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#delete_object">Admin</a></li>
					<li><a href="#chmod_user_set_admin">Panier</a></li>
					<li><a href="#chmod_admin_set_user">Signin</a></li>
					<li><a href="">Signup</a></li>
					<li><a href="<?php unset($_SESSION['LOGGUED']); session_destroy(); redir_index();?>">
					Logout
					</a>
					</li>
				</ul>
		</nav>